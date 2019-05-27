<?php

namespace App\Entity\Mngr;

use App\Entity\Cstmr\Customer;
use Doctrine\ORM\Mapping as ORM;

/**
 * Branch
 *
 * @ORM\Table(name="mngr.branch", indexes={@ORM\Index(name="IDX_7C58DCED642B8210", columns={"admin_id"})})
 * @ORM\Entity
 */
class Branch
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mngr.branch_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dc", type="date", nullable=false, options={"default"="now()"})
     */
    private $dc = 'now()';

    /**
     * @var string
     *
     * @ORM\Column(name="uid", type="guid", nullable=false, options={"default"="uuid_generate_v4()"})
     */
    private $uid = 'uuid_generate_v4()';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dd", type="date", nullable=true)
     */
    private $dd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="trusted_price", type="boolean", nullable=false)
     */
    private $trustedPrice = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_own_price", type="boolean", nullable=false, options={"default"="1"})
     */
    private $hasOwnPrice = true;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cstmr\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     * })
     */
    private $admin;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getDd(): ?\DateTimeInterface
    {
        return $this->dd;
    }

    public function setDd(?\DateTimeInterface $dd): self
    {
        $this->dd = $dd;

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

    public function getTrustedPrice(): ?bool
    {
        return $this->trustedPrice;
    }

    public function setTrustedPrice(bool $trustedPrice): self
    {
        $this->trustedPrice = $trustedPrice;

        return $this;
    }

    public function getHasOwnPrice(): ?bool
    {
        return $this->hasOwnPrice;
    }

    public function setHasOwnPrice(bool $hasOwnPrice): self
    {
        $this->hasOwnPrice = $hasOwnPrice;

        return $this;
    }

    public function getAdmin(): ?Customer
    {
        return $this->admin;
    }

    public function setAdmin(?Customer $admin): self
    {
        $this->admin = $admin;

        return $this;
    }


}
