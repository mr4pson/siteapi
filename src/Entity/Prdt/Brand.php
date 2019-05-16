<?php

namespace App\Entity\Prdt;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table(name="prdt.brand", uniqueConstraints={@ORM\UniqueConstraint(name="brand_code_key", columns={"code"})}, indexes={@ORM\Index(name="brand_idx_main_id_id", columns={"id", "main_id"}), @ORM\Index(name="brand_main_id_indx", columns={"main_id"}), @ORM\Index(name="brand_idx_code_main_id", columns={"code", "main_id"})})
 * @ORM\Entity
 */
class Brand
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="prdt.brand_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="code", type="string", length=100, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_1c", type="string", length=10, nullable=true, options={"comment"="Код из 1С"})
     */
    private $code1c;

    /**
     * @var string|null
     *
     * @ORM\Column(name="short_name", type="string", length=100, nullable=true)
     */
    private $shortName;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="direct_contract", type="boolean", nullable=true, options={"comment"="Прямой контракт"})
     */
    private $directContract = false;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="treated", type="boolean", nullable=true, options={"comment"="Распределенный бренд"})
     */
    private $treated = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="mark_deletion", type="boolean", nullable=false, options={"comment"="Элемент помечен для удаления"})
     */
    private $markDeletion = false;

    /**
     * @var \Brand
     *
     * @ORM\ManyToOne(targetEntity="Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="main_id", referencedColumnName="id")
     * })
     */
    private $main;

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode1c(): ?string
    {
        return $this->code1c;
    }

    public function setCode1c(?string $code1c): self
    {
        $this->code1c = $code1c;

        return $this;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }

    public function getDirectContract(): ?bool
    {
        return $this->directContract;
    }

    public function setDirectContract(?bool $directContract): self
    {
        $this->directContract = $directContract;

        return $this;
    }

    public function getTreated(): ?bool
    {
        return $this->treated;
    }

    public function setTreated(?bool $treated): self
    {
        $this->treated = $treated;

        return $this;
    }

    public function getMarkDeletion(): ?bool
    {
        return $this->markDeletion;
    }

    public function setMarkDeletion(bool $markDeletion): self
    {
        $this->markDeletion = $markDeletion;

        return $this;
    }

    public function getMain(): ?self
    {
        return $this->main;
    }

    public function setMain(?self $main): self
    {
        $this->main = $main;

        return $this;
    }


}
