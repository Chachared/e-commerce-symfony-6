<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{
    
    #[Route('/', name: 'display')]
    public function index(Request $request): Response
    {
        $cart = $request->getSession()->get('cart');
        
        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
        ]);
    }

    #[Route('/{id}', name: 'add', requirements: ['id' => '\d+'])]
    public function addToCart(Product $product, Request $request){
        
        
        //Crée un nouvel objet product order pour associer un produit et sa quantité dans le panier
        $productOrder = new ProductOrder();
        $productOrder->setProduct($product);
        $productOrder->setQuantity(1);

        //Récupère la session grace à l'objet Request
        $session = $request->getSession();
        
        //Crée un tableau vide pour représenter le panier
        $cart = [];
        
        //Récupère le panier déjà en session s'il existe
        if($session->has('cart')){
            $cart = $session->get('cart');
        }
        
        $exist = false;
        // Vérifie si on a déjà ce produit dans le panier
        foreach ($cart as $productOrderItem){
            
            if($productOrderItem->getProduct() == $product){
                $exist = true;
                $productOrderItem->setQuantity($productOrderItem->getQuantity() + 1);
            }
        }

        if(!$exist){

            $cart[] = $productOrder;
        }

        // Met à jour la session avec le nouveau panier
        $session->set("cart", $cart);

        return $this->redirectToRoute("cart_display");
    }
    
    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Product $product, Request $request): Response
    {
        $session = $request->getSession();
        $cart = $session->get('cart');
        
        return $this->redirectToRoute("cart_display");
    }
}