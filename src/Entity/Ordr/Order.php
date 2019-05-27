<?php

namespace App\Entity\Ordr;

use App\Entity\Cstmr\Address;
use App\Entity\Cstmr\customer;
use App\Entity\Mngr\Branch;
use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="ordr.order", indexes={@ORM\Index(name="order_idx", columns={"dm"}), @ORM\Index(name="IDX_7D5BF483F5B7AF75", columns={"address_id"}), @ORM\Index(name="IDX_7D5BF4839395C3F3", columns={"customer_id"}), @ORM\Index(name="IDX_7D5BF483DCD6CC49", columns={"branch_id"}), @ORM\Index(name="IDX_7D5BF4834F139D0C", columns={"status_code"}), @ORM\Index(name="IDX_7D5BF483727ACA70", columns={"parent_id"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ordr.order_id_seq", allocationSize=1, initialValue=1)
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt", type="datetime", nullable=true)
     */
    private $dt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="company_id", type="bigint", nullable=true)
     */
    private $companyId;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cstmr\Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * })
     */
    private $address;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cstmr\customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \Branch
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Mngr\Branch")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="branch_id", referencedColumnName="id")
     * })
     */
    private $branch;

    /**
     * @var \DOrderStatus
     *
     * @ORM\ManyToOne(targetEntity="DOrderStatus")
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
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

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

    public function getDt(): ?\DateTimeInterface
    {
        return $this->dt;
    }

    public function setDt(?\DateTimeInterface $dt): self
    {
        $this->dt = $dt;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    public function setCompanyId(?int $companyId): self
    {
        $this->companyId = $companyId;

        return $this;
    }

    /*public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
    public function getAddressId(): ?int
    {
        return !empty($this->address) ? $this->address->getId() : null;
    }*/

    public function getCustomer(): ?customer
    {
        return $this->customer;
    }

    public function setCustomer(?customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getCustomerId(): ?int 
    {
        return !empty($this->customer) ? $this->customer->getId() : null;
    }

    public function getBranch(): ?Branch
    {
        return $this->branch;
    }

    public function setBranch(?Branch $branch): self
    {
        $this->branch = $branch;

        return $this;
    }

    public function getBranchId(): ?int 
    {
        return !empty($this->branch) ? $this->branch->getId() : null;
    }

    public function getStatusCode(): ?DOrderStatus
    {
        return $this->statusCode;
    }

    public function setStatusCode(?DOrderStatus $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getStatusCodeCode(): ?string 
    {
        return !empty($this->statusCode) ? $this->statusCode->getCode() : null;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParentId(): ?int 
    {
        return !empty($this->parent) ? $this->parent->getId() : null;
    }
}
