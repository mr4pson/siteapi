<?php

namespace App\Entity\Cstmr;

use App\Entity\Ordr\DiscountType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cstmr.customer
 *
 * @ORM\Table(name="cstmr.customer", uniqueConstraints={@ORM\UniqueConstraint(name="customer_email_key", columns={"email"})}, indexes={@ORM\Index(name="customer_idx_branch", columns={"branch_id", "id"}), @ORM\Index(name="IDX_C6A1FF3F8BAC62AF", columns={"city_id"}), @ORM\Index(name="IDX_C6A1FF3F98260155", columns={"region_id"}), @ORM\Index(name="IDX_C6A1FF3F125C5293", columns={"discount_type"}), @ORM\Index(name="IDX_C6A1FF3F979B1AD6", columns={"company_id"})})
 * @ORM\Entity
 * 
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(?string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMaxQueryCount(): ?int
    {
        return $this->maxQueryCount;
    }

    public function setMaxQueryCount(?int $maxQueryCount): self
    {
        $this->maxQueryCount = $maxQueryCount;

        return $this;
    }

    public function getQueryByDay(): ?int
    {
        return $this->queryByDay;
    }

    public function setQueryByDay(?int $queryByDay): self
    {
        $this->queryByDay = $queryByDay;

        return $this;
    }

    public function getLastQueryDt(): ?\DateTimeInterface
    {
        return $this->lastQueryDt;
    }

    public function setLastQueryDt(?\DateTimeInterface $lastQueryDt): self
    {
        $this->lastQueryDt = $lastQueryDt;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getDl(): ?\DateTimeInterface
    {
        return $this->dl;
    }

    public function setDl(?\DateTimeInterface $dl): self
    {
        $this->dl = $dl;

        return $this;
    }

    public function getDe(): ?\DateTimeInterface
    {
        return $this->de;
    }

    public function setDe(?\DateTimeInterface $de): self
    {
        $this->de = $de;

        return $this;
    }

    public function getSmartPrice(): ?bool
    {
        return $this->smartPrice;
    }

    public function setSmartPrice(bool $smartPrice): self
    {
        $this->smartPrice = $smartPrice;

        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setLon($lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getPhoneWork(): ?int
    {
        return $this->phoneWork;
    }

    public function setPhoneWork(?int $phoneWork): self
    {
        $this->phoneWork = $phoneWork;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getInfo(): ?array
    {
        return $this->info;
    }

    public function setInfo(?array $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getApm()
    {
        return $this->apm;
    }

    public function setApm($apm): self
    {
        $this->apm = $apm;

        return $this;
    }

    public function getBranchId(): ?int
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): self
    {
        $this->branchId = $branchId;

        return $this;
    }

    public function getDeliveryFree(): ?bool
    {
        return $this->deliveryFree;
    }

    public function setDeliveryFree(?bool $deliveryFree): self
    {
        $this->deliveryFree = $deliveryFree;

        return $this;
    }

    public function getDf(): ?bool
    {
        return $this->df;
    }

    public function setDf(?bool $df): self
    {
        $this->df = $df;

        return $this;
    }

    public function getBxId(): ?int
    {
        return $this->bxId;
    }

    public function setBxId(?int $bxId): self
    {
        $this->bxId = $bxId;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(?bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getBxLeadId(): ?int
    {
        return $this->bxLeadId;
    }

    public function setBxLeadId(?int $bxLeadId): self
    {
        $this->bxLeadId = $bxLeadId;

        return $this;
    }

    public function getBxManagerId(): ?int
    {
        return $this->bxManagerId;
    }

    public function setBxManagerId(?int $bxManagerId): self
    {
        $this->bxManagerId = $bxManagerId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getIsPrivatePerson(): ?bool
    {
        return $this->isPrivatePerson;
    }

    public function setIsPrivatePerson(?bool $isPrivatePerson): self
    {
        $this->isPrivatePerson = $isPrivatePerson;

        return $this;
    }

    public function getDefaultRequisiteId(): ?int
    {
        return $this->defaultRequisiteId;
    }

    public function setDefaultRequisiteId(?int $defaultRequisiteId): self
    {
        $this->defaultRequisiteId = $defaultRequisiteId;

        return $this;
    }

    public function getDiscountType(): ?DiscountType
    {
        return $this->discountType;
    }

    public function setDiscountType(?DiscountType $discountType): self
    {
        $this->discountType = $discountType;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }


}
