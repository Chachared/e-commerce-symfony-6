<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductOrderRepository::class)]
//L'entité sera accessible via l'API pour servir l'application Angular du Dashboard
//Nous n'utiliserons que des méthodes get, pour afficher des statistiques
#[ApiResource(collectionOperations: ['get'], itemOperations: ['get'])]
class ProductOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'float')]
    private $HT_price;

    #[ORM\ManyToOne(targetEntity: product::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

    #[ORM\ManyToOne(targetEntity: invoice::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $invoice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getHTPrice(): ?float
    {
        return $this->HT_price;
    }

    public function setHTPrice(float $HT_price): self
    {
        $this->HT_price = $HT_price;

        return $this;
    }

    public function getProduct(): ?product
    {
        return $this->product;
    }

    public function setProduct(?product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getInvoice(): ?invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

   


}