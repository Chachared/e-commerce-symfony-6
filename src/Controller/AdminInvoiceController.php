<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use App\Repository\InvoiceRepository;
use App\Repository\ProductOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/invoice')]
class AdminInvoiceController extends AbstractController
{
    #[Route('/{currentPage}/{nbResults}', name: 'admin_invoice_index',requirements: ["currentPage"=>"\d+","nbResults"=>"\d+"], defaults: ["currentPage"=>1,"nbResults"=>10], methods: ['GET'])]
    public function index(InvoiceRepository $invoiceRepository, $currentPage, $nbResults): Response
    {
        $invoices = $invoiceRepository->findByPagination($currentPage, $nbResults);
        $nbInvoices = $invoiceRepository->count([]);
        $nbPages = $nbInvoices/$nbResults;

        if($nbInvoices % $nbResults != 0){
            $nbPages = (int)($nbInvoices/$nbResults) +1;
        }



        return $this->render('admin/admin_invoice/index.html.twig', [
            'invoices' => $invoices,
            'nbPages' => $nbPages,
            'currentPage' => $currentPage,
            'nbResults' => $nbResults
        ]);
    }

    #[Route('/new', name: 'admin_invoice_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceType::class, $invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($invoice);
            $entityManager->flush();

            return $this->redirectToRoute('admin_invoice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_invoice/new.html.twig', [
            'invoice' => $invoice,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'admin_invoice_show', methods: ['GET'])]
    public function show(Invoice $invoice): Response
    {
        return $this->render('admin/admin_invoice/show.html.twig', [
            'invoice' => $invoice,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_invoice_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Invoice $invoice, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InvoiceType::class, $invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_invoice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_invoice/edit.html.twig', [
            'invoice' => $invoice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_invoice_delete', methods: ['POST'])]
    public function delete(Request $request, Invoice $invoice, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$invoice->getId(), $request->request->get('_token'))) {
            $entityManager->remove($invoice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_invoice_index', [], Response::HTTP_SEE_OTHER);
    }

}
