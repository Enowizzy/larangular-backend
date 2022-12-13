<?php

namespace App\Services;

use App\Models\Cv;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductStoreRequest;

/**
 * Class DeleteCvService
 * @package App\Services
 */
class ProductService
{
    public function handle(ProductStoreRequest $request)
    {

        // $file = [];
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            // foreach ($request->file('images') as $file) {
            $destination_path = 'public/products';
            $fileName = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand(1000, 10000)) . '.' . $fileName;
            $path = $file->storeAs($destination_path,  $filename);
            // $image[] = $filename;
            // }
        }

        $input = $request->validated();
        $json = Product::create(array_merge(
            $input,
            [
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'is_available' => $request->input('is_available') == true ? '1' : '0',
                'images' => $filename
            ]
        ));
        if ($json) {
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'Product stored successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'error has occur please try again later',
            ], 500);
        }
    }
    public function getProducts()
    {
        return Product::all();
        // $products = Product::all();
        // foreach ($products as $product) {
        //     return response()->json([
        //         'products' => Product::all(),
        //         'categories' => Category::where('id', $product->category_id)->get('name'),
        //         'brands' =>Brand::where('id', $product->brand_id)->get('name'),
        //     ]);
        // }
    }
    public function deleteProduct($id)
    {
        $delete = Product::find($id);
        if ($delete) {
            $delete->delete();
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'Product deleted successful',
            ]);
        } else if (!$delete) {
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'error has occur please try again later',
            ], 500);
        }
    }
}
