<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Image;
class ProductController extends Controller
{
    public function chks()
    {
        $productdetails=Product::where(['id'=>$id])->first();

        return view('admin.products.child',compact('productdetails'));
    } 

    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();

        return view('admin.categories.add_category',compact('categories','allCategories'));
    } 
 /*    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();
        $productdetails=Product::where(['id'=>$id])->first();

        return view('admin.products.manageChild',compact('$productdetails','allCategories'));
    } */

    public function addproduct(Request $request)
    { 
        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'product_name'=>'required',
                
                'image'=>'required'
            ]);
            $data=$request->all();
            if(empty($data['category_id']))
            {
                return redirect()->back()->with('flash_message_error','Under Category is Missing  ');
            }
            $product=new Product;
            $product->category_id=implode(",",$data['category_id']);


            $product->product_name=$data['product_name'];
           
          
            if(!empty($data['description']))
            {
                $product->description=$data['description'];
            }else{
                $product->description ='';
            }

          //upload image
            $product->image='';

            if($request->hasFile('image'))
            {
                $image_tmp=$request->file('image');
          
            if($image_tmp->isValid())
            {
                $extension=$image_tmp->getClientOriginalExtension();
                $filename=rand(111,99999).'.'.$extension;
                $large_img_path='images/backend_images/product/large/'.$filename;
                $medium_img_path='images/backend_images/product/medium/'.$filename;
                $small_img_path='images/backend_images/product/small/'.$filename;
                Image::make($image_tmp)->save($large_img_path);
                Image::make($image_tmp)->resize(600,600)->save($medium_img_path);
                Image::make($image_tmp)->resize(200,200)->save($small_img_path);
                $product->image=$filename;
            }
                      
            }

            $product->save();
          
            return redirect('/admin/add-product')->with('flash_message_success','Product Added successfully ');
        }
        $categories=Category::where(['parent_id'=>0])->get();
        $categories_dropdown="<option value='' selected disabled>Select</option>";
        foreach($categories as $cat)
        {
            $categories_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories=Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat)
            {
                $categories_dropdown.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }


         return view('admin.products.add_product')->with(compact('categories','categories_dropdown'));
    
    
        }




        public function editProduct(Request $request,$id=null)
        {
            if($request->isMethod('post'))
            {
                $data=$request->all();
                if($request->hasFile('image'))
                {
                $image_tmp=$request->file('image');
                if($image_tmp->isValid())
                {
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_img_path='images/backend_images/product/large/'.$filename;
                    $medium_img_path='images/backend_images/product/medium/'.$filename;
                    $small_img_path='images/backend_images/product/small/'.$filename;
                    Image::make($image_tmp)->save($large_img_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_img_path);
                    Image::make($image_tmp)->resize(200,200)->save($small_img_path);
                    
                }
                          
                } else{
                    $filename=$data['current_image'];
                }
                if(empty($data['description']))
                {
                    $data['description']='';
                }
                if(empty($data['category_id']))
                {
                    $data['category_id']='';
                }
                else{
                    $data['category_id']=implode(",",$data['category_id']);
                    
                }
                
              
         
          
                Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'description'=>$data['description'],'image'=>$filename]);
                flash()->success('product updates successfully!');
                return redirect()->back()->with('flash_message_success','product has been updated Successfully');
                //$chks= explode(",",$data['category_id']);
            }
           $productdetails=Product::where(['id'=>$id])->first();
       
$chks=explode(",",$productdetails->category_id);
           $categories=Category::where(['parent_id'=>0])->get();
           $ids=array();
           $ids=$productdetails->category_id;
         
          
        
            return view ('admin.products.edit_product')->with(compact('chks','productdetails','categories','ids'));
    
        }

        public function deleteproduct(Request $request,$id=null)
        {
          if(!empty($id))
          {
            Product::where(['id'=>$id])->delete();
           
            return redirect()->back()->with('flash_message_success','Product Deleted successfully ');
            ;
          }
       }

        public function viewproduct()
        {
           $products=Product::get();
           $products=json_decode(json_encode($products));
            return view('admin.products.view_product')->with(compact('products'));
        }


}
