<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class NavbarController extends Controller
{
    
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();

        return view('frontend.header',compact('categories','allCategories'));

    }

}
