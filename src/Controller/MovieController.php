<?php

namespace App\Controller;

use App\Service\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    #[Route('/', name: 'app_home')]
    public function index(MovieManager $movieManager, Request $request): Response
    {
        $search = $request->get("search");
        
        return $this->render('movie/index.html.twig', [
            'movies' => $movieManager->loadMovies($search),
        ]);
    }
}
