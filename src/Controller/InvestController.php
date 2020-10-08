<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InvestController extends AbstractController
{
    /**
     * @Route("/invest", name="invest")
     */
    public function index(ProjectRepository $repo)
    {
        $invests = $repo->findAll();

        return $this->render('invest/index.html.twig', [
            'invests' => $invests
        ]);
    }

    /**
     * @Route("/invests/{id}", name="show_invest")
     */
    public function show(Project $invest)
    {
        return $this->render('invest/show.html.twig', [
            'invest' => $invest
        ]);
    }
}