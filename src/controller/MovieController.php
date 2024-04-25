<?php

namespace controller;

use DI\Container;

class MovieController
{
    private $movieModel;

    public function __construct(Container $container)
    {
        $this->movieModel = $container->get('model.movie');
    }

    public function getMoviesAction()
    {
        return $this->movieModel->getMovies();
    }

    public function getMovieAction($id)
    {
        return $this->movieModel->getMovie($id);

    }

    public function createMovieAction()
    {

        return json_encode(["message" => "Createdsuccessu"]);
    }


}