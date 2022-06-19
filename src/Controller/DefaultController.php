<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Category;
use App\Entity\Invoice;
use App\Entity\Product;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\AddressRepository;
use App\Repository\CategoryRepository;
use App\Repository\InvoiceRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $productRepository;
    private $categoryRepository;
    private $addressRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, AddressRepository $addressRepository){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->addressRepository = $addressRepository;
    }
    
    #[Route('/', name: 'default')]
    public function index(): Response
    {
        //retourne 4 produits flashs de facon aleatoire sur la page d'accueil
        $flashProducts = $this->productRepository->findBy(['isFlash' => true]);
        shuffle($flashProducts);

        $categories = $this->categoryRepository->findAll();
        
        
        return $this->render('default/index.html.twig', [
            'products' => array_splice($flashProducts, -4),
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
    public function show(Category $category): Response
    {
        $products = $this->productRepository->findAll();
        $categories = $this->categoryRepository->findAll();



        return $this->render('default/category-store.html.twig', [
            'category' => $category,
            'categories'=>$categories,
            'products' => $products,

        ]);
    }

    #[Route('/user/{id}', name: 'show_user', methods: ['GET'])]
    public function showUser(User $user): Response
    {

        //retourne 4 produits flashs de facon aleatoire sur la page d'accueil
        $flashProducts = $this->productRepository->findBy(['isFlash' => true]);
        shuffle($flashProducts);

        return $this->render('default/user/user-account.html.twig', [
            'user' => $user,
            'products' => array_splice($flashProducts, -4),
            'addresses'=> $this->addressRepository->findAll()
        ]);
    }

    #[Route('user/{id}/edit', name: 'edit_user', methods: ['GET', 'POST'])]
    public function editUser(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user);
            return $this->redirectToRoute('show_user', ['id'=>$user->getId()], Response::HTTP_SEE_OTHER);
        }

        //retourne 4 produits flashs de facon aleatoire sur la page d'accueil
        $flashProducts = $this->productRepository->findBy(['isFlash' => true]);
        shuffle($flashProducts);

        return $this->renderForm('default/user/user-edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'products' => array_splice($flashProducts, -4),
        ]);
    }

    public function displayNav(){

        $categories = $this->categoryRepository->findAll();
        $sortedCategories=[];
        
        foreach($categories as $category){

            if($category->getParentCategory() !== null){
            $sortedCategories[$category->getParentCategory()->getName()][] = $category;
            }
        }
        return $this->render('default/parts/nav.html.twig', [
            'categories'=>$sortedCategories
        ]);
    }

}