<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;

class TemaController extends CrudController
{

    protected $service = 'datasus_sisvs_expoepi_administrativo.tema';
    protected $baseRoute = 'datasus_sisvs_expoepi_administrativo_tema';

    public function indexAction(Request $request)
    {
        $this->initializeEntity();

        return parent::indexAction($request);
    }

    private function initializeEntity($coArea = null)
    {
        if (null === $coArea) {
            $coArea = $this->getRequest()->get('coArea');
        }

        $entityArea = $this->getService('datasus_sisvs_expoepi_administrativo.area')->find($coArea);

        $this->entity = $this->getService()->getEntity();
        $this->entity->setCoArea($entityArea);
    }

    public function createAction(Request $request)
    {
        $this->initializeEntity();

        return parent::createAction($request);
    }

    protected function redirectSave()
    {
        $coArea = $this->entity->getCoArea()->getCoSeqArea();

        return $this->redirect($this->generateUrl($this->baseRoute) . "?coArea={$coArea}");
    }

    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $this->entity = $this->getService()->find($id);

        if (!$this->entity) {
            $this->addMessage('Entidade não localizada.', 'error');

            return $this->redirect($this->generateUrl($this->baseRoute));
        }

        $alfa = array(
            "a", "b", "c", "d", "e", "f", "g",
            "h", "i", "j", "k", "l", "m", "n",
            "o", "p", "q", "r", "s", "t", "u",
            "v", "w", "x", "y", "z"
        );

        if ($this->entity->getCoTipoClassificacao()->getCoSeqTipoClassificacao() == 2) {
            $nuTema = strtoupper($this->entity->getNuTema());
        } else {
            $nuTema = strtolower($alfa[$this->entity->getNuTema() - 1]) . ')';
        }
        $this->params['codigo'] = $nuTema;

        $this->initializeEntity($this->entity->getCoArea()->getCoSeqArea());

        return parent::editAction($request);
    }

    public function getAllConfigGrid($data)
    {
        $index = 0;
        $total = count($data->rows) - 1;

        foreach ($data->rows as $key => $value) {
            $editRoute = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id']));
            $statusIcon = $value['cell']['stAtivo'] == 'S' ? 'active' : 'inactive';
            $titulo = $value['cell']['stAtivo'] == 'S' ? 'Inativar' : 'Ativar';

            $html = $this->extension('html');
            $html->url(array(
                'onclick' => "utils.toogleStatus({$value['id']}, '{$statusIcon}')",
                'title' => $titulo
            ), $statusIcon);

            if ('active' == $statusIcon) {
                $html->url(array(
                    'href' => $editRoute,
                    'title' => 'Alterar'
                ), 'edit');

                if ($value['cell']['coSeqTipoClassificacao'] == 1) {
                    switch (true) {
                        case $index == 0:
                            $html->url(array(
                                'onclick' => "TemaForm.down({$value['id']})",
                                'title' => 'Descer'
                            ), 'down');
                            break;

                        case $index == $total:
                            $html->url(array(
                                'onclick' => "TemaForm.up({$value['id']})",
                                'title' => 'Subir'
                            ), 'up');
                            break;

                        default:
                            $html->url(array(
                                'onclick' => "TemaForm.up({$value['id']})",
                                'title' => 'Subir'
                            ), 'up');
                            $html->url(array(
                                'onclick' => "TemaForm.down({$value['id']})",
                                'title' => 'Descer'
                            ), 'down');
                            break;
                    }

                    $index++;
                }
            }

            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    protected function getParamsForm()
    {
        return array(
            'action' => $this->generateUrl($this->getRequest()->attributes->get('_route'), array(
                'id' => $this->getRequest()->get('id'),
                'coArea' => $this->getRequest()->get('coArea')
            )),
            'method' => 'POST',
        );
    }

    protected function renderAction($view = null)
    {
        $coEvento = $this->entity->getCoArea()
            ->getCoModalidade()
            ->getCoEvento()
            ->getCoSeqEvento();

        $coModalidade = $this->entity->getCoArea()
            ->getCoModalidade()
            ->getCoSeqModalidade();

        $coArea = $this->entity->getCoArea()->getCoSeqArea();

        $configRoute = array(
            'datasus_sisvs_expoepi_administrativo_modalidade' => array(
                'label' => 'Modalidade',
                'url' => $this->generateUrl('datasus_sisvs_expoepi_administrativo_modalidade', array(
                        'coEvento' => $coEvento
                    )
                )
            ),

            'datasus_sisvs_expoepi_administrativo_area' => array(
                'label' => 'Área',
                'url' => $this->generateUrl('datasus_sisvs_expoepi_administrativo_area', array(
                        'coModalidade' => $coModalidade
                    )
                )
            ),

            'datasus_sisvs_expoepi_administrativo_tema' => array(
                'label' => 'Tema / Categoria',
                'url' => $this->generateUrl('datasus_sisvs_expoepi_administrativo_tema', array(
                        'coArea' => $coArea
                    )
                )
            )
        );

        $this->setCustomBreadCrumb($configRoute);

        return $this->render($this->resolveRouteName(), $this->params);
    }

    public function changeOrderAction()
    {
        $order = $this->getRequest()->get('order');
        $coSeqTema = $this->getRequest()->get('coSeqTema');
        $entity = $this->getService()->find($coSeqTema);

        $result = $this->getService()->changeOrder($entity, $order);

        return $this->renderJson(array('success' => $result));
    }

    protected function redirectToogleStatus()
    {
        $coSeqTema = $this->getRequest()->get('id');
        $entity = $this->getService()->find($coSeqTema);
        $coArea = $entity->getCoArea()->getCoSeqArea();

        return $this->redirect($this->generateUrl($this->baseRoute, array('coArea' => $coArea)));
    }

		public function comboBoxAction()
		{
				$criteria = $this->getRequest()->query->all();
				$orderBy = $this->getRequest()->query->get('order');
				$criteria['stAtivo'] = 'S';

				unset($criteria['order']);
				$result = $this->getService('datasus_sisvs_expoepi_administrativo.tema')->findByTema($criteria);
				array_reverse($result);
					return $this->renderJson($result);
		}
}
