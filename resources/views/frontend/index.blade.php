
@extends('frontend.layout.design')
@section ('content')
<div id="navigation">

	<div class="navbar-wrapper">

		<nav class="navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="row">
				<div class="dropdown" >
  <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Categories
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" >
	<ul id="tree1" >
<form>
@foreach($categories as $cat)
<a id='golink' href="{{url('/view-product/'.$cat->id) }}">

<li>

{{ $cat->title }}


@if(count($cat->childs))

@include('frontend.manageChild',['childs' => $cat->childs])

@endif

</li>
<a href="{{url('/view-product/'.$cat->id) }}" class=" btn-small">View</a>


</a>
@endforeach
</form>
</ul>
		</a>

  </div>
</div>				
					
				</div>
			</div>
		</nav>
	</div>
</div>

<body data-spy="scroll" data-target="#mynav" data-offset="85">
<div class="col-md-4">

</div>

<section class="section-wrapper" id="team">
	<div class="team">

		<!-- Block Title -->
		<div class="meet-the-team">			
			<div class="element-title">			
				<div class="row">	 		
					<div class="container">	
	 
					<div class="section-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">			
						<h1><span>Our Categories</span></h1>								
					
				</div>
			</div>
			<!-- End Block Title -->
			<div class="row">
				<div class="container">	
					<div class="wrapper-team">				
					@foreach($category as $cat)
						<div class="col-lg-3 col-md-3">
							<div class="team-member">
								<div class="team-member-holder wow flipInY" data-wow-duration="1s" data-wow-delay="1100ms">
									<div class="team-member-image"><a  href="{{url('/view-product/'.$cat->id) }}" >
										<img src="{{asset('/images/backend_images/category/medium/'.$cat->image) }}" alt="" /> <!-- Change Image -->	
										<div class="team-overlay">
											<div class="img-overlay"></div>
                                          
										</div>
										<div class="overlay-content"> 
											
																					
										
                                        </div>
									</div>
									<div class="team-member-meta">
										<div class="team-member-role">{{$cat->title}}</div> </a>
									</div>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
					
				</div>
			</div>
			{{ $category->links() }}

		</div>
	
	</div>
	
	

</section> 


		

@endsection
