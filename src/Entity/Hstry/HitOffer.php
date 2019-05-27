<?php

namespace App\Entity\Hstry;

use App\Entity\Prdt\Price;
use App\Entity\Prdt\Product;
use Doctrine\ORM\Mapping as ORM;

/**
 * HitOffer
 *
 * @ORM\Table(name="hstry.hit_offer", indexes={@ORM\Index(name="hit_offer_idx_price_id", columns={"price_id"}), @ORM\Index(name="hit_offer_idx_app", columns={"product_id", "price_id", "hit_id"}), @ORM\Index(name="hit_offer_idx_product_id", columns={"product_id"}), @ORM\Index(name="indx_hit_offet_hit_id", columns={"hit_id"}), @ORM\Index(name="hit_offer_idx_srok", columns={"srok"})})
 * @ORM\Entity
 */
class HitOffer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="hstry.hit_offer_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="offer_history_id", type="integer", nullable=true)
     */
    private $offerHistoryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oem", type="string", length=255, nullable=true)
     */
    private $oem;

    /**
     * @var float|null
     *
     * @ORM\Column(name="coef_calculated", type="float", precision=10, scale=0, nullable=true)
     */
    private $coefCalculated;

    /**
     * @var float|null
     *
     * @ORM\Column(name="coef_min_markup", type="float", precision=10, scale=0, nullable=true)
     */
    private $coefMinMarkup;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var int|null
     *
     * @ORM\Column(name="srok", type="integer", nullable=true)
     */
    private $srok;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rest", type="integer", nullable=true)
     */
    private $rest;

    /**
     * @var int|null
     *
     * @ORM\Column(name="test", type="integer", nullable=true)
     */
    private $test;

    /**
     * @var float|null
     *
     * @ORM\Column(name="coef_partner", type="float", precision=10, scale=0, nullable=true)
     */
    private $coefPartner;

    /**
     * @var \Hit
     *
     * @ORM\ManyToOne(targetEntity="Hit", inversedBy="hitOffers", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hit_id", referencedColumnName="id")
     * })
     */
    private $hit;

    /**
     * @var \Price
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Prdt\Price")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="price_id", referencedColumnName="id")
     * })
     */
    private $priceList;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Prdt\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferHistoryId(): ?int
    {
        return $this->offerHistoryId;
    }

    public function setOfferHistoryId(?int $offerHistoryId): self
    {
        $this->offerHistoryId = $offerHistoryId;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getOem(): ?string
    {
        return $this->oem;
    }

    public function setOem(?string $oem): self
    {
        $this->oem = $oem;

        return $this;
    }

    public function getCoefCalculated(): ?float
    {
        return $this->coefCalculated;
    }

    public function setCoefCalculated(?float $coefCalculated): self
    {
        $this->coefCalculated = $coefCalculated;

        return $this;
    }

    public function getCoefMinMarkup(): ?float
    {
        return $this->coefMinMarkup;
    }

    public function setCoefMinMarkup(?float $coefMinMarkup): self
    {
        $this->coefMinMarkup = $coefMinMarkup;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSrok(): ?int
    {
        return $this->srok;
    }

    public function setSrok(?int $srok): self
    {
        $this->srok = $srok;

        return $this;
    }

    public function getRest(): ?int
    {
        return $this->rest;
    }

    public function setRest(?int $rest): self
    {
        $this->rest = $rest;

        return $this;
    }

    public function getTest(): ?int
    {
        return $this->test;
    }

    public function setTest(?int $test): self
    {
        $this->test = $test;

        return $this;
    }

    public function getCoefPartner(): ?float
    {
        return $this->coefPartner;
    }

    public function setCoefPartner(?float $coefPartner): self
    {
        $this->coefPartner = $coefPartner;

        return $this;
    }

    public function getHit(): ?Hit
    {
        return $this->hit;
    }

    public function setHit(?Hit $hit): self
    {
        $this->hit = $hit;

        return $this;
    }

    public function getPriceList(): ?Price
    {
        return $this->priceList;
    }

    public function setPriceList(?Price $priceList): self
    {
        $this->priceList = $priceList;

        return $this;
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


}
