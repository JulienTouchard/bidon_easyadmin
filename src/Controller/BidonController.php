<?php

namespace App\Controller;

use App\Entity\Bidon;
use App\Form\BidonType;
use App\Repository\BidonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bidon")
 */
class BidonController extends AbstractController
{
    /**
     * @Route("/", name="bidon_index", methods={"GET"})
     */
    public function index(BidonRepository $bidonRepository): Response
    {
        return $this->render('bidon/index.html.twig', [
            'bidons' => $bidonRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="bidon_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bidon = new Bidon();
        $form = $this->createForm(BidonType::class, $bidon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bidon);
            $entityManager->flush();

            return $this->redirectToRoute('bidon_index');
        }

        return $this->render('bidon/new.html.twig', [
            'bidon' => $bidon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bidon_show", methods={"GET"})
     */
    public function show(Bidon $bidon): Response
    {
        return $this->render('bidon/show.html.twig', [
            'bidon' => $bidon,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bidon_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bidon $bidon): Response
    {
        $form = $this->createForm(BidonType::class, $bidon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bidon_index');
        }

        return $this->render('bidon/edit.html.twig', [
            'bidon' => $bidon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bidon_delete", methods={"POST"})
     */
    public function delete(Request $request, Bidon $bidon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bidon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bidon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bidon_index');
    }
}
