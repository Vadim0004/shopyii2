<?php

namespace backend\service\order;

use backend\models\repository\ProductOrderRepository;
use backend\models\repository\UserRepository;

class OrderService
{
    private $productOrdersRepository;
    private $userRepository;

    public function __construct(ProductOrderRepository $productOrdersRepository, UserRepository $userRepository)
    {
        $this->productOrdersRepository = $productOrdersRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllOrders()
    {
        $orders = $this->productOrdersRepository->getAllOrders();
        return $orders;
    }

    public function getAllOrdersByIdUser()
    {
        $orders = $this->userRepository->getAllOrdersByUser();
        return $orders;
    }

}