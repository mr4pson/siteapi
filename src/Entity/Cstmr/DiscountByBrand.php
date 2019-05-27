<?php

namespace App\Entity\Cstmr;

use App\Entity\Ordr\DiscountType;
use App\Entity\Prdt\Brand;
use Doctrine\ORM\Mapping as ORM;

/**
 * DiscountByBrand
 *
 * @ORM\Table(name="cstmr.discount_by_brand", indexes={@ORM\Index(name="idx_customer", columns={"customer_id"}), @ORM\Index(name="fki_dt_dbb_fkey", columns={"discount_type_id"}), @ORM\Index(name="fki_brand_id_dbb_fkey", columns={"brand_id"})})
 * @ORM\Entity
 */
class DiscountByBrand
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.discount_by_brand_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = false;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \DiscountType
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Ordr\DiscountType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discount_type_id", referencedColumnName="id")
     * })
     */
    private $discountType;

    /**
     * @var \Bbrand
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Prdt\Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * })
     */
    private $brand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

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

    public function getDiscountType(): ?DiscountType
    {
        return $this->discountType;
    }

    public function setDiscountType(?DiscountType $discountType): self
    {
        $this->discountType = $discountType;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }


}
