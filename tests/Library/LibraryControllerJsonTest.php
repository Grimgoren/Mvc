<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for class LibraryControllerJsonTest.
 */
class LibraryControllerJsonTest extends WebTestCase
{
    public function testShowAllLibraryItemsJson()
    {
        $client = static::createClient();

        $client->request('GET', '/api/library/books');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $data[0]);
        $this->assertArrayHasKey('title', $data[1]);
        $this->assertEquals('The Two Towers', $data[0]['title']);
    }

    public function testShowLibraryItemByIdJson()
    {
        $client = static::createClient();

        $client->request('GET', '/library/show/21');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('title', $data);
        $this->assertEquals('The Lord of the Rings', $data['title']);
    }

    public function testShowLibraryItemByISBNJson()
    {
        $client = static::createClient();

        $client->request('GET', 'api/library/book/9780007105002');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('title', $data);
        $this->assertEquals('The Two Towers', $data['title']);
    }
}