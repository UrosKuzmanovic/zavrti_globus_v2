<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZavrtiGlobusController extends AbstractController
{
    /**
     * @Route("/", name="zavrti_globus")
     */
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/home", name="zavrti_globus_home")
     */
    public function getHome(): Response
    {
        return $this->render('home/home.html.twig');
    }
}
