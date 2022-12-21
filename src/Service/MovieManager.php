<?php

namespace App\Service;

use hmerritt\Imdb;

class MovieManager
{
    public function loadMovies(string $search): array
    {
        $clientImdb = new Imdb();
        $movies = $clientImdb->search($search);

        $imdbMovies = [];
        foreach($movies['titles'] as $title)
        {
            $movie = $clientImdb->film($title['id']); 
            $imdbMovies[]  = $movie;  
        }

        return $imdbMovies;
    }
}