<?php

namespace backend\service\brand;

use backend\models\BrandForm;
use backend\models\repository\BrandRepository;
use common\models\activerecord\Brand;
use common\models\Meta;

class BrandService
{
    private $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getAllBrands(): array
    {
        $brand = $this->brandRepository->getAllBrands();
        return $brand;
    }

    public function saveBrand(BrandForm $brandForm)
    {
        $brand = Brand::create(
            $brandForm->name,
            $brandForm->slug,
            new Meta(
                $brandForm->_meta->title,
                $brandForm->_meta->description,
                $brandForm->_meta->keywords
            )
        );

        $this->brandRepository->save($brand);
        return $brand;
    }

    public function getOneBrand($id): Brand
    {
        $brand = $this->brandRepository->getOneItemBrand($id);
        return $brand;
    }

    public function updateBrand(Brand $brand, BrandForm $brandForm)
    {
        $edite = $brand::edit(
            $brand,
            $brandForm->name,
            $brandForm->slug,
            new Meta(
                $brandForm->_meta->title,
                $brandForm->_meta->description,
                $brandForm->_meta->keywords
            )
        );

        $this->brandRepository->save($edite);
        return $edite;
    }

    public function deleteBrand(int $id)
    {
        $brand = $this->brandRepository->getOneItemBrand($id);
        $brand->delete();
        return $brand;
    }
}