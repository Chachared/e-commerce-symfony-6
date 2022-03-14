<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $productRepository;
    
    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    
    #[Route('/', name: 'default')]
    public function index(): Response
    {
        $products = $this->productRepository->findAll();
        
        return $this->render('default/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/product/{id}', name:'show_product')]
    public function getOne(Product $product){

        return $this->render('default/product.html.twig', ['product'=>$product]);
    }
}