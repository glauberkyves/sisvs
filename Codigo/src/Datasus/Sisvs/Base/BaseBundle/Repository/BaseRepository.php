<?php

namespace Datasus\Sisvs\Base\BaseBundle\Repository;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;

class BaseRepository extends EntityRepository
{
    public function remove($coSeq, $value)
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->delete($this->getEntityName(), 'e')
            ->andWhere($this->getEntityManager()->createQueryBuilder()->expr()->eq($coSeq, $value))
            ->getQuery()
            ->execute();
    }

    public function getResultGrid(Request $request)
    {
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from($this->getEntityName(), 'e');

        $this->addWhere($query, $request);
        $this->addOrderBy($query, $request);

        return $query
            ->getQuery()
            ->getArrayResult();
    }

    public function addWhere(QueryBuilder $query, Request $request = null)
    {
        $params = array();
        parse_str($request->query->get('data'), $params);

        foreach ($params as $key => $value) {
            if ($value != '') {
                switch (substr($key, 0, 2)) {
                    case 'no':
                        $query->andWhere($query->expr()->like("UPPER(e.{$key})", "UPPER(:$key)"))
                            ->setParameter($key, "%$value%");

                        break;

                    case 'st':
                        $query->andWhere($query->expr()->eq("e.{$key}", ":$key"))
                            ->setParameter($key, $value);

                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function addOrderBy(QueryBuilder $query, Request $request = null)
    {
        $column = $request->get('sidx');
        $orderb = $request->get('sord');

        $dqlParts = $query->getDQLParts();

        if (strpos(current($dqlParts['select'])->__toString(), $column) !== false) {
            $query->orderBy($column, $orderb);
        }

        $fieldNames = $this->getClassMetadata()->getFieldNames();

        if (strpos($column, '.') && in_array(substr($column, strpos($column, '.') + 1), $fieldNames)) {
            $query->orderBy($column, $orderb);
        }
    }

    public function checkDuplicity($entity)
    {
        $metadata = $this->getClassMetadata($entity);
        $fields   = $metadata->getFieldNames();
        $idField  = current($metadata->getIdentifier());
        $noField  = $fields[1];

        $methodIdentifier = 'get' . ucfirst(current($metadata->getIdentifier()));
        $methodNoField    = 'get' . ucfirst($noField);

        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $query        = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from($this->_entityName, 'e')
            ->andWhere($queryBuilder->expr()->eq('UPPER(e.' . $noField .')' , 'UPPER(:' . $noField . ')'))
            ->setParameter($noField, trim($entity->{$methodNoField}()));

        if ($entity->$methodIdentifier()) {
            $query->andWhere($queryBuilder->expr()->neq('e.' . $idField, ':' . $idField))
                ->setParameter($idField, $entity->$methodIdentifier());
        }

        return $query->getQuery()->getResult();
    }

    public function saveBlob(AbstractBase $entity, $columnBlob = null)
    {
        $metadata = $this->getClassMetadata();

        foreach ($metadata->fieldMappings as $column => $property) {
            if (null == $columnBlob) {
                if ($property['type'] == 'blob') {
                    $columnBlob = $property['columnName'];
                    $methodBlob = 'get' . ucfirst($column);
                    break;
                }

            } else {
                if ($columnBlob && $columnBlob == $column) {
                    $columnBlob = $property['columnName'];
                    $methodBlob = 'get' . ucfirst($column);
                    break;
                }
            }
        }

        if (!$columnBlob || !$methodBlob) {
            throw new RepositoryCrudException('Propriedades não foram definidas.');
        }

        $methodCoSeq = 'get' . ucfirst(current($metadata->getIdentifier()));
        $columnSeq   = current($metadata->getIdentifierColumnNames());

        $entityCoSeq = $entity->{$methodCoSeq}();
        $entityBlob  = $entity->{$methodBlob}();

        $conexao = $this->getEntityManager()->getConnection();

        $sql = " UPDATE {$metadata->getTableName()} SET ";
        $sql .= " {$columnBlob}  = EMPTY_BLOB()";
        $sql .= " WHERE {$columnSeq} = :codigo ";
        $sql .= " RETURNING {$columnBlob} INTO :img ";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':codigo', $entityCoSeq);
        $stmt->bindParam(':img', $entityBlob, \PDO::PARAM_LOB);

        $conexao->beginTransaction();
        $stmt->execute();
        $conexao->commit();
    }

    /**
     * @param array $criteria
     * @param array $orderBy
     */
    public function comboBox(array $criteria = array(), array $orderBy = array())
    {
        $metadata    = $this->getClassMetadata();
        $fields      = $metadata->getFieldNames();
        $coSeqEntity = $metadata->getSingleIdentifierFieldName();
        $noEntity    = $fields[1];

        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select("e.{$coSeqEntity}, e.{$noEntity}")
            ->from($this->getEntityName(), 'e');

        foreach ($criteria as $key => $value) {
            $query->andWhere($query->expr()->eq("e.{$key}", ":$key"))
                ->setParameter($key, $value);
        }

        if ($orderBy) {
            $query->orderBy('e.' . key($orderBy), current($orderBy));
        }

        $comboBox = array();
        foreach ($query->getQuery()->getArrayResult() as $key => $value) {
            $comboBox[$value[$coSeqEntity]] = $value[$noEntity];
        }

        return $comboBox;
    }

}
