<?php

namespace App\Entity\Ordr;

use Doctrine\ORM\Mapping as ORM;

/**
 * DOrderStatus
 *
 * @ORM\Table(name="ordr._d_order_status")
 * @ORM\Entity
 */
class DOrderStatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ordr._d_order_status_code_seq", allocationSize=1, initialValue=1)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="next_status", type="string", nullable=true)
     */
    private $nextStatus;


    public function getCode(): ?string
    {
        return $this->code;
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

    public function getNextStatus(): ?string
    {
        return $this->nextStatus;
    }

    public function setNextStatus(?string $nextStatus): self
    {
        $this->nextStatus = $nextStatus;

        return $this;
    }


}
