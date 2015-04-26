<?php
namespace EP\TournamentBundle\Tests\Twig;

use EP\TournamentBundle\Twig\TournamentExtension;
use EP\TournamentBundle\Entity\Tournament;

class TournamentExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testSortTournaments()
    {
        $extension = new TournamentExtension();

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime('2015-04-01'));
        $tournament->setJa("last");
        $tournament2 = new Tournament();
        $tournament2->setStartDate(new \DateTime('2015-03-01'));
        $tournament2->setJa("first");

        $tournaments = $extension->sortByFilter([$tournament, $tournament2]);

        $this->assertEquals("first", $tournaments[0]->getJa());
        $this->assertEquals("last", $tournaments[1]->getJa());
    }
}