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
