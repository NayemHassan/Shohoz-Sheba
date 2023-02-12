<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CategoryProductController extends Controller
{
    //category part
    public function AddCategory(){
        return view('admin.add_category');
    }
    public function AddCategoryInsert(Request $data){
        $data->validate([
            'category_name' => 'required',
            'category_details' => 'required',
            'category_image' => 'required|mimes:jpg,png,jpeg,gif|max:2000',
        ]);
        if($data->category_image){
            $extension = $data->category_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->category_image)->resize(700,700)->save('public/category/'.$image);
            $image = "public/category/".$image;
            DB::table('categories')->insert([
                'cat_name' => $data->category_name,
                'cat_details' => $data->category_details,
                'cat_image' => $image,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success',1);
        }
    }

    public function ViewCategory(){
        $categories = DB::table('categories')->where('cat_delete',0)->get();
        return view('admin.view_category',compact('categories'));
    }

    public function DeleteCategory(Request $data){
        DB::table('categories')->where('cat_id',$data->id)->update([
            'cat_delete' => 1,
        ]);
        return redirect()->back();
    }

    public function UpdateCategoryStatus(Request $data){
        DB::table('categories')->where('cat_id',$data->id)->update([
            'cat_status' => $data->status,
        ]);
        return redirect()->back();
    }
    public function EditCategory(Request $data){
        $category = DB::table('categories')->where('cat_id',$data->id)->first();
        return view('admin.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $data){
        $data->validate([
            'category_name' => 'required',
            'category_details' => 'required',
            'category_image' => 'mimes:png,jpg,jpeg,gif|max:2000'
        ]);

        if($data->category_image){
            $extension = $data->category_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->category_image)->resize(1080,1080)->save('public/category/'.$image);
            $image = "public/category/".$image;
            DB::table('categories')->where('cat_id',$data->category_id)->update([
                'cat_name' => $data->category_name,
                'cat_details' => $data->category_details,
                'cat_image' => $image,
            ]);
            return redirect()->back()->with('success',1);
        }else{
            DB::table('categories')->where('cat_id',$data->category_id)->update([
                'cat_name' => $data->category_name,
                'cat_details' => $data->category_details,
            ]);
            return redirect()->back()->with('success',1);
        }

    }

    //service product

    public function AddService(){
        $categories = DB::table('categories')->where('cat_status','Enable')->where('cat_delete',0)->get();
        return view('admin.add_service',compact('categories'));
    }

    public function AddServiceInsert(Request $data){
        $data->validate([
            'category_id' => 'required',
            'service_name' => 'required',
            'service_cost' => 'required|min:1',
            'service_unit' => 'required',
            'service_discount' => 'min:0',
            'service_details' => 'required',
        ]);
        $discount = 0 ;
        $discount_cost = $data->service_cost;
        if($data->service_discount>0){
            $discount = $data->service_discount;
            $discount_cost = ceil($discount_cost-(($discount_cost*$discount)/100));
        }
        $cat = DB::table('categories')->where('cat_id',$data->category_id)->select('categories.cat_name')->first();
        DB::table('services')->insert([
            'service_cat_id' => $data->category_id,
            'service_cat_name' => $cat->cat_name,
            'service_name' => $data->service_name,
            'service_cost' => $data->service_cost,
            'service_unit' => $data->service_unit,
            'service_discount' => $discount,
            'service_discount_cost' => $discount_cost,
            'service_details' => $data->service_details,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success',1);

    }
    public function ViewService(){
        $services = DB::table('services')->where('service_delete',0)->get();
        return view('admin.view_service',compact('services'));
    }
    public function DeleteService(Request $data){
        DB::table('services')->where('service_id',$data->id)->update([
            'service_delete' => 1,
        ]);
        return redirect()->back();
    }
    public function EditService(Request $data){
        $service = DB::table('services')->where('service_id',$data->id)->first();
        return view('admin.edit_service',compact('service'));
    }

    public function UpdateService(Request $data){
        $data->validate([
            'category_id' => 'required',
            'service_name' => 'required',
            'service_cost' => 'required|min:1',
            'service_unit' => 'required',
            'service_discount' => 'min:0',
            'service_details' => 'required',
        ]);
        $discount = $data->service_discount ;
        $discount_cost = $data->service_cost;
        if($data->service_discount>0){
            $discount = $data->service_discount;
            $discount_cost = ceil($discount_cost-(($discount_cost*$discount)/100));
        }
        $cat = DB::table('categories')->where('cat_id',$data->category_id)->select('categories.cat_name')->first();
        DB::table('services')->where('service_id',$data->service_id)->update([
            'service_cat_id' => $data->category_id,
            'service_cat_name' => $cat->cat_name,
            'service_name' => $data->service_name,
            'service_cost' => $data->service_cost,
            'service_unit' => $data->service_unit,
            'service_discount' => $discount,
            'service_discount_cost' => $discount_cost,
            'service_details' => $data->service_details,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success',1);
    }

    public function UpdateServiceStatus(Request $data){
        DB::table('services')->where('service_id',$data->id)->update([
            'service_status' => $data->status,
        ]);
        return redirect()->back();
    }

    public function AddQuote(){
        return view('admin.add_quote');
    }

    public function QuoteInsert(Request $data){
        $extension = $data->quote_author_image->getClientOriginalExtension();
        $image = time().".".$extension;
        Image::make($data->quote_author_image)->resize(1080,1080)->save('public/quotes/'.$image);
        $image = "public/quotes/".$image;
        DB::table('quotes')->insert([
            'quote_author' => $data->quote_author,
            'quote_details'=>$data->quote_details,
            'quote_author_image'=>$image,
            'quote_status' => 'Enable',
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success',1);
    }

    public function ViewQuote(){
        $quotes = DB::table('quotes')->get();
        return view('admin.view_quote',compact('quotes'));
    }

    public function DeleteQuote(Request $data){
        DB::table('quotes')->where('quote_id',$data->id)->delete();
        return redirect()->back();
    }

    public function UpdateQuote(Request $data){
        DB::table('quotes')->where('quote_id',$data->id)->update([
            'quote_status' => $data->status
        ]);
        return redirect()->back();
    }
}
