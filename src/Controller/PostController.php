<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PostController extends AbstractController
{

    public function posts(): Response
    {
        return $this->json(['username' => 'jane.doe']);
    }
}