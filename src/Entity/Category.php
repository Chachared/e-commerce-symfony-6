<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Product::class)]
    private $products;

    #[ORM\ManyToOne(targetEntity: self::class, cascade: ['remove'], inversedBy: 'childCategory')]
    #[ORM\JoinColumn(nullable: true)]
    private Category $parentCategory;


    #[ORM\OneToMany(mappedBy:'parentCategory', targetEntity: self::class, cascade: ['remove'])]
    private $childCategory;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }

    public function getParentCategory(): ?self
    {
        return $this->parentCategory;
    }

    public function setParentCategory(?self $parentCategory): self
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }
    
    public function __toString(){
        return $this->id;
    }

    /**
     * Get the value of childCategory
     */ 
    public function getChildCategory(): ArrayCollection
    {
        return $this->childCategory;
    }

    /**
     * Set the value of childCategory
     *
     * @return  self
     */ 
    public function setChildCategory($childCategory): static
    {
        $this->childCategory = $childCategory;

        return $this;
    }

}