<?php


namespace model;

use repository\MovieRepository;

class MovieModel
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getMovies()
    {
        return $this->movieRepository->getMovies();
    }

    public function getMovie($id)
    {
        return $this->movieRepository->getMovie($id);
    }



}