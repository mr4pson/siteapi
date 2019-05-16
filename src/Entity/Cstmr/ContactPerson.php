<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactPerson
 *
 * @ORM\Table(name="cstmr.contact_person", indexes={@ORM\Index(name="IDX_BFFE9936979B1AD6", columns={"company_id"})})
 * @ORM\Entity
 */
class ContactPerson
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.contact_person_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="second_name", type="string", length=100, nullable=true)
     */
    private $secondName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=150, nullable=true)
     */
    private $position;

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
