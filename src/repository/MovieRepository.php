<?php

namespace repository;
use cache\MovieCache;

class MovieRepository
{
    private $movieCache;

    public function __construct(MovieCache $movieCache)
    {
        $this->movieCache = $movieCache;
    }

    public function getMovies()
    {
        $cache = $this->movieCache->connect();
        $movies = $cache->get("movies");
        if(!$movies){
            $movies = $this->movieCache->getMovies();
            $cache->set("movies",json_encode($movies));
            return $movies;
        }

        return json_decode($movies,true);
    }

    public function getMovie($id)
    {
        $cache = $this->movieCache->connect();
        $movies = $cache->get("movies");
        if(!$movies){
            $movie =  $this->movieCache->getMovie($id);
            $movies[] = $movie;
            $cache->set("movies",json_encode($movies));
            return $movie;
        }

        $movies = json_decode($movies,true);
        foreach ($movies as $movie) {
            if ($movie['id'] === $id) {
                return $movie;
            }
        }

        return json_encode([]);


//        $movies = $cache->get("movies");
//        if(!$movies){
//            $movies = $this->movieCache->getMovie($id);
//            return $movies;
//        }

        return json_decode($movies,true);
    }


}