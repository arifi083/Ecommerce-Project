@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
		
	<!-- Main content -->
	<section class="content">
	   <div class="row">	  
		  
	

<!--  -----------------Add Category page -----------------------  -->
           <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
	            <h3 class="box-title">Edt Sub-SubCategory</h3> 
	        </div>
	       <!-- /.box-header -->
	          <div class="box-body">
	            <div class="table-responsive">
		             
    <form method="POST" action="{{ route('subsubcategory.update') }}" >
        @csrf
        <input type="hidden" name="id" value="{{ $subsubcategories->id }}">

        <div class="form-group">
			<h5>Category Select <span class="text-danger">*</span></h5>
			<div class="controls">
			  <select name="category_id" id=""  class="form-control">

				 <option value="" selected="" disabled="">Select Category</option>

                  @foreach($categories as $category)
<option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected': ''}}> {{ $category->category_name_en }} </option>
				 @endforeach

			 </select>

             @error('category_id') 
	           <span class="text-danger">{{ $message }}</span>
	         @enderror 

		    </div>
		</div>

        <div class="form-group">
			<h5>Sub Category Select <span class="text-danger">*</span></h5>
			<div class="controls">
			  <select name="subcategory_id"   class="form-control">
			     <option value="" selected="" disabled="">Selected SubCategory</option>
                 
                 @foreach($subcategories as $subcategory)
<option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategories->subcategory_id ? 'selected': ''}}> {{ $subcategory->subcategory_name_en }} </option>
				 @endforeach

			 </select>

             @error('subcategory_id') 
	           <span class="text-danger">{{ $message }}</span>
	         @enderror 

		    </div>
		</div>



        <div class="form-group">
            <h5>Sub-SubCategory English<span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en }}" >
                @error('subsubcategory_name_en') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            
            </div>
        </div>


        <div class="form-group">
            <h5>Sub-SubCategory Bangla<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="subsubcategory_name_bn"  value="{{ $subsubcategories->subsubcategory_name_bn }}" class="form-control" > 
                @error('subsubcategory_name_bn') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            
                </div>
        </div>
        
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
        </div>


    </form>  






		       </div>
	     </div>
 <!-- /.box-body -->
  </div>
  <!-- /.box -->

  
  <!-- /.box -->          
</div>
<!-- /.col -->







		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
  <!-- /.content-wrapper -->









@endsection