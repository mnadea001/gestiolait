<?php

namespace App\Controller;

use App\Entity\VaccinInjection;
use App\Form\VaccinInjectionType;
use App\Repository\VaccinInjectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vaccin/injection')]
class VaccinInjectionController extends AbstractController
{
    #[Route('/', name: 'app_vaccin_injection_index', methods: ['GET'])]
    public function index(VaccinInjectionRepository $vaccinInjectionRepository): Response
    {
        return $this->render('vaccin_injection/index.html.twig', [
            'vaccin_injections' => $vaccinInjectionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vaccin_injection_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VaccinInjectionRepository $vaccinInjectionRepository): Response
    {
        $vaccinInjection = new VaccinInjection();
        $form = $this->createForm(VaccinInjectionType::class, $vaccinInjection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vaccinInjectionRepository->save($vaccinInjection, true);

            return $this->redirectToRoute('app_vaccin_injection_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vaccin_injection/new.html.twig', [
            'vaccin_injection' => $vaccinInjection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vaccin_injection_show', methods: ['GET'])]
    public function show(VaccinInjection $vaccinInjection): Response
    {
        return $this->render('vaccin_injection/show.html.twig', [
            'vaccin_injection' => $vaccinInjection,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vaccin_injection_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VaccinInjection $vaccinInjection, VaccinInjectionRepository $vaccinInjectionRepository): Response
    {
        $form = $this->createForm(VaccinInjectionType::class, $vaccinInjection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vaccinInjectionRepository->save($vaccinInjection, true);

            return $this->redirectToRoute('app_vaccin_injection_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vaccin_injection/edit.html.twig', [
            'vaccin_injection' => $vaccinInjection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vaccin_injection_delete', methods: ['POST'])]
    public function delete(Request $request, VaccinInjection $vaccinInjection, VaccinInjectionRepository $vaccinInjectionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vaccinInjection->getId(), $request->request->get('_token'))) {
            $vaccinInjectionRepository->remove($vaccinInjection, true);
        }

        return $this->redirectToRoute('app_vaccin_injection_index', [], Response::HTTP_SEE_OTHER);
    }
}
