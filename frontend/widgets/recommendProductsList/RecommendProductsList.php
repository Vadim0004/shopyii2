<?php

namespace frontend\widgets\recommendProductsList;

class RecommendProductsList extends \yii\base\Widget
{
    public function run()
    {
        $productRepository = new \frontend\models\repository\ProductRepository();
        $recomend = $productRepository->getRecommendedProducts();
        
        return $this->render('recommendProducts', [
            'recomend' => $recomend,
        ]);
    }
}