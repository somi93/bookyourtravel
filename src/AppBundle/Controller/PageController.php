<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Room;

class PageController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $links = $em->getRepository('AppBundle:Navigation')->findAll();
        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;

        $cityRepository = $this->getDoctrine()->getRepository('AppBundle:City');
        $cityQuery = $cityRepository->createQueryBuilder('c')->orderBy('c.name', 'ASC')->setMaxResults(12)->getQuery();
        $cities = $cityQuery->getResult();
        shuffle($cities);

        return $this->render('default/index.html.twig', array(
            'links' => $links,
            'cities' => $cities,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * @Route("/location/{city}", name="location")
     */
    public function locationAction($city)
    {

        $em = $this->getDoctrine()->getManager();
        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $cityObj = $this->getDoctrine()
            ->getRepository('AppBundle:City')
            ->findOneBy(array('name' => "$city"));

        $country = $cityObj->getCountry();
        $hotels = $cityObj->getHotels();

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;


        return $this->render('default/location.html.twig', array(
            'links' => $links,
            'city' => $cityObj,
            'country' => $country,
            'hotels' => $hotels,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * @Route("/hotel/{name}", name="hotel")
     */
    public function hotelAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $hotelObj = $this->getDoctrine()
            ->getRepository('AppBundle:Hotel')
            ->findOneBy(array('name' => "$name"));

        $rooms = $hotelObj->getRooms();
        $tags = $hotelObj->getTags();
        $reviews = $hotelObj->getReviews();
        $rating = $hotelObj->getRating();

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;


        return $this->render('default/hotel.html.twig', array(
            'links' => $links,
            'hotel' => $hotelObj,
            'rooms' => $rooms,
            'hoteltags' => $tags,
            'reviews' => $reviews,
            'rating' => $rating,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        isset($_REQUEST['destination'])?$city_name=$_REQUEST['destination']:$city_name="";
        $repository = $this->getDoctrine()->getRepository('AppBundle:Hotel');
        $qb = $repository->createQueryBuilder('h');
        $qb->join('h.city', 'c');
        $qb->add('where', $qb->expr()->orX(
            $qb->expr()->like('c.name', "'%$city_name%'")
        ));
        $query = $qb->getQuery();
        $hotels = $query->getResult();
        $em = $this->getDoctrine()->getManager();
        $links = $em->getRepository('AppBundle:Navigation')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();
        $per_page = 6;
        $totalResults = count($hotels);
        $number_of_links = ceil($totalResults/$per_page);

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;


        for($i=0; $i<$totalResults; $i++){
            if($i>=$per_page){
                unset($hotels[$i]);
            }
        }


        return $this->render('default/search.html.twig', array(
            'links' => $links,
            'tags' => $tags,
            'hotels' => $hotels,
            'number_of_links' => $number_of_links,
            'city_name' => $city_name,
            'total_results' => $totalResults,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * @Route("/room/{id}", name="room")
     */
    public function roomAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $roomObj = $this->getDoctrine()->getRepository('AppBundle:Room')->find($id);
        $photos = $roomObj->getPhotos();

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;


        return $this->render('default/room.html.twig', array(
            'links' => $links,
            'photos' => $photos,
            'room' => $roomObj,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * @Route("/car_rental", name="car_rental")
     */
    public function carRentalAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/hot_deals", name="hot_deals")
     */
    public function hotDealsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

}
