<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $href;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $alt;

    #[ORM\Column(type: 'boolean')]
    private $isFront;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'pictures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHref(): ?string
    {
        return $this->href;
    }

    public function setHref(string $href): self
    {
        $this->href = $href;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function __toString(){
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of isFront
     */
    public function getIsFront()
    {
        return $this->isFront;
    }

    /**
     * Set the value of isFront
     */
    public function setIsFront($isFront): self
    {
        $this->isFront = $isFront;

        return $this;
    }
}