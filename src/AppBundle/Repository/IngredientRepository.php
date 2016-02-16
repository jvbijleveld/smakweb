<?php

// src/AppBundle/Repository/IngredientRespository.php

namespace AppBundle\Repository;

use AppBundle\Entity\IngredientEntity;
use Doctrine\ORM\EntityManager;

class IngredientRepository {

	const INGREDIENT_ENTITY = 'AppBundle:IngredientEntity';

	protected $em;

	public function __construct(EntityManager $entityManager) {
		$this->em = $entityManager;
	}

	protected function getById($id){
		return $ingredientEntity = $this->em->getRepository(self::INGREDIENT_ENTITY)->find($id);
	}

	protected function flushIngredient($ingredientEntity){
		$this->em->persist($ingredientEntity);
		$this->em->flush();
	}
}

?>