<?php

namespace cache;

use mysqli;
use Predis\Client;

class MovieCache
{
    private $mysqli;

    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function connect(){
        return new Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379,
        ]);
    }

    public function getMovies(){
        $query = "SELECT * FROM movies";
        $result = $this->mysqli->query($query);
        $movies = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $movies[] = $row;
            }
        }
        return $movies;

    }

    public function getMovie($id){
        $query = "SELECT * FROM movies WHERE id = '$id' ";
        $result = $this->mysqli->query($query);
        $movies = [];
        if ($result->num_rows > 0) {
            $movies = $result->fetch_assoc();
        }
        return $movies;

    }


}