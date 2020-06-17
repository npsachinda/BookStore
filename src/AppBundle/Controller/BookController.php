<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use AppBundle\Entity\Book;


class BookController extends Controller
{

    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/book/{id}", name="default_book", requirements={"id"="\d+"})
     */
    public function bookAction(int $id)
    {
        ini_set('memory_limit','1000M');

        $book = $this->getDoctrine()
        ->getRepository(Book::class)
        ->find($id);

    if (!$book) {
        throw $this->createNotFoundException(
            'No Book found for id '.$id
        );
    }

    $categoryName = $book->getCategory()->getName();

    //return new Response('Check out this great product: '.$book->getName());

    // in the template, print things with {{ product.name }}
     return $this->render('default/book_info.html.twig', array('book' => $book,'categoryName' => $categoryName));
        
    }

   /**
     * Matches /updateCart exactly
     *
     * @Route("/updateCart", name="updateCart")
     */
    public function updateCartAction(Request $request)
    {

        if ($request->getMethod() == 'POST') {

          //  $this->session->set('book_id', $request->get("book"));

            // gets an attribute by name
            $shopping_cart = $this->session->get('shopping_cart','not_set');

            if(is_array($shopping_cart)==1) // if shopping cart set
            {  
                 $item_array_id = array_column($shopping_cart, "book_id");  
                 if(!in_array($request->get("book_id"), $item_array_id))  
                 {  
                      $count = count($shopping_cart);  
                      $item_array = array(  
                        'book_id'               =>     $request->get("book_id"),  
                        'book_name'             =>     $request->get("book_name"),  
                        'unit_price'            =>     $request->get("unit_price"),  
                        'book_quantity'         =>     $request->get("book_quantity")  
                   ); 
                      $shopping_cart[$count] = $item_array;
                      $this->session->set('shopping_cart', $shopping_cart);
                      return $this->redirectToRoute('homepage');  
                 }  
                 else  
                 {  
                    echo '<script>alert("Item Already Added")</script>';  
                    return $this->redirectToRoute('homepage');  
                 }  
            }  
            else  // if shopping cart not set(first item add)
            {  
                 $item_array = array(  
                      'book_id'               =>     $request->get("book_id"),  
                      'book_name'             =>     $request->get("book_name"),  
                      'unit_price'            =>     $request->get("unit_price"),  
                      'book_quantity'         =>     $request->get("book_quantity")  
                 );  
                 $shopping_cart=array();
                 $shopping_cart[0] = $item_array;
                 $this->session->set('shopping_cart', $shopping_cart);
                 return $this->redirectToRoute('homepage');  
            }

        }



    }



}
