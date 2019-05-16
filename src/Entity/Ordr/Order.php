<?php

namespace App\Entity\Ordr;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="ordr."order"", indexes={@ORM\Index(name="order_idx", columns={"dm"}), @ORM\Index(name="IDX_7D5BF483F5B7AF75", columns={"address_id"}), @ORM\Index(name="IDX_7D5BF4839395C3F3", columns={"customer_id"}), @ORM\Index(name="IDX_7D5BF483DCD6CC49", columns={"branch_id"}), @ORM\Index(name="IDX_7D5BF4834F139D0C", columns={"status_code"}), @ORM\Index(name="IDX_7D5BF483727ACA70", columns={"parent_id"})})
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
     * @ORM\SequenceGenerator(sequenceName="ordr."order"_id_seq", allocationSize=1, initialValue=1)
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
     * @var \Cstmr.address
     *
     * @ORM\ManyToOne(targetEntity="Cstmr.address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * })
     */
    private $address;

    /**
     * @var \Cstmr.customer
     *
     * @ORM\ManyToOne(targetEntity="Cstmr.customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \Mngr.branch
     *
     * @ORM\ManyToOne(targetEntity="Mngr.branch")
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
     * @ORM\ManyToOne(targetEntity="Order)
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;


}
