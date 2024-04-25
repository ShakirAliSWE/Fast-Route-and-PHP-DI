<?php

namespace Model;

use repository\PostRepository;

class PostModel
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPost($id)
    {
        $post = [];
        $result = $this->postRepository->getPost($id);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $post[] = $row;
            }
        }

        return [
            'data' => $post
        ];
    }

    public function validateParams($requestBody)
    {
        if (!isset($requestBody['title']) || !isset($requestBody['content']) || !isset($requestBody['author'])) {
            return false;
        }

        return true;
    }

    public function createPost()
    {
        $requestBody = file_get_contents("php://input");
        $requestBody = json_decode($requestBody, true);

        if (!$this->validateParams($requestBody)) {
            http_response_code(400);

            // Return JSON response with error message
            $response = [
                'error' => 'Bad Request',
                'message' => 'Missing required parameters. Please provide title, content and author value'
            ];

            // Set Content-Type header to indicate JSON response
            header('Content-Type: application/json');

            // Encode the response data into JSON format and echo it
            return $response;
        }

        $result = $this->postRepository->createPost($requestBody);

        return [
            'data' => $result ? 'Post Created Successfully' : "There was an error while creating Post"
        ];
    }
}