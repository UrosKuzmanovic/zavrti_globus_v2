<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZavrtiGlobusController extends AbstractController
{
    /**
     * @Route("/zavrti/globus", name="zavrti_globus")
     */
    public function index(): Response
    {
        return $this->render('zavrti_globus/index.html.twig', [
            'controller_name' => 'ZavrtiGlobusController',
        ]);
    }
}
