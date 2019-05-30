<?php


namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Customer;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="MotogpBundle\Entity\Customer", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $customer;

    public function __construct()
    {
        parent::__construct();
    }
}