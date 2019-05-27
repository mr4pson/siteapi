<?php

namespace App\Entity\Ordr;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscountType
 *
 * @ORM\Table(name="ordr._d_discount_type")
 * @ORM\Entity
 */
class DiscountType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ordr._d_discount_type_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=80, nullable=true)
     */
    private $name;

    /**
     * @var float|null
     *
     * @ORM\Column(name="coef", type="float", precision=10, scale=0, nullable=true)
     */
    private $coef;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s", type="integer", nullable=true)
     */
    private $s;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCoef(): ?float
    {
        return $this->coef;
    }

    public function setCoef(?float $coef): self
    {
        $this->coef = $coef;

        return $this;
    }

    public function getS(): ?int
    {
        return $this->s;
    }

    public function setS(?int $s): self
    {
        $this->s = $s;

        return $this;
    }


}
