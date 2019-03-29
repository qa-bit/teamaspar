<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsletterHistory
 *
 * @ORM\Table(name="newsletter_history")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\NewsletterHistoryRepository")
 */
class NewsletterHistory
{


    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
     * @var
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    private $customer;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Newsletter")
     */
    private $newsletter;


    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $ip;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $userAgent;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param mixed $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

}
