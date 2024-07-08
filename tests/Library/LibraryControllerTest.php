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

        $this->assertCount(1, $crawler->filter('h1'));
        $this->assertStringContainsString('LibraryController', $crawler->filter('h1')->text());
    }

    public function testLandingPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/landing-page');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'Bibliotek');

        $this->assertCount(1, $crawler->filter('h1'));
        $this->assertStringContainsString('Bibliotek', $crawler->filter('h1')->text());
    }

    public function testAddBookPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/addBook');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'Lägg till en bok');

        $this->assertCount(1, $crawler->filter('h1'));
        $this->assertStringContainsString('Lägg till en bok', $crawler->filter('h1')->text());
    }

    public function testShowAllBooksPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/showHtml');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'Alla Böcker');

        $this->assertCount(1, $crawler->filter('h1'));
        $this->assertStringContainsString('Alla Böcker', $crawler->filter('h1')->text());
    }

    public function testShowBookDetailsPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/detailsOfBook/The Lord of the Rings');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'The Lord of the Rings');

        $this->assertCount(1, $crawler->filter('h1'));
        $this->assertStringContainsString('The Lord of the Rings', $crawler->filter('h1')->text());
    }

    public function testCreateBookFailPage()
    {
        $client = static::createClient();

        $client->request('POST', '/library/create');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('h1', 'Error');

        $this->assertSelectorTextContains('p', 'Det saknas information');
    }

    public function testSearchFailPage()
    {
        $client = static::createClient();

        $client->request('POST', '/library/search');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('p', 'Det saknas information');
    }

    public function testSearchSuccessPage()
    {
        $client = static::createClient();

        $searchIt = 'Rings';

        $crawler = $client->request('POST', '/library/search', ['search' => $searchIt]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('h1', 'Resultat');

        $this->assertStringContainsString('The Lord of the Rings', $client->getResponse()->getContent());
    }

    public function testEditPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/library/edit/6');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'Redigera bok-Id: 6');

        $this->assertCount(4, $crawler->filter('label'));
        $this->assertStringContainsString('Titel:', $crawler->filter('label[for="title"]')->text());
    }

    public function testEditPageFailPage()
    {
        $client = static::createClient();

        $client->request('GET', '/library/edit/1000');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('p', 'Ingen bok hittades för id');
    }

    public function testLibraryDeleteFailPage()
    {
        $client = static::createClient();

        $client->request('GET', '/library/delete/1000');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('p', 'Ingen bok hittades för id');
    }
}