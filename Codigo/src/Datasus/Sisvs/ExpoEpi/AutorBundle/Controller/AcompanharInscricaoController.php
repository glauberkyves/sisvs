<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Datasus\Sisvs\ExpoEpi\AutorBundle\Service\SituacaoInscricaoService;
use Symfony\Component\HttpFoundation\Request;

class AcompanharInscricaoController extends CrudController
{
    protected $service = 'datasus_sisvs_expoepi_autor.inscricao';
    protected $baseRoute = 'autor_acompanhar_inscricao';

    public function init()
    {
        $srvEvento                  = $this->getService('datasus_sisvs_expoepi_administrativo.evento');
        $this->params['cmbEnvento'] = $srvEvento->findByStAtivo('S', array('noEvento' => 'ASC')
        );
    }

    public function searchAction()
    {
        $coSeqUsuario = $this->getUser()->getAttr()->getCoSeqUsuario();
        $request      = $this->getRequest();
        $data         = $this->getService()->getInscricoesPorAutor($request, $coSeqUsuario);
        $this->getAllConfigGrid($data);

        return $this->renderJson($data);
    }

    public function getAllConfigGrid($data)
    {
        foreach ($data->rows as $key => $value) {
            $html = $this->extension('html');
            $html->url(array(
                'title'   => 'Detalhar',
                'onclick' => "utils.view({$value['id']})"
            ), 'view');

            switch ($data->rows[$key]['cell']['coSituacao']) {
                case SituacaoInscricaoService::ST_SITUACAO_PENDENTE:
                    $situacao                               = $data->rows[$key]['cell']['dsSituacao'];
                    $data->rows[$key]['cell']['dsSituacao'] = "<span class=\"btn-danger\">{$situacao}</span>";
                    break;

                case SituacaoInscricaoService::ST_SITUACAO_ANALISE_NA_TRIAGEM:
                case SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_TRIAGEM:
                case SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_TRIAGEM:
                case SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO:
                case SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_COORDENACAO:
                case SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA:
                    $data->rows[$key]['cell']['dsSituacao'] = 'Em análise';
                    break;
            }
		        $data->rows[$key]['cell']['dsTitulo'] = html_entity_decode(strip_tags($data->rows[$key]['cell']['dsTitulo']));
            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    public function viewAction(Request $request)
    {
        $this->params['situacao'] = array(
            SituacaoInscricaoService::ST_SITUACAO_ANALISE_NA_TRIAGEM,
            SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_TRIAGEM,
            SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_TRIAGEM,
            SituacaoInscricaoService::ST_INSCRICAO_ELEGIVEL_NA_COORDENACAO,
            SituacaoInscricaoService::ST_INSCRICAO_INELEGIVEL_NA_COORDENACAO,
            SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA
        );

        return parent::viewAction($request);
    }
}
