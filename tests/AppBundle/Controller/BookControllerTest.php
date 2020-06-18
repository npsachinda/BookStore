<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BookControllerTest extends WebTestCase
{
    public function testBook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/book/10');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
    }

    public function testUpdateCart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/book/10');

        $form = $crawler->selectButton('submit')->form();

// set some values
        $form['book_id'] = 10;
        $form['book_name'] = 'Senkottan';
        $form['book_category'] = 'Fiction';
        $form['unit_price'] = '450.00';
        $form['book_quantity'] = 2;

// submit the form
        $crawler = $client->submit($form);



       
    }

    public function testViewCart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/viewCart');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
    }

    public function testDeleteCartItem()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteCartItem/2');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
    }

    public function testClearCart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/clearCart');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
    }

    public function testCheckout()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/checkout');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
    }

    public function testValidate_coupon()
    {
        $expected = "<html>valid</html>";
        $test_request = array(1); // parameters to test
        $actual = $controller->buildPage($test_request);
        
        $this->assertEquals($expected, $actual);
       
    }

    public function testCheckout_with_coupon()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/book/checkout_with_coupon/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
    }
}
