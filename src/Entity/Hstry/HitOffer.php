<?php

namespace App\Entity\Hstry;

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
     * @ORM\ManyToOne(targetEntity="Hit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hit_id", referencedColumnName="id")
     * })
     */
    private $hit;

    /**
     * @var \Prdt.price
     *
     * @ORM\ManyToOne(targetEntity="Prdt.price")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="price_id", referencedColumnName="id")
     * })
     */
    private $price2;

    /**
     * @var \Prdt.product
     *
     * @ORM\ManyToOne(targetEntity="Prdt.product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;


}
