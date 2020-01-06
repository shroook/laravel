<?php

namespace App;
use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public $fillable = ['title','parent_id','image'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    /**

     * Get the index name for the model.

     *

     * @return string

     */

    public function childs() {

        return $this->hasMany('App\Category','parent_id','id') ;

    }
    public function subcategory(){
        return $this->hasMany('App\Category', 'parent_id');
    }
}
