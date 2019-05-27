<?php

namespace App\Entity\Ordr;

use Doctrine\ORM\Mapping as ORM;

/**
 * DItemStatus
 *
 * @ORM\Table(name="ordr._d_item_status")
 * @ORM\Entity
 */
class DItemStatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ordr._d_item_status_code_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="next_status", type="string", nullable=true)
     */
    private $nextStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s1C", type="smallint", nullable=true)
     */
    private $s1c;


}
