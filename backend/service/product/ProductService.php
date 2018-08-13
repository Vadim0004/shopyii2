<?php

namespace backend\service\product;

use common\models\activerecord\Product;
use backend\models\repository\ProductRepository;
use backend\models\Product as ProductModel;

class ProductService
{
    private $productRepository;
    private $productActiveRecord;

    public function __construct(
        ProductRepository $productRepository,
        Product $productActiveRecord)
    {
        $this->productRepository = $productRepository;
        $this->productActiveRecord = $productActiveRecord;
    }

    public function productEdit(ProductModel $productModel, Product $product)
    {
        $productToSave = $this->productActiveRecord->saveProduct($product, $productModel);
        $productSave = $this->productRepository->save($productToSave);
        return $productSave;
    }

    public function productSave(ProductModel $productModel)
    {
        $productToSave = $this->productActiveRecord->saveNewProduct($productModel);
        $productSave = $this->productRepository->save($productToSave);
        return $productSave;
    }
    public function getProductsById(int $id)
    {
        $product = $this->productRepository->getProductsById($id);
        return $product;
    }

    public function getAllProducts()
    {
        $products = $this->productRepository->getAllProducts();
        return $products;
    }

    public function productDelete(int $id)
    {
        $product = $this->productRepository->getProductsById($id);
        $delete = $this->productRepository->delete($product);
        return $delete;
    }

    public function getAddLatestProduct()
    {
        $product = $this->productRepository->getLatestAddProduct();
        return $product;
    }
}