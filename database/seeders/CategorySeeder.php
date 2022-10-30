<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gown =  Category::updateOrCreate([
             'name' => 'Gown',
             'slug' => Str::slug('Gown'),
         ]);

        $socks =  Category::updateOrCreate([
             'name' => 'Socks',
             'slug' => Str::slug('Socks'),
         ]);

        $bra =  Category::updateOrCreate([
             'name' => 'Bra',
             'slug' => Str::slug('Bra'),
         ]);

        $tie =  Category::updateOrCreate([
             'name' => 'Tie',
             'slug' => Str::slug('Tie'),
         ]);

        $tie =  Category::updateOrCreate([
             'name' => 'Blouse',
             'slug' => Str::slug('Blouse'),
         ]);

        $t_shirt =  Category::updateOrCreate([
             'name' => 'T-shirt',
             'slug' => Str::slug('T-shirt'),
         ]);

        $shirt =  Category::updateOrCreate([
             'name' => 'Shirt',
             'slug' => Str::slug('Shirt'),
         ]);
        $tops =  Category::updateOrCreate([
             'name' => 'Tops',
             'slug' => Str::slug('Tops'),
         ]);
 
        $skirts = Category::updateOrCreate([
             'name' => 'Skirts',
             'slug' => Str::slug('Skirts'),
         ]);
 
        $jeans = Category::updateOrCreate([
             'name' => 'Jeans',
             'slug' => Str::slug('Jeans'),
         ]);
 
         $jeans_sub =  [
              'Men Jeans', 'Women Jeans'
         ];
         foreach ($jeans_sub as $sub_categoty) {
             $jeans->subcategories()->create([
                 'name' => $sub_categoty,
                 'slug' => Str::slug($sub_categoty)
             ]);
         }
 
         $underwear = Category::updateOrCreate([
             'name' => 'Underwear',
             'slug' => Str::slug('Underwear'),
         ]);
         $underwear_sub =  [
             'Shorts', 'Women underwear'
        ];
        foreach ($underwear_sub as $sub_categoty) {
            $underwear->subcategories()->create([
                'name' => $sub_categoty,
                'slug' => Str::slug($sub_categoty)
            ]);
        }
 
        $shoes = Category::updateOrCreate([
             'name' => 'Shoes',
             'slug' => Str::slug('Shoes'),
         ]);
 
         $shoes_sub =  [
             'Men Shoes', 'Women Shoes'
        ];
        foreach ($shoes_sub as $sub_categoty) {
         $shoes->subcategories()->create([
             'name' => $sub_categoty,
             'slug' => Str::slug($sub_categoty)
         ]);
     }
 
        $coat = Category::updateOrCreate([
             'name' => 'Coats',
             'slug' => Str::slug('Coats'),
         ]);
 
         $coat_sub =  [
             'Men Coats', 'Women Coats'
        ];
        foreach ($coat_sub as $sub_categoty) {
         $coat->subcategories()->create([
             'name' => $sub_categoty,
             'slug' => Str::slug($sub_categoty)
         ]);
     }
 
        $jacket = Category::updateOrCreate([
             'name' => 'Jacket',
             'slug' => Str::slug('Jacket'),
         ]);
 
         $scanner_sub =  [
             'Men Jacket', 'Women Jacket'
        ];
        foreach ($scanner_sub as $sub_categoty) {
         $jacket->subcategories()->create([
             'name' => $sub_categoty,
             'slug' => Str::slug($sub_categoty)
         ]);
     }
     }
}
