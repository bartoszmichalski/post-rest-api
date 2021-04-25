<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\PostGetter;

class PostController extends AbstractController
{
    public function getAll(PostGetter $postGetter): Response
    {
        return $this->json($postGetter->get());
    }

    public function getOne(int $id, PostGetter $postGetter): Response
    {
        return $this->json($postGetter->get($id));
    }
}
