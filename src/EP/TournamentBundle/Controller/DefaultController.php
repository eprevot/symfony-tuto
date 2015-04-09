<?php

namespace EP\TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EPTournamentBundle:Default:index.html.twig', array('name' => $name,
                                                                                 'default_cost' => $this->container->getParameter('default_cost'),
                                                                                 'default_surface' => $this->container->getParameter('default_surface')));
    }
}
