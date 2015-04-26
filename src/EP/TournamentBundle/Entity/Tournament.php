<?php

namespace EP\TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournament
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EP\TournamentBundle\Entity\TournamentRepository")
 */
class Tournament
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date")
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ja", type="string", length=255)
     */
    private $ja;

    /**
     * @ORM\ManyToOne(targetEntity="EP\TournamentBundle\Entity\Club")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Tournament
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Tournament
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set ja
     *
     * @param string $ja
     * @return Tournament
     */
    public function setJa($ja)
    {
        $this->ja = $ja;

        return $this;
    }

    /**
     * Get ja
     *
     * @return string 
     */
    public function getJa()
    {
        return $this->ja;
    }

    /**
     * Set club
     *
     * @param \EP\TournamentBundle\Entity\Club $club
     * @return Tournament
     */
    public function setClub(\EP\TournamentBundle\Entity\Club $club)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \EP\TournamentBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
    }
}
