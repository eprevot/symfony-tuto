<?php

namespace EP\TournamentBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tournament/Paris');

        $this->assertTrue($crawler->filter('html:contains("Tournaments")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Paris")')->count() > 0);
    }
}
