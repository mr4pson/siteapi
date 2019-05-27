<?php

namespace App\Entity\Ordr;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Cstmr\Customer;
use Doctrine\ORM\Mapping as ORM;

/**
 * Basket
 *
 * @ORM\Table(name="ordr.basket", indexes={@ORM\Index(name="fki_customer_id_basket_fkey", columns={"customer_id"})})
 * @ORM\Entity
 */
class Basket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ordr.basket_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true)
     */
    private $title;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dc", type="datetime", nullable=true)
     */
    private $dc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="smallint", nullable=true, options={"default"="1"})
     */
    private $status = '1';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var int|null
     *
     * @ORM\Column(name="owner_id", type="bigint", nullable=true)
     */
    private $ownerId;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cstmr\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="basket")
     */
    private $items;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDc(): ?\DateTimeInterface
    {
        return $this->dc;
    }

    public function setDc(?\DateTimeInterface $dc): self
    {
        $this->dc = $dc;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    public function setOwnerId(?int $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(version $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            //$version->setSection($this);
        }

        return $this;
    }

    public function removeItem(item $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            // set the owning side to null (unless already changed)
            /*if ($version->getSection() === $this) {
                $version->setSection(null);
            }*/
        }

        return $this;
    }
}
