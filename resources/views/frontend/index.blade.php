@extends('frontend.main_master')
@section('content')

@section('title')
 Home Easy Online Shop
@endsection



<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============== {{ asset('frontend/') }}============== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 



        
    <!-- =========== TOP NAVIGATION ========= {{ asset('frontend/') }}============== -->
      
         @include('frontend.common.vertical_menu')


     <!-- ===== TOP NAVIGATION : END  this vertical menu include in frontend>common>vertical_menu.blade.php======= --> 
        
        
       @include('frontend.common.hot_deals')

     
     <!-- ========================= HOT DEALS == {{ asset('frontend/') }}====================== -->
     
       
      

      <!-- ============================================== HOT DEALS: END ============================================== --> 
        




        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">




              <div class="item">
                <div class="products special-product">


                @foreach($special_offer as $product)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> 
                              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> 
                                 <img src="{{ asset($product->product_thambnail) }}" alt=""> 
                               </a> 
                              </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                                @else {{ $product->product_name_en }}  @endif 
                                </a>
                            </h3>
                            @if(App\Models\Review::where('product_id',$product->id)->first())
                              @php
                                $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                               $avgRating = number_format($rating,1);
                              @endphp
                            @for($i=1;$i<=5;$i++)
                               <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                            @endfor
                             ({{ count($reviewcount) }} Reviews)
                           @else
                              <span class="text-danger">No review </span>
                            @endif  



                            <div class="product-price"> <span class="price">৳{{ $product->selling_price }}</span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>  <!-- /product -->

                 @endforeach    <!-- /end special offer foreach -->

                 
                </div>  <!-- /special product -->
              </div> <!-- /item -->





              



              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 






        <!-- ======================== PRODUCT TAGS ============================== -->
         


        @include('frontend.common.product_tags')



        <!-- ===================== PRODUCT TAGS : END =========================== -->
        
        






        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



              <div class="item">
                <div class="products special-product">

                @foreach($special_deals as $product)

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> 
                              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> 
                                 <img src="{{ asset($product->product_thambnail) }}"  alt=""> 
                              </a> 
                            </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                          <h3 class="name">
                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                               @else {{ $product->product_name_en }}  @endif 
                            </a>
                          </h3>
                          @if(App\Models\Review::where('product_id',$product->id)->first())
                           @php
                             $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                             $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                             $avgRating = number_format($rating,1);
                          @endphp
                          @for($i=1;$i<=5;$i++)
                              <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                          @endfor
                             ({{ count($reviewcount) }} Reviews)
                          @else
                             <span class="text-danger">No review </span>
                          @endif  






                            <div class="product-price"> <span class="price">৳{{ $product->selling_price }}</span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>   <!-- /.product --> 

                 @endforeach


                </div> <!-- / special product --> 
              </div>    <!-- / item --> 



              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ======================== SPECIAL DEALS : END ============================================= --> 
        <!-- ================================= NEWSLETTER ================================= -->
        
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        


        

        <!-- ========================== Testimonials================================== -->
         
         @include('frontend.common.testimonials')

        <!-- ========================== Testimonials: END ===================================== -->
        





        
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
     
     
     
     
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

           @foreach($sliders as $slider)
            <div class="item" style="background-image: url({{ asset($slider->slider_img) }}); height:380px;">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  
                  <div class="big-text fadeInDown-1">{{ $slider->title }}</div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid -->  
            </div>
            <!-- /.item -->
          @endforeach  
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
      
        


        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over ৳99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra ৳5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 







        <!-- ============================================== SCROLL TABS ============================================== -->
        
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Categories Product</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li> 

              @foreach($categories as $category)
        <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name_en}}</a></li>

              @endforeach


           <!--  <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>

              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li>   -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>




          <div class="tab-content outer-top-xs">

            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                @foreach($products as $product)
                <div class="item item-carousel">
                  <div class="products">
                    <div class="product">
                      <div class="product-image">
                        <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                          <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif   




                        <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
                      <!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                               <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                                 data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                                 <i class="fa fa-shopping-cart"></i> 
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>
                            
                             <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                               onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> 
                             </button>
                           
                          </ul>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.item carousel-->

              @endforeach      <!-- end all option product foreach -->
                  
      
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->








    @foreach($categories as $category)

    <div class="tab-pane " id="category{{ $category->id }}">
        <div class="product-slider">
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

 @php
    $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
@endphp


          @forelse($catwiseProduct as $product)
          <div class="item item-carousel">
            <div class="products">
               <div class="product">
                 <div class="product-image">
                   <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  





                        <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
                      <!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                            <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                                 data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                                 <i class="fa fa-shopping-cart"></i> 
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>
                            <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                               onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> 
                             </button>
                           
                          </ul>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.item carousel-->

         
          @empty
          <h5 class="text-danger">No Product Found</h5>

         @endforelse     <!-- end all option product foreach -->
            

          </div>
          <!-- /.home-owl-carousel --> 
        </div>
        <!-- /.product-slider --> 
      </div>
      <!-- /.tab-pane -->

      @endforeach   <!-- end categor foreach -->


            
            
           
            
           
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ================================== WIDE PRODUCTS ========================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner3.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner4.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 






        
        <!-- ============================== FEATURED PRODUCTS =================================== -->




        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">



            @foreach($featured as $product)
            <div class="item item-carousel">
            <div class="products">
               <div class="product">
                 <div class="product-image">
                 <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                        @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  




                        <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
              <!-- /.product-info -->  
      <div class="cart clearfix animate-effect">
        <div class="action">
          <ul class="list-unstyled"> 
              <li class="add-cart-button btn-group">
                 <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                  data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                  <i class="fa fa-shopping-cart"></i> 
                 </button>
                 <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </li>
              
                <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                  onclick="addToWishList(this.id)"> 
                  <i class="fa fa-heart"></i> 
                 </button>
             
             
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
      </div>
      <!-- /.product --> 
      
    </div>
    <!-- /.products --> 
          </div>
                <!-- /.item carousel-->
            

           @endforeach

          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
       



   <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 






    <!-- ========== skip_product_0  PRODUCTS categories wise product.. this is 1 no category============ -->


    <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'bangla') {{ $skip_category_0->category_name_bn }}
             @else {{ $skip_category_0->category_name_en }} @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">



            @foreach($skip_product_0 as $product)
            <div class="item item-carousel">
            <div class="products">
               <div class="product">
                 <div class="product-image">
                   <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  



                      <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
                      <!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                                 data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                                 <i class="fa fa-shopping-cart"></i> 
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>
                            <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                               onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> 
                             </button>
                           
                          </ul>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.item carousel-->
            

           @endforeach

          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
       
   <!-- ==============================================End skip_product_0  : END ============================================== --> 







 <!-- ====== skip_product_1  PRODUCTS   categories wise product. this is 2 no category  ============== -->


   <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'bangla') {{ $skip_category_1->category_name_bn }}
             @else {{ $skip_category_1->category_name_en }} @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">



            @foreach($skip_product_1 as $product)
            <div class="item item-carousel">
            <div class="products">
               <div class="product">
                 <div class="product-image">
                   <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  
                      

                      <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
                      <!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                               <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                                 data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                                 <i class="fa fa-shopping-cart"></i> 
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>
                             <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                               onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> 
                             </button>
                            
                           
                            
                          </ul>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.item carousel-->
            

           @endforeach

          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
       
   <!-- ==============================================End skip_product_1  : END ============================================== --> 








    


        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 





       


  <!-- ==================== skip_brand_1 PRODUCTS  brandwise product ======================= -->


    <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'bangla') {{ $skip_brand_0->brand_name_bn }}
             @else {{ $skip_brand_0->brand_name_en }} @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">



            @foreach($skip_brand_product_0  as $product)
            <div class="item item-carousel">
            <div class="products">
               <div class="product">
                 <div class="product-image">
                   <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  


                        <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
                      <!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                               <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                                 data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                                 <i class="fa fa-shopping-cart"></i> 
                               </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>
                             <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                               onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> 
                             </button>
                           
                          </ul>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.item carousel-->
            

           @endforeach

          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
       
   <!-- ==============================================End skip_brand_1  : END ============================================== --> 











        <!-- ===================== BEST SELLER ======================== -->
          <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best Selling Product</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">


            @foreach($best_selling as $product)
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> 
                              <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                               @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                              @else {{ $product->product_name_en }} 
                              @endif                     
                        
                             </a>
                          </h3>
                          @if(App\Models\Review::where('product_id',$product->id)->first())
                           @php
                              $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                              $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                              $avgRating = number_format($rating,1);
                          @endphp
                         @for($i=1;$i<=5;$i++)
                           <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                         @endfor
                          ({{ count($reviewcount) }} Reviews)
                         @else
                           <span class="text-danger">No review </span>
                         @endif   





                            @if($product->discount_price ==NULL)
                              <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
                            @else
                              <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
                            @endif
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                 
                       




                </div>
              </div>

             @endforeach



            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 


        
       

        <!-- ======================= BEST SELLER : END ========================= --> 
        


          <!-- ================================= Top Rated Product : END =========================== --> 
          <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Top Rated Products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">



            @foreach($best_rated as $product)
            <div class="item item-carousel">
            <div class="products">
               <div class="product">
                 <div class="product-image">
                   <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>

                        <!-- /.image -->
                     @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
             


                        
                      </div>
                      <!-- /.product-image -->
                      
                      <div class="product-info text-left">
                        <h3 class="name">
                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                            @if(session()->get('language') == 'hindi') {{ $product->product_name_hin }}  
                            @else {{ $product->product_name_en }}  @endif                     
                        
                         </a>
                      </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  


                      
                        <div class="description"></div>

              @if($product->discount_price ==NULL)
                 <div class="product-price"> <span class="price">${{ $product->selling_price }} </span></div>
              @else
                <div class="product-price"> <span class="price">${{ $product->discount_price }}</span> <span class="price-before-discount">${{ $product->selling_price }} </span> </div>
                            
              @endif


                        
                        <!-- /.product-price --> 
                        
                      </div>
              <!-- /.product-info   -->
      <div class="cart clearfix animate-effect"> 
        <div class="action">
          <ul class="list-unstyled">  
              <li class="add-cart-button btn-group">
                 <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                  data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                  <i class="fa fa-shopping-cart"></i> 
                 </button>
                 <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </li>
              
                <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                  onclick="addToWishList(this.id)"> 
                  <i class="fa fa-heart"></i> 
                 </button>
             
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
      </div>
      <!-- /.product --> 
      
    </div>
    <!-- /.products --> 
          </div>
                <!-- /.item carousel-->
            

           @endforeach

          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 




          <!-- =============================== Top Rated Product : END ============================================== --> 














        

        <!-- ========================= BLOG SLIDER ======================================= -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">Latest Form Blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">


             @foreach($blogpost as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
         <h3 class="name"><a href="#">@if(session()->get('language') == 'bangla') {{ $blog->post_title_bn }}  
        @else {{ $blog->post_title_en }} @endif</a></h3>

        <span class="text-info"> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>

        <p class="text">@if(session()->get('language') == 'bangla') {!! Str::limit($blog->post_details_bn, 200 ) !!}  
         @else {!! Str::limit($blog->post_details_en, 200 ) !!}
         @endif</p>

         <a href="{{ route('post.details',$blog->id) }}" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->


              @endforeach
            


              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ====================== BLOG SLIDER : END =========================== --> 


        
        <!-- ========================== FEATURED PRODUCTS ============================ -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


          @foreach($products as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                     <img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    @php
                       $amount = $product->selling_price - $product->discount_price;
                       $discount = ($amount/$product->selling_price)*100;
                     @endphp
             
                     <div>
                         @if($product->discount_price ==NULL)
                             <div class="tag new"><span>new</span></div>
                        @else
                           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                     </div>
                     
                    
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                         @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  
                        @else {{ $product->product_name_en }} 
                         @endif                     
                        
                      </a>
                    </h3>
                      @if(App\Models\Review::where('product_id',$product->id)->first())
                         @php
                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                            $rating = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                            $avgRating = number_format($rating,1);
                       @endphp
                       @for($i=1;$i<=5;$i++)
                        <span style="color:orange; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $avgRating) ? '' : '-empty'}}"></span>
                       @endfor
                       ({{ count($reviewcount) }} Reviews)
                      @else
                        <span class="text-danger">No review </span>
                      @endif  





                    <div class="description"></div>
                      @if($product->discount_price ==NULL)
                       <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
                      @else
                       <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span> <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
                            
                      @endif
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button  class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}"
                                data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" > 
                                <i class="fa fa-shopping-cart"></i> 
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                          </li>
                             <button  class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}"
                               onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> 
                             </button>
                       
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>

                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
           @endforeach

           
            
           
            
           
            
           
            
           
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ================ FEATURED PRODUCTS : END ========================== --> 
        



      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
     @include('frontend.body.brands')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 


@endsection