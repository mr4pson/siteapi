<?php

namespace App\Entity\Prdt;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 *
 * @ORM\Table(name="prdt.offer", uniqueConstraints={@ORM\UniqueConstraint(name="offer_idx_product_price", columns={"product_id", "price_id"})}, indexes={@ORM\Index(name="offer_idx_product_is_actual", columns={"product_id", "is_actual"}), @ORM\Index(name="offer_idx_product", columns={"product_id"}), @ORM\Index(name="offer_idx_price_id", columns={"price_id"}), @ORM\Index(name="offer_idx_is_actual", columns={"is_actual"})})
 * @ORM\Entity
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class Offer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="prdt.offer_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dc", type="datetime", nullable=true, options={"default"="now()"})
     */
    private $dc = 'now()';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dm", type="datetime", nullable=true, options={"default"="now()"})
     */
    private $dm = 'now()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cost", type="decimal", precision=15, scale=2, nullable=true, options={"comment"="Стоимость в валюте прайса"})
     */
    private $cost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=2, nullable=true, options={"comment"="Цена после пересчета по курсу"})
     */
    private $price;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rest", type="integer", nullable=true)
     */
    private $rest;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_actual", type="boolean", nullable=true, options={"default"="1","comment"="Денормализованный признак. Должен становится falst при закрытии прайса или окончании позиций."})
     */
    private $isActual = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=3, nullable=true)
     */
    private $weight;

    /**
     * @var int|null
     *
     * @ORM\Column(name="brand_id", type="bigint", nullable=true, options={"comment"="Написание бренда из прайса"})
     */
    private $brandId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cost_r", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $costR;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_purchase", type="decimal", precision=15, scale=2, nullable=true, options={"comment"="Закупочная цена из прайса"})
     */
    private $pricePurchase;

    /**
     * @var string|null
     *
     * @ORM\Column(name="min_price", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $minPrice;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \Price
     *
     * @ORM\ManyToOne(targetEntity="Price")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="price_id", referencedColumnName="id")
     * })
     */
    private $price2;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDm(): ?\DateTimeInterface
    {
        return $this->dm;
    }

    public function setDm(?\DateTimeInterface $dm): self
    {
        $this->dm = $dm;

        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

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

    public function getIsActual(): ?bool
    {
        return $this->isActual;
    }

    public function setIsActual(?bool $isActual): self
    {
        $this->isActual = $isActual;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function setBrandId(?int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getCostR()
    {
        return $this->costR;
    }

    public function setCostR($costR): self
    {
        $this->costR = $costR;

        return $this;
    }

    public function getPricePurchase()
    {
        return $this->pricePurchase;
    }

    public function setPricePurchase($pricePurchase): self
    {
        $this->pricePurchase = $pricePurchase;

        return $this;
    }

    public function getMinPrice()
    {
        return $this->minPrice;
    }

    public function setMinPrice($minPrice): self
    {
        $this->minPrice = $minPrice;

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

    public function getPrice2(): ?Price
    {
        return $this->price2;
    }

    public function setPrice2(?Price $price2): self
    {
        $this->price2 = $price2;

        return $this;
    }


    public function getMainBrand()
    {
        return $this->getProduct()->getBrand()->getCode();
    }

    public function getMainBrandId()
    {
        return $this->getProduct()->getBrand()->getId();
    }


}
