<?php

// src/AppBundle/Entity/InstructionEntity.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="instructions")
 */
class InstructionEntity{
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="RecipeEntity", inversedBy="instructions", cascade={"persist"})
	 */
	private $recipeEntity;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $instruction;
	
	/**
	 * @ORM\OneToMany(targetEntity="IngredientEntity", mappedBy="instructionEntity", cascade={"persist"})
	 */
	protected $ingredients;
	
	
	public function __construct() {
		$this->ingredients = new ArrayCollection();
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

    /**
     * Set instruction
     *
     * @param string $instruction
     *
     * @return InstructionEntity
     */
    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Get instruction
     *
     * @return string
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * Set recipeEntity
     *
     * @param \AppBundle\Entity\RecipeEntity $recipeEntity
     *
     * @return InstructionEntity
     */
    public function setRecipeEntity(\AppBundle\Entity\RecipeEntity $recipeEntity = null)
    {
        $this->recipeEntity = $recipeEntity;

        return $this;
    }

    /**
     * Get recipeEntity
     *
     * @return \AppBundle\Entity\RecipeEntity
     */
    public function getRecipeEntity()
    {
        return $this->recipeEntity;
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\IngredientEntity $ingredient
     *
     * @return InstructionEntity
     */
    public function addIngredient(\AppBundle\Entity\IngredientEntity $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\IngredientEntity $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\IngredientEntity $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}

?>
