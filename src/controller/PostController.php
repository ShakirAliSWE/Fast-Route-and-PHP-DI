<?php

namespace controller;

use DI\Container;
use Model\PostModel;

class PostController
{
    /** @var PostModel */
    private $postModel;

    public function __construct(Container $container)
    {
        $this->postModel = $container->get('model.post');
    }

    public function createPostAction()
    {
        return $this->postModel->createPost();
    }

    public function getPostAction($id)
    {
        return $this->postModel->getPost($id);
    }
}