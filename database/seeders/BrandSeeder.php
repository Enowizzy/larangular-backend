<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::updateOrCreate([
            'name' => 'Adidas  ',  'rank' => 1,  'impression' => 90
        ]);

        Brand::updateOrCreate([
            'name' => 'Nike ',  'rank' => 2,  'impression' => 90
        ]);

        Brand::updateOrCreate([
            'name' => 'Gucci',  'rank' => 3,  'impression' => 90
        ]);

        Brand::updateOrCreate([
            'name' => 'Chanel',  'rank' => 4,  'impression' => 88
        ]);

        Brand::updateOrCreate([
            'name' => 'Fendi', 'rank' => 5,  'impression' => 85
        ]);

        Brand::updateOrCreate([
            'name' => 'Versace', 'rank' => 6,  'impression' => 85
        ]);

        Brand::updateOrCreate([
            'name' => 'Balanciaga', 'rank' => 6,  'impression' => 85
        ]);

        Brand::updateOrCreate([
            'name' => 'Hermes ',  'rank' => 5,  'impression' => 80
        ]);

    }
}
