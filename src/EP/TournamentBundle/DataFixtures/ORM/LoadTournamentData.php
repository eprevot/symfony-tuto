<?php
namespace EP\TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EP\TournamentBundle\Entity\Tournament;

class LoadTournamentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime('2015-06-01'));
        $tournament->setEndDate(new \DateTime('2015-06-22'));
        $tournament->setJa('Mister Anderson');
        $tournament->setClub($manager->merge($this->getReference('club1')));

        $tournament2 = new Tournament();
        $tournament2->setStartDate(new \DateTime('2015-05-15'));
        $tournament2->setEndDate(new \DateTime('2015-05-31'));
        $tournament2->setJa('Agent Smith');
        $tournament2->setClub($manager->merge($this->getReference('club1')));

        $manager->persist($tournament);
        $manager->persist($tournament2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}