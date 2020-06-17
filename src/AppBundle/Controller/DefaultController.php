<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


use AppBundle\Entity\Book;

class DefaultController extends Controller
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        ini_set('memory_limit','1000M');

        $book = $this->getDoctrine()
                      ->getRepository(Book::class);
                        
        $book_children = $book->findBy(['category' => 1]);
        $book_fiction = $book->findBy(['category' => 2]);

        $cat_name = $book->findOneBy(['category' => 1]);
        $categoryName = $cat_name->getCategory()->getName();


    //return new Response('Check out this great product: '.$book->getName());
   // $session = $request->getSession();
  //  $session->invalidate();
if(!empty($this->session->get('shopping_cart'))){
    $this->session->set('inCart', count($this->session->get('shopping_cart')));
    $total = 0;  
    foreach($this->session->get('shopping_cart') as $keys => $values)  
    {  
        $total = $total + ($values["book_quantity"] * $values["unit_price"]);  
    }
    $this->session->set('totalAmount', number_format($total,2));
}


    // in the template, print things with {{ product.name }}
    return $this->render('default/index.html.twig', array('book_children' => $book_children,'book_fiction' => $book_fiction)); 
  // die(print_r($this->session->get('shopping_cart')));
    }



}
