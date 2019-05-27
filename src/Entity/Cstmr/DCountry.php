<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * DCountry
 *
 * @ORM\Table(name="cstmr._d_country")
 * @ORM\Entity
 */
class DCountry
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr._d_country_code_seq", allocationSize=1, initialValue=1)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;


}
