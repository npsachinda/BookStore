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
                        'book_category'         =>     $request->get("book_category"),   
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
                      'book_category'         =>     $request->get("book_category"),  
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

       /**
     * Matches /viewCart exactly
     *
     * @Route("/viewCart", name="viewCart")
     */
    public function viewCartAction(Request $request)
    {
        if(!empty($this->session->get('shopping_cart'))){

        $shopping_cart=$this->session->get('shopping_cart');
        return $this->render('default/view_cart.html.twig',array('shopping_cart' => $shopping_cart));
        }
        else{
            return new Response('There is No items on your cart');

        }

    }

    /**
     * @Route("/deleteCartItem/{id}", name="deleteCartItem", requirements={"id"="\d+"})
     */
    public function deleteCartItemAction(int $id)
    {

        if(!empty($this->session->get('shopping_cart'))){

            $shopping_cart=$this->session->get('shopping_cart');
            foreach($shopping_cart as $keys => $values)  
            {  
                 if($values["book_id"] == $id)  
                 {  
                      unset($shopping_cart[$keys]); 
                      $this->session->set('shopping_cart', $shopping_cart);
                      
                      $this->session->set('inCart', count($shopping_cart));
                      $total = 0;  
                      foreach($shopping_cart as $keys => $values)  
                      {  
                          $total = $total + ($values["book_quantity"] * $values["unit_price"]);  
                      }
                      $this->session->set('totalAmount', number_format($total,2));
                 }  
            }

        $shopping_cart=$this->session->get('shopping_cart');
        return $this->render('default/view_cart.html.twig',array('shopping_cart' => $shopping_cart));
        }


    }

       /**
     * Matches /clearCart exactly
     *
     * @Route("/clearCart", name="clearCart")
     */
    public function clearCarttAction(Request $request)
    {
            $session = $request->getSession();
            $session->invalidate(); // destroy session
            return $this->redirectToRoute('homepage'); 
    }

           /**
     * Matches /checkout exactly
     *
     * @Route("/checkout", name="checkout")
     */
    public function checkoutAction(Request $request)
    {
        if(!empty($this->session->get('shopping_cart'))){

            $shopping_cart=$this->session->get('shopping_cart');

            $total_books=0;
            $total_children_books = 0;
            $total_fiction_books = 0;

            $total_amount=0;
            $total_children_book_amount = 0;

            foreach($shopping_cart as $keys => $values)  
            {  
                if($values["book_category"]=='Children'){
                $total_children_books = $total_children_books + $values["book_quantity"]; 
                $total_children_book_amount = $total_children_book_amount +($values["unit_price"]*$values["book_quantity"]); 
                }

                if($values["book_category"]=='Fiction'){
                    $total_fiction_books = $total_fiction_books + $values["book_quantity"];  
                    }
                $total_books = $total_books + $values["book_quantity"];
                $total_amount = $total_amount +($values["unit_price"]*$values["book_quantity"]);
            }

            $discount_on_children_book=0;
            $discount_on_book_count=0;

            if($total_children_books>4){    

            $discount_on_children_book =  $total_children_book_amount*0.1; // 5 or more children books get 10% discount

            if($total_children_books>9 && $total_fiction_books>9){
            
            $discount_on_book_count = $total_amount*0.05; // 10 books from each category get 5% additional discount

            }

            }

            return $this->render('default/checkout.html.twig',array('shopping_cart' => $shopping_cart,'discount_on_children_book' => $discount_on_children_book,'discount_on_book_count' => $discount_on_book_count));
            }
            else{
                return new Response('There is No items on your cart');
    
            }
    }


}
