@php
 
  $tag_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
  $tag_bn = App\Models\Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();

@endphp




<div class="sidebar-widget product-tag wow fadeInUp">
   <h3 class="section-title">Product tags</h3>
       <div class="sidebar-widget-body outer-top-xs">


    <div class="tag-list"> 
        @if(session()->get('language') == 'bangla') 

             @foreach($tag_bn as $tag)
              <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_bn) }}">
                {{ str_replace(',',' ',$tag->product_tags_bn) }}
             </a>
            @endforeach

        @else
            @foreach($tag_en as $tag)
              <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
                 {{ str_replace(',',' ',$tag->product_tags_en) }}
             </a>
            @endforeach
                 
        @endif 
            
             
             
             
          </div>
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget -->