<?php

namespace App\Services;

use App\Models\Cv;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;

/**
 * Class DeleteCvService
 * @package App\Services
 */
class CategoryBrandService
{
    public function categoryBrandService()
    {
        $json['categories'] = Category::get();
        $json['sub_categories'] = SubCategory::get();
        $json['brands'] = Brand::get();
        return response()->json($json);
    }
}
