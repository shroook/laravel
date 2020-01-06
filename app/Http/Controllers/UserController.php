<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Product;
class UserController extends Controller
{
    public function viewcategories()
    {     
       $category= DB::table('categories')->orderBy('title','ASC')->simplePaginate(8);

      $categories=Category::where(['parent_id'=>0])->get();

        return view('frontend.index', ['categories' => $category])->with(compact('category','categories'));

    }



    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();

        return view('frontend.index',compact('categories','allCategories'));
    }

    public function navbar()
    {
      $categories= DB::table('categories')->get();
      return view('frontend.header')->with(compact('categories'));

    }
    public function viewproduct(Request $request)
    {
      $categories=Category::where(['parent_id'=>0])->get();

     
      $id=$request->route('id');
      // print_r($id);die;
       $allprod=Product::get('category_id');
      $prod=explode(",",$allprod);
      $products=DB::table('products')->whereRaw('FIND_IN_SET(?,category_id)', [$id])->orderBy('product_name','ASC')->simplePaginate(8);
      return view('frontend.product')->with(compact('products','categories'));
      
    }
   
/*   public function search(Request $request)
  {
 $search=$request->get('search');
 $category= DB::table('categories')->where('title','like','%'.$search.'%')->simplePaginate(9);
 return view('frontend.index',['categories'=>$category]);

  } */

}
