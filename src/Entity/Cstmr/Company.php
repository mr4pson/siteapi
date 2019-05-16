<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="cstmr.company", indexes={@ORM\Index(name="IDX_650140A158EC8A4D", columns={"company_status_id"}), @ORM\Index(name="IDX_650140A152DD629B", columns={"company_deal_periodicity_id"}), @ORM\Index(name="IDX_650140A1602AD315", columns={"responsible_id"})})
 * @ORM\Entity
 */
class Company
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.company_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inn", type="bigint", nullable=true)
     */
    private $inn;

    /**
     * @var int|null
     *
     * @ORM\Column(name="kpp", type="bigint", nullable=true)
     */
    private $kpp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="max_query_count", type="integer", nullable=true, options={"default"="100"})
     */
    private $maxQueryCount = '100';

    /**
     * @var int|null
     *
     * @ORM\Column(name="query_by_day", type="integer", nullable=true)
     */
    private $queryByDay;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_query_dt", type="datetime", nullable=true)
     */
    private $lastQueryDt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="discount_col", type="integer", nullable=true)
     */
    private $discountCol;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bik", type="string", length=9, nullable=true, options={"fixed"=true})
     */
    private $bik;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bank", type="string", length=250, nullable=true)
     */
    private $bank;

    /**
     * @var string|null
     *
     * @ORM\Column(name="account", type="string", length=50, nullable=true)
     */
    private $account;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bx_id", type="integer", nullable=true)
     */
    private $bxId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_1c", type="string", length=8, nullable=true)
     */
    private $code1c;

    /**
     * @var bool
     *
     * @ORM\Column(name="mark_del", type="boolean", nullable=false)
     */
    private $markDel = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \CompanyStatus
     *
     * @ORM\ManyToOne(targetEntity="CompanyStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_status_id", referencedColumnName="id")
     * })
     */
    private $companyStatus;

    /**
     * @var \CompanyDealPeriodicity
     *
     * @ORM\ManyToOne(targetEntity="CompanyDealPeriodicity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_deal_periodicity_id", referencedColumnName="id")
     * })
     */
    private $companyDealPeriodicity;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Mngr\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsible_id", referencedColumnName="id")
     * })
     */
    private $responsible;


}
