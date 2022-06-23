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

    #[ORM\OneToMany(mappedBy: 'invoice', targetEntity: ProductOrder::class, cascade: ["persist"], orphanRemoval: true)]
    #[ORM\JoinColumn(nullable: true)]
    private Collection|null $productOrders;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: 'invoices_billing_address')]
    #[ORM\JoinColumn(nullable: false)]
    private $billing_address;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: 'invoices_delivery_address')]
    #[ORM\JoinColumn(nullable: false)]
    private $delivery_address;


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

    public function addProductOrder(ProductOrder $productOrder): self
    {
        if (!$this->productOrders->contains($productOrder)) {
            $this->productOrders[] = $productOrder;
            $productOrder->setInvoice($this);
        }
        return $this;
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

    public function getTotalHTPrice(){

        $totalHTPrice = 0;
        foreach ($this->getProductOrders() as $productOrder){
        $totalHTPrice += $productOrder->getHTPrice();
        }
        return $totalHTPrice;

    }

    public function getTotalTTCPrice(){

        $totalTTCPrice = 0;
        foreach ($this->getProductOrders() as $productOrder){
            $totalTTCPrice += $productOrder->getTTCPrice();
        }
        return $totalTTCPrice;

    }

    public function getBillingAddress(): ?Address
    {
        return $this->billing_address;
    }

    public function setBillingAddress(?Address $billing_address): self
    {
        $this->billing_address = $billing_address;

        return $this;
    }

    public function getDeliveryAddress(): ?Address
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress(?Address $delivery_address): self
    {
        $this->delivery_address = $delivery_address;

        return $this;
    }
}