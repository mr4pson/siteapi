<?php

namespace App\Entity\Prdt;

use App\Entity\Cstmr\Company;
use Doctrine\ORM\Mapping as ORM;
//


/**
 * Price
 *
 * @ORM\Table(name="prdt.price", uniqueConstraints={@ORM\UniqueConstraint(name="uk_price_name", columns={"name"})}, indexes={@ORM\Index(name="price_idx_currency", columns={"currency_id"}), @ORM\Index(name="IDX_B65CED46979B1AD6", columns={"company_id"}), @ORM\Index(name="IDX_B65CED465C91A74C", columns={"load_task_type"}), @ORM\Index(name="IDX_B65CED4664D218E", columns={"location_id"}), @ORM\Index(name="IDX_B65CED467B00651C", columns={"status"}), @ORM\Index(name="IDX_B65CED468CDE5729", columns={"type"}), @ORM\Index(name="IDX_B65CED462ADD6D8C", columns={"supplier_id"})})
 * @ORM\Entity
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class Price
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="prdt.price_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="recalc_date", type="datetime", nullable=true)
     */
    private $recalcDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="delivery_days", type="smallint", nullable=true)
     */
    private $deliveryDays;

    /**
     * @var string
     *
     * @ORM\Column(name="coef", type="decimal", precision=8, scale=4, nullable=false, options={"default"="1","comment"="Коэффициент, который может быть применен к прайсу помимо курса валюты. Используется для рублей."})
     */
    private $coef = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_1c", type="string", length=50, nullable=true)
     */
    private $code1c;

    /**
     * @var int
     *
     * @ORM\Column(name="update_days", type="smallint", nullable=false, options={"default"="999"})
     */
    private $updateDays = '999';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="trusted", type="boolean", nullable=true, options={"comment"="Для доверенных прайсов неизвестные пары бренд+номер добавляются всегда. Для остальных только в том случае, если такого номера нет у другого бренда."})
     */
    private $trusted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="upload_params", type="text", nullable=true)
     */
    private $uploadParams;

    /**
     * @var json|null
     *
     * @ORM\Column(name="json", type="json", nullable=true)
     */
    private $json;

    /**
     * @var int|null
     *
     * @ORM\Column(name="partner_id", type="integer", nullable=true)
     */
    private $partnerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_code1c", type="string", length=10, nullable=true)
     */
    private $priceCode1c;

    /**
     * @var string|null
     *
     * @ORM\Column(name="currency_value", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $currencyValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coef_ad", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $coefAd;

    /**
     * @var int|null
     *
     * @ORM\Column(name="shipment_perc", type="integer", nullable=true, options={"comment"="Процент отгрузки"})
     */
    private $shipmentPerc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="expir_perc", type="integer", nullable=true, options={"comment"="Процент просрочки"})
     */
    private $expirPerc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="expir_period", type="integer", nullable=true, options={"comment"="Дней просрочки"})
     */
    private $expirPeriod;

    /**
     * @var int|null
     *
     * @ORM\Column(name="delivery_prob", type="smallint", nullable=true, options={"default"="100"})
     */
    private $deliveryProb = '100';

    /**
     * @var int|null
     *
     * @ORM\Column(name="delivery_prob_id", type="integer", nullable=true, options={"default"="5"})
     */
    private $deliveryProbId = '5';

    /**
     * @var bool
     *
     * @ORM\Column(name="reserve_on", type="boolean", nullable=false, options={"comment"="Учитывать в offer заказанное количество"})
     */
    private $reserveOn = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="query_stock", type="boolean", nullable=false)
     */
    private $queryStock = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="min_sum", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $minSum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="warehouse_code", type="string", length=8, nullable=true, options={"fixed"=true,"comment"="ЦБ склада 1С"})
     */
    private $warehouseCode;

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cstmr\Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * })
     */
    private $company;


    /**
     * @var \PriceStatus
     *
     * @ORM\ManyToOne(targetEntity="PriceStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status", referencedColumnName="code")
     * })
     */
    private $status;

    /**
     * @var \DCurrency
     *
     * @ORM\ManyToOne(targetEntity="DCurrency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="code")
     * })
     */
    private $currency;

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

    public function getRecalcDate(): ?\DateTimeInterface
    {
        return $this->recalcDate;
    }

    public function setRecalcDate(?\DateTimeInterface $recalcDate): self
    {
        $this->recalcDate = $recalcDate;

        return $this;
    }

    public function getDeliveryDays(): ?int
    {
        return $this->deliveryDays;
    }

    public function setDeliveryDays(?int $deliveryDays): self
    {
        $this->deliveryDays = $deliveryDays;

        return $this;
    }

    public function getCoef()
    {
        return $this->coef;
    }

    public function setCoef($coef): self
    {
        $this->coef = $coef;

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

    public function getUpdateDays(): ?int
    {
        return $this->updateDays;
    }

    public function setUpdateDays(int $updateDays): self
    {
        $this->updateDays = $updateDays;

        return $this;
    }

    public function getTrusted(): ?bool
    {
        return $this->trusted;
    }

    public function setTrusted(?bool $trusted): self
    {
        $this->trusted = $trusted;

        return $this;
    }

    public function getUploadParams(): ?string
    {
        return $this->uploadParams;
    }

    public function setUploadParams(?string $uploadParams): self
    {
        $this->uploadParams = $uploadParams;

        return $this;
    }

    public function getJson(): ?array
    {
        return $this->json;
    }

    public function setJson(?array $json): self
    {
        $this->json = $json;

        return $this;
    }

    public function getPartnerId(): ?int
    {
        return $this->partnerId;
    }

    public function setPartnerId(?int $partnerId): self
    {
        $this->partnerId = $partnerId;

        return $this;
    }

    public function getPriceCode1c(): ?string
    {
        return $this->priceCode1c;
    }

    public function setPriceCode1c(?string $priceCode1c): self
    {
        $this->priceCode1c = $priceCode1c;

        return $this;
    }

    public function getCurrencyValue()
    {
        return $this->currencyValue;
    }

    public function setCurrencyValue($currencyValue): self
    {
        $this->currencyValue = $currencyValue;

        return $this;
    }

    public function getCoefAd()
    {
        return $this->coefAd;
    }

    public function setCoefAd($coefAd): self
    {
        $this->coefAd = $coefAd;

        return $this;
    }

    public function getShipmentPerc(): ?int
    {
        return $this->shipmentPerc;
    }

    public function setShipmentPerc(?int $shipmentPerc): self
    {
        $this->shipmentPerc = $shipmentPerc;

        return $this;
    }

    public function getExpirPerc(): ?int
    {
        return $this->expirPerc;
    }

    public function setExpirPerc(?int $expirPerc): self
    {
        $this->expirPerc = $expirPerc;

        return $this;
    }

    public function getExpirPeriod(): ?int
    {
        return $this->expirPeriod;
    }

    public function setExpirPeriod(?int $expirPeriod): self
    {
        $this->expirPeriod = $expirPeriod;

        return $this;
    }

    public function getDeliveryProb(): ?int
    {
        return $this->deliveryProb;
    }

    public function setDeliveryProb(?int $deliveryProb): self
    {
        $this->deliveryProb = $deliveryProb;

        return $this;
    }

    public function getDeliveryProbId(): ?int
    {
        return $this->deliveryProbId;
    }

    public function setDeliveryProbId(?int $deliveryProbId): self
    {
        $this->deliveryProbId = $deliveryProbId;

        return $this;
    }

    public function getReserveOn(): ?bool
    {
        return $this->reserveOn;
    }

    public function setReserveOn(bool $reserveOn): self
    {
        $this->reserveOn = $reserveOn;

        return $this;
    }

    public function getQueryStock(): ?bool
    {
        return $this->queryStock;
    }

    public function setQueryStock(bool $queryStock): self
    {
        $this->queryStock = $queryStock;

        return $this;
    }

    public function getMinSum()
    {
        return $this->minSum;
    }

    public function setMinSum($minSum): self
    {
        $this->minSum = $minSum;

        return $this;
    }

    public function getWarehouseCode(): ?string
    {
        return $this->warehouseCode;
    }

    public function setWarehouseCode(?string $warehouseCode): self
    {
        $this->warehouseCode = $warehouseCode;

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

    public function getStatus(): ?PriceStatus
    {
        return $this->status;
    }

    public function setStatus(?PriceStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCurrency(): ?DCurrency
    {
        return $this->currency;
    }

    public function setCurrency(?DCurrency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

  

}
