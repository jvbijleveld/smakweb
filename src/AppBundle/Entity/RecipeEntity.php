<?php
// src/AppBundle/Entity/RecipeEntity.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="recipe")
 */
Class RecipeEntity{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="text")
	 */
	protected $description;
	
	/**
	 * @ORM\OneToMany(targetEntity="InstructionEntity", mappedBy="recipeEntity", cascade={"persist"})
	 */
	protected $instructions;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $course;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $owner;
	
	
	
	public function __construct() {
		$this->instruction = new ArrayCollection();
	}

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id){
    	$this->id = $id;
    	return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return RecipeEntity
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
     * Set description
     *
     * @param string $description
     *
     * @return RecipeEntity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set course
     *
     * @param string $course
     *
     * @return RecipeEntity
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return string
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return RecipeEntity
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add instruction
     *
     * @param \AppBundle\Entity\InstructionEntity $instructionEntity
     *
     * @return RecipeEntity
     */
    public function addInstruction(\AppBundle\Entity\InstructionEntity $instructionEntity)
    {
    	$this->instructions[] = $instructionEntity;

        return $this;
    }

    /**
     * Remove instruction
     *
     * @param \AppBundle\Entity\IngredientEntity $ingredientEntity
     */
    public function removeInstruction(\AppBundle\Entity\InstructionEntity $instructionEntity)
    {
        $this->instructions->removeElement($instructionEntity);
    }

    /**
     * Get instruction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInstructions()
    {
        return $this->instructions;
    }
}
