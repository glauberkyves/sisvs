<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;

class ModalidadeController extends CrudController
{

    protected $service = 'datasus_sisvs_expoepi_administrativo.modalidade';
    protected $baseRoute = 'datasus_sisvs_expoepi_administrativo_modalidade';

    public function indexAction(Request $request)
    {
        $this->initializeEntity();

        return parent::indexAction($request);
    }

    private function initializeEntity($coEvento = null)
    {
        if (null === $coEvento) {
            $coEvento = $this->getRequest()->get('coEvento');
        }

        $entityEvento = $this->getService('datasus_sisvs_expoepi_administrativo.evento')->find($coEvento);

        $this->entity = $this->getService()->getEntity();
        $this->entity->setCoEvento($entityEvento);
    }

    public function createAction(Request $request)
    {
        $this->initializeEntity();

        return parent::createAction($request);
    }

    public function getAllConfigGrid($data)
    {
        foreach ($data->rows as $key => $value) {
            $id = $value['id'];
            $this->entity = $this->getService()->find($id);

            $srvArea = 'datasus_sisvs_expoepi_administrativo.area';
            $rtEdit = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id']));
            $bdCrit = $this->generateUrl($this->baseRoute . '_bind-criterio', array('coModalidade' => $value['id']));
            $bdApre = $this->generateUrl($this->baseRoute . '_bind-apresentacao', array('coModalidade' => $value['id']));
            $bdInst = $this->generateUrl($this->baseRoute . '_bind-instituicao', array('coModalidade' => $value['id']));
            $bdTpMo = $this->generateUrl($this->baseRoute . '_bind-tipo-modalidade', array('coModalidade' => $value['id']));
            $vwCrit = $this->generateUrl($this->baseRoute . '_view_criterio');
            $vwApre = $this->generateUrl($this->baseRoute . '_view_apresentacao');
            $vwInst = $this->generateUrl($this->baseRoute . '_view_instituicao');
            $rtArea = $this->generateUrl('datasus_sisvs_expoepi_administrativo_area', array('coModalidade' => $value['id']));
            $vwTpMo = $this->generateUrl($this->baseRoute . '_view_tipo-modalidade');
            $vwArea = $this->generateUrl($this->baseRoute . '_view_area');

            $statusIcon = $value['cell']['stAtivo'] == 'S' ? 'active' : 'inactive';
            $titulo = $value['cell']['stAtivo'] == 'S' ? 'Inativar' : 'Ativar';

            $html = $this->extension('html');

            $html->url(array(
                'onclick' => "utils.toogleStatus({$value['id']}, '{$statusIcon}')",
                'title' => $titulo
            ), $statusIcon);

            if ('active' == $statusIcon) {
                # visualizacao
                $result = $this->getService()->checkInscricao($value['cell']['coSeqModalidade']);
                if ($result[0]['total'] == 0){
                    $html->url(array(
                        'href' => $rtEdit,
                        'title' => 'Alterar'
                    ), 'edit');
                }
                $html->startGroup('view')
                    ->url(array(
                        'value' => 'Visualizar vinculação da área com a modalidade',
                        'title' => 'Visualizar vinculação da área com a modalidade',
                        'onclick' => "utils.view({$value['id']}, '{$vwArea}')"
                    ))->url(array(
                        'value' => 'Visualizar vinculação do critério com a modalidade',
                        'title' => 'Visualizar vinculação do critério com a modalidade',
                        'onclick' => "utils.view({$value['id']}, '{$vwCrit}')",
                    ))->url(array(
                        'value' => 'Visualizar vinculação da apresentação com a modalidade',
                        'title' => 'Visualizar vinculação da apresentação com a modalidade',
                        'onclick' => "utils.view({$value['id']}, '{$vwApre}')",
                    ))->url(array(
                        'value' => 'Visualizar vinculação do tipo da instituição com a modalidade',
                        'title' => 'Visualizar vinculação do tipo da instituição com a modalidade',
                        'onclick' => "utils.view({$value['id']}, '{$vwInst}')",
                    ))->url(array(
                        'value' => 'Visualizar vinculação do tipo da modalidade com a modalidade',
                        'title' => 'Visualizar vinculação do tipo da modalidade com a modalidade',
                        'onclick' => "utils.view({$value['id']}, '{$vwTpMo}')"
                    ))
                    ->endGroup();

                #Vinculação
//                if ($result[0]['total'] == 0){
                    $html->startGroup('bind')
                        ->url(array(
                            'value' => 'Vincular Área',
                            'href' => $rtArea
                        ))
                        ->url(array(
                            'value' => 'Vincular Critério',
                            'href' => $bdCrit
                        ))
                        ->url(array(
                            'value' => 'Vincular Apresentação',
                            'href' => $bdApre
                        ))
                        ->url(array(
                            'value' => 'Vincular Tipo de Instituição',
                            'href' => $bdInst
                        ))
                        ->url(array(
                            'value' => 'Vincular Tipo de Modalidade',
                            'href' => $bdTpMo
                        ))
                        ->endGroup();
//                }
        }

            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    /*
     * Método para vinculação de Critérios à modalidades
     * */

    public function bindCriterioAction(Request $request)
    {
        $this->params['entity'] = $this->getService()->find($this->getRequest()->get('coModalidade'));
        $this->params['arrCriterio'] = $this->getService('datasus_sisvs_expoepi_administrativo.criterio')->findByStAtivo('S');

        return $this->renderAction();
    }

    protected function renderAction($view = null)
    {
        $coEvento = $this->getRequest()->get('coEvento');

        if (!$coEvento && isset($this->params['entity'])) {
            $coEvento = $this->params['entity']->getCoEvento()->getCoSeqEvento();
        }

        $configRoute = array(
            'datasus_sisvs_expoepi_administrativo_modalidade' => array(
                'label' => 'Modalidade',
                'url' => $this->generateUrl('datasus_sisvs_expoepi_administrativo_modalidade', array(
                            'coEvento' => $coEvento
                        )
                    )
            )
        );

        $this->setCustomBreadCrumb($configRoute);

        return $this->render($this->resolveRouteName(), $this->params);
    }

    public function saveBindCriterioAction()
    {
        $params = $this->getRequest()->request->all();
        $this->entity = $this->getService()->find($params['coSeqModalidade']);

        try {
            $service = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade_criterio');

            $service->removeAll($service->findBy(array('coModalidade' => $params['coSeqModalidade'])));
            $service->flush();
            $service->saveModalidadeCriterio($params);

            $this->addMessage($this->resolveMessageSuccess(), 'success');

            return $this->redirectSave();

        } catch (\Exception $exc) {
            $this->addMessage($exc->getMessage(), 'error');

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }
    }

    /*
    * Método para vinculação de Critérios à modalidades
    * */

    protected function redirectSave()
    {
        $coEvento = $this->entity->getCoEvento()->getCoSeqEvento();

        return $this->redirect($this->generateUrl($this->baseRoute, array('coEvento' => $coEvento)));
    }

    public function saveBindInstituicaoAction()
    {
        $params = $this->getRequest()->request->all();
        $this->entity = $this->getService()->find($params['coSeqModalidade']);

        try {
            $service = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade_instituicao');

            $service->removeAll($service->findBy(array('coModalidade' => $params['coSeqModalidade'])));
            $service->flush();

            $service->saveModalidadeInstituicao($params);

            $this->addMessage($this->resolveMessageSuccess(), 'success');

            return $this->redirectSave();

        } catch (\Exception $exc) {
            $this->addMessage($exc->getMessage(), 'error');

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }
    }

    /*
     * Método para vinculação de Instituições à modalidades
     * */

    public function bindTipoModAction(Request $request)
    {
        $this->params['entity'] = $this->getService()->find($this->getRequest()->get('coModalidade'));
        $this->params['coEvento'] = $this->getRequest()->get('coEvento');
        $this->params['arrTipoModalidade'] = $this->getService('datasus_sisvs_expoepi_administrativo.tipo_modalidade')->findByStAtivo('S');

        $criteria = array('coSeqModalidade' => $this->getRequest()->get('coModalidade'));
        $modalidade = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade')->findBy($criteria);
        $this->params['modalidade'] = $modalidade;

        return $this->renderAction();
    }

    /*
     *Método para salvamento dos vinculos de instituições e modalidades
     */

    public function saveBindTipoModalidadeAction()
    {
        $coSeqModalidade = $this->getRequest()->get('coSeqModalidade');
        $coTipoModalidade = $this->getRequest()->get('coTipoModalidade');
        $this->entity = $this->getService()->find($coSeqModalidade);

        try {
            $srvTpMod = $this->getService('datasus_sisvs_expoepi_administrativo.tipo_modalidade');
            $enTpMod = $srvTpMod->find($coTipoModalidade);

            $this->entity->setCoTipoModalidade($enTpMod);

            $this->getService()->save($this->entity);

            $this->addMessage($this->resolveMessageSuccess(), 'success');

            return $this->redirectSave();

        } catch (\Exception $exc) {

            if (!isset($coTipoModalidade)) {
                $this->addMessage('Selecione ao menos um registro.', 'error');
            } else {
                $this->addMessage($exc->getMessage(), 'error');
            }

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }
    }


    /*
     * Método para salvamento dos vinculos de instituições e modalidades
     */

    public function bindInstituicaoAction(Request $request)
    {
        $this->params['entity'] = $this->getService()->find($this->getRequest()->get('coModalidade'));
        $this->params['coEvento'] = $this->getRequest()->get('coEvento');
        $this->params['arrInstituicao'] = $this->getService('datasus_sisvs_expoepi_administrativo.instituicao')->findByStAtivo('S');

        $criteria = array('coModalidade' => $this->getRequest()->get('coModalidade'));
        $arrModalidadeInst = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade_instituicao')->findBy($criteria);
        $this->params['arrModalidadeInstituicao'] = $arrModalidadeInst;

        return $this->renderAction();
    }

    public function bindApresentacaoAction(Request $request)
    {
        $this->params['entity'] = $this->getService()->find($this->getRequest()->get('coModalidade'));
        $this->params['coEvento'] = $this->getRequest()->get('coEvento');
        $this->params['arrApresentacao'] = $this->getService('datasus_sisvs_expoepi_administrativo.apresentacao')->findByStAtivo('S');

        $criteria = array('coModalidade' => $this->getRequest()->get('coModalidade'));
        $arrModalidadeApres = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade_apresentacao')->findBy($criteria);
        $this->params['arrModalidadeApresentacao'] = $arrModalidadeApres;

        return $this->renderAction();
    }

    /*
     * Métodos de visualizações
     */

    public function saveBindApresentacaoAction()
    {
        $params = $this->getRequest()->request->all();
        $this->entity = $this->getService()->find($params['coSeqModalidade']);

        try {
            $service = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade_apresentacao');

            $service->removeAll($service->findBy(array('coModalidade' => $params['coSeqModalidade'])));
            $service->flush();

            $service->saveApresentacaoModalidade($params);

            $this->addMessage($this->resolveMessageSuccess(), 'success');

            return $this->redirectSave();

        } catch (\Exception $exc) {
            $this->addMessage($exc->getMessage(), 'error');

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }
    }

    public function viewAreaAction(Request $request)
    {
        return parent::viewAction($request);
    }

    public function viewCriterioAction(Request $request)
    {
        return parent::viewAction($request);
    }

    public function viewApresentacaoAction(Request $request)
    {
        return parent::viewAction($request);
    }

    public function viewInstituicaoAction(Request $request)
    {
        return parent::viewAction($request);
    }

    public function viewTipoModAction(Request $request)
    {
        return parent::viewAction($request);
    }

    protected function getParamsForm()
    {
        return array(
            'action' => $this->generateUrl($this->getRequest()->attributes->get('_route'), array(
                    'id' => $this->getRequest()->get('id'),
                    'coEvento' => $this->getRequest()->get('coEvento')
                )),
            'method' => 'POST',
        );
    }

    protected function redirectToogleStatus()
    {
        $sqCodigo = $this->getRequest()->get('id');
        $this->entity = $this->getService()->find($sqCodigo);

        return $this->redirectSave();
    }

    public function comboBoxAction(){
        $criteria = $this->getRequest()->query->all();
        $orderBy  = $this->getRequest()->query->get('order');
        $criteria['stAtivo'] = 'S';

        $result = $this->getService()->comboBox($criteria);
        return $this->renderJson($result);
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

            $this->entity->setNoModalidade($this->entity->getNoModalidade());
            $this->entity->setDsModalidade($this->entity->getDsModalidade());
            $this->entity->setStOcultaDados($this->entity->getStOcultaDados());
            $this->entity->setStPossuiOrientador($this->entity->getStPossuiOrientador());
            $this->entity->setStAtivo('S');

            if ($valid) {
                $this->getService()->update($this->entity);
                $this->addMessage('Registro alterado com sucesso.', 'success');
                return $this->redirectSave();
            }
        }
        return parent::editAction($request);

    }

}
