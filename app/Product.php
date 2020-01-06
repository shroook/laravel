<?php

namespace App;
use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['product_name','description','image','category_id'];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function category()
{
    return $this->belongsTo('App\Category');
}
}