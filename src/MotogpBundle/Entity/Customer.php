<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\CustomerRepository")
 * @UniqueEntity("email")
 * @UniqueEntity(
 *     fields={"name", "surname"},
 *     errorPath="name",
 *     message="name_in_use"
 * )
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $surname;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $type;


    /**
     * @var $string
     * @ORM\Column(type="string", nullable=true)
     */
    private $mediaType;

    /**
     * @var string
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $userConfirmed;


    /**
     * @var string
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $adminConfirmed;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


    public function __toString()
    {
        return $this->name.' '.$this->surname;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * @param mixed $mediaType
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    /**
     * @return string
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param string $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return string
     */
    public function getUserConfirmed()
    {
        return $this->userConfirmed;
    }

    /**
     * @param string $userConfirmed
     */
    public function setUserConfirmed($userConfirmed)
    {
        $this->userConfirmed = $userConfirmed;
    }

    /**
     * @return string
     */
    public function getAdminConfirmed()
    {
        return $this->adminConfirmed;
    }

    /**
     * @param string $adminConfirmed
     */
    public function setAdminConfirmed($adminConfirmed)
    {
        $this->adminConfirmed = $adminConfirmed;
    }

}