<?php

// src/AppBundle/Repository/InstructionRespository.php

namespace AppBundle\Repository;

use AppBundle\Entity\InstructionEntity;
use Doctrine\ORM\EntityManager;

class InstructionRepository {

	const INSTRUCTION_ENTITY = 'AppBundle:InstructionEntity';
	
	protected $em;
	
	public function __construct(EntityManager $entityManager) {
		$this->em = $entityManager;
	}
	
	protected function getById($id){
		return $instructionEntity = $this->em->getRepository(self::INSTRUCTION_ENTITY)->find($id);
	}
	
	protected function flushInstruction($instructionEntity){
		$this->em->persist($instructionEntity);
		$this->em->flush();
	}
}

?>