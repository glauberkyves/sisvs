<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Repository;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;

class PainelRepository extends BaseRepository
{

	public function getInscricaoPorAutor(Request $request)
	{
		$params = array();
		parse_str($request->query->get('data'), $params);

		$query = $this
			->getEntityManager()
			->createQueryBuilder()
			->select('i')
			->from('DatasusSisvsExpoEpiAutorBundle:InscricaoEntity', 'i');

		echo $query->getQuery()->getSql();exit;

		return $query->getQuery()->getResult();
	}

}
