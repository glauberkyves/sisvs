<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;

class AreaController extends CrudController
{

    protected $service = 'datasus_sisvs_expoepi_administrativo.area';
    protected $baseRoute = 'datasus_sisvs_expoepi_administrativo_area';

    public function indexAction(Request $request)
    {
        $this->initializeEntity();

        return parent::indexAction($request);
    }

    private function initializeEntity($coModalidade = null)
    {
        if (null === $coModalidade) {
            $coModalidade = $this->getRequest()->get('coModalidade');
        }

        $entityModalidade = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade')->find($coModalidade);

        $this->entity = $this->getService()->getEntity();
        $this->entity->setCoModalidade($entityModalidade);
    }

    public function createAction(Request $request)
    {
        $this->initializeEntity();

        return parent::createAction($request);
    }

    public function getAllConfigGrid($data)
    {

        foreach ($data->rows as $key => $value) {
            $editRoute  = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id']));
            $rtTema     = $this->generateUrl('datasus_sisvs_expoepi_administrativo_tema', array('coArea' => $value['id']));
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
                ), 'edit')
                    ->url(array(
                        'title'   => 'Visualizar vinculação da área com Tema / Categoria',
                        'onclick' => "utils.view({$value['id']})"
                    ), 'view')
                    ->url(array(
                        'title' => 'Vincular Tema / Categoria',
                        'href'  => $rtTema
                    ), 'bind');
            }

            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    protected function getParamsForm()
    {
        return array(
            'action' => $this->generateUrl($this->getRequest()->attributes->get('_route'), array(
                    'id'           => $this->getRequest()->get('id'),
                    'coModalidade' => $this->getRequest()->get('coModalidade')
                )),
            'method' => 'POST',
        );
    }

    protected function redirectToogleStatus()
    {
        $sqCodigo     = $this->getRequest()->get('id');
        $this->entity = $this->getService()->find($sqCodigo);

        return $this->redirectSave();
    }

    protected function redirectSave()
    {
        $coModalidade = $this->entity->getCoModalidade()->getCoSeqModalidade();

        return $this->redirect($this->generateUrl($this->baseRoute) . "?coModalidade={$coModalidade}");
    }

    protected function renderAction($view = null)
    {
        $coEvento = $this->entity->getCoModalidade()
            ->getCoEvento()
            ->getCoSeqEvento();

        $coModalidade = $this->entity->getCoModalidade()
            ->getCoSeqModalidade();

        $configRoute = array(
            'datasus_sisvs_expoepi_administrativo_modalidade' => array(
                'label' => 'Modalidade',
                'url'   => $this->generateUrl('datasus_sisvs_expoepi_administrativo_modalidade', array(
                            'coEvento' => $coEvento
                        )
                    )
            ),

            'datasus_sisvs_expoepi_administrativo_area'       => array(
                'label' => 'Área',
                'url'   => $this->generateUrl('datasus_sisvs_expoepi_administrativo_area', array(
                            'coModalidade' => $coModalidade
                        )
                    )
            )
        );

        $this->setCustomBreadCrumb($configRoute);

        return $this->render($this->resolveRouteName(), $this->params);
    }

}
