@extends('layouts.adminLayout.admin_design')
@section ('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->


<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
      
        <li class="bg_lo"> <a href="{{url('/admin/view-category')}}"> <i class="icon-th"></i> categoris</a> </li>
        <li class="bg_ls"> <a href="{{url('/admin/view-product')}}"> <i class="icon-fullscreen"></i> Products</a> </li>
     

      </ul>
    </div>
<!--End-Action boxes-->    


    </div>
<!--End-Chart-box--> 
    <hr/>
  
  </div>
</div>
@endsection