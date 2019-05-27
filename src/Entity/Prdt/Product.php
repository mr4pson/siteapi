<?php

namespace App\Entity\Prdt;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 * @ORM\Entity
 * @ORM\Table(name="prdt.product", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_products_oem_brand", columns={"oem", "brand_id"})}, indexes={@ORM\Index(name="idx_product_cross_group_id", columns={"cross_group_id"}), @ORM\Index(name="product_idx_main", columns={"product_main_id"}), @ORM\Index(name="idx_product_cross_group", columns={"cross_group_old"}), @ORM\Index(name="product_idx_todo", columns={"product_main_id", "oem"}), @ORM\Index(name="IDX_2E4831CD44F5D008", columns={"brand_id"})})
 * 
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="prdt.product_id_seq", allocationSize=1, initialValue=1)
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
     * @var string
     *
     * @ORM\Column(name="oem", type="string", length=50, nullable=false)
     */
    private $oem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cross_group_old", type="bigint", nullable=true)
     */
    private $crossGroupOld;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cross_group_id", type="bigint", nullable=true)
     */
    private $crossGroupId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=3, nullable=true)
     */
    private $weight;

    /**
     * @var bool
     *
     * @ORM\Column(name="make_del", type="boolean", nullable=false, options={"comment"="помечено для удаления"})
     */
    private $makeDel = false;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_all_num", type="integer", nullable=true)
     */
    private $idAllNum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="product_main_id", type="bigint", nullable=true)
     */
    private $productMainId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vendor_number", type="string", length=255, nullable=true, options={"comment"="Артикул в написании производителя"})
     */
    private $vendorNumber;

    /**
     * @var \Brand
     *
     * @ORM\ManyToOne(targetEntity="Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * })
     */
    private $brand;

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

    public function getOem(): ?string
    {
        return $this->oem;
    }

    public function setOem(string $oem): self
    {
        $this->oem = $oem;

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

    public function getCrossGroupOld(): ?int
    {
        return $this->crossGroupOld;
    }

    public function setCrossGroupOld(?int $crossGroupOld): self
    {
        $this->crossGroupOld = $crossGroupOld;

        return $this;
    }

    public function getCrossGroupId(): ?int
    {
        return $this->crossGroupId;
    }

    public function setCrossGroupId(?int $crossGroupId): self
    {
        $this->crossGroupId = $crossGroupId;

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

    public function getMakeDel(): ?bool
    {
        return $this->makeDel;
    }

    public function setMakeDel(bool $makeDel): self
    {
        $this->makeDel = $makeDel;

        return $this;
    }

    public function getIdAllNum(): ?int
    {
        return $this->idAllNum;
    }

    public function setIdAllNum(?int $idAllNum): self
    {
        $this->idAllNum = $idAllNum;

        return $this;
    }

    public function getProductMainId(): ?int
    {
        return $this->productMainId;
    }

    public function setProductMainId(?int $productMainId): self
    {
        $this->productMainId = $productMainId;

        return $this;
    }

    public function getVendorNumber(): ?string
    {
        return $this->vendorNumber;
    }

    public function setVendorNumber(?string $vendorNumber): self
    {
        $this->vendorNumber = $vendorNumber;

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
