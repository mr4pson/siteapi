<?php

namespace App\Entity\Hstry;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Hit
 *
 * @ORM\Table(name="hstry.hit", indexes={@ORM\Index(name="hit_idx_dc1", columns={"dc"}), @ORM\Index(name="indx_customer_dc_hits", columns={"dc", "customer_id", "product_id"}), @ORM\Index(name="hit_idx_product_id_dc1", columns={"dc", "product_id"}), @ORM\Index(name="c_id_dc_p_key1", columns={"customer_id", "dc"}), @ORM\Index(name="hit_idx_product_id", columns={"product_id"}), @ORM\Index(name="key_customer_product1", columns={"product_id", "customer_id"}), @ORM\Index(name="hit_idx_customer_id1", columns={"customer_id"}), @ORM\Index(name="hit_idx_text_product_id", columns={"text", "product_id"})})
 * @ORM\Entity
 */
class Hit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="hstry.hit_id_seq1", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=300, nullable=true)
     */
    private $text;

    /**
     * @var int|null
     *
     * @ORM\Column(name="product_id", type="bigint", nullable=true)
     */
    private $productId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="customer_id", type="bigint", nullable=true, options={"comment"="менеджер зашел на сайт и выбрал  пользователя с таким id"})
     */
    private $customerId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dc", type="datetime", nullable=false, options={"default"="now()"})
     */
    private $dc = 'now()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", nullable=true)
     */
    private $ip;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type", type="smallint", nullable=true)
     */
    private $type;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mobile", type="boolean", nullable=true)
     */
    private $mobile = false;

    /**
     * @ORM\OneToMany(targetEntity="HitOffer", mappedBy="hit",cascade={"persist"})
     */
    private $hitOffers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

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

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function setCustomerId(?int $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getDc(): ?\DateTimeInterface
    {
        return $this->dc;
    }

    public function setDc(\DateTimeInterface $dc): self
    {
        $this->dc = $dc;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMobile(): ?bool
    {
        return $this->mobile;
    }

    public function setMobile(?bool $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

     /**
     * @return ArrayCollection|HitOffer[]
     */
    public function getHitOffers(): ArrayCollection
    {
        return $this->hitOffers;
    }

    public function addHitOffer(HitOffer $item): self
    {
        //if (!$this->hitOffers->contains($item)) {
            $this->hitOffers[] = $item;
        //}

        return $this;
    }

   /* public function removeHitOffer(HitOffer $item): self
    {
        if ($this->hitOffers->contains($item)) {
            $this->hitOffers->removeElement($item);
        }

        return $this;
    }*/
}
