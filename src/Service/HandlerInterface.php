<?php

namespace App\Service;

use App\Entity\Post;

interface HandlerInterface
{
    /**
     * @param int $postId
     *
     * @return Post
     */
    public function getPost(int $postId): Post;
    /**
     * @return Post[]
     */
    public function getAllPosts(): array;
}
