<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
//L'entité sera accessible via l'API pour servir l'application Angular du Dashboard
//Nous n'utiliserons que des méthodes get, pour afficher des statistiques
#[ApiResource(collectionOperations: ['get'], itemOperations: ['get'])]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 15)]
    private $payment_method;

    #[ORM\Column(type: 'date')]
    private $order_date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'invoices')]
    private $user;

    public function __construct()
    {
        $this->date = new \DateTime();  
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