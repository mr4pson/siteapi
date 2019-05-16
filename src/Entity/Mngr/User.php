<?php

namespace App\Entity\Mngr;

use Doctrine\ORM\Mapping as ORM;
//use App\Entity\Partner\Partner;

/**
 * User
 *
 * @ORM\Table(name="mngr.user", indexes={@ORM\Index(name="IDX_F2B5F1FA9393F8FE", columns={"partner_id"}), @ORM\Index(name="IDX_F2B5F1FAAE80F5DF", columns={"department_id"}), @ORM\Index(name="IDX_F2B5F1FA41859289", columns={"division_id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mngr.user_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=true)
     */
    private $customerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="second_name", type="string", length=30, nullable=true)
     */
    private $secondName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=30, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=50, nullable=true)
     */
    private $position;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="show_in_list_manager", type="boolean", nullable=false)
     */
    private $showInListManager = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_work", type="string", length=30, nullable=true)
     */
    private $phoneWork;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skype", type="string", length=100, nullable=true)
     */
    private $skype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icq", type="string", length=100, nullable=true)
     */
    private $icq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_1c", type="string", length=100, nullable=true)
     */
    private $name1c;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sales_plan", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $salesPlan;

    /**
     * @var int|null
     *
     * @ORM\Column(name="region_id", type="integer", nullable=true, options={"comment"="ДИЧЬ. Ждем Вилена чтобы понять как Питеру работать с 1с в рамках новой локации (Питер)"})
     */
    private $regionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_login_westcall", type="string", length=150, nullable=true, options={"comment"="Для связи со звонками из весткола"})
     */
    private $userLoginWestcall;

    /**
     * @var string|null
     *
     * @ORM\Column(name="app_login", type="string", length=50, nullable=true)
     */
    private $appLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_login_beeline", type="string", length=150, nullable=true)
     */
    private $userLoginBeeline;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reanimated", type="integer", nullable=true)
     */
    private $reanimated;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="can_recieve_call", type="boolean", nullable=true)
     */
    private $canRecieveCall;

    /**
     * @var string|null
     *
     * @ORM\Column(name="redmine_login", type="string", length=255, nullable=true)
     */
    private $redmineLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="redmine_password", type="string", length=255, nullable=true)
     */
    private $redminePassword;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bx_id", type="integer", nullable=true)
     */
    private $bxId;

    /**
     * @var \Partner 
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner\Partner")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partner_id", referencedColumnName="id")
     * })
     */
    private $partner;


}
