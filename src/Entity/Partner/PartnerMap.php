<?php

namespace App\Entity\Partner;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartnerMap
 *
 * @ORM\Table(name="partner.partner_map")
 * @ORM\Entity
 */
class PartnerMap
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="partner.partner_map_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="partner_id_from", type="integer", nullable=true)
     */
    private $partnerIdFrom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="partner_id_to", type="integer", nullable=true)
     */
    private $partnerIdTo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="srok", type="integer", nullable=true)
     */
    private $srok;

    /**
     * @var float|null
     *
     * @ORM\Column(name="coef", type="float", precision=10, scale=0, nullable=true, options={"default"="1"})
     */
    private $coef = '1';


}
