<?php

namespace backend\service\order;

use backend\models\repository\ProductOrderRepository;
use backend\models\repository\UserRepository;
use backend\models\repository\ProductRepository;

class OrderService
{
    private $productOrdersRepository;
    private $userRepository;
    private $productRepository;

    public function __construct(ProductOrderRepository $productOrdersRepository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository)
    {
        $this->productOrdersRepository = $productOrdersRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function getAllOrders()
    {
        $orders = $this->productOrdersRepository->getAllOrders();
        return $orders;
    }

    public function getAllOrdersByIdUser()
    {
        $orders = $this->userRepository->getAllOrdersByUser();

        foreach ($orders as $order) {
            $decode = json_decode($order->productOrdersById[0]->products, true);
            $product = array_keys($decode);
            $order->productOrdersById[0]->products = $this->productRepository->getAllProductByIdArray($product);
        };
        return $orders;
    }

}