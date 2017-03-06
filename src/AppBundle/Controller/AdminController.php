<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use AppBundle\Entity\Review;
use AppBundle\Entity\Hotel;
use AppBundle\Entity\HotelTags;
use AppBundle\Entity\RoomPhotos;
use AppBundle\Form\CityForm;
use AppBundle\Form\CountryForm;
use AppBundle\Form\HotelForm;
use AppBundle\Form\HotelTagForm;
use AppBundle\Form\ReviewForm;
use AppBundle\Form\RoomForm;
use AppBundle\Form\RoomPhotosForm;
use AppBundle\Form\TagForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\NavigationForm;
use AppBundle\Entity\City;

use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $navForm = $this->createForm(NavigationForm::class);
        $navForm->handleRequest($request);

        if($navForm->isSubmitted() && $navForm->isValid()) {
            $navigationLink = $navForm->getData();
            $em->persist($navigationLink);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $tagForm = $this->createForm(TagForm::class);
        $tagForm->handleRequest($request);

        if($tagForm->isSubmitted() && $tagForm->isValid()) {
            $tag = $tagForm->getData();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $hoteltag = new HotelTags();

        $hotels = $em->getRepository('AppBundle:Hotel')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();
        $hotelTagForm = $this->createForm(HotelTagForm::class, $hoteltag, array(
            'hotels' => $hotels,
            'tags' => $tags
        ));

        $hotelTagForm->handleRequest($request);

        if($hotelTagForm->isSubmitted() && $hotelTagForm->isValid()) {

            $hotel = $hoteltag->getHotel();
            $tag = $hoteltag->getTag();

            $hoteltag->setHotel($hotel);
            $hoteltag->setTag($tag);

            $em->persist($hoteltag);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $countryForm = $this->createForm(CountryForm::class);
        $countryForm->handleRequest($request);

        if($countryForm->isSubmitted() && $countryForm->isValid()) {
            $country = $countryForm->getData();

            $em->persist($country);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $roomPhoto = new RoomPhotos();

        $hotels = $em->getRepository('AppBundle:Hotel')->findAll();
        $roomPhotoForm = $this->createForm(RoomPhotosForm::class, $roomPhoto, array(
            'hotels' => $hotels,
        ));


        $city = new City();

        $countries = $em->getRepository('AppBundle:Country')->findAll();
        $cityForm = $this->createForm(CityForm::class, $city, array(
            'trait_choices' => $countries,
        ));

        $cityForm->handleRequest($request);

        if($cityForm->isSubmitted() && $cityForm->isValid()) {

            $name = $city->getName();
            $country = $city->getCountry();
            $photo = $city->getPhoto();
            $fileName = $photo->getClientOriginalName();

            $photo->move(
                $this->getParameter('city_directory'),
                $fileName
            );

            $path = $this->getParameter('city_directory')."/".$fileName;
            $path2 = $this->getParameter('city_directory')."/";

            $this->get('helper.imageresizer')->resizeImage($path, $path2 , $height=600, $width=900);

            $fileName = "images/uploads/cities/".$fileName;

            $city->setPhoto($fileName);
            $city->setCountry($country);
            $city->setName($name);

            $em->persist($city);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $hotel = new Hotel();
        $cities = $em->getRepository('AppBundle:City')->findAll();
        $hotelForm = $this->createForm(HotelForm::class, $hotel, array(
            'cities' => $cities,
        ));

        $hotelForm->handleRequest($request);

        if($hotelForm->isSubmitted() && $hotelForm->isValid()) {
            $name = $hotel->getName();
            $photo = $hotel->getPhoto();
            $stars = $hotel->getStars();
            $description = $hotel->getDescription();
            $coordinates = $hotel->getCoordinates();
            $tennis_court = $hotel->getTennisCourt();
            $library = $hotel->getLibrary();
            $wifi = $hotel->getWifi();
            $bar = $hotel->getBar();
            $luggage_store = $hotel->getLuggageStore();
            $concierge_service = $hotel->getConciergeServices();
            $smoke_free_property = $hotel->getSmokeFreeProperty();
            $laundry_service = $hotel->getLaundryService();
            $elevator = $hotel->getElevator();
            $garden = $hotel->getGarden();
            $sauna = $hotel->getSauna();
            $massage = $hotel->getMassage();
            $free_parking = $hotel->getFreeParking();
            $fitness_centre = $hotel->getFitnessCentre();
            $city = $hotel->getCity();
            $conference_space = $hotel->getConferenceSpace();
            $terrace = $hotel->getTerrace();
            $restaurant = $hotel->getRestaurant();
            $indoor_pool = $hotel->getIndoorPool();
            $spa = $hotel->getSpa();
            $hair_salon = $hotel->getHairSalon();
            $shop = $hotel->getShop();
            $wedding_service = $hotel->getWeddingService();

            $ext = $photo->getClientOriginalExtension();
            $timestamp = time();
            $newName = $name.$timestamp.".".$ext;

            $photo->move(
                $this->getParameter('hotel_directory'),
                $newName
            );

            $path = $this->getParameter('hotel_directory')."/".$newName;
            $path2 = $this->getParameter('hotel_directory')."/";
            $fileName = "images/uploads/hotels/".$newName;
            $this->get('helper.imageresizer')->resizeImage($path, $path2 , $height=600, $width=900);



            $hotel->setConferenceSpace($conference_space);
            $hotel->setTerrace($terrace);
            $hotel->setRestaurant($restaurant);
            $hotel->setIndoorPool($indoor_pool);
            $hotel->setSpa($spa);
            $hotel->setHairSalon($hair_salon);
            $hotel->setShop($shop);
            $hotel->setWeddingService($wedding_service);
            $hotel->setPhoto($fileName);
            $hotel->setName($name);
            $hotel->setDescription($description);
            $hotel->setBar($bar);
            $hotel->setCity($city);
            $hotel->setConciergeServices($concierge_service);
            $hotel->setCoordinates($coordinates);
            $hotel->setElevator($elevator);
            $hotel->setFreeParking($free_parking);
            $hotel->setGarden($garden);
            $hotel->setStars($stars);
            $hotel->setTennisCourt($tennis_court);
            $hotel->setLibrary($library);
            $hotel->setWifi($wifi);
            $hotel->setLuggageStore($luggage_store);
            $hotel->setSmokeFreeProperty($smoke_free_property);
            $hotel->setLaundryService($laundry_service);
            $hotel->setSauna($sauna);
            $hotel->setMassage($massage);
            $hotel->setFitnessCentre($fitness_centre);

            $em->persist($hotel);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $room = new Room();
        $hotels = $em->getRepository('AppBundle:Hotel')->findAll();
        $roomForm = $this->createForm(RoomForm::class, $room, array(
            'hotels' => $hotels,
        ));

        $roomForm->handleRequest($request);

        if($roomForm->isSubmitted() && $roomForm->isValid()) {
            $name = $room->getName();
            $size = $room->getSize();
            $description = $room->getDescription();
            $price = $room->getPrice();
            $air_conditioning = $room->getAirConditioning();
            $coffee_maker = $room->getCoffeeMaker();
            $daily_housekeeping = $room->getDailyHousekeeping();
            $desk = $room->getDesk();
            $heating = $room->getHeating();
            $hotel = $room->getHotel();
            $internet = $room->getInternet();
            $minibar = $room->getMinibar();
            $premium_bedding = $room->getPremiumBedding();
            $safe = $room->getSafe();
            $satelite_channels = $room->getSateliteChannels();
            $shower = $room->getShower();
            $slippers = $room->getSlippers();
            $rainfall_showerhead = $room->getRainfallShowerhead();
            $room_service = $room->getRoomService();
            $telephone = $room->getTelephone();
            $tv = $room->getTv();

            $room->setSize($size);
            $room->setPrice($price);
            $room->setAirConditioning($air_conditioning);
            $room->setCoffeeMaker($coffee_maker);
            $room->setDailyHousekeeping($daily_housekeeping);
            $room->setDesk($desk);
            $room->setHeating($heating);
            $room->setHotel($hotel);
            $room->setName($name);
            $room->setDescription($description);
            $room->setInternet($internet);
            $room->setMinibar($minibar);
            $room->setPremiumBedding($premium_bedding);
            $room->setSafe($safe);
            $room->setSateliteChannels($satelite_channels);
            $room->setShower($shower);
            $room->setSlippers($slippers);
            $room->setRainfallShowerhead($rainfall_showerhead);
            $room->setRoomService($room_service);
            $room->setTelephone($telephone);
            $room->setTv($tv);

            $em->persist($room);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        $review = new Review();
        $hotels = $em->getRepository('AppBundle:Hotel')->findAll();
        $reviewForm = $this->createForm(ReviewForm::class, $review, array(
            'trait_choices' => $hotels,
        ));

        $reviewForm->handleRequest($request);

        if($reviewForm->isSubmitted() && $reviewForm->isValid()) {

            $positive = $review->getPositive();
            $negative = $review->getNegative();
            $clean = $review->getClean();
            $comfort = $review->getComfort();
            $location = $review->getLocation();
            $staff = $review->getStaff();
            $services = $review->getServices();
            $value_for_money = $review->getValueForMoney();
            $hotel = $review->getHotel();
            $date = (new \DateTime());

            $review->setPositive($positive);
            $review->setNegative($negative);
            $review->setClean($clean);
            $review->setComfort($comfort);
            $review->setLocation($location);
            $review->setStaff($staff);
            $review->setServices($services);
            $review->setValueForMoney($value_for_money);
            $review->setHotel($hotel);
            $review->setDate($date);

            $em->persist($review);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/index.html.twig', array(
            'navForm' => $navForm->createView(),
            'countryForm' => $countryForm->createView(),
            'cityForm' => $cityForm->createView(),
            'hotelForm' => $hotelForm->createView(),
            'tagForm' => $tagForm->createView(),
            'reviewForm' => $reviewForm->createView(),
            'hotelTagForm' => $hotelTagForm->createView(),
            'roomForm' => $roomForm->createView(),
            'roomPhotoForm' => $roomPhotoForm->createView(),
            'links' => $links
        ));
    }

}
