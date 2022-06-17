<?php

namespace App\Entity;


use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: InvoiceRepository::class)]

class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 15)]
    private string $payment_method;

    #[ORM\Column(type: 'date')]
    private \DateTime $order_date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'invoices')]
    private User $user;
    private \DateTime $date;

    #[ORM\OneToMany(mappedBy: 'invoice', targetEntity: ProductOrder::class, orphanRemoval: true)]
    #[ORM\JoinColumn(nullable: true)]
    private Collection|null $productOrders;

    /**
     * @param ?Collection|null $productOrders
     */
    public function setProductOrders(Collection|null $productOrders): void
    {
        $this->productOrders = $productOrders;
    }

    /**
     * @returnCollection|null
     */
    public function getProductOrders(): Collection|null
    {
        return $this->productOrders;
    }


    public function __construct()
    {
        $this->date = new \DateTime();
        $this->productOrders=new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): self
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    public function getOrderDate(): ?\DateTime
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTime $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }


    public function __toString(){
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}