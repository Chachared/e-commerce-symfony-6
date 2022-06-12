<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/category')]
class AdminCategoryController extends AbstractController
{

    #[Route('/{currentPage}/{nbResults}', name: 'admin_category_index', requirements: ["currentPage"=>"\d+","nbResults"=>"\d+"], defaults: ["currentPage"=>1,"nbResults"=>10], methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, $currentPage, $nbResults): Response
    {
        $categories = $categoryRepository->findByPagination($currentPage, $nbResults);
        $nbCategories = $categoryRepository->count([]);
        $nbPages = $nbCategories/$nbResults;

        if($nbCategories % $nbResults != 0){
            $nbPages = (int)($nbCategories/$nbResults) +1;
        }

        return $this->render('admin/admin_category/index.html.twig', [
            'categories' => $categories,
            'nbPages' => $nbPages,
            'currentPage' => $currentPage,
            'nbResults' => $nbResults
        ]);
    }

    #[Route('/new', name: 'admin_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_category/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edit', name: 'admin_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_category_delete', methods: ['POST'])]
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin/admin_category_index', [], Response::HTTP_SEE_OTHER);
    }
}