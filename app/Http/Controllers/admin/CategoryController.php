<?php
namespace App\Http\Controllers\admin;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Image;
class CategoryController extends Controller
{

    public function chks()
    {
        $categoryDetails=Category::where(['id'=>$id])->first();
        return view('admin.categories.manageChild',compact('categoryDetails'));
    }

     public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();
        //$categoryDetails=Category::where(['id'=>$id])->first();

        return view('admin.categories.add_category',compact('categories','allCategories'));
    } 
    public function manageCategori()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();
        $categoryDetails=Category::where(['id'=>$id])->first();
        return view('admin.categories.manageChild',compact(' $categoryDetails','allCategories'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' =>'required'

        ]);
      
        $input = $request->all();
     
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        $input=Category::create($input);
        $input->image='';

        if($request->hasFile('image'))
        {
            $image_tmp=$request->file('image');
      
        if($image_tmp->isValid())
        {
            $extension=$image_tmp->getClientOriginalExtension();
            $filename=rand(111,99999).'.'.$extension;
            $large_img_path='images/backend_images/category/large/'.$filename;
            $medium_img_path='images/backend_images/category/medium/'.$filename;
            $small_img_path='images/backend_images/category/small/'.$filename;
            Image::make($image_tmp)->save($large_img_path);
            Image::make($image_tmp)->resize(600,600)->save($medium_img_path);
            Image::make($image_tmp)->resize(200,200)->save($small_img_path);
            $input->image=$filename;
        }
                  
        }
        $input->save();
        return back()->with('success', 'New Category added successfully.');

    }
    // public function addCategory(Request $request)
    // {
        
    //     if($request->isMethod('post'))
    //     {
    //         $this->validate($request, [
    //             'title'=>'required',
              
    //             'image'=>'required'
    //         ]);
    
    //         $data=$request->all();
    //         //echo "<pre>";print_r($data);die;
             
    //        $category=new Category();
    //        $category->title=$data['title'];
         
    //       // $category->parent_id=$data['parent_id'];
        
    //        if($request->hasFile('image'))
    //        {
    //        $image_tmp=$request->file('image');
    //        if($image_tmp->isValid())
    //        {
    //            $extension=$image_tmp->getClientOriginalExtension();
    //            $filename=rand(111,99999).'.'.$extension;
    //            $large_img_path='images/backend_images/category/large/'.$filename;
    //            $medium_img_path='images/backend_images/category/medium/'.$filename;
    //            $small_img_path='images/backend_images/category/small/'.$filename;
    //            Image::make($image_tmp)->save($large_img_path);
    //            Image::make($image_tmp)->resize(600,600)->save($medium_img_path);
    //            Image::make($image_tmp)->resize(200,200)->save($small_img_path);
    //            $category->image=$filename;
    //        }
                     
    //        }
     
    //        $category->save();
          
    //        flash()->success('category added successfully!');
    //        return redirect('admin/view-category');
    //     }
    //    // $levels=Category::where(['parent_id'=>0])->get();
    //     return view('admin.categories.add_category');
    // }

    public function editcategory(Request $request,$id=null)
    {
       
        if($request->isMethod('post'))
        {
            
            $data=$request->all();
            $data['parent_id'] = empty($data['parent_id']) ? 0 : $data['parent_id'];
            //$data->parent_id=$data['parent_id'];

            if($request->hasFile('image'))
            {
            $image_tmp=$request->file('image');
            if($image_tmp->isValid())
            {
                $extension=$image_tmp->getClientOriginalExtension();
                $filename=rand(111,99999).'.'.$extension;
                $large_img_path='images/backend_images/category/large/'.$filename;
                $medium_img_path='images/backend_images/category/medium/'.$filename;
                $small_img_path='images/backend_images/category/small/'.$filename;
                Image::make($image_tmp)->save($large_img_path);
                Image::make($image_tmp)->resize(600,600)->save($medium_img_path);
                Image::make($image_tmp)->resize(200,200)->save($small_img_path);
                
            }
                      
            } else{
                $filename=$data['current_image'];
            }
          
            Category::where(['id'=>$id])->update(['parent_id'=>$data['parent_id'],'title'=>$data['title'],'image'=>$filename]);
            return redirect('/admin/view-category')->with('flash_message_success','category Updated successfully ');

        }

       $categoryDetails=Category::where(['id'=>$id])->first();
       $categories=Category::where(['parent_id'=>0])->get();
     
        return view('admin.categories.edit_category')->with(compact('categories','categoryDetails'));
        
    }





      public function deleteCategory(Request $request,$id=null)
          {
            if(!empty($id))
            {
              Category::where(['id'=>$id])->delete();
             
              return redirect()->back()->with('flash_message_success','category Deleted successfully ');
              ;
            }
         }
      public function viewCategory()
     {
        $categories=Category::orderBy('title','ASC')->get();
        $categories=json_decode(json_encode($categories));
         return view('admin.categories.view_category')->with(compact('categories'));
     }
    
}
