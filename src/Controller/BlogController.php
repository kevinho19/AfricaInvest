<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $post = new Post();
        $post->setTitle('Création orphelinat')
            ->setContent('lorem ipsum')
            ->setCountry('Congo')
            ->setCreatedat(new \DateTime());
        
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            
        ]);
    }
}
