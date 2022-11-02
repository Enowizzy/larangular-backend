<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded    = ['id'];
    protected $fillable = [
        'name',
        'cost',
        'price',
        'images',
        'brand_id',
        'quantity',
        'description',
        'category_id',
        'sub_category_id',
        'is_available',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
