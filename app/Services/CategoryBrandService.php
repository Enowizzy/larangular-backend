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
        return response()->json([
            'brand' => Brand::all(),
            'category' => Category::all(),
            'sub_category' => SubCategory::all(),
        ]);
    }
}
