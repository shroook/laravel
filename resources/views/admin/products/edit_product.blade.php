@extends('layouts.adminLayout.admin_design')
@section ('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/view-product')}}">View Products</a> <a href="{{url('/admin/add-product')}}">Add Products</a> </div>
    <h1>Products</h1>
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif   
    
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data"  class="form-horizontal" method="post" action="{{url('/admin/edit-product/' .$productdetails->id )}}" name="edit_product" id="edit_product" novalidate="novalidate">{{csrf_field()}}
          
            <ul id="tree1">

@foreach($categories as $category)

<li>

{{ $category->title }}
<input type="checkbox" name="category_id[]" id="category_id" value="{{$category->id}}" 
{{in_array($category->id,$chks)?"checked":""}}

>


@if(count($category->childs))

@include('admin.products.child',['childs' => $category->childs])

@endif

</li>
<a href="{{url('/admin/edit-category/'.$category->id) }}" class=" btn-small">View</a> 

@endforeach

</ul>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{$productdetails->product_name}}">
                </div>
              </div>
             
            
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                <textarea name="description" id="description" >{{$productdetails->description}}</textarea>
                 
                </div>
              </div>
             
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
            
                  <input type="file" name="image" id="image" >
                  <input type="hidden" name="current_image" value="{{ $productdetails->image}}"  >
                  @if(!empty($productdetails->image))
                  <img style="width:40px;" src="{{asset('images/backend_images/product/small/'. $productdetails->image)}}">| 
                  @endif
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
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