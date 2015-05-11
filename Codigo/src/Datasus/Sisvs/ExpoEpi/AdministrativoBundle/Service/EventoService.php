<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;

class EventoService extends CrudService
{

    /**
     * @var ArrayCollection
     */
    protected $fileUpload = array();
    protected $entity = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\EventoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form\EventoEntityType';

    public function preInsert(AbstractBase $entity)
    {
        $entity->setStAtivo('S');

        if (!$this->fileUpload->containsKey('dsEdital')) {
            $this->registerError('administrativo.validations.evento.notBlankDsEdital');
        }
    }

    public function preUpdate(AbstractBase $entity)
    {
        $entity->loadValues($this->getRepository()->find($entity->getCoSeqEvento()));
    }

    public function preSave(AbstractBase $entity)
    {
        $this->fileUpload = new ArrayCollection();

        $this->validateAno($entity);
        $this->checkDuplicityAno($entity);

        $this->fileUpload->set('dsEdital', $entity->getDsEdital());
        $this->fileUpload->set('imLogotipo', $entity->getImLogotipo());

        $this->setBlob($entity, 'dsEdital');
        $this->setBlob($entity, 'imLogotipo');

        if ($this->getRepository()->checkDuplicity($entity)) {
            $this->registerError('administrativo.validations.evento.NotEqualTo');
        }
    }

    private function validateAno(AbstractBase $entity)
    {
        if (($entity->getAnEvento() < (date('Y') - 10)) || ($entity->getAnEvento() > (date('Y') + 1))) {
            $this->registerError('administrativo.validations.evento.anEventoNotValid');

            return false;
        }

        return true;
    }

    private function checkDuplicityAno(AbstractBase $entity)
    {
        if ($this->getRepository()->checkDuplicityAno($entity)) {
            $this->registerError('administrativo.validations.evento.anEventoNotEqual');
        }
    }

    public function setBlob($entity, $name)
    {
        $methodSet = 'set' . ucfirst($name);
        $methodGet = 'get' . ucfirst($name);

        if ($this->fileUpload->get($name) instanceof UploadedFile) {
            $tmp_dir  = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
            $filename = $this->fileUpload->get($name)->getFilename();
            $path     = $tmp_dir . '/' . $filename;

            $stream = fopen($path, 'rb');
            $entity->{$methodSet}(stream_get_contents($stream));
        }

        if (is_resource($entity->{$methodGet}())) {
            $entity->{$methodSet}(stream_get_contents($entity->{$methodGet}()));
        }
    }

    public function preActiveInactive(AbstractBase $entity)
    {
        $result = $this->getRepository('DatasusSisvsExpoEpiAdministrativoBundle::ModalidadeEntity')->findByCoEvento($entity->getCoSeqEvento());

        if ($result && $entity->getStAtivo() == 'S') {
            $this->registerError('administrativo.validations.evento.activeInactive');
        }
    }

    protected function removeFromUpdateFields($entity)
    {
        $class = $this->getMetadataEntity($entity);

        if (!$this->fileUpload->get('dsEdital') instanceof UploadedFile) {
            unset($class->reflFields['dsEdital']);
        }

        if (!$this->fileUpload->get('imLogotipo') instanceof UploadedFile) {
            unset($class->reflFields['imLogotipo']);
        }

        $this->getEntityManager()->getUnitOfWork()->computeChangeSet($class, $entity);
    }

    public function update($entity)
    {
        try {
            $this->getEntityManager()->merge($entity);
            $this->getEntityManager()->flush();
        } catch (\Exception $exc) {
            throw new ServiceCrudException($exc->getMessage());
        }
        return $entity;
    }
}