<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryBrandService;

class ProductController extends Controller
{
    public function index()
    {
        return  $all = (new CategoryBrandService())->categoryBrandService();
    }
}
