<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryBrandService;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index()
    {
        return (new CategoryBrandService())->categoryBrandService();
    }
    public function store(ProductStoreRequest $request)
    {
        return (new ProductService())->handle($request);
    }
}
