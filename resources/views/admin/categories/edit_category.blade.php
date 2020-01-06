@extends('layouts.adminLayout.admin_design')
@section ('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Edit Category</a> </div>
    <h1>Categories</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form  enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/edit-category/' .$categoryDetails->id )}}" name="edit_category" id="edit_category" novalidate="novalidate">{{csrf_field()}}
            
            <ul id="tree1">

@foreach($categories as $category)

<li>



{{ $category->title }}

<input type="radio" id="parent_id" name="parent_id" value="{{$category->id}}"
@if($category->id==$categoryDetails->parent_id)checked @endif
></input>
 
@if(count($category->childs))

@include('admin.categories.manageChild',['childs' => $category->childs])

@endif


</li>
<a href="{{url('/admin/edit-category/'.  $category->id) }}" class=" btn-small">View</a> 

@endforeach

</ul>
            <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="title" id="title" value="{{$categoryDetails->title}}">
                </div>
              </div>

           
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
            
                  <input type="file" name="image" id="image" >
                  <input type="hidden" name="current_image" value="{{ $categoryDetails->image}}"  >
                  @if(!empty($categoryDetails->image))
                  <img style="width:40px;" src="{{asset('images/backend_images/category/small/'. $categoryDetails->image)}}">| 
                
                  @endif
                </div>
              </div>


              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
     
     
    </div>
  </div>
</div>
@endsection