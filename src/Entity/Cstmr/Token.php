<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * Token
 *
 * @ORM\Table(name="cstmr.token", indexes={@ORM\Index(name="IDX_862AAB9F9395C3F3", columns={"customer_id"})})
 * @ORM\Entity
 */
class Token
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.token_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", nullable=false)
     */
    private $access;

    /**
     * @var string
     *
     * @ORM\Column(name="secret", type="string", nullable=false)
     */
    private $secret;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", nullable=false)
     */
    private $ip;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function setAccess(string $access): self
    {
        $this->access = $access;

        return $this;
    }

    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): self
    {
        $this->secret = $secret;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

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


}
