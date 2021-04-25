<?php

namespace App\Service;

use App\Entity\Post;
use GuzzleHttp\Exception\RequestException;

class Handler implements HandlerInterface
{

    public function __construct($postsUrl)
    {
        $this->postsUrl = $postsUrl;
        $this->client = new \GuzzleHttp\Client();
    }

    public function getPost(int $postId): Post
    {
        $responsePosts = $this->fetchPosts($postId);

        return array_pop($responsePosts);
    }

    public function getAllPosts(): array
    {
        return $this->fetchPosts();
    }

    private function fetchPosts(int $id = 0): array
    {
        $uriPart = (0 === $id) ? '' : '/' . $id;

        try {
            $response = $this->client->request('GET', $this->postsUrl . $uriPart);
        } catch (RequestException $e) {
            exit('Exception: ' . $e->getMessage() . "\n");
        }

        return $this->convertToPostObject(json_decode($response->getBody()));
    }

    private function convertToPostObject($posts): array
    {
        if (!is_array($posts)) {
            $posts = [$posts];
        }
        $postObj = [];
        foreach ($posts as $post) {
            $postObj[] = $this->makePostObject($post);
        }

        return $postObj;
    }

    private function makePostObject(object $object): Post
    {
        $post = new Post();

        $post->setID($object->id);
        $post->setUserId($object->userId);
        $post->setTitle($object->title);
        $post->setBOdy($object->body);

        return $post;
    }
}
