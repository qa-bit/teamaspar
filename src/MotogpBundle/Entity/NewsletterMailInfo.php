<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\IdTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * NewsletterMailInfo
 *
 * @ORM\Table(name="newsletter_mail_info")
 * @UniqueEntity("email")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\NewsletterMailInfoRepository")
 */
class NewsletterMailInfo
{
    use IdTrait;

    public function __construct()
    {
        $this->active = false;
        $this->customerType = 'public';
    }

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $surname;

    /**
     * @var boolean;
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $active;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $customerType;
    

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function __toString()
    {
        return (string) $this->getEmail();
    }

    /**
     * @return string
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * @param string $customerType
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;
    }
}
