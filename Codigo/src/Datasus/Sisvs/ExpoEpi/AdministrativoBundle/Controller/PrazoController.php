<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;

class PrazoController extends CrudController
{
    protected $service = 'datasus_sisvs_expoepi_administrativo.prazo';
    protected $baseRoute = 'datasus_sisvs_expoepi_administrativo_prazo';

    public function init()
    {
        $srvModalidade = $this->getService('datasus_sisvs_expoepi_administrativo.modalidade');
        $srvFormulario = $this->getService('datasus_sisvs_expoepi_formulario.formulario_inscricao');
        $srvSituacaoFormulario = $this->getService('datasus_sisvs_expoepi_formulario.situacao_formulario');

        $this->params['cmbSituacaoFormulario'] =    $srvSituacaoFormulario->findAll();
        $this->params['cmbModalidade'] =            $srvModalidade->comboBox(array('stAtivo' => 'S'), array('noModalidade' => 'ASC'));
        $this->params['cmbFormulario'] =            $srvFormulario->comboBox(array('coSituacaoFormulario' => '1'), array('dsTitulo' => 'ASC'));

        $srvEvento  = $this->getService('datasus_sisvs_expoepi_administrativo.evento');
        $this->params['cmbEvento']            = $srvEvento->findByStAtivo('S', array('noEvento' => 'ASC'));

        if($this->getRequest()->get('id')){
            $rstFormInsc = $this->getService()->find($this->getRequest()->get('id'));
            $this->params['dataEntity'] = $rstFormInsc;
        }
    }

    public function getAllConfigGrid($data)
    {
        foreach ($data->rows as $key => $value) {

            $html = $this->extension('html');
            $prorrogarPrazo      = $this->generateUrl('datasus_sisvs_expoepi_administrativo_prazo_prorrogar_prazo', array('id' => $value['id']));
            $data->rows[$key]['cell']['formulario'] = $value['cell']['nuFormulario'];
            $data->rows[$key]['cell']['dtInicio'] = $value['cell']['dtInicio']->format('d/m/Y');
            $data->rows[$key]['cell']['dtFim']    = $value['cell']['dtFim']->format('d/m/Y');

            $html->url(array(
                'title' => 'Prorrogar Prazo',
                'href'  => $prorrogarPrazo
            ), 'time');

            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    public function editAction(Request $request)
    {
        $coSeqFormularioInscricao       = $this->getRequest()->get('id');
        $params                         = $request->request->all();

        if (!$request->isMethod('POST')) {
            parent::editAction($request);
            return $this->renderAction();
        }

        try {
            $res = $this->getService('datasus_sisvs_expoepi_administrativo.prazo')->extendTerm($coSeqFormularioInscricao, $params);

            $this->addMessage('Prazo prorrogado com sucesso!', 'success');

            return $this->redirect($this->generateUrl($this->baseRoute));
        } catch (\Exception $exc) {
            $this->addMessage($exc->getMessage(), 'error');

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }
    }
}