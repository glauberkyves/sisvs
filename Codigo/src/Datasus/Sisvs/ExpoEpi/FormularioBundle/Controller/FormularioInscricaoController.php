<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Datasus\Sisvs\ExpoEpi\FormularioBundle\Service\FormularioInscricaoService;
use Symfony\Component\HttpFoundation\Request;

class FormularioInscricaoController extends CrudController
{
    protected $service = 'datasus_sisvs_expoepi_formulario.formulario_inscricao';
    protected $baseRoute = 'datasus_sisvs_expoepi_formulario_formulario_inscricao';

    public function init()
    {
        $srvEvento = $this->getService('datasus_sisvs_expoepi_administrativo.evento');
        $srvSituacaoFormulario = $this->getService('datasus_sisvs_expoepi_formulario.situacao_formulario');
        $srvMOdalidade = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade');

        $this->params['cmbEvento'] = $srvEvento->findByStAtivo('S', array('noEvento' => 'ASC'));
        $this->params['cmbSituacaoFormulario'] = $srvSituacaoFormulario->findByStAtivo('S');
        $this->params['cmbModalidade'] = $srvMOdalidade->findByStAtivo('S');

    }

    public function getAllConfigGrid($data)
    {
        foreach ($data->rows as $key => $value) {
            $html = $this->extension('html');
            $editFormInsc = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id'], 'coSeqModalidade' => $value['cell']['coSeqModalidade']));
            $view = $this->generateUrl('datasus_sisvs_expoepi_formulario_formulario_inscricao_view', array('id' => $value['id']));
            $viewPdf = $this->generateUrl('datasus_sisvs_expoepi_formulario_formulario_inscricao_view_pdf', array('id' => $value['id']));
            $statusIcon = 'active';
            $titleStatusIcon = 'Inativar';

            if ($value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_STATUS_FORMULARIO_PUBLICADO) {
                $statusIcon = $value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_STATUS_FORMULARIO_PUBLICADO ? 'active' : 'inactive';
            } else {
                $statusIcon = $value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_SITUACAO_FORMULARIO_GERADO ? 'active' : 'inactive';
            }

            $titleStatusIcon = $value['cell']['coSituacaoFormulario'] == 3 ? 'Ativar' : 'Inativar';

            if ($value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_STATUS_FORMULARIO_INATIVO) {
                $statusIcon = 'inactive';
                $titleStatusIcon = 'Ativar';
            }
            if ($value['cell']['coSituacaoFormulario'] == 3) {
                $statusIcon = 'inactive';
                $titleStatusIcon = 'Ativar';
            }
            if ($value['cell']['coSituacaoFormulario'] !== 3) {
                $html->url(array(
                    'title' => 'Alterar',
                    'href' => $editFormInsc
                ), 'edit');
            }
            $html->url(array(
                'onclick' => "formInsc.activeInactive({$value['id']}, '{$statusIcon}')",
                'title' => $titleStatusIcon
            ), $statusIcon);

            if ($value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_SITUACAO_FORMULARIO_GERADO) {
                $html->url(array(
                    'title' => 'Visualizar Formulário de Inscrição',
                    'href' => $view
                ), 'view');
            }

            if ($value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_SITUACAO_FORMULARIO_GERADO
                || $value['cell']['coSituacaoFormulario'] == FormularioInscricaoService::CO_SITUACAO_FORMULARIO_PUBLICADO
            ) {
                $html->url(array(
                    'title' => 'Visualizar PDF',
                    'href' => $viewPdf,
                ), 'download');
            }
            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    public function ajaxGetNoTipoModalidadeAction()
    {
        $srvModalidade = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade');
        $res = $srvModalidade->getNoTipoModalidade($this->getRequest()->get('coModalidade'));

        return $this->renderJson($res);
    }

    public function ajaxGetEventoOfModalidadeAction()
    {
        $rstFormInsc = $this->getService()->find($this->getRequest()->get('coSeqFormularioInscricao'));

        $coSeqEvento = $rstFormInsc->getCoModalidade()->getCoEvento()->getCoSeqEvento();

        $coSeqModalidade = $rstFormInsc->getCoModalidade()->getCoSeqModalidade();

        $res = array('coSeqEvento' => $coSeqEvento, 'coSeqModalidade' => $coSeqModalidade);

        return $this->renderJson($res);
    }

    public function comboBoxAction()
{
		$criteria = $this->getRequest()->query->all();
		$orderBy = $this->getRequest()->query->get('order');
		$criteria['stAtivo'] = 'S';

		if (!is_array($orderBy)) {
				$orderBy = array();
		}
		unset($criteria['order']);

		$result = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade')->findByModalidade($criteria, $orderBy);

		return $this->renderJson($result);
}

    public function publishAction()
    {
        $coSeqFormularioInscricao = $this->getRequest()->get('id');

        $res = $this->getService()->publish($coSeqFormularioInscricao);

        if ($res) {
            $this->addMessage('Formulário publicado com sucesso.', 'success');
        }

        return $this->redirect($this->generateUrl($this->baseRoute));
    }

    public function activeInactiveAction(Request $request)
    {
        $id = $this->getRequest()->get('id');
        $this->entity = $this->getService()->find($id);
        $result = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade')->checkInscricao($request->get('coSeqModalidade'), $request->get('id'));
        if (($dtFim = $this->getRequest()->get('dtFim')) < date('Y') && $result[0]['total'] <= 0) {
            $status = $this->getRequest()->get('status');
            $res = $this->getService()->activeInactive($id, $status);
        } else {
            if ($result[0]['total'] > 0) {
                $this->addMessage('O formulário não pode ser inativado/alterado pois já existe inscrição para o mesmo.', 'warning');
            } else {
                $status = $this->getRequest()->get('status');
                $res = $this->getService()->activeInactive($id, $status);
                if ($result[0]['total'] <= 0 && $res == 'inactivated') {
                    $this->addMessage('Registro ativado com sucesso.', 'success');
                } else {
                    $this->addMessage('Registro inativado com sucesso.', 'success');
                }
            }

        }
        if (isset($res) and $res == 'inactivated') {
            $this->addMessage('Registro inativado com sucesso.', 'success');
        } else if (isset($res) and $res == 'activated') {
            $this->addMessage('Registro ativado com sucesso.', 'success');
        }

        return $this->redirect($this->generateUrl($this->baseRoute));
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
        $nuFormulario = $this->entity->getNuFormulario();
        $this->form->handleRequest($request);
        if ($request->isMethod('POST')) {
            $this->entity = $this->form->getData();
            $valid = $this->validateEntity($this->entity);
            $this->entity->setNuFormulario($nuFormulario);
            $this->entity->setDtInicio($this->entity->getDtInicio());
            $this->entity->setDtFim($this->entity->getDtFim());
            $this->entity->setDsTitulo($this->entity->getDsTitulo());
            $this->entity->setDsObjeto($this->entity->getDsObjeto());
            $this->entity->setDsAreaEvento($this->entity->getDsAreaEvento());
            $this->entity->setDtInicio($this->entity->getDtInicio());
            $this->entity->setDsResumo($this->entity->getDsResumo());
            $this->entity->setDsApresentacao($this->entity->getDsApresentacao());
            $this->entity->setDsDeclaracao($this->entity->getDsDeclaracao());
            $this->entity->setDsAnexos($this->entity->getDsAnexos());
            $this->entity->setCoSituacaoFormulario($this->entity->getCoSituacaoFormulario());
            $this->entity->setCoUltimaSituacaoFormulario($this->entity->getCoUltimaSituacaoFormulario());
            $this->entity->setCoUltimaSituacaoFormulario($this->entity->getCoUltimaSituacaoFormulario());

            if ($valid) {
                $this->getService()->update($this->entity);
                $this->addMessage('Registro alterado com sucesso.', 'success');
                return $this->redirectSave();
            }
        }
        $edit = parent::editAction($request);

//        $result = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade')->checkInscricao($request->get('coSeqModalidade'), $request->get('id'));

//        if ($result[0]['total'] > 0) {
            $this->addMessage('	O formulário de inscrição não pode ser alterado, pois ele já foi publicado', 'warning');
            return $this->redirectSave();
//        } else {
            return $edit;
//        }
    }

    public function viewAction(Request $request)
    {
        $rstFormInsc = $this->getService()->getViewFormInsc($request->get('id'));

        $request->query->set('coSeqModalidade', $rstFormInsc['coSeqModalidade']);
        $request->query->set('coSeqFormulario', $rstFormInsc['coSeqFormularioInscricao']);

        $srv = $this->getService('datasus_sisvs_expoepi_autor.painel_controller');

        return $srv->createAction($request);
    }

    public
    function renderAction($view = null)
    {
        if (!isset($this->params['formularioInscricao'])) {
            $coSeqFormularioInscricao = $this->entity->getCoSeqFormularioInscricao();
        }

        if (isset($coSeqFormularioInscricao)) {
            $this->params['coEvento'] = $this->entity->getCoModalidade()->getCoEvento()->getCoSeqEvento();
            $this->params['coModalidade'] = $this->entity->getCoModalidade()->getCoSeqModalidade();

            $srvModaldiade = 'datasus_sisvs_expoepi_administrativo.modalidade';
            $criteria = array('coEvento' => $this->params['coEvento'], 'stAtivo' => 'S');
            $this->params['cmbModalidade'] = $this->getService($srvModaldiade)->comboBox($criteria);
        }

        return parent::renderAction();
    }

    public
    function getDataPdf()
    {
        $request = $this->getRequest();
        $rstFormInsc = $this->getService()->getViewFormInsc($request->get('id'));

        $request->query->set('coSeqModalidade', $rstFormInsc['coSeqModalidade']);
        $request->query->set('coSeqFormulario', $rstFormInsc['coSeqFormularioInscricao']);

        $srv = $this->getService('datasus_sisvs_expoepi_autor.painel_controller');
        $srv->createAction($request);
        $action = $srv->renderAction();

        return $action;
    }

    public
    function createAction(Request $request)
    {
        $this->init();

        $this->form = $this->getFormEntity();
        $this->form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $this->entity = $this->form->getData();
            $valid = $this->validateEntity();

            if ($this->form->isValid() && $valid) {
                return $this->saveForm($this->entity, $request);
            }
        }

        $this->params['entity'] = $this->entity;
        $this->params['form'] = $this->form->createView();

        return $this->renderAction();
    }

    public
    function getApresentacaoModalidadeAction(Request $request)
    {
        $result = $this->getService()->getApresentacaoModalidade($request);

        $html = null;
        $ordem = 0;
        if ($result) {
            foreach ($result as $value) {
                $ordem++;
                if ($value['nuOrdem']) {
                    $ordem = $value['nuOrdem'];
                }
                $html .= "<tr><td>{$value['noApresentacao']}</td><td> <input type='hidden' name='coApresentacao[{$value['coSeqApresentacao']}]' id='coApresentacao[{$value['coSeqApresentacao']}]' value='{$value['coSeqApresentacao']}' /> <input type='hidden' name='nuOrdem[{$ordem}]' id='nuOrdem[{$ordem}]' value='{$ordem}' /> <a class='btn'><i class='icon-chevron-up'></i></a><a class='btn'><i class='icon-chevron-down'></i></a></td></tr>";
            }
        }
        return $this->renderJson($html) ? $this->renderJson($html) : array();
    }


    public
    function saveForm($entity)
    {
        try {
            call_user_func_array(array($this->getService(), 'save'), func_get_args());

            $msg = $entity->getNuFormulario();

            $this->addMessage('Formulário gerado com sucesso. O número do formulário é ' . $msg, 'success');

            return $this->redirectSave();
        } catch (\Exception $exc) {

            $this->addMessage($exc->getMessage(), 'error');

            $this->params['entity'] = $this->entity;
            $this->params['form'] = $this->form->createView();

            return $this->redirectSave();
        }
    }

    protected
    function resolveMessageSuccess()
    {
        $msgSuccess = 'Formulário gerado com sucesso. O número do formulário é.';

        if ($this->getRequest()->get('id')) {
            $msgSuccess = 'Registro alterado com sucesso.';
        }

        return $msgSuccess;
    }
}