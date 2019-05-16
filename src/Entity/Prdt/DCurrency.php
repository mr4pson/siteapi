<?php

namespace App\Entity\Prdt;

use Doctrine\ORM\Mapping as ORM;

/**
 * DCurrency
 *
 * @ORM\Table(name="prdt._d_currency")
 * @ORM\Entity
 */
class DCurrency
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="prdt._d_currency_code_seq", allocationSize=1, initialValue=1)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rate", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $rate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt", type="datetime", nullable=true)
     */
    private $dt;


}
