<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $productRepository;
    private $categoryRepository;
    
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
    
    #[Route('/', name: 'default')]
    public function index(): Response
    {
        $products = $this->productRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        
        return $this->render('default/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
            'controller_name' => 'DefaultController'
        ]);
    }

    #[Route('/product/{id}', name:'show_product', methods: ['GET'])]
    public function getOneProduct(Product $product){
        
        $categories = $this->categoryRepository->findAll();

        return $this->render('default/product.html.twig', ['product'=>$product , 'categories'=> $categories]);
    }

        #[Route('/category/{id}', name: 'show_category', methods: ['GET'])]
    public function show(Category $category, Product $product): Response
    {
        $products = $this->productRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        
        return $this->render('default/category-store.html.twig', [
            'category' => $category, 
            'categories'=>$categories,
            'products' => $products, 
            'product' =>$product
        ]);
    }
}