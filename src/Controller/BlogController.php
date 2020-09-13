<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(PostRepository $repo)
    {
        $posts = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/posts/{id}", name="show_post")
     */
    public function show(Post $post)
    {
        return $this->render('blog/post.html.twig', [
            'post' => $post
        ]);
    }
}
