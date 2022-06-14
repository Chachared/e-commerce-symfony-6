<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Repository\BrandRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/brand')]
class AdminBrandController extends AbstractController
{
    #[Route('/{currentPage}/{nbResults}', name: 'admin_brand_index', requirements: ["currentPage"=>"\d+","nbResults"=>"\d+"], defaults: ["currentPage"=>1,"nbResults"=>10], methods: ['GET'])]
    public function index(BrandRepository $brandRepository, $currentPage, $nbResults): Response
    {
        $brands = $brandRepository->findByPagination($currentPage, $nbResults);
        $nbBrands = $brandRepository->count([]);
        $nbPages = $nbBrands/$nbResults;

        if($nbBrands % $nbResults != 0){
            $nbPages = (int)($nbBrands/$nbResults) +1;
        }
        return $this->render('admin/admin_brand/index.html.twig', [
            'brands' => $brands,
            'nbPages' => $nbPages,
            'currentPage' => $currentPage,
            'nbResults' => $nbResults
        ]);
    }

    #[Route('/new', name: 'admin_brand_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $brand = new Brand();
        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($brand);
            $entityManager->flush();

            return $this->redirectToRoute('admin_brand_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_brand/new.html.twig', [
            'brand' => $brand,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_brand_show', methods: ['GET'])]
    public function show(Brand $brand): Response
    {
        return $this->render('admin/admin_brand/show.html.twig', [
            'brand' => $brand,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_brand_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Brand $brand, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_brand_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_brand/edit.html.twig', [
            'brand' => $brand,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_brand_delete', methods: ['POST'])]
    public function delete(Request $request, Brand $brand, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$brand->getId(), $request->request->get('_token'))) {
            $entityManager->remove($brand);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_brand_index', [], Response::HTTP_SEE_OTHER);
    }
}
