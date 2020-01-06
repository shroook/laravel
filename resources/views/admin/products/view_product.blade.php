@extends('layouts.adminLayout.adminn_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/view-product')}}">Products</a> <a href="{{url('/admin/add-product')}}" class="current">Add Product</a> </div>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>Product Name</th>
                
                  <th>Product Description</th>
                  <th>Product Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr class="gradeX">
                   
                  <td> {{$product->product_name}} </td>
               
                  <td>{{$product->description}}</td>
                  

                  
                  <td>@if(!empty($product->image))

                  <img style="width:30px;" src="{{asset('/images/backend_images/product/small/'.$product->image) }}"> 
                 @endif
                  </td>
                  
                  <td class="center">
                  <a  href="{{url('/admin/edit-product/'.  $product->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                  <a  href="{{url('/admin/delete-product/'.  $product->id) }}" class="btn btn-danger">Delete</a> 

                
                      
                      </td>


                </tr>
        
        
           
          
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection