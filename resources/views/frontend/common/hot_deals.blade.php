@php
     $hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(4)->get();
@endphp


<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">



          @foreach($hot_deals as $product)

            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper"> 
                  <div class="image"> 
                     <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                    <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>

                  @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price)*100;
                  @endphp

                  @if($product->discount_price ==NULL)
                    <div class="tag new"><span>new</span></div>
                  @else
                  <div class="sale-offer-tag"><span>{{ round($discount) }}% <br>off</span></div>
                  @endif



                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">12</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
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


                  

                     @if($product->discount_price ==NULL)
                     <div class="product-price"> <span class="price">৳{{ $product->selling_price }} </span></div>
                     @else
                     <div class="product-price"> <span class="price">৳{{ $product->discount_price }}</span>
                     <span class="price-before-discount">৳{{ $product->selling_price }} </span> </div>
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
            </div>
            @endforeach  <!-- endforeach  end hot deals -->



         


          </div>
          <!-- /.sidebar-widget --> 
        </div>
