<?php
// src/AppBundle/Entity/IngredientEntity.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="ingredient")
 */
Class IngredientEntity{
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="InstructionEntity", inversedBy="instructions", cascade={"persist"})
	 */
	private $instructionEntity;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $ammount;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $details;
	

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

  
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ingredient
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set recipeEntity
     *
     * @param \AppBundle\Entity\RecipeEntity $recipeEntity
     *
     * @return InstructionEntity
     */
    public function setInstructionEntity(\AppBundle\Entity\InstructionEntity $instructionEntity = null)
    {
        $this->instructionEntity = $instructionEntity;

        return $this;
    }

    /**
     * Get instructionEntity
     *
     * @return \AppBundle\Entity\InstructionEntity
     */
    public function getInstructionEntity()
    {
        return $this->$instructionEntity;
    }

    /**
     * Set ammount
     *
     * @param string $ammount
     *
     * @return IngredientEntity
     */
    public function setAmmount($ammount)
    {
        $this->ammount = $ammount;

        return $this;
    }

    /**
     * Get ammount
     *
     * @return string
     */
    public function getAmmount()
    {
        return $this->ammount;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return IngredientEntity
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }
}
