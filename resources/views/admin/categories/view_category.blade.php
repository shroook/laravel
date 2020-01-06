

@extends('layouts.adminLayout.adminn_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/add-category')}}">Add Category</a> <a href="{{url('/admin/view-category')}}" class="current">View Category</a> </div>
    <h1>Categories</h1>
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
            <h5>View Categories</h5>
            
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <!-- <th>Category Id</th> -->
                  <th>Category Name</th>
                  <th>Category Image</th>
                  
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr class="gradeX">
               
                <!-- <td> {{$category->id}} </td> -->
               
                  <td> {{$category->title}} </td>
                
                 
                  <td>@if(!empty($category->image))

                      <img style="width:30px;" src="{{asset('/images/backend_images/category/small/'.$category->image) }}"> 
           
           
             @endif
             
                   
                   </td>
                  
                  <td class="center">
                  
                  <a href="{{url('/admin/edit-category/'.  $category->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                  <a  href="{{url('/admin/delete-category/'.  $category->id) }}" class="btn btn-danger">Delete</a>  
                
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
<script>

</script>