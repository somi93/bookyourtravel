<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="room")
 */

class Room
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;


    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="room")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;

    /**
     * @ORM\OneToMany(targetEntity="RoomPhotos", mappedBy="room")
     */
    private $photos;

    /**
     * @ORM\Column(type="boolean")
     */
    private $telephone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tv;

    /**
     * @ORM\Column(type="boolean")
     */
    private $shower;

    /**
     * @ORM\Column(type="boolean")
     */
    private $heating;


    /**
     * @ORM\Column(type="boolean")
     */
    private $desk;

    /**
     * @ORM\Column(type="boolean")
     */
    private $internet;

    /**
     * @ORM\Column(type="boolean")
     */
    private $room_service;

    /**
     * @ORM\Column(type="boolean")
     */
    private $air_conditioning;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rainfall_showerhead;

    /**
     * @ORM\Column(type="boolean")
     */
    private $satelite_channels;

    /**
     * @ORM\Column(type="boolean")
     */
    private $premium_bedding;

    /**
     * @ORM\Column(type="boolean")
     */
    private $safe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $minibar;

    /**
     * @ORM\Column(type="boolean")
     */
    private $slippers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $coffee_maker;

    /**
     * @ORM\Column(type="boolean")
     */
    private $daily_housekeeping;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getTv()
    {
        return $this->tv;
    }

    /**
     * @param mixed $tv
     */
    public function setTv($tv)
    {
        $this->tv = $tv;
    }

    /**
     * @return mixed
     */
    public function getShower()
    {
        return $this->shower;
    }

    /**
     * @param mixed $shower
     */
    public function setShower($shower)
    {
        $this->shower = $shower;
    }

    /**
     * @return mixed
     */
    public function getHeating()
    {
        return $this->heating;
    }

    /**
     * @param mixed $heating
     */
    public function setHeating($heating)
    {
        $this->heating = $heating;
    }

    /**
     * @return mixed
     */
    public function getDesk()
    {
        return $this->desk;
    }

    /**
     * @param mixed $desk
     */
    public function setDesk($desk)
    {
        $this->desk = $desk;
    }

    /**
     * @return mixed
     */
    public function getInternet()
    {
        return $this->internet;
    }

    /**
     * @param mixed $internet
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;
    }

    /**
     * @return mixed
     */
    public function getRoomService()
    {
        return $this->room_service;
    }

    /**
     * @param mixed $room_service
     */
    public function setRoomService($room_service)
    {
        $this->room_service = $room_service;
    }

    /**
     * @return mixed
     */
    public function getAirConditioning()
    {
        return $this->air_conditioning;
    }

    /**
     * @param mixed $air_conditioning
     */
    public function setAirConditioning($air_conditioning)
    {
        $this->air_conditioning = $air_conditioning;
    }

    /**
     * @return mixed
     */
    public function getRainfallShowerhead()
    {
        return $this->rainfall_showerhead;
    }

    /**
     * @param mixed $rainfall_showerhead
     */
    public function setRainfallShowerhead($rainfall_showerhead)
    {
        $this->rainfall_showerhead = $rainfall_showerhead;
    }

    /**
     * @return mixed
     */
    public function getSateliteChannels()
    {
        return $this->satelite_channels;
    }

    /**
     * @param mixed $satelite_channels
     */
    public function setSateliteChannels($satelite_channels)
    {
        $this->satelite_channels = $satelite_channels;
    }

    /**
     * @return mixed
     */
    public function getPremiumBedding()
    {
        return $this->premium_bedding;
    }

    /**
     * @param mixed $premium_bedding
     */
    public function setPremiumBedding($premium_bedding)
    {
        $this->premium_bedding = $premium_bedding;
    }

    /**
     * @return mixed
     */
    public function getSafe()
    {
        return $this->safe;
    }

    /**
     * @param mixed $safe
     */
    public function setSafe($safe)
    {
        $this->safe = $safe;
    }

    /**
     * @return mixed
     */
    public function getMinibar()
    {
        return $this->minibar;
    }

    /**
     * @param mixed $minibar
     */
    public function setMinibar($minibar)
    {
        $this->minibar = $minibar;
    }

    /**
     * @return mixed
     */
    public function getSlippers()
    {
        return $this->slippers;
    }

    /**
     * @param mixed $slippers
     */
    public function setSlippers($slippers)
    {
        $this->slippers = $slippers;
    }

    /**
     * @return mixed
     */
    public function getCoffeeMaker()
    {
        return $this->coffee_maker;
    }

    /**
     * @param mixed $coffee_maker
     */
    public function setCoffeeMaker($coffee_maker)
    {
        $this->coffee_maker = $coffee_maker;
    }

    /**
     * @return mixed
     */
    public function getDailyHousekeeping()
    {
        return $this->daily_housekeeping;
    }

    /**
     * @param mixed $daily_housekeeping
     */
    public function setDailyHousekeeping($daily_housekeeping)
    {
        $this->daily_housekeeping = $daily_housekeeping;
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Room
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Room
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Room
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Room
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set hotel
     *
     * @param \AppBundle\Entity\Hotel $hotel
     *
     * @return Room
     */
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

    /**
     * Add photo
     *
     * @param \AppBundle\Entity\RoomPhotos $photo
     *
     * @return Room
     */
    public function addPhoto(\AppBundle\Entity\RoomPhotos $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \AppBundle\Entity\RoomPhotos $photo
     */
    public function removePhoto(\AppBundle\Entity\RoomPhotos $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Get single photo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSinglePhoto()
    {
        return $this->photos[0];
    }

}
