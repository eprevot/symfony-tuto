<?php
namespace EP\TournamentBundle\Tests\Entity;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class ClubRepositoryTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function setUp()
    {
        $this->loadTestData();
    }

    public function testFindParisians()
    {
        $repo = $this->getEntityManager()->getRepository('EPTournamentBundle:Club');
        $clubs = $repo->findParisians();

        $this->assertEquals(2, count($clubs));
        $this->assertEquals('TC13', $clubs[0]->getName());
        $this->assertEquals('TC12', $clubs[1]->getName());
    }

    public function testGetTournaments()
    {
        $repo = $this->getEntityManager()->getRepository('EPTournamentBundle:Club');
        $club = $repo->findById(1);
        $tournaments = $repo->findTournaments($club);

        $this->assertEquals(2, count($tournaments));
        $this->assertEquals('Mister Anderson', $tournaments[0]->getJa());
        $this->assertEquals('Agent Smith', $tournaments[1]->getJa());
    }

    private function loadTestData()
    {
        $classes = array(
            'EP\TournamentBundle\DataFixtures\ORM\LoadClubData',
            'EP\TournamentBundle\DataFixtures\ORM\LoadTournamentData',
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
