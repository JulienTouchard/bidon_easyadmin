<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaceController extends AbstractController
{
    /**
     * @Route("/face", name="face")
     */
    public function index(): Response
    {
        return $this->render('face/index.html.twig', [
            'controller_name' => 'FaceController',
        ]);
    }
}
