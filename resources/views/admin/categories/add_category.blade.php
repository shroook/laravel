@extends('layouts.adminLayout.admin_design')
@section ('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/view-category')}}">Categories</a> <a href="{{url('/admin/add-category')}}" class="current">Add Category</a> </div>
    <h1>Categories</h1>

  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Category</h5>
          </div>
          <div class="widget-content nopadding">
          <h3>Add New Category</h3>

<form  class="form-horizontal" role="form" id="category" method="POST" action="{{ route('add.category') }}" enctype="multipart/form-data">
@csrf
<div class="col-md-6">

<h3>Category List</h3>

<ul id="tree1">

@foreach($categories as $category)

<li>




{{ $category->title }}

<input type="radio" id="parent_id" name="parent_id" value="{{$category->id}}"></input>
@if(count($category->childs))

@include('admin.categories.addchild',['childs' => $category->childs])

@endif


</li>
<a href="{{url('/admin/edit-category/'. $category->id) }}" class=" btn-small">View</a> 

@endforeach

</ul>

</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

   

 

</div>

 <div class="control-group">
                <label class="control-label">Category Name</label><br>
                <div class="controls">
                <textarea id="title" name="title"></textarea>
                 
                </div>
              </div>
     <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

    <!-- <label>Category:</label>
    <select id="parent_id" name="parent_id" class="form-control">
        <option value="0">Select</option>
        @foreach($allCategories as $rows)
                <option value="{{ $rows->id }}">{{ $rows->title }}</option>
        @endforeach
    </select> -->

    @if ($errors->has('parent_id'))
        <span class="text-red" role="alert">
            <strong>{{ $errors->first('parent_id') }}</strong>
        </span>
    @endif

</div>

               <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                  <input type="file" name="image" id="image" >
                </div>
              </div>
<div class="form-group">

    <button type="submit" class="btn btn-success">Add New Category</button>

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