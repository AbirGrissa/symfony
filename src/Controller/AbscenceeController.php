<?php

namespace App\Controller;

use App\Entity\Abscencee;
use App\Form\AbscenceeType;
use App\Repository\AbscenceeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/abscencee')]
class AbscenceeController extends AbstractController
{
    #[Route('/', name: 'app_abscencee_index', methods: ['GET'])]
    public function index(AbscenceeRepository $abscenceeRepository): Response
    {
        return $this->render('abscencee/index.html.twig', [
            'abscencees' => $abscenceeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_abscencee_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AbscenceeRepository $abscenceeRepository): Response
    {
        $abscencee = new Abscencee();
        $form = $this->createForm(AbscenceeType::class, $abscencee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $abscenceeRepository->save($abscencee, true);

            return $this->redirectToRoute('app_abscencee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('abscencee/new.html.twig', [
            'abscencee' => $abscencee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_abscencee_show', methods: ['GET'])]
    public function show(Abscencee $abscencee): Response
    {
        return $this->render('abscencee/show.html.twig', [
            'abscencee' => $abscencee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_abscencee_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Abscencee $abscencee, AbscenceeRepository $abscenceeRepository): Response
    {
        $form = $this->createForm(AbscenceeType::class, $abscencee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $abscenceeRepository->save($abscencee, true);

            return $this->redirectToRoute('app_abscencee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('abscencee/edit.html.twig', [
            'abscencee' => $abscencee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_abscencee_delete', methods: ['POST'])]
    public function delete(Request $request, Abscencee $abscencee, AbscenceeRepository $abscenceeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$abscencee->getId(), $request->request->get('_token'))) {
            $abscenceeRepository->remove($abscencee, true);
        }

        return $this->redirectToRoute('app_abscencee_index', [], Response::HTTP_SEE_OTHER);
    }
}
