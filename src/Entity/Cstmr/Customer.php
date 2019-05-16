<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cstmr.customer
 *
 * @ORM\Table(name="cstmr.customer", uniqueConstraints={@ORM\UniqueConstraint(name="customer_email_key", columns={"email"})}, indexes={@ORM\Index(name="customer_idx_branch", columns={"branch_id", "id"}), @ORM\Index(name="IDX_C6A1FF3F8BAC62AF", columns={"city_id"}), @ORM\Index(name="IDX_C6A1FF3F98260155", columns={"region_id"}), @ORM\Index(name="IDX_C6A1FF3F125C5293", columns={"discount_type"}), @ORM\Index(name="IDX_C6A1FF3F979B1AD6", columns={"company_id"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.customer_id_seq", allocationSize=1, initialValue=1)
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="second_name", type="string", length=150, nullable=true)
     */
    private $secondName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=150, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=true)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone", type="bigint", nullable=true)
     */
    private $phone;

    /**
     * @var int|null
     *
     * @ORM\Column(name="max_query_count", type="smallint", nullable=true)
     */
    private $maxQueryCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="query_by_day", type="smallint", nullable=true)
     */
    private $queryByDay;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_query_dt", type="datetime", nullable=true)
     */
    private $lastQueryDt;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var string|null
     *
     * @ORM\Column(name="login", type="string", length=100, nullable=true)
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", nullable=true)
     */
    private $ip;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dl", type="datetime", nullable=true, options={"comment"="дата/время последнего входа в систему"})
     */
    private $dl;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="de", type="date", nullable=true, options={"comment"="Дата после которой клиент будет автоматически отключен от сайта"})
     */
    private $de;

    /**
     * @var bool
     *
     * @ORM\Column(name="smart_price", type="boolean", nullable=false, options={"comment"="Включить/выключить режим расчета личной цены для клиента"})
     */
    private $smartPrice = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lat", type="decimal", precision=10, scale=7, nullable=true)
     */
    private $lat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lon", type="decimal", precision=10, scale=7, nullable=true)
     */
    private $lon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone_work", type="bigint", nullable=true)
     */
    private $phoneWork;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var json|null
     *
     * @ORM\Column(name="info", type="json", nullable=true)
     */
    private $info;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apm", type="decimal", precision=15, scale=2, nullable=true, options={"comment"="сума за отгруженные в прошлом месяце позиции"})
     */
    private $apm;

    /**
     * @var int
     *
     * @ORM\Column(name="branch_id", type="integer", nullable=false, options={"default"="1"})
     */
    private $branchId = '1';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="delivery_free", type="boolean", nullable=true)
     */
    private $deliveryFree;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="df", type="boolean", nullable=true)
     */
    private $df;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bx_id", type="integer", nullable=true)
     */
    private $bxId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bx_lead_id", type="bigint", nullable=true)
     */
    private $bxLeadId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bx_manager_id", type="integer", nullable=true)
     */
    private $bxManagerId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true, options={"comment"="Ответственный у нас за этого клиента user"})
     */
    private $userId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_private_person", type="boolean", nullable=true)
     */
    private $isPrivatePerson = false;

    /**
     * @var int|null
     *
     * @ORM\Column(name="default_requisite_id", type="integer", nullable=true, options={"comment"="По умолчанию заказа на этого контрагента, если он есть в компании"})
     */
    private $defaultRequisiteId;

    /**
     * @var \DiscountType
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Ordr\DiscountType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discount_type", referencedColumnName="id")
     * })
     */
    private $discountType;

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * })
     */
    private $company;


}
