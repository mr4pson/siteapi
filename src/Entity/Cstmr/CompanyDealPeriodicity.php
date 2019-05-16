<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyDealPeriodicity
 *
 * @ORM\Table(name="cstmr.company_deal_periodicity")
 * @ORM\Entity
 */
class CompanyDealPeriodicity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.company_deal_periodicity_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="bx_id", type="integer", nullable=false)
     */
    private $bxId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true)
     */
    private $title;


}
