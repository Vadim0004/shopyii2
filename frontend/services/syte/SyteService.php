<?php

namespace frontend\services\syte;

use frontend\models\repository\ProductRepository;
use Yii;
use frontend\models\Contact;
use yii\data\Pagination;

class SyteService
{
    private $letterTheme;
    private $adminEmail;
    private $productRepository;
    
    public function __construct($adminEmail,
                                $letterTheme,
                                ProductRepository $productRepository)
    {
        $this->adminEmail = $adminEmail;
        $this->letterTheme = $letterTheme;
        $this->productRepository = $productRepository;
    }

    public function sendLetter(Contact $contact)
    {
        $message = "Tекст: {$contact->userText} . от {$contact->userEmail}";
        $result = Yii::$app->mailer->compose()
                ->setFrom($contact->userEmail)
                ->setTo($this->adminEmail)
                ->setTextBody($message)
                ->send();
        if (!$result) {
            throw new \RuntimeException("Don't send email");
        }
        return $result;
    }

    public function getPagination()
    {
        $query = $this->productRepository->getQueryProductsPagination();
        $pages = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => Yii::$app->params['showByDefailtProducts']]);

        return $pages;
    }

    public function getProductsPagination()
    {
        $pages = self::getPagination();
        $products = $this->productRepository->getProductPagination($pages->offset, $pages->limit);
        return $products;
    }
}