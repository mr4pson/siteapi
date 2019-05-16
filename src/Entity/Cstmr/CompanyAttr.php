<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyAttr
 *
 * @ORM\Table(name="cstmr.company_attr", indexes={@ORM\Index(name="IDX_964048C1979B1AD6", columns={"company_id"})})
 * @ORM\Entity
 */
class CompanyAttr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.company_attr_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="shop", type="boolean", nullable=false)
     */
    private $shop = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="shop_many", type="boolean", nullable=false)
     */
    private $shopMany = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="sto", type="boolean", nullable=false)
     */
    private $sto = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="transporter", type="boolean", nullable=false, options={"comment"="Перевозчик"})
     */
    private $transporter = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="sklad", type="boolean", nullable=false, options={"comment"="Оптовый склад"})
     */
    private $sklad = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="tenderer", type="boolean", nullable=false, options={"comment"="Тендерщик"})
     */
    private $tenderer = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_sklad", type="boolean", nullable=false)
     */
    private $hasSklad = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="online", type="boolean", nullable=false, options={"comment"="Заказ через online"})
     */
    private $online = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="recruiting", type="boolean", nullable=false, options={"comment"="Самостоятельный подбор"})
     */
    private $recruiting = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="special_tech", type="boolean", nullable=false, options={"comment"="Спецтехника"})
     */
    private $specialTech = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="dealer", type="boolean", nullable=false, options={"comment"="Официальный дилер"})
     */
    private $dealer = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="autopark", type="boolean", nullable=false)
     */
    private $autopark = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="resale", type="boolean", nullable=false, options={"comment"="Перекуп"})
     */
    private $resale = false;

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
