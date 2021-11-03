<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory= SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }


    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
    		'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            
    		
    	],[
    		'category_id.required' => 'please select any optin',
            'subcategory_name_en.required' => 'Input Subcategory English Name'
    		
    	]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-',$request->subcategory_name_bn),
            
        ]);
        $notification = array(
            'message' => 'Subcategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    } //end method


    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory= SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }

    public function SubCategoryUpdate(Request $request){

        $subcat_id= $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-',$request->subcategory_name_bn),

        ]);
        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );         
        return Redirect()->route('all.subcategory')->with($notification);

    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'info'
        );   
        return Redirect()->back()->with($notification);
    }


}
 