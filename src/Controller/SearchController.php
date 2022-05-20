<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(Request $request, ProductRepository $productRepository): Response
    {
        $products= $productRepository->findAll();

        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){

            $filters = $form->getData();
            $products = $productRepository->search($filters);
        }
        
        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'products' => $products,
        ]);
    }
}