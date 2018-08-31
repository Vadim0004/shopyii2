<?php

namespace backend\service\order;

use backend\models\repository\ProductOrderRepository;
use backend\models\repository\UserRepository;
use backend\models\repository\ProductRepository;
use common\models\activerecord\ProductOrder;

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
            foreach ($order->productOrdersById as $productId) {
                $decode = json_decode($productId['products'], true);
                $product = array_keys($decode);
                $productId['products'] = $this->productRepository->getAllProductByIdArray($product);
            }
        };
        return $orders;
    }

    public function getOrderById(int $id): ProductOrder
    {
        $order = $this->productOrdersRepository->getOrderById($id);
        $decode = json_decode($order->products, true);
        $productkey = array_keys($decode);
        $products = $this->productRepository->getAllProductByIdArray($productkey);
        $order->products = $products;
        return $order;
    }

}