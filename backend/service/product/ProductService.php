<?php

namespace backend\service\product;

use common\models\activerecord\Product;
use backend\models\repository\ProductRepository;
use backend\models\Product as ProductModel;
use yii\data\Pagination;
use Yii;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function productEdit(ProductModel $productModel, Product $product): Product
    {
        $productEdit = Product::saveProduct($product, $productModel);
        $this->productRepository->save($productEdit);
        return $productEdit;
    }

    public function productSave(ProductModel $productModel): Product
    {
        $productSave = Product::saveNewProduct($productModel);
        $this->productRepository->save($productSave);
        return $productSave;
    }

    public function getProductsById(int $id): Product
    {
        $id = intval($id);
        if ($id) {
            $product = $this->productRepository->getProductsById($id);
            return $product;
        } else {
            throw new \RuntimeException('Please. add integer!!!!!');
        }
    }

    public function getAllProducts()
    {
        $products = $this->productRepository->getAllProducts();
        return $products;
    }

    public function productDelete(int $id)
    {
        $id = intval($id);
        if ($id) {
            $product = $this->productRepository->getProductsById($id);
            $this->productRepository->delete($product);
            return $product;
        } else {
            throw new \RuntimeException('Please. add integer!!!!!');
        }
    }

    public function getAddLatestProduct()
    {
        $product = $this->productRepository->getLatestAddProduct();
        return $product;
    }

    public function getPagination()
    {
        $query = $this->productRepository->getQueryProductsPagination();
        $pages = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => Yii::$app->params['showByDefaultProducts']]);

        return $pages;
    }

    public function getProductsPagination(int $offset, int $limit)
    {
        $products = $this->productRepository->getProductPagination($offset, $limit);
        return $products;
    }

    public function deleteProductAjax(array $productId, int $offset, int $limit): array
    {
        $productsArray = $this->productRepository->getProductListByArray($productId);
        foreach ($productsArray as $productItem) {
            $this->productRepository->delete($productItem);
        }

        $product = $this->productRepository->getProductPagination($offset, $limit);
        return $product;
    }
}