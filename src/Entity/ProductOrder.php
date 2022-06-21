<?php

namespace App\Entity;


use App\Repository\ProductOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductOrderRepository::class)]

class ProductOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $quantity;

    #[ORM\Column(type: 'float')]
    private float $HT_price;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'productOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private Product $product;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: 'productOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private Invoice $invoice;

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

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getTTCPrice(){
        $HTPrice = $this->getHTPrice();
        $TTCPrice = $HTPrice + $HTPrice * 0.2;
        return $TTCPrice;
    }

}