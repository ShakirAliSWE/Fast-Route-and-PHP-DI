<?php

namespace repository;

use mysqli;

class PostRepository
{
    private $mysqli;

    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getPost($id)
    {
        $query = "SELECT * FROM posts where id = ". $id;

        return $this->mysqli->query($query);
    }

    public function createPost($requestBody)
    {
        $query = "INSERT INTO posts (title, content, author) VALUES (?, ?, ?)";
        $statement = $this->mysqli->prepare($query);

        // Bind parameters to the prepared statement
        $statement->bind_param("sss", $requestBody['title'], $requestBody['content'], $requestBody['author']);

        // Execute the statement
        return $statement->execute();
    }
}