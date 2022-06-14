<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AdminProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/admin_product')]
class AdminProductController extends AbstractController
{
    #[Route('/{currentPage}/{nbResults}', name: 'admin_product_index', requirements: ["currentPage"=>"\d+","nbResults"=>"\d+"], defaults: ["currentPage"=>1,"nbResults"=>5], methods: ['GET'])]
    public function index(ProductRepository $productRepository, $currentPage, $nbResults): Response
    {
        $products = $productRepository->findByPagination($currentPage, $nbResults);
        
        //Pagination des produits sur l'index de l'admin
        $nbProducts = $productRepository->count([]);
        $nbPages = $nbProducts/$nbResults;
        
        if($nbProducts % $nbResults != 0){
            $nbPages = (int)($nbProducts/$nbResults) +1;
        }
        
        return $this->render('admin/admin_product/index.html.twig', [

        ]);
    }

    #[Route('/new', name: 'admin_product_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $product = new Product();
        $form = $this->createForm(AdminProductType::class, $product);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($form->get('pictures') as $picture){
                
                $pictureFile = $picture->get('href')->getData();
                $originalFilename = pathinfo($pictureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$pictureFile->guessExtension();

                $pictureFile->move(
                    $this->getParameter('product_picture'),
                    $newFilename
                );
                
                $picture = $picture->getData();
                $picture-> setHref($newFilename);
                $picture-> setProduct($product);
                $product-> addPicture($picture);  
            }
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('admin_product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_product/new.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'admin_product_show', requirements: ["product"=>"\d+"],methods: ['GET'])]
    public function show(Product $product): Response
    {
        return $this->render('admin/admin_product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_product_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Product $product, EntityManagerInterface $entityManager, SluggerInterface $slugger ): Response
    {
        $form = $this->createForm(AdminProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($form->get('pictures') as $picture){

                $pictureFile = $picture->get('href')->getData();
   
                $originalFilename = pathinfo($pictureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$pictureFile->guessExtension();
                $pictureFile->move(
                    $this->getParameter('product_picture'),
                    $newFilename
                );
                
                $picture = $picture->getData();
                $picture-> setHref($newFilename);
                $picture-> setProduct($product);
                $product-> addPicture($picture);

            }
            
            $entityManager->flush();

            return $this->redirectToRoute('admin_product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_product/edit.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_product_delete', methods: ['POST'])]
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_product_index', [], Response::HTTP_SEE_OTHER);
    }
}