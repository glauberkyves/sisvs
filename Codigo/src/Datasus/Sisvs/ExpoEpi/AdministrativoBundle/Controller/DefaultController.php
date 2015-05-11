<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends CrudController
{
    public function indexAction(Request $request)
    {
        return $this->renderAction();
    }

    /**
     * Recupera um endereco conforme cep
     */
    public function searchCepAction()
    {
        $nuCep  = preg_replace("/[^0-9]/", "", $this->getRequest()->get('cep'));
        $srvCep = 'datasus_sisvs_expoepi_administrativo.cep';

        $result = array();
        $entity = $this->getService($srvCep)->findOneByNuCep($nuCep);

        if ($entity) {
            $result = array(
                'noBairro'      => $entity->getNoLocalidade(),
                'noLogradouro'  => $entity->getNoLogradouro(),
                'txComplemento' => $entity->getDsComplemento(),
                'sqMunicipio'   => $entity->getCoMunicipio()->getCoMunicipioIbge(),
                'sqEstado'      => $entity->getCoMunicipio()->getCoUfIbge()->getCoUfIbge(),
                'regiao'        => $entity->getCoMunicipio()->getCoUfIbge()->getCoRegiao()->getNoRegiao()
            );
        }

        return $this->renderJson($result);
    }

    /**
     * Recupera um endereco conforme cep
     */
    public function comboEstadoAction()
    {
        $srvCep    = 'datasus_sisvs_expoepi_administrativo.uf';
        $arrEstado = $this->getService($srvCep)->findByCoPais(1);

        $options = '<option value="">Selecione...</option>';
        foreach ($arrEstado as $entity) {
            $options .= "<option value=\"{$entity->getCoUfIbge()}\">{$entity->getNoUf()}</option>";
        }

        $response = new Response();
        $response->setContent($options);

        return $response;
    }

    /**
     * Recupera um endereco conforme cep
     */
    public function comboMunicipioAction()
    {
        $coEstado  = $this->getRequest()->get('estado');
        $srvCep    = 'datasus_sisvs_expoepi_administrativo.municipio';
        $arrEstado = $this->getService($srvCep)->findByCoUfIbge($coEstado);

        $options = '<option value="">Selecione...</option>';
        foreach ($arrEstado as $entity) {
            $options .= "<option value=\"{$entity->getCoMunicipioIbge()}\">{$entity->getNoMunicipio()}</option>";
        }

        $response = new Response();
        $response->setContent($options);

        return $response;
    }

    public function comboRegiaoEstadoAction()
    {
        $srvCep   = 'datasus_sisvs_expoepi_administrativo.uf';
        $coRegiao = $this->getRequest()->get('coRegiao');

        if ($coRegiao) {
            $arrEstado = $this->getService($srvCep)->findByCoRegiao($coRegiao);
        } else {
            $arrEstado = $this->getService($srvCep)->findByCoPais(1);
        }

        $options = '<option value="">Selecione...</option>';
        foreach ($arrEstado as $entity) {
            $options .= "<option value=\"{$entity->getCoUfIbge()}\">{$entity->getNoUf()}</option>";
        }

        $response = new Response();
        $response->setContent($options);

        return $response;
    }
}
