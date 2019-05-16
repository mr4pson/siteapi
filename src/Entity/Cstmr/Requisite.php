<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cstmr.requisite
 *
 * @ORM\Table(name="cstmr.requisite", indexes={@ORM\Index(name="IDX_A27FD8E3979B1AD6", columns={"company_id"})})
 * @ORM\Entity
 */
class Requisite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.requisite_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var int|null
     *
     * @ORM\Column(name="requisite_type_id", type="integer", nullable=true)
     */
    private $requisiteTypeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inn", type="string", length=20, nullable=true)
     */
    private $inn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kpp", type="string", length=30, nullable=true)
     */
    private $kpp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_1c", type="string", length=8, nullable=true, options={"fixed"=true})
     */
    private $code1c;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="second_name", type="string", length=255, nullable=true)
     */
    private $secondName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bx_id", type="integer", nullable=true)
     */
    private $bxId;

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
