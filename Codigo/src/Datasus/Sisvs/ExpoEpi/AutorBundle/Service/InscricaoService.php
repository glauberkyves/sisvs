<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Datasus\Sisvs\Base\BaseBundle\Service\Exception\ServiceCrudException;
use Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity;
use Symfony\Component\HttpFoundation\Request;

class InscricaoService extends CrudService
{

		protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity';
		protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\InscricaoEntityType';

		public function getInscricoesPorAutor(Request $request, $coSeqUsuario)
		{
				$this->dataGrid = $this->getRepository()->getInscricoesPorAutor($request, $coSeqUsuario);

				return $this->getResultGrid($request);
		}

		public function getInscricoesPorEvento(Request $request)
		{
				$this->dataGrid = $this->getRepository()->getInscricoesPorEvento($request);

				return $this->getResultGrid($request);
		}

		public function getInscricoesPorTema(Request $request)
		{
				$result = $this->getRepository()->getInscricoesPorTema($request);

				return $result;
		}

		public function getTotalDeInscricoesPorEvento(Request $request)
		{
				$result = $this->getRepository()->getTotalDeInscricoesPorEvento($request);

				return $result;
		}


		public function  getInscricoesPainel($ano = null)
		{
				return $this->getRepository()->getInscricoesPainel($ano);
		}

		public function getCheckDuplicity(Request $request)
		{
				$this->dataGrid = $this->getRepository()->getCheckDuplicity($request);

				return $this->getResultGrid($request);
		}

		public function getCheckDuplicityBlock(Request $request)
		{
				$this->dataGrid = $this->getRepository()->getCheckDuplicityBlock($request);

				return $this->getResultGrid($request);
		}

		public function getInscricoesPorArea(Request $request)
		{
				$result = $this->getRepository()->getInscricoesPorArea($request);

				return $result;
		}

		public function getTotalDeInscricoes(Request $request)
		{
				$result = $this->getRepository()->getTotalDeInscricoes($request);

				return $result;
		}

		public function getTotalDeDuplicatas(Request $request)
		{
				$result = $this->getRepository()->getTotalDeDuplicatas($request);

				return $result;
		}

		public function getRelatorioInscricaoTotais(Request $request)
		{
				$result = $this->getRepository()->getRelatorioInscricaoTotais($request);

				return $result;
		}

		public function getDuplicatasPorEvento(Request $request)
		{
				$result = $this->getRepository()->getDuplicatasPorEvento($request);

				return $result;
		}

		public function getInscricaoModalidade(Request $request, $coUsuario)
		{
				$this->dataGrid = $this->getRepository()->getInscricaoModalidade($request, $coUsuario);

				return $this->getResultGrid($request);
		}

		/**
		 * @param         $sqCodigo
		 * @param null $stAtivo
		 * @param Request $request
		 *
		 * @return bool|\Exception
		 */
		public function toogleDuplicata($sqCodigo)
		{
				$entity = $this->find($sqCodigo);

				$repository = 'DatasusSisvsExpoEpiAutorBundle::SituacaoInscricaoEntity';
				$sqDuplicata = SituacaoInscricaoService::ST_SITUACAO_INSCRICAO_DUPLICADA;
				$coSituacaoInscricao = $this->getRepository($repository)->find($sqDuplicata);

				$entity->setCoSituacaoInscricao($coSituacaoInscricao);

				$this->getEntityManager()->persist($entity);
				$this->getEntityManager()->flush($entity);

				$this->getService('datasus_sisvs_expoepi_autor.historico_inscricao')
						->saveHistorico($entity, $sqDuplicata);
		}

		/**
		 * @param         $sqCodigo
		 * @param null $stAtivo
		 * @param Request $request
		 *
		 * @return bool|\Exception
		 */
		public function toogleBlock($sqCodigo)
		{
				$entity = $this->find($sqCodigo);

				$repository = 'DatasusSisvsExpoEpiAutorBundle::SituacaoInscricaoEntity';
				$sqDuplicata = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
				$coSituacaoInscricao = $this->getRepository($repository)->find($sqDuplicata);

				$entity->setCoSituacaoInscricao($coSituacaoInscricao);

				$this->getEntityManager()->persist($entity);
				$this->getEntityManager()->flush($entity);

				$this->getService('datasus_sisvs_expoepi_autor.historico_inscricao')
						->saveHistorico($entity, $sqDuplicata);
		}

		public function preInsert(AbstractBase $entity)
		{
				$coSeqUsuario = $this->getUser()->getAttr()->getCoSeqUsuario();
				$enUsuario = $this->getRepository('DatasusSisvsBaseSecurityBundle::UsuarioEntity')->find($coSeqUsuario);

				$entity->setCoUsuario($enUsuario);
				$entity->setDtVeracidade(new \DateTime());
				$entity->setNuInscricao($this->generateNumberTemporario($entity));
		}

		/**
		 * pega o último número da inscrição e acrescenta mais um
		 * para gerar o número temporário, pois o número temporário
		 * vai ser alterado no momento do envio da inscrição
		 * @param $entity
		 * @return mixed
		 */
		public function ultimaChaveInscricaoEvento($entity)
		{
				return $this->getRepository()->ultimaChaveInscricaoEvento($entity);
		}


		/**
		 * pega a ordem das apresentações vinciladas a inscrição
		 * @param $entity
		 * @return mixed
		 */
		public function ordemAPresetacaoInscricao($entity)
		{
				return $this->getRepository()->ordemAPresetacaoInscricao($entity);
		}

		public function generateNumberTemporario($entity)
		{

				$rstInscricao = $this->ultimaChaveInscricaoEvento($entity);

				$nuFormulario = (int)$rstInscricao;

				// insere zeros a esquerda do numero incrementado
				$nuFormulario = str_pad($nuFormulario, 5, 0, STR_PAD_LEFT);
				$nuFormulario = $nuFormulario . '-' . date('Y');

				return $nuFormulario;
		}

		public function generateNumber(AbstractBase $entity)
		{
//				$rstNumeroInsc = $this->getRepository()->generateNumber($entity->getCoTema()->getCoSeqTema());
				$quantidade = $this->ultimaChaveInscricaoDefinitiva($entity);


				/*
				 * @return devido a geração de um numero temporario de inscrição deve-se descrecer o valor -1 para que a geração do
				 * numero de inscrição seja gerado corretamente.
				 */
//				$quantidade = 0;
//				$quantidade = $rstNumeroInsc[0]['quantidade'];

				$nuTema = $entity->getCoTema()->getNuTema();
				$nuArea = $entity->getCoTema()->getCoArea()->getNuArea();

				$alfa = array(
						"a", "b", "c", "d", "e", "f", "g",
						"h", "i", "j", "k", "l", "m", "n",
						"o", "p", "q", "r", "s", "t", "u",
						"v", "w", "x", "y", "z"
				);

				if ($entity->getCoTema()->getCoTipoClassificacao()->getCoSeqTipoClassificacao() == 2) {
						$nuTema = strtoupper($entity->getCoTema()->getNuTema());
				} else {
						$nuTema = strtolower($alfa[$entity->getCoTema()->getNuTema() - 1]);
				}

				$sequencial = str_pad($quantidade, 3, "0", STR_PAD_LEFT);

				$nuInsricao = "{$nuArea}{$nuTema}{$sequencial}" . '-' . date('y');
				return $nuInsricao;
		}

		public function preUpdate(AbstractBase $entity)
		{
				$entity->loadValues($this->getRepository()->find($entity->getCoSeqInscricao()));
				$entity->setCoHistorico(null);
				$entity->setCoAutor(null);
				$entity->setCoAnexo(null);
				$entity->setCoInscricaoApresentacao(null);
		}

		public function preSave(AbstractBase $entity)
		{
				$this->entityForm = clone $entity;

				$this->validatePeriodo($entity);
				$this->validateVeracidade($entity);
				$this->validateUpload($entity);

				if ($this->getRequest()->get('submit') == 'Enviar') {
						$coSeqSituacaoInscricao = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
				} else {
						$coSeqSituacaoInscricao = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
				}

				$coSituacaoInscricao = $this
						->getService('datasus_sisvs_expoepi_autor.situacao_inscricao')
						->find($coSeqSituacaoInscricao);

				$coInstituicao = $this
						->getService('datasus_sisvs_expoepi_autor.instituicao')
						->saveInstituicao($this->entityForm);

				$entity->setStAtivo('S');
				$entity->setCoSituacaoInscricao($coSituacaoInscricao);
				$entity->setCoHistorico(null);
				$entity->setCoAutor(null);
				$entity->setCoAnexo(null);
				$entity->setCoInscricaoApresentacao(null);
				$entity->setCoInstituicao($coInstituicao);
		}

		public function validatePeriodo(InscricaoEntity $entity)
		{
				$coFormulario = $entity
						->getCoTema()
						->getCoArea()
						->getCoModalidade()
						->getCoFormularioDeInscricao();

				if (new \DateTime() <= $coFormulario->getDtFim()) {
						$this->triggerErrors();
				}
		}

		protected function validateVeracidade(AbstractBase $entity)
		{
				if ($entity->getStVeracidade()) {
						$entity->setStVeracidade('S');
				} else {
						$this->registerError('Vercaidade');
				}
		}

		public function validateUpload(InscricaoEntity $entity)
		{
		}

		public function postSave(AbstractBase $entity)
		{
				$this->getService('datasus_sisvs_expoepi_autor.inscricao_apresentacao')
						->saveInscricaoApresentacao($entity, $this->entityForm->getCoInscricaoApresentacao());

				$this
						->getService('datasus_sisvs_expoepi_autor.co_autor')
						->saveCoAutor($entity, $entity->getStAutoria() == 'S' ? $this->entityForm->getCoAutor() : array());

				if ($this->getRequest()->get('submit') == 'Enviar') {
						$coSituacaoInscricao = SituacaoInscricaoService::ST_SITUACAO_ENVIADA;
				} else {
						$coSituacaoInscricao = SituacaoInscricaoService::ST_SITUACAO_PENDENTE;
				}

				$this
						->getService('datasus_sisvs_expoepi_autor.historico_inscricao')
						->saveHistorico($entity, $coSituacaoInscricao);

				$this
						->getService('datasus_sisvs_expoepi_autor.anexo')
						->saveAnexo($entity, $this->entityForm->getCoAnexo());
		}

		public function send($coInscricao)
		{
				$coSituacaoInscricao = $this
						->getService('datasus_sisvs_expoepi_autor.situacao_inscricao')
						->find(SituacaoInscricaoService::ST_SITUACAO_ENVIADA);

				$entity = $this->find($coInscricao);
				$entity->setCoSituacaoInscricao($coSituacaoInscricao);
				$entity->setNuInscricao($this->generateNumber($entity));
				$this->validatePeriodo($entity);

				try {
						$this->getEntityManager()->persist($entity);
						$this->getEntityManager()->flush($entity);

						$this
								->getService('datasus_sisvs_expoepi_autor.historico_inscricao')
								->saveHistorico($entity, SituacaoInscricaoService::ST_SITUACAO_ENVIADA);

						$this->getMessenger()->add('success', 'Inscrição Enviada com sucesso! O número da sua inscrição é ' . $entity->getNuInscricao());

						return $entity;

				} catch (\Exception $exc) {
						throw new ServiceCrudException($exc->getMessage());
				}
		}
}
