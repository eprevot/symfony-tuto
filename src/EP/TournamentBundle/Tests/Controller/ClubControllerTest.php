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
        //here if there is something to do before each test
    }

    public function testShowOK()
    {
        $this->loadTestData();

        $client = static::createClient();
        $crawler = $client->request('GET', '/club/1');

        $this->assertTrue($crawler->filter('html:contains("TC13")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Hautes Formes")')->count() > 0);
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

        $repo = $this->getEntityManager()->getRepository('EPTournamentBundle:Club');
        $club = $repo->findOneByName('TCP');

        $this->assertEquals('456qsd', $club->getFftId());
    }

    public function testAddKO()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/club?name=blabla');

        $repo = $this->getEntityManager()->getRepository('EPTournamentBundle:Club');
        $club = $repo->findOneByName('blabla');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertNull($club);
    }

    private function loadTestData()
    {
        $classes = array(
            'EP\TournamentBundle\DataFixtures\ORM\LoadClubData',
        );
        $this->loadFixtures($classes);
    }

    private function getEntityManager()
    {
        if(!isset($this->em)) {
            static::$kernel = static::createKernel();
            static::$kernel->boot();
            $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        }
        return $this->em;
    }
}
