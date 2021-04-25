<?php

namespace App\Service;

use App\Service\HandlerInterface;

class PostGetter
{
    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    public function get($id = false)
    {
        if (false === $id) {
            return $this->handler->getAllPosts();
        }

        return $this->handler->getPost($id);
    }
}
