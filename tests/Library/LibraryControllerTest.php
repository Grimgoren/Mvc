<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for class LibraryController.
 */
class LibraryControllerTest extends WebTestCase
{
    public function testIndexPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('h1', 'LibraryController');
    }

    public function testLandingPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/landing-page');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('h1', 'Bibliotek');
    }

    public function testAddBookPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/addBook');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('h1', 'Lägg till en bok');
    }

    public function testShowAllBooksPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/showHtml');

        // Print response content for debugging
        echo $client->getResponse()->getContent();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('h1', 'Alla Böcker');
    }
}

