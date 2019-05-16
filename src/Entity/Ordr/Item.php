<?php

namespace App\Entity\Ordr;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="ordr.item", indexes={@ORM\Index(name="item_idx_hit_offer_order", columns={"hit_id", "offer_id", "order_id"}), @ORM\Index(name="item_idx_order_id", columns={"order_id"}), @ORM\Index(name="item_idx_customer_id", columns={"customer_id"}), @ORM\Index(name="item_idx_hit_id", columns={"hit_id"}), @ORM\Index(name="item_idx_status_code_basket", columns={"basket_id", "status_code"}), @ORM\Index(name="item_idx_product_id", columns={"product_id"}), @ORM\Index(name="item_idx_offer_id", columns={"offer_id"}), @ORM\Index(name="item_idx_20190325", columns={"status_code", "offer_id", "customer_id", "basket_id"}), @ORM\Index(name="item_idx_status_code", columns={"status_code"}), @ORM\Index(name="IDX_F21B636DD614C7E7", columns={"price_id"})})
 * @ORM\Entity
 */
class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ordr.item_id_seq", allocationSize=1, initialValue=1)
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
     * @var int|null
     *
     * @ORM\Column(name="offer_id", type="bigint", nullable=true)
     */
    private $offerId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qty", type="integer", nullable=true)
     */
    private $qty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="discount_coef", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $discountCoef;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=12, scale=2, nullable=true, options={"comment"="Окончательная цена позиции при попадании в заказ"})
     */
    private $price;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="hit_dc", type="datetime", nullable=true, options={"comment"="дата/время пробоя, по которому заказана позиция"})
     */
    private $hitDc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="basket_id", type="integer", nullable=true, options={"comment"="Id Корзины из ordr.basket "})
     */
    private $basketId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="product_id", type="bigint", nullable=true)
     */
    private $productId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="perc_item_id", type="bigint", nullable=true)
     */
    private $percItemId;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_fly", type="boolean", nullable=false, options={"comment"="Признак доставки авиа. Дичь, нужно выносить к заказу, или указывать тип доставки тут"})
     */
    private $isFly = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status_1c", type="string", length=50, nullable=true)
     */
    private $status1c;

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
     * @var \DItemStatus
     *
     * @ORM\ManyToOne(targetEntity="DItemStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_code", referencedColumnName="code")
     * })
     */
    private $statusCode;

    /**
     * @var \Order
     *
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $order;

    /**
     * @var \Price
     *
     * @ORM\ManyToOne(targetEntity="Price")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="price_id", referencedColumnName="id")
     * })
     */
    private $price2;

    /**
     * @var \Hit
     *
     * @ORM\ManyToOne(targetEntity="Hit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hit_id", referencedColumnName="id")
     * })
     */
    private $hit;

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

    public function getOfferId(): ?int
    {
        return $this->offerId;
    }

    public function setOfferId(?int $offerId): self
    {
        $this->offerId = $offerId;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(?int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getDiscountCoef()
    {
        return $this->discountCoef;
    }

    public function setDiscountCoef($discountCoef): self
    {
        $this->discountCoef = $discountCoef;

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

    public function getHitDc(): ?\DateTimeInterface
    {
        return $this->hitDc;
    }

    public function setHitDc(?\DateTimeInterface $hitDc): self
    {
        $this->hitDc = $hitDc;

        return $this;
    }

    public function getBasketId(): ?int
    {
        return $this->basketId;
    }

    public function setBasketId(?int $basketId): self
    {
        $this->basketId = $basketId;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    public function getPercItemId(): ?int
    {
        return $this->percItemId;
    }

    public function setPercItemId(?int $percItemId): self
    {
        $this->percItemId = $percItemId;

        return $this;
    }

    public function getIsFly(): ?bool
    {
        return $this->isFly;
    }

    public function setIsFly(bool $isFly): self
    {
        $this->isFly = $isFly;

        return $this;
    }

    public function getStatus1c(): ?string
    {
        return $this->status1c;
    }

    public function setStatus1c(?string $status1c): self
    {
        $this->status1c = $status1c;

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

    public function getStatusCode(): ?DItemStatus
    {
        return $this->statusCode;
    }

    public function setStatusCode(?DItemStatus $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): self
    {
        $this->order = $order;

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

    public function getHit(): ?Hit
    {
        return $this->hit;
    }

    public function setHit(?Hit $hit): self
    {
        $this->hit = $hit;

        return $this;
    }


}
