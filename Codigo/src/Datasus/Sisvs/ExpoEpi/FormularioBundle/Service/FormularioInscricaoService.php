<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Core\BaseBundle\ServiceLayer\ServiceDataException;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\HttpFoundation\Request;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;


class FormularioInscricaoService extends CrudService
{
    protected $entity = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\FormularioInscricaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Form\FormularioInscricaoEntityType';

    CONST CO_SITUACAO_FORMULARIO_GERADO = 1;
    CONST CO_SITUACAO_FORMULARIO_PUBLICADO = 2;
    CONST CO_SITUACAO_FORMULARIO_INATIVO = 3;
    CONST CO_STATUS_FORMULARIO_PUBLICADO = 2;
    CONST CO_STATUS_FORMULARIO_INATIVO = 3;

    public function preSave(AbstractBase $entity)
    {
        $this->validatesEmptyDate($entity);
        $this->validatesDate($entity);

        if (!$entity->getCoSeqFormularioInscricao()) {
            $this->validatesDuplicate($entity);
            $rsNuFormulario = $this->generateNumber();
            $entity->setNuFormulario($rsNuFormulario);
            $srvSitForm = 'DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity';

            /**
             * @return Verifica se o ano do evento e menor que  o ano atual.
             * Caso seja menor cria o formulario com a situação inativo.
             */
            if ($entity->getCoModalidade()->getCoEvento()->getAnEvento() < date('Y')) {
                $rstSitForm = $this->getRepository($srvSitForm)->find(self::CO_SITUACAO_FORMULARIO_INATIVO);
                $entity->setCoSituacaoFormulario($rstSitForm);
                /**
                 * @return para o caso de o evento ser menor que o ano atual o sistema seta a ultima situação do formulario.
                 *
                 */
                $rstUltimaSitForm = $this->getRepository($srvSitForm)->find(self::CO_SITUACAO_FORMULARIO_GERADO);
                $entity->setCoUltimaSituacaoFormulario($rstUltimaSitForm);
            } else {
                /**
                 * @return Caso o ano do evento seja igual ou maior que o ano corrrente ele insere com a situação
                 * Formulario gerado.
                 */
                $rstSitForm = $this->getRepository($srvSitForm)->find(self::CO_SITUACAO_FORMULARIO_GERADO);
                $entity->setCoSituacaoFormulario($rstSitForm);
            }

            if ($entity->getCoUltimaSituacaoFormulario() == null) {
                $entity->setCoUltimaSituacaoFormulario($rstSitForm->getCoSituacaoFormulario());
            }
        }
    }

    public function preCrate(AbstractBase $entity)
    {
        $this->validatesDate($entity);
        $this->validatesDuplicate($entity);
        $rsNuFormulario = $this->generateNumber();

        $srvSitForm = 'DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity';
        $rstSitForm = $this->getRepository($srvSitForm)->find(self::CO_SITUACAO_FORMULARIO_GERADO);

        $entity->setNuFormulario($rsNuFormulario);
        $entity->setCoSituacaoFormulario($rstSitForm);
    }

    public function validatesDuplicate(AbstractBase $entity)
    {

        $arrData = array('coModalidade' => $entity->getCoModalidade()->getCoSeqModalidade(),
            'dsTitulo' => htmlspecialchars($entity->getDsTitulo())
        );

        $srvFormInsc = 'DatasusSisvsExpoEpiFormularioBundle::FormularioInscricaoEntity';
        $rstFormInsc = $this->getRepository($srvFormInsc)->findBy($arrData);

        if ($rstFormInsc) {
            $this->registerError('formulario.validations.formulario_inscricao.NotEqualTo');
        }
    }

    public function validatesDate(AbstractBase $entity)
    {
        if ($entity->getDtFim() < $entity->getDtInicio()) {
            throw new ServiceDataException("A data final não pode ser menor que a data de início.");

            return false;
        }

        return true;
    }

    public function generateNumber()
    {
        // consulta para verificar se possui registro no banco
        $rstFormInsc = $this->getRepository()->findOneBy(array(), array('coSeqFormularioInscricao' => 'DESC'));

        // inicia a variavel vazia
        $nuFormulario = '';

        // se nao houver registro form insc, criar o primeiro com o ano atual
        if (!$rstFormInsc) {
            $nuFormulario = 'I00001-' . date('Y');
        } else {
            // destrinchar string recuperando o ano do ultimo registro
            $nuFormulario = explode('-', $rstFormInsc->getNuFormulario());
            // verifica se o ano do ultimo registro é diferente ao ano atual
            if ($nuFormulario[1] != date('Y')) {
                // zera o contador e atualiza o ano
                $nuFormulario = 'I00001-' . date('Y');
            } else {
                // destrinchar string convertendo em inteiro e recuperando o ultimo n°
                $nuFormulario = explode('I', $nuFormulario[0]);
                // incrementar numero
                $nuFormulario = (int)$nuFormulario[1] + 1;
                // insere zeros a esquerda do numero incrementado
                $nuFormulario = str_pad($nuFormulario, 5, 0, STR_PAD_LEFT);
                // monta a string correta conforme a regra RN023 para salvar no banco
                $nuFormulario = 'I' . $nuFormulario . '-' . date('Y');
            }
        }

        return $nuFormulario;
    }

    public function getViewFormInsc($id)
    {
        return $this->getRepository()->getViewFormInsc($id);
    }

    public function publish($coSeqFormularioInscricao)
    {
        $entityFormInsc = $this->getRepository()->find($coSeqFormularioInscricao);
        $entityUltmFormInsc = $entityFormInsc->getCoUltimaSituacaoFormulario();

        if (strtotime(date('Y-m-d')) <= strtotime($entityFormInsc->getDtFim()->format('Y-m-d'))) {
            $entitySitFormInsc = $this
                ->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity')
                ->find(self::CO_STATUS_FORMULARIO_PUBLICADO);

            $entityFormInsc->setCoSituacaoFormulario($entitySitFormInsc);
            $entityFormInsc->setCoUltimaSituacaoFormulario(self::CO_STATUS_FORMULARIO_PUBLICADO);

            $this->getEntityManager()->persist($entityFormInsc);
            $this->getEntityManager()->flush($entityFormInsc);

            return true;
        }

        $this->registerError('formulario.validations.formulario_inscricao.formNotPublished');

        return false;
    }

    public function activeInactive($coSeqFormularioInscricao, $status)
    {
        $entityFormInsc = $this->getRepository()->find($coSeqFormularioInscricao);
        $entityUltmFormInsc = $entityFormInsc->getCoUltimaSituacaoFormulario();
        if ($entityUltmFormInsc == null) {
            $entityUltmFormInsc = $entityFormInsc->setCoUltimaSituacaoFormulario(self::CO_SITUACAO_FORMULARIO_GERADO);
        }
        $situacao = 'activated';
        if ($status == 'inactive' && $entityUltmFormInsc == FormularioInscricaoService::CO_STATUS_FORMULARIO_PUBLICADO) {
            $entitySitFormInsc = $this->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity')->find(self::CO_STATUS_FORMULARIO_PUBLICADO);
            $entityFormInsc->setCoSituacaoFormulario($entitySitFormInsc);
            $entityFormInsc->setCoUltimaSituacaoFormulario($entityUltmFormInsc);
            //$situacao = 'inactivated';
            $this->getEntityManager()->persist($entityFormInsc);
            $this->getEntityManager()->flush($entityFormInsc);

        } elseif ($status == 'inactive' && $entityUltmFormInsc == FormularioInscricaoService::CO_SITUACAO_FORMULARIO_GERADO) {
            if ($status == 'inactive' && $entityUltmFormInsc == FormularioInscricaoService::CO_STATUS_FORMULARIO_PUBLICADO) {
                $entitySitFormInsc = $this->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity')->find(self::CO_STATUS_FORMULARIO_PUBLICADO);

                $entityFormInsc->setCoSituacaoFormulario($entitySitFormInsc);
                $entityFormInsc->setCoUltimaSituacaoFormulario($entityUltmFormInsc);
                $situacao = 'inactivated';

            } elseif ($status == 'inactive' && $entityUltmFormInsc == FormularioInscricaoService::CO_SITUACAO_FORMULARIO_GERADO) {

                $entitySitFormInsc = $this->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity')->find(self::CO_SITUACAO_FORMULARIO_GERADO);
                $entityFormInsc->setCoSituacaoFormulario($entitySitFormInsc);
                $entityFormInsc->setCoUltimaSituacaoFormulario($entityUltmFormInsc);
                //$situacao = 'inactivated';

            } else {
                $entitySitFormInsc = $this->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity')->find(self::CO_STATUS_FORMULARIO_INATIVO);
                $entityFormInsc->setCoSituacaoFormulario($entitySitFormInsc);
            }

            $this->getEntityManager()->persist($entityFormInsc);
            $this->getEntityManager()->flush($entityFormInsc);
        } else if ($status == 'active') {
            $entitySitFormInsc = $this->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity')->find(self::CO_STATUS_FORMULARIO_INATIVO);
            $entityFormInsc->setCoSituacaoFormulario($entitySitFormInsc);
            $this->getEntityManager()->persist($entityFormInsc);
            $this->getEntityManager()->flush($entityFormInsc);
            $situacao = 'inactivated';
        }
        return $situacao;
    }

    public function extendTerm($coSeqFormularioInscricao, $params)
    {
        $entityFormInsc = $this->getRepository()->find($coSeqFormularioInscricao);
        $dtFim = $params['datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity']['dtFim'];
        $dtInicio = $params['datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity']['dtInicio'];
        $dsJustificativa = $params['datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity']['dsJustificativa'];
        $user = $this->getUser()->getAttr()->getCoSeqUsuario();
        $dtFim = $this->datePrBrStringForObject($dtFim);
        $dtInicio = $this->datePrBrStringForObject($dtInicio);

        $entityFormInsc->setDtProrrogacao($dtFim);
        $entityFormInsc->setDtInicio($dtInicio);
        $entityFormInsc->setDtFim($dtFim);
        $entityFormInsc->setDsJustificativa($dsJustificativa);
        $entityFormInsc->setCoUsuario($user);

        if (!trim($dsJustificativa)) {
            $this->registerError("formulario.validations.formulario_inscricao.justificativaBlank");
            $this->triggerErrors();

            return false;
        } else {

            $resValidateDateEmpty = $this->validatesEmptyDate($dtFim);
            if ($resValidateDateEmpty) {
                $resValidatesDate = $this->validatesDate($entityFormInsc);
            }
            $resValidateDateEmpty = $this->validatesEmptyDate($dtFim);
            if (!empty($resValidatesDate) && $resValidateDateEmpty) {
                $this->getEntityManager()->persist($entityFormInsc);
                $this->getEntityManager()->flush($entityFormInsc);

                return true;
            }

            return false;
        }
    }

    public function datePrBrStringForObject($date)
    {
        $dateFormated = explode('/', $date);

        if (!empty($dateFormated[0])) {
            $date = $dateFormated[2] . '-' . $dateFormated[1] . '-' . $dateFormated[0];
            $date = new \DateTime($date);
        }

        return $date;
    }


    public function validatesEmptyDate($date)
    {
        if (empty($date)) {
            throw new ServiceDataException("O campo Data Fim é de preenchimento obrigatório.");
            $this->triggerErrors();

            return false;
        }

        return true;
    }

    public function validatesEmptyJustificativa($justificativa)
    {
        if (empty($justificativa)) {
            throw new ServiceDataException("O campo justificativa é de preenchimento obrigatório.");
            $this->triggerErrors();

            return false;
        }

        return false;
    }

    public function preEdit()
    {
        $this->getRepository('DatasusSisvsExpoEpiFormularioBundle::SituacaoFormularioEntity');
        if ($this->getRepository()->getInscricaoFormModalidade()) {
            throw new ServiceDataException("O formulário não pode ser alterado pois já existe inscrição para o mesmo. .");
            $this->triggerErrors();

            return false;
        }

        return false;
    }

    public function postSave(AbstractBase $entity)
    {
        $params = array();
        parse_str($this->getRequest(), $params);

        $params['coModalidade'] = $entity->getCoModalidade();
        $this->getService('datasus_sisvs_expoepi_administrativo.modalidade_apresentacao')->saveModalidadeAvaliacao($params);
    }


    public function getApresentacaoModalidade(Request $request)
    {
        $result = $this->getRepository()->getApresentacaoModalidade($request);
        return $result;
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