<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\HttpFoundation\Request;
use Datasus\Core\BaseBundle\Entity\AbstractBase;

class PainelService extends CrudService
{

	protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity';
	protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\InscricaoEntityType';


	public function Inscricoes($coSeqModalidade)
	{
		return $this->getRepository()->Inscricoes($coSeqModalidade);
	}

	public function getInscricaoDoAutor(Request $request)
	{
		$this->getRepository()->getInscricaoDoAutor($request);

		return $this->getResultGrid($request);
	}

	public function preInsert(AbstractBase $entity)
	{
//		\Doctrine\Common\Util\Debug::dump($entity); exit;
//		$entity->generateNumber();
	}

//	public function postSave(AbstractBase $entity)
//	{
//
//		$srvInscricaoApresentacao =  $this->getService('datasus_sisvs_expoepi_autor.inscricao_apresentacao');
//
//		$arrApresentacao = $this->getService()->saveInscricaoApresentacao($entity);
//		\Doctrine\Common\Util\Debug::dump(221212); exit;
//
//	}
}
