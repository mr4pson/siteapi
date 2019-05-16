<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyPhone
 *
 * @ORM\Table(name="cstmr.company_phone", indexes={@ORM\Index(name="IDX_B2648FED979B1AD6", columns={"company_id"})})
 * @ORM\Entity
 */
class CompanyPhone
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.company_phone_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone_number", type="bigint", nullable=true)
     */
    private $phoneNumber;

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
