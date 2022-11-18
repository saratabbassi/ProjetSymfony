<?php

namespace App\Controller;

use App\Entity\Parents;
use App\Form\ParentsType;
use App\Repository\ParentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parents")
 */
class ParentsController extends AbstractController
{
    /**
     * @Route("/", name="app_parents_index", methods={"GET"})
     */
    public function index(ParentsRepository $parentsRepository): Response
    {
        return $this->render('parents/index.html.twig', [
            'parents' => $parentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_parents_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ParentsRepository $parentsRepository): Response
    {
        $parent = new Parents();
        $form = $this->createForm(ParentsType::class, $parent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parentsRepository->add($parent);
            return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parents/new.html.twig', [
            'parent' => $parent,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_parents_show", methods={"GET"})
     */
    public function show(Parents $parent): Response
    {
        return $this->render('parents/show.html.twig', [
            'parent' => $parent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_parents_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Parents $parent, ParentsRepository $parentsRepository): Response
    {
        $form = $this->createForm(ParentsType::class, $parent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parentsRepository->add($parent);
            return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parents/edit.html.twig', [
            'parent' => $parent,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_parents_delete", methods={"POST"})
     */
    public function delete(Request $request, Parents $parent, ParentsRepository $parentsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parent->getId(), $request->request->get('_token'))) {
            $parentsRepository->remove($parent);
        }

        return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
    }
}
