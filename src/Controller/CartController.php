<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductOrder;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cart')]
class CartController extends AbstractController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    #[Route('/', name: 'cart_display')]
    public function index(Request $request): Response
    {
        //retourne 4 produits flashs de facon aleatoire ds le panier s'il est vide
        $flashProducts = $this->productRepository->findBy(['isFlash' => true]);
        shuffle($flashProducts);

        //on récupère le panier en session
        $cart = $request->getSession()->get('cart');
        $totalTTCPrice = 0;
        $TTCPrice = 0;

        if ($cart!=null){
            foreach ($cart as $productOrder){
                //calcul du total TTC du panier
                $totalTTCPrice = $productOrder->getProduct()->getTTCPrice() * $productOrder->getQuantity();
                //calcul des prix TTC des produits
                $TTCPrice = $productOrder->getProduct()->getTTCPrice();
            }
        }

        
        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
            'totalTTCPrice' => $totalTTCPrice,
            'TTCPrice' => $TTCPrice,
            'products' => array_splice($flashProducts, -4),
        ]);
    }
    

    #[Route('/{id}', name: 'cart_add', requirements: ['id' => '\d+'])]
    public function addToCart(Product $product, Request $request)
    {
        //Crée un nouvel objet product order pour associer un produit et sa quantité dans le panier
        $productOrder = new ProductOrder();
        $productOrder->setProduct($product);
        $productOrder->setQuantity(1);

        //Récupère la session grace à l'objet Request
        $session = $request->getSession();
        
        //Crée un tableau vide pour représenter le panier
        $cart = [];
        
        //Récupère le panier déjà en session s'il existe
        if ($session->has('cart')) {
            $cart = $session->get('cart');
        }
        
        $exist = false;
        // Vérifie si on a déjà ce produit dans le panier
        foreach ($cart as $productOrderItem) {
            if ($productOrderItem->getProduct()->getId() == $product->getId()) {
                $exist = true;
                $productOrderItem->setQuantity($productOrderItem->getQuantity()+1);
            }
        }

        if (!$exist) {
            $cart[] = $productOrder;
        }

        // Met à jour la session avec le nouveau panier
        $session->set("cart", $cart);
        return $this->redirectToRoute('cart_display');
    }
    
    #[Route('/remove/{id}', name: 'cart_remove')]
    public function remove(Product $product, Request $request){
       
        $session = $request->getSession();
        $cart = $session->get('cart');

        $delete = null;
        
        foreach ($cart as $key=>$productOrder){
            if($product->getId() == $productOrder->getProduct()->getId()){
                $delete = $key;
            }
        }
        //on supprime le produit selectionné
        unset($cart[$delete]);
        
        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_display');
    }
    
    //Modification de la quantité d'un produit par les opérateurs
    #[Route('/{operator}/{id}', 'cart_addremove')]
    public function AddRemoveOperator($id, Product $product, Request $request, $operator){
        
        $session = $request->getSession();
        $cart = $session->get('cart');

        //On ajoute 1 si on clique sur + et on enlève 1 si on clique sur -
        //On supprime le produit s'il est à 0'
        foreach ($cart as $productOrder){
            if($productOrder->getProduct()->getId() == $product->getId()){
                if($operator == 'plus'){
                    $productOrder->setQuantity($productOrder->getQuantity()+1);
                } elseif ($operator == 'minus' && $productOrder->getQuantity() > 0){
                    $productOrder->setQuantity($productOrder->getQuantity()-1);
                }
                
                if ($productOrder->getQuantity() == 0){
                    return $this->redirectToRoute('cart_remove', array('id' => $id));
                }
            }
        }
        
        $session->set('cart', $cart);
        
        return $this->redirectToRoute('cart_display');
    }
    
    
    
}