<?php

/**
 * Created by PhpStorm.
 * User: toure
 * Date: 02/09/2019
 * Time: 12:16
 */

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param PropertyRepository $repository
     * @return Response
     */

    public function index(PropertyRepository $repository): Response
    {
        $property = $repository->findLatest();

        return $this->render('pages/home.html.twig', [
            'property' => $property,
            'current_menu' => 'home'
        ]);
    }
}