<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\InSponsorTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use MotogpBundle\Entity\Traits\InGroupsTrait;

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

    use InGroupsTrait, InCircuitTrait, InSponsorTrait, InModalityTrait;

    public function __construct()
    {
        $this->user = null;

    }

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
     * @var string
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $adminConfirmedTest;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $activationHash;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $deactivationHash;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $locale;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $country;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $postalCode;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $webUrl;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $businessName;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"}, inversedBy="customer")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $user;


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

    /**
     * @return string
     */
    public function getActivationHash()
    {
        return $this->activationHash;
    }

    /**
     * @param string $activationHash
     */
    public function setActivationHash($activationHash)
    {
        $this->activationHash = $activationHash;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }


    public function getFullName() {

        $surname = $this->surname ? $this->surname : '';

        return $this->getName().' '.$surname;
    }

    /**
     * @return string
     */
    public function getDeactivationHash()
    {
        return $this->deactivationHash;
    }

    /**
     * @param string $deactivationHash
     */
    public function setDeactivationHash($deactivationHash)
    {
        $this->deactivationHash = $deactivationHash;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @param string $webUrl
     */
    public function setWebUrl($webUrl)
    {
        $this->webUrl = $webUrl;
    }

    /**
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * @param string $businessName
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;
    }

    /**
     * @return string
     */
    public function getAdminConfirmedTest()
    {
        return $this->adminConfirmedTest;
    }

    /**
     * @param string $adminConfirmedTest
     */
    public function setAdminConfirmedTest($adminConfirmedTest)
    {
        $this->adminConfirmedTest = $adminConfirmedTest;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    

}