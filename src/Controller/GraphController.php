<?php

namespace App\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceRepository;
use App\Repository\ProductOrderRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[ApiResource]
#[Route('/api', name: 'api_', methods: ['GET'])]
class GraphController extends AbstractController
{
    #[Route('/stats', name: 'stats', methods: ['GET'])]
    public function index(InvoiceRepository $invoiceRepository, ProductOrderRepository $productOrderRepository, UserRepository $userRepository): Response
    {
        $orders = $productOrderRepository->findAll();
        $sumSales =0;

        foreach ($orders as $order){
            $sumSales += $order->getHTPrice() * $order->getQuantity();
        }

        $json = [
            "nbInvoices" => $invoiceRepository->count([]),
            "nbNewCustomers" => $userRepository->getNewCustomers(),
            "totalSales" => round($sumSales,2)

        ];

        return new JsonResponse($json);
    }

}
