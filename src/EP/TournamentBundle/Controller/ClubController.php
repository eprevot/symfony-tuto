<?php

namespace EP\TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EP\TournamentBundle\Entity\Club;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClubController extends Controller
{
    public function addAction()
    {
        $club = new Club();
        $club->setName($this->getQueryString('name'));
        $club->setAddress($this->getQueryString('address'));
        $club->setZipcode($this->getQueryString('zipcode'));
        $club->setCity($this->getQueryString('city'));
        $club->setFftId($this->getQueryString('fftcode'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($club);
        $em->flush();

        return $this->render('EPTournamentBundle:Club:show.html.twig', array('club' => $club));
    }


    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getManager()->getRepository('EPTournamentBundle:Club');
        $club = $repo->find($id);
        $tournaments = $repo->findTournaments($club);

        if($club === null) {
            throw new NotFoundHttpException("there is no club for id ".$id);
        }

        return $this->render('EPTournamentBundle:Club:show.html.twig', array('club' => $club, 'tournaments' => $tournaments));
    }

    private function getQueryString($param)
    {
        $request = $this->getRequest();
        $value = $request->query->get($param); // get a $_GET parameter
        if(empty($value)) {
            $value = $request->request->get($param); // get a $_POST parameter
        }
        if(empty($value)) {
            throw new HttpException(400, 'there should be a "'. $param . '" parameter');
        }

        return $value;
    }
}