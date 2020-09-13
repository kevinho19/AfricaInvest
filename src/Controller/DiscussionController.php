<?php

namespace App\Controller;

use App\Entity\Discussion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DiscussionController extends AbstractController
{
    /**
     * @Route("/discussion", name="discussion_manager")
     *
     */
    public function manager(Request $request, EntityManagerInterface $manager)
    {
        $discussion = new Discussion();

        $form = $this->createFormBuilder($discussion)
            ->add('expediteur')
            ->add('destinataire')
            ->add('contenu')
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $discussion->setCreatedAt(new \DateTime());

            $manager->persist($discussion);
            $manager->flush();

            //return $this->redirectToRoute('discussion_show', ['id' => $discussion->getId()]);
            return $this->redirectToRoute('project_index');
        }

        return $this->render('discussion/index.html.twig', [
            'formDiscussion' => $form->createView()
        ]);
    }

    /**
     * @Route("/discussion/{id}", name="discussion_show")
     */
    public function show(Discussion $discussion)
    {
        return $this->render('discussion/show.html.twig', [
            'discussion' => $discussion
        ]);
    }
}
