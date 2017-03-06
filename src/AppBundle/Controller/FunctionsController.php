<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Country;
use AppBundle\Form\CityForm;
use AppBundle\Form\CountryForm;
use AppBundle\Form\HotelForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\NavigationForm;
use AppBundle\Entity\City;
use AppBundle\Entity\RoomPhotos;
use AppBundle\Entity\Room;
use Symfony\Component\HttpFoundation\Response;

class FunctionsController extends Controller
{


    /**
     * @Route("/searchRooms", name="searchRooms")
     */
    public function searchRooms(Request $request)
    {
        $hotel = $_REQUEST['option'];

        $hotels = $this->getDoctrine() ->getRepository('AppBundle:Hotel')->find($hotel);

        $rooms = $hotels->getRooms();

        return $this->render('admin/getRooms.html.twig', array(
            'rooms' => $rooms
        ));
    }

    /**
     * @Route("/searchResult", name="searchResult")
     */
    public function searchResult(Request $request)
    {

        $city_name = $_REQUEST['city'];
        $star = $_REQUEST['star'];
        $tennis_court = $_REQUEST['tennis_court'];
        $wifi = $_REQUEST['wifi'];
        $library = $_REQUEST['library'];
        $bar = $_REQUEST['bar'];
        $luggage_store = $_REQUEST['luggage_store'];
        $concierge_services = $_REQUEST['concierge_services'];
        $smoke_free_property = $_REQUEST['smoke_free_property'];
        $laundry_service = $_REQUEST['laundry_service'];
        $elevator = $_REQUEST['elevator'];
        $garden = $_REQUEST['garden'];
        $sauna = $_REQUEST['sauna'];
        $massage = $_REQUEST['massage'];
        $free_parking = $_REQUEST['free_parking'];
        $fitness_centre = $_REQUEST['fitness_centre'];
        $conference_space = $_REQUEST['conference_space'];
        $terrace = $_REQUEST['terrace'];
        $restaurant = $_REQUEST['restaurant'];
        $indoor_pool = $_REQUEST['indoor_pool'];
        $spa = $_REQUEST['spa'];
        $hair_salon = $_REQUEST['hair_salon'];
        $shop = $_REQUEST['shop'];
        $wedding_service = $_REQUEST['wedding_service'];
        $min_avg_temperature = $_REQUEST['min_avg_temperature'];
        $max_avg_temperature = $_REQUEST['max_avg_temperature'];
        $column_order = $_REQUEST['column'];
        $order = $_REQUEST['order'];

        $repository = $this->getDoctrine()->getRepository('AppBundle:Hotel');
        $qb = $repository->createQueryBuilder('h');
        $qb->join('h.city', 'c');
        $qb->add('where', $qb->expr()->orX(
            $qb->expr()->like('c.name', "'%$city_name%'")
            ));
        $qb->andWhere("h.stars >= $star");
        if($tennis_court == 'true'){ $qb->andWhere("h.tennis_court = $tennis_court"); }
        if($wifi == 'true'){ $qb->andWhere("h.wifi = $wifi"); }
        if($library == 'true'){ $qb->andWhere("h.library = $library"); }
        if($bar == 'true'){ $qb->andWhere("h.bar = $bar"); }
        if($luggage_store == 'true'){ $qb->andWhere("h.luggage_store = $luggage_store"); }
        if($concierge_services == 'true'){ $qb->andWhere("h.concierge_services = $concierge_services"); }
        if($smoke_free_property == 'true'){ $qb->andWhere("h.smoke_free_property = $smoke_free_property"); }
        if($laundry_service == 'true'){ $qb->andWhere("h.laundry_service = $laundry_service"); }
        if($elevator == 'true'){ $qb->andWhere("h.elevator = $elevator"); }
        if($garden == 'true'){ $qb->andWhere("h.garden = $garden"); }
        if($sauna == 'true'){ $qb->andWhere("h.sauna = $sauna"); }
        if($massage == 'true'){ $qb->andWhere("h.massage = $massage"); }
        if($free_parking == 'true'){ $qb->andWhere("h.free_parking = $free_parking"); }
        if($fitness_centre == 'true'){ $qb->andWhere("h.fitness_centre = $fitness_centre"); }
        if($conference_space == 'true'){ $qb->andWhere("h.conference_space = $conference_space"); }
        if($terrace == 'true'){ $qb->andWhere("h.terrace = $terrace"); }
        if($restaurant == 'true'){ $qb->andWhere("h.restaurant = $restaurant"); }
        if($indoor_pool == 'true'){ $qb->andWhere("h.indoor_pool = $indoor_pool"); }
        if($spa == 'true'){ $qb->andWhere("h.spa = $spa"); }
        if($hair_salon == 'true'){ $qb->andWhere("h.hair_salon = $hair_salon"); }
        if($shop == 'true'){ $qb->andWhere("h.shop = shop"); }
        if($wedding_service == 'true'){ $qb->andWhere("h.wedding_service = $wedding_service"); }
        if($min_avg_temperature){ $qb->andWhere("c.average_temperature >= $min_avg_temperature"); }
        if($max_avg_temperature){ $qb->andWhere("c.average_temperature <= $max_avg_temperature"); }
        $qb->orderBy($column_order, $order);

        $query = $qb->getQuery();
        $hotels = $query->getResult();

        $per_page = 6;
        $current_page = $_REQUEST['page'];
        $offset = $current_page*$per_page-$per_page;
        $limit = $offset+$per_page;
        $totalResults = count($hotels);
        $number_of_links = ceil($totalResults/$per_page);

        for($i=0; $i<$totalResults; $i++){
            if($i<$offset || $i>=$limit){
                unset($hotels[$i]);
            }
        }

        return $this->render('ajax/searchHotel.html.twig', array(
            'hotels' => $hotels,
            'totalResults' => $totalResults,
            'number_of_links' => $number_of_links,
            'current_page' => $current_page
        ));
    }


    /**
     * @Route("/uploadPhotos", name="uploadPhotos")
     */
    public  function uploadPhotos(Request $request){

        $res = $_REQUEST['fls'];
        $room = $_REQUEST['room'];
        $em = $this->getDoctrine()->getManager();
        $roomObj = $em->getRepository('AppBundle:Room')->find($room);

        for($i=0; $i<$res; $i++){
            $roomPhoto = new RoomPhotos();
            $file = $_FILES['file'.$i];
            $fileName = $file['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $roomName = $roomObj->getName();
            $time = time();
            $fileName = $roomName.$i.$time.".".$ext;
            $path = $this->getParameter('room_directory')."/".$fileName;
            if(move_uploaded_file($file['tmp_name'], $path)){

                $path2 = $this->getParameter('room_directory')."/";

                $this->get('helper.imageresizer')->resizeImage($path, $path2 , $height=600, $width=900);

                $fileName = "images/uploads/rooms/".$fileName;

                $roomPhoto->setRoom($roomObj);
                $roomPhoto->setPhoto($fileName);

                $em->persist($roomPhoto);
                $em->flush();
            }
        }

        return new Response("Success");

    }

}
