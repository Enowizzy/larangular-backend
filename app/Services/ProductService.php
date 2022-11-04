<?php

namespace App\Services;

use App\Models\Cv;
use App\Models\Product;
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

        $file = [];
        if ($request->hasFile('image')) {
            $file = $request->hasFile('image');
            foreach ($request->file('image') as $file) {
                $destination_path = 'public/products';
                $fileName = $file->getClientOriginalExtension();
                $filename = time() . '-' . md5(rand(1000, 10000)) . '.' . $fileName;
                $path = $file->storeAs($destination_path,  $filename);
                $image[] = $filename;


            }
        }
       
        $input = $request->validated();
        $json = Product::create(array_merge(
            $input,
            [
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'is_available' => $request->input('is_available') == true ? '1' : '0',
                // 'images' => implode(',', $image)
            ]
        ));
        if ($json) {
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'product stored successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'error has occur please try again later',
            ], 500);
        }
    }
}
