@extends('frontend.main_master')
@section('content')


@section('title')
 {{ $blogpost->post_title_en }}
@endsection




<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>{{ $blogpost->post_title_en }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{ asset($blogpost->post_image) }}" alt="">
	<h1>@if(session()->get('language') == 'bangla') {{ $blogpost->post_title_bn }}  
        @else {{ $blogpost->post_title_en }} @endif</h1>

    <span class="date-time"> {{ Carbon\Carbon::parse($blogpost->created_at)->diffForHumans()  }}</span>
	
	<p>@if(session()->get('language') == 'bangla') {!! $blogpost->post_details_bn !!}  
       @else {!! $blogpost->post_details_en !!}
       @endif
    </p>
	
     
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_inline_share_toolbox"></div>
            

</div>







  <div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4>Leave A Comment</h4>
		</div>




		<form class="register-form" role="form" action="{{ route('blog.comment') }}" method="POST">
			@csrf
		   <div class="col-md-4">
			
				<div class="form-group">
			      <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
			      <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="your name" required="">
			   </div>
			
		   </div>
		<div class="col-md-4">
			
			<div class="form-group">
			    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
			    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="your email address"  required="">
			</div>
			
		</div>
		<div class="col-md-4">
			
			<div class="form-group">
			    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
			    <input type="text" name="title" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="title"  required="">
			</div>
			
		</div>
		<div class="col-md-12">
			
			<div class="form-group">
			    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
			    <textarea class="form-control unicase-form-control" name="comment" id="exampleInputComments"  required="" placeholder="your comment" ></textarea>
			</div>
			
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
		</div>
		
   </form>


	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">

</div>
	<!-- =========================CATEGORY================================= -->

    
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Blog Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

          @foreach($blogcategory as $category)
          <ul class="list-group">
              <a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item">
                   @if(session()->get('language') == 'bangla') {{ $category->blog_category_name_bn }}  
                   @else {{ $category->blog_category_name_en }} 
                   @endif
                 </li>
              </a>
  
           </ul>
          @endforeach
	       

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->


	<!-- ============================ CATEGORY : END =================================== -->
   
	


<!-- =========================== PRODUCT TAGS =================================== -->

<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-612b8ee03575af4e"></script>




 @endsection