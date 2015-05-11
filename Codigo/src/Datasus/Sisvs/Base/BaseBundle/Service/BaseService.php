<?php

namespace Datasus\Sisvs\Base\BaseBundle\Service;

use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\Request;

class BaseService extends AbstractService
{
    /**
     * @var
     */
    protected $entity;
    /**
     * @var null
     */
    protected $dataGrid = null;

    /**
     * @param Request $request
     *
     * @return \StdClass
     */
    public function getResultGrid(Request $request)
    {
        $result = $this->getDataGrid($request);

        $page = $request->query->get('page', 1);
        $rows = $request->query->get('rows');

        $paginator  = new Paginator();
        $pagination = $paginator->paginate($result, $page, $rows);

        $data          = new \StdClass();
        $data->page    = $page;
        $data->total   = ceil($pagination->getTotalItemCount() / $rows);
        $data->records = $pagination->getTotalItemCount();
        $data->rows    = array();

        $metadata   = $this->getMetadataEntity();
        $identifier = current($metadata->getIdentifier());

        foreach ($pagination->getItems() as $key => $item) {
            $data->rows[$key]['id']   = isset($item[$identifier]) ? $item[$identifier] : null;
            $data->rows[$key]['cell'] = $item;
        }

        return $data;
    }

    /**
     * @param Request $request
     *
     * @return null
     */
    public function getDataGrid(Request $request)
    {
        if (null !== $this->dataGrid) {
            return $this->dataGrid;
        }

        return $this->getRepository()->getResultGrid($request);
    }

    /**
     * @param array $criteria
     * @param array $orderBy
     */
    public function comboBox(array $criteria = array(), array $orderBy = array())
    {
        return $this->getRepository()->comboBox($criteria, $orderBy);
    }
}
