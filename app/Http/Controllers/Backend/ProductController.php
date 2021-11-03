<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon; 
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        
        return view('backend.product.product_add',compact('categories','brands'));
        
    }




    public function StoreProduct(Request $request){

        $image =  $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;


       $product_id = Product::insertGetId([  
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ', '-',$request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-',$request->product_name_bn),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(), 
       

            
        ]);


         ////////// Multiple Image Upload Start ///////////
         $images =  $request->file('multi_img');
         foreach($images as $img){

              $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
              Image::make($img)->resize(917,1000)->save('upload/products/multi-img/'.$make_name);
              $upload_path = 'upload/products/multi-img/'.$make_name;

              MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(), 


              ]);

         }

        //////// end multiple Image 

        $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('manage-product')->with($notification);

    }
    ////end method




    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }





    public function EditProduct($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);

         return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));

    }







    public function UpdateProduct(Request $request){

       $product_id = $request->id;

       Product::findOrFail($product_id)->update([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'subsubcategory_id' => $request->subsubcategory_id,
        'product_name_en' => $request->product_name_en,
        'product_name_bn' => $request->product_name_bn,
        'product_slug_en' => strtolower(str_replace(' ', '-',$request->product_name_en)),
        'product_slug_bn' => str_replace(' ', '-',$request->product_name_bn),
        'product_code' => $request->product_code,

        'product_qty' => $request->product_qty,
        'product_tags_en' => $request->product_tags_en,
        'product_tags_bn' => $request->product_tags_bn,
        'product_size_en' => $request->product_size_en,
        'product_size_bn' => $request->product_size_bn,
        'product_color_en' => $request->product_color_en,
        'product_color_bn' => $request->product_color_bn,

        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'short_descp_en' => $request->short_descp_en,
        'short_descp_bn' => $request->short_descp_bn,
        'long_descp_en' => $request->long_descp_en,
        'long_descp_bn' => $request->long_descp_bn,

        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
        'special_deals' => $request->special_deals,

        'status' => 1,
        'created_at' => Carbon::now(), 
       

       ]);

       $notification = array(
        'message' => 'Product Updated Without Image Successfully',
        'alert-type' => 'success'
       );         
       return Redirect()->route('manage-product')->with($notification);

    } ///end method



    public function MultiImageUpdate(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);

    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-img/'.$make_name);
    	$uploadPath ='upload/products/multi-img/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod 



    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImg = $request->old_img;
        unlink($oldImg);

        $image =  $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;


        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
			'message' => 'Product Image Thambnail  Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }



    public function MultiImageDelete($id){
        $old_img = MultiImg::findOrFail($id);
        unlink($old_img->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
			'message' => 'Product Image Delete Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    }


    public function ProductInactive($id){

        Product::findOrFail($id)->update(['status' =>0]);
        $notification = array(
			'message' => 'Product Inactive',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


     }



    public function ProductActive($id){
        
        Product::findOrFail($id)->update(['status' =>1]);
        $notification = array(
			'message' => 'Product Active',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }


    public function ProductDelete($id){

        $product = Product::findOrFail($id);
        unlink( $product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

        
    }




    //product Stock
    public function ProductStock(){
        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
    }




}
