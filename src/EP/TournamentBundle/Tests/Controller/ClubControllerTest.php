<?php

namespace EP\TournamentBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class ClubControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $classes = array(
            'EP\TournamentBundle\DataFixtures\ORM\LoadClubData',
        );
        $this->loadFixtures($classes);
        error_log("setup");
    }

    public function testShowOK()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/club/1');

        $this->assertTrue($crawler->filter('html:contains("TC13")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Baudricourt")')->count() > 0);
    }

    public function testShow404()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/club/toto');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testAddOK()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/club?name=TCP&address=15 Avenue Félix d\'Hérelle&zipcode=75016&city=Paris&fftcode=456qsd');

        $repo = $this->em->getRepository('EPTournamentBundle:Club');
        $club = $repo->findOneByName('TCP');

        $this->assertEquals('456qsd', $club->getFftId());
    }

    public function testAddKO()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/club?name=blabla');

        $repo = $this->em->getRepository('EPTournamentBundle:Club');
        $club = $repo->findOneByName('blabla');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertNull($club);
    }
}
