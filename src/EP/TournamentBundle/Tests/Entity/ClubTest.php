<?php
// src/EP/TournamentBundle/Tests/Entity/ClubTest.php

namespace EP\TournamentBundle\Tests\Entity;

use EP\TournamentBundle\Entity\Club;

class ClubTest extends \PHPUnit_Framework_TestCase
{
    protected $club;

    public function setUp()
    {
        parent::setUp();
        $this->club = new Club();
    }

    public function testIsParis()
    {
        $zipcode = "75012";
        $this->club->setZipcode($zipcode);
        $this->assertTrue($this->club->isParis());
    }

    public function testIsNotParis()
    {
        $zipcode = "07508";
        $this->club->setZipcode($zipcode);
        $this->assertFalse($this->club->isParis());

        $zipcode = "17523";
        $this->club->setZipcode($zipcode);
        $this->assertFalse($this->club->isParis());

        $zipcode = "7520";
        $this->club->setZipcode($zipcode);
        $this->assertFalse($this->club->isParis());
    }
}
