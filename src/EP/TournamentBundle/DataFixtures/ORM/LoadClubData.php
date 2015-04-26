<?php
namespace EP\TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EP\TournamentBundle\Entity\Club;

class LoadClubData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setName('TC13');
        $club->setAddress('12 rue des Hautes Formes');
        $club->setZipcode('75013');
        $club->setCity('Paris');
        $club->setFftId('123aze');

        $club2 = new Club();
        $club2->setName('TC12');
        $club2->setAddress('68 boulevard Poniatowski');
        $club2->setZipcode('75012');
        $club2->setCity('Paris');
        $club2->setFftId('789wxc');

        $club3 = new Club();
        $club3->setName('AS Corbeil Essonnes');
        $club3->setAddress('82 quai Jacques Bourgoin');
        $club3->setZipcode('91100');
        $club3->setCity('Corbeil-Essonnes');
        $club3->setFftId('147nju');

        $club4 = new Club();
        $club4->setName('Raquette Cayenne');
        $club4->setAddress('Chemin Joë Martinaud');
        $club4->setZipcode('17310');
        $club4->setCity('Saint Pierre d’Oléron ');
        $club4->setFftId('2117 01 60');

        $manager->persist($club);
        $manager->persist($club2);
        $manager->persist($club3);
        $manager->persist($club4);

        $manager->flush();

        $this->addReference('club1', $club);

    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

}