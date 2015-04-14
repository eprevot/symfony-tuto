<?php
namespace EP\TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EP\TournamentBundle\Entity\Club;

class LoadClubData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setName('TC13');
        $club->setAddress('rue Baudricourt');
        $club->setZipcode('75013');
        $club->setCity('Paris');
        $club->setFftId('123aze');

        $manager->persist($club);
        $manager->flush();
    }
}