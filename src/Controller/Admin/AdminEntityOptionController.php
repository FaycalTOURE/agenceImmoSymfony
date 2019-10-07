<?php

namespace App\Controller\Admin;

use App\Entity\EntityOption;
use App\Form\EntityOptionType;
use App\Repository\OptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/option")
 */
class AdminEntityOptionController extends AbstractController
{
    /**
     * @Route("/", name="admin.option.index", methods={"GET"})
     */
    public function index(OptionRepository $optionRepository): Response
    {
        return $this->render('admin/option/index.html.twig', [
            'options' => $optionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin.option.new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entityOption = new EntityOption();
        $form = $this->createForm(EntityOptionType::class, $entityOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entityOption);
            $entityManager->flush();

            return $this->redirectToRoute('admin.option.index');
        }

        return $this->render('admin/option/create.html.twig', [
            'option' => $entityOption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin.option.edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EntityOption $entityOption): Response
    {
        $form = $this->createForm(EntityOptionType::class, $entityOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin.option.index');
        }

        return $this->render('admin/option/edit.html.twig', [
            'option' => $entityOption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.option.delete", methods={"DELETE"})
     */
    public function delete(Request $request, EntityOption $entityOption): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entityOption->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entityOption);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin.option.index');
    }
}
