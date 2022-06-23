<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private string $street_number;

    #[ORM\Column(type: 'string', length: 255)]
    private string $street;

    #[ORM\Column(type: 'string', length: 5)]
    private string $zipcode;

    #[ORM\Column(type: 'string', length: 50)]
    private string $city;

    #[ORM\Column(type: 'string', length: 50)]
    private string $country;

    #[ORM\Column(type: 'boolean')]
    private bool $isBilling;

    #[ORM\Column(type: 'boolean')]
    private bool $isDelivery;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'addresses')]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\OneToMany(mappedBy: 'billing_address', targetEntity: Invoice::class)]
    private $invoices_billing_address;

    #[ORM\OneToMany(mappedBy: 'delivery_address', targetEntity: Invoice::class)]
    private $invoices_delivery_address;

    /**
     * @return ArrayCollection
     */
    public function getInvoicesBillingAddress(): ArrayCollection
    {
        return $this->invoices_billing_address;
    }

    /**
     * @param ArrayCollection $invoices_billing_address
     */
    public function setInvoicesBillingAddress(ArrayCollection $invoices_billing_address): void
    {
        $this->invoices_billing_address = $invoices_billing_address;
    }

    /**
     * @return ArrayCollection
     */
    public function getInvoicesDeliveryAddress(): ArrayCollection
    {
        return $this->invoices_delivery_address;
    }

    /**
     * @param ArrayCollection $invoices_delivery_address
     */
    public function setInvoicesDeliveryAddress(ArrayCollection $invoices_delivery_address): void
    {
        $this->invoices_delivery_address = $invoices_delivery_address;
    }

    public function __construct()
    {
        $this->invoices_billing_address = new ArrayCollection();
        $this->invoices_delivery_address = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreetNumber(): ?string
    {
        return $this->street_number;
    }

    public function setStreetNumber(?string $street_number): self
    {
        $this->street_number = $street_number;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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

    /**
     * Get the value of isBilling
     */
    public function getIsBilling()
    {
        return $this->isBilling;
    }

    /**
     * Set the value of isBilling
     */
    public function setIsBilling($isBilling): self
    {
        $this->isBilling = $isBilling;

        return $this;
    }

    /**
     * Get the value of isDelivery
     */
    public function getIsDelivery()
    {
        return $this->isDelivery;
    }

    /**
     * Set the value of isDelivery
     */
    public function setIsDelivery($isDelivery): self
    {
        $this->isDelivery = $isDelivery;

        return $this;
    }

    /**
     * @return Collection<int, Invoice>
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function addInvoice(Invoice $invoice): self
    {
        if (!$this->invoices->contains($invoice)) {
            $this->invoices[] = $invoice;
            $invoice->setBillingAddressId($this);
        }

        return $this;
    }

    public function removeInvoice(Invoice $invoice): self
    {
        if ($this->invoices->removeElement($invoice)) {
            // set the owning side to null (unless already changed)
            if ($invoice->getBillingAddressId() === $this) {
                $invoice->setBillingAddressId(null);
            }
        }

        return $this;
    }
}