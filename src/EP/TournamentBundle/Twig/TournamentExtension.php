<?php
namespace EP\TournamentBundle\Twig;

class TournamentExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('sortByStartDate', array($this, 'sortByFilter')),
        );
    }

    public function sortbyStartDate( $a, $b )
    {       
        if ($a->getStartDate() === $b->getStartDate()) {
            return 0;
        }
        if ( $a->getStartDate() < $b->getStartDate() ) {
            return -1;
        }
        return 1;
    }

    public function sortByFilter($array)
    {
        usort($array, array($this, 'sortbyStartDate'));
        return $array;
    }

    public function getName()
    {
        return 'tournament_extension';
    }
}