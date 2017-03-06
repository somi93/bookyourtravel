<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="review")
 */

class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $positive;

    /**
     * @ORM\Column(type="text")
     */
    private $negative;

    /**
     * @ORM\Column(type="integer")
     */
    private $clean;

    /**
     * @ORM\Column(type="integer")
     */
    private $comfort;

    /**
     * @ORM\Column(type="integer")
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    private $staff;

    /**
     * @ORM\Column(type="integer")
     */
    private $services;

    /**
     * @ORM\Column(type="integer")
     */
    private $value_for_money;

    /** @ORM\Column(type="datetime") */
    private $date;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


    /**
     * @return mixed
     */

    /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="review")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set positive
     *
     * @param string $positive
     *
     * @return Review
     */
    public function setPositive($positive)
    {
        $this->positive = $positive;

        return $this;
    }

    /**
     * Get positive
     *
     * @return string
     */
    public function getPositive()
    {
        return $this->positive;
    }

    /**
     * Set negative
     *
     * @param string $negative
     *
     * @return Review
     */
    public function setNegative($negative)
    {
        $this->negative = $negative;

        return $this;
    }

    /**
     * Get negative
     *
     * @return string
     */
    public function getNegative()
    {
        return $this->negative;
    }

    /**
     * Set clean
     *
     * @param integer $clean
     *
     * @return Review
     */
    public function setClean($clean)
    {
        $this->clean = $clean;

        return $this;
    }

    /**
     * Get clean
     *
     * @return integer
     */
    public function getClean()
    {
        return $this->clean;
    }

    /**
     * Set comfort
     *
     * @param integer $comfort
     *
     * @return Review
     */
    public function setComfort($comfort)
    {
        $this->comfort = $comfort;

        return $this;
    }

    /**
     * Get comfort
     *
     * @return integer
     */
    public function getComfort()
    {
        return $this->comfort;
    }

    /**
     * Set location
     *
     * @param integer $location
     *
     * @return Review
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return integer
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set staff
     *
     * @param integer $staff
     *
     * @return Review
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * Get staff
     *
     * @return integer
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * Set services
     *
     * @param integer $services
     *
     * @return Review
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return integer
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set valueForMoney
     *
     * @param integer $valueForMoney
     *
     * @return Review
     */
    public function setValueForMoney($valueForMoney)
    {
        $this->value_for_money = $valueForMoney;

        return $this;
    }

    /**
     * Get valueForMoney
     *
     * @return integer
     */
    public function getValueForMoney()
    {
        return $this->value_for_money;
    }

    public function setHotel(\AppBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \AppBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }
}
