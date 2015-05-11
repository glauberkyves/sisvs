<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;
class CriterioController extends CrudController
{

    protected $service = 'datasus_sisvs_expoepi_administrativo.criterio';
    protected $baseRoute = 'datasus_sisvs_expoepi_administrativo_criterio';

		public function searchAction()
		{
				$request   = $this->getRequest();
				$data      = $this->getService()->listaCriterios($request);
				$this->getAllConfigGrid($data);

				return $this->renderJson($data);
		}


		public function getAllConfigGrid($data)
    {
        foreach ($data->rows as $key => $value) {
            $editRoute  = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id']));
            $statusIcon = $value['cell']['stAtivo'] == 'S' ? 'active' : 'inactive';
            $titulo = $value['cell']['stAtivo'] == 'S' ? 'Inativar' : 'Ativar';

            $html = $this->extension('html');
            $html->url(array(
                'onclick' => "utils.toogleStatus({$value['id']}, '{$statusIcon}')",
                'title'   => $titulo
            ), $statusIcon);

            if ('active' == $statusIcon) {
                $html->url(array(
                    'href'  => $editRoute,
                    'title' => 'Alterar'
                ), 'edit');
            }

            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction(Request $request)
    {
        $this->init();

        $id = $request->get('id');
        $this->entity = $this->getService()->find($id);
        $this->form = $this->getFormEntity();
        $this->form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $this->entity = $this->form->getData();
            $valid = $this->validateEntity($this->entity);

            $this->entity->setNoCriterio($this->entity->getNoCriterio());
            $this->entity->setDsCriterio($this->entity->getDsCriterio());
            $this->entity->setStAtivo($this->entity->getStAtivo());

            if ($valid) {
                $this->getService()->update($this->entity);
                $this->addMessage('Registro alterado com sucesso.', 'success');
                return $this->redirectSave();
            }
        }
        return parent::editAction($request);

    }

}
