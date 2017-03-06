<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="hotel")
 */

class Hotel
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
     * @ORM\Column(type="string")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $stars;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $coordinates;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tennis_court;

    /**
     * @ORM\Column(type="boolean")
     */
    private $library;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bar;

    /**
     * @ORM\Column(type="boolean")
     */
    private $luggage_store;

    /**
     * @ORM\Column(type="boolean")
     */
    private $concierge_services ;

    /**
     * @ORM\Column(type="boolean")
     */
    private $smoke_free_property;

    /**
     * @ORM\Column(type="boolean")
     */
    private $laundry_service;

    /**
     * @ORM\Column(type="boolean")
     */
    private $elevator;

    /**
     * @ORM\Column(type="boolean")
     */
    private $garden;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sauna;

    /**
     * @ORM\Column(type="boolean")
     */
    private $massage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $free_parking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fitness_centre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $conference_space ;

    /**
     * @ORM\Column(type="boolean")
     */
    private $terrace;

    /**
     * @ORM\Column(type="boolean")
     */
    private $restaurant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $indoor_pool;

    /**
     * @ORM\Column(type="boolean")
     */
    private $spa;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hair_salon;

    /**
     * @ORM\Column(type="boolean")
     */
    private $shop;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wedding_service;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="hotel")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="Room", mappedBy="hotel")
     */
    private $rooms;

    /**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="hotel")
     */
    private $reviews;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;

    /**
     * @return mixed
     */
    public function getSauna()
    {
        return $this->sauna;
    }

    /**
     * @param mixed $sauna
     */
    public function setSauna($sauna)
    {
        $this->sauna = $sauna;
    }

    /**
     * @return mixed
     */
    public function getConferenceSpace()
    {
        return $this->conference_space;
    }

    /**
     * @param mixed $conference_space
     */
    public function setConferenceSpace($conference_space)
    {
        $this->conference_space = $conference_space;
    }

    /**
     * @return mixed
     */
    public function getTerrace()
    {
        return $this->terrace;
    }

    /**
     * @param mixed $terrace
     */
    public function setTerrace($terrace)
    {
        $this->terrace = $terrace;
    }

    /**
     * @return mixed
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * @param mixed $restaurant
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * @return mixed
     */
    public function getIndoorPool()
    {
        return $this->indoor_pool;
    }

    /**
     * @param mixed $indoor_pool
     */
    public function setIndoorPool($indoor_pool)
    {
        $this->indoor_pool = $indoor_pool;
    }

    /**
     * @return mixed
     */
    public function getSpa()
    {
        return $this->spa;
    }

    /**
     * @param mixed $spa
     */
    public function setSpa($spa)
    {
        $this->spa = $spa;
    }

    /**
     * @return mixed
     */
    public function getHairSalon()
    {
        return $this->hair_salon;
    }

    /**
     * @param mixed $hair_salon
     */
    public function setHairSalon($hair_salon)
    {
        $this->hair_salon = $hair_salon;
    }

    /**
     * @return mixed
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @param mixed $shop
     */
    public function setShop($shop)
    {
        $this->shop = $shop;
    }

    /**
     * @return mixed
     */
    public function getWeddingService()
    {
        return $this->wedding_service;
    }

    /**
     * @param mixed $wedding_service
     */
    public function setWeddingService($wedding_service)
    {
        $this->wedding_service = $wedding_service;
    }


    /**
     * @return mixed
     */
    public function getMassage()
    {
        return $this->massage;
    }

    /**
     * @param mixed $massage
     */
    public function setMassage($massage)
    {
        $this->massage = $massage;
    }

    /**
     * @return mixed
     */
    public function getFreeParking()
    {
        return $this->free_parking;
    }

    /**
     * @param mixed $free_parking
     */
    public function setFreeParking($free_parking)
    {
        $this->free_parking = $free_parking;
    }

    /**
     * @return mixed
     */
    public function getFitnessCentre()
    {
        return $this->fitness_centre;
    }

    /**
     * @param mixed $fitness_centre
     */
    public function setFitnessCentre($fitness_centre)
    {
        $this->fitness_centre = $fitness_centre;
    }

    /**
     * @return mixed
     */
    public function getTennisCourt()
    {
        return $this->tennis_court;
    }

    /**
     * @param mixed $tennis_court
     */
    public function setTennisCourt($tennis_court)
    {
        $this->tennis_court = $tennis_court;
    }

    /**
     * @return mixed
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * @param mixed $library
     */
    public function setLibrary($library)
    {
        $this->library = $library;
    }

    /**
     * @return mixed
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * @param mixed $wifi
     */
    public function setWifi($wifi)
    {
        $this->wifi = $wifi;
    }

    /**
     * @return mixed
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * @param mixed $bar
     */
    public function setBar($bar)
    {
        $this->bar = $bar;
    }

    /**
     * @return mixed
     */
    public function getLuggageStore()
    {
        return $this->luggage_store;
    }

    /**
     * @param mixed $luggage_store
     */
    public function setLuggageStore($luggage_store)
    {
        $this->luggage_store = $luggage_store;
    }

    /**
     * @return mixed
     */
    public function getConciergeServices()
    {
        return $this->concierge_services;
    }

    /**
     * @param mixed $concierge_services
     */
    public function setConciergeServices($concierge_services)
    {
        $this->concierge_services = $concierge_services;
    }

    /**
     * @return mixed
     */
    public function getSmokeFreeProperty()
    {
        return $this->smoke_free_property;
    }

    /**
     * @param mixed $smoke_free_property
     */
    public function setSmokeFreeProperty($smoke_free_property)
    {
        $this->smoke_free_property = $smoke_free_property;
    }

    /**
     * @return mixed
     */
    public function getLaundryService()
    {
        return $this->laundry_service;
    }

    /**
     * @param mixed $laundry_service
     */
    public function setLaundryService($laundry_service)
    {
        $this->laundry_service = $laundry_service;
    }

    /**
     * @return mixed
     */
    public function getElevator()
    {
        return $this->elevator;
    }

    /**
     * @param mixed $elevator
     */
    public function setElevator($elevator)
    {
        $this->elevator = $elevator;
    }

    /**
     * @return mixed
     */
    public function getGarden()
    {
        return $this->garden;
    }

    /**
     * @param mixed $garden
     */
    public function setGarden($garden)
    {
        $this->garden = $garden;
    }


    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param mixed $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }


    /**
     * @return mixed
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * @param mixed $stars
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }




    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Hotel
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rooms = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * Add room
     *
     * @param \AppBundle\Entity\room $room
     *
     * @return Hotel
     */
    public function addRoom(\AppBundle\Entity\room $room)
    {
        $this->rooms[] = $room;

        return $this;
    }

    /**
     * Remove room
     *
     * @param \AppBundle\Entity\room $room
     */
    public function removeRoom(\AppBundle\Entity\room $room)
    {
        $this->rooms->removeElement($room);
    }

    /**
     * Get rooms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add review
     *
     * @param \AppBundle\Entity\Review $review
     *
     * @return Hotel
     */
    public function addReview(\AppBundle\Entity\Review $review)
    {
        $this->reviews[] = $review;

        return $this;
    }

    /**
     * Remove review
     *
     * @param \AppBundle\Entity\Review $review
     */
    public function removeReview(\AppBundle\Entity\Review $review)
    {
        $this->reviews->removeElement($review);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRating()
    {
        $cleanRating = 0;
        $comfortRating = 0;
        $locationRating = 0;
        $staffRating = 0;
        $servicesRating = 0;
        $valueRating = 0;
        $totalReviews = count($this->reviews);
        $overalRating = "";
        for($i=0; $i<$totalReviews; $i++){
            $cleanRating += $this->reviews[$i]->getClean();
            $comfortRating += $this->reviews[$i]->getComfort();
            $locationRating += $this->reviews[$i]->getLocation();
            $staffRating += $this->reviews[$i]->getStaff();
            $servicesRating += $this->reviews[$i]->getServices();
            $valueRating += $this->reviews[$i]->getValueForMoney();
        }
        if($totalReviews>0){
            $cleanRating = round($cleanRating/$totalReviews, 1);
            $comfortRating = round($comfortRating/$totalReviews, 1);
            $locationRating = round($locationRating/$totalReviews, 1);
            $staffRating = round($staffRating/$totalReviews, 1);
            $servicesRating = round($servicesRating/$totalReviews, 1);
            $valueRating = round($valueRating/$totalReviews, 1);
            $overalRating = $cleanRating+$comfortRating+$locationRating+$staffRating+$servicesRating+$valueRating;
            $overalRating = round($overalRating/6, 1);

        }
        $ratings = array("cleanRating" => $cleanRating, "comfortRating" => $comfortRating, "locationRating" => $locationRating,
                         "staffRating" => $staffRating, "servicesRating" => $servicesRating, "valueRating" => $valueRating,
                         "overalRating" => $overalRating, "total" => $totalReviews);

        return $ratings;
    }


    /**
     * Get lowest price
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLowestPrice()
    {
        $min="";
        if(count($this->rooms)>0){
            $min = $this->rooms[0]->getPrice();
            foreach ($this->rooms as $room){
                if($room->getPrice() < $min){
                    $min = $room->getPrice();
                }
            }
        }
        return $min;
    }
}
