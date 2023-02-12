<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function AddBlog(){
        return view('admin.add_blog');
    }
    public function AddBlogInsert(Request $data){
        $data->validate([
            'blog_title' => 'required',
            'blog_details' => 'required',
            'blog_image' => 'required|mimes:jpg,png,jpeg,gif|max:2000',
        ]);
        if($data->blog_image){
            $extension = $data->blog_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->blog_image)->resize(450,450)->save('public/blog/'.$image);
            $image = "public/blog/".$image;
            DB::table('blogs')->insert([
                'blog_user_id' => Auth::user()->id,
                'blog_title' => $data->blog_title,
                'blog_details' => $data->blog_details,
                'blog_image' => $image,
                'blog_date' => date("Y-m-d"),
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success',1);
        }
    }

    public function ViewBlog(){
        $blogs = DB::table('blogs')->where('blog_delete',0)->get();
        return view('admin.view_blog',compact('blogs'));
    }

    public function DeleteBlog(Request $data){
        DB::table('blogs')->where('blog_id',$data->id)->update([
            'blog_delete' => 1,
        ]);
        return redirect()->back();
    }

    public function UpdateBlogStatus(Request $data){
        DB::table('blogs')->where('blog_id',$data->id)->update([
            'blog_status' => $data->status,
        ]);
        return redirect()->back();
    }

    public function EditBlog(Request $data){
        $blog = DB::table('blogs')->where('blog_id',$data->id)->first();
        return view('admin.edit_blog',compact('blog'));
    }

    public function UpdateBlog(Request $data){
        $data->validate([
            'blog_title' => 'required',
            'blog_details' => 'required',
            'blog_image' => 'mimes:jpg,png,jpeg,gif|max:2000',
        ]);

        if($data->blog_image){
            $extension = $data->blog_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->blog_image)->resize(300,300)->save('public/blog/'.$image);
            $image = "public/blog/".$image;
            DB::table('blogs')->where('blog_id',$data->blog_id)->update([
                'blog_title' => $data->blog_title,
                'blog_details' => $data->blog_details,
                'blog_image' => $image,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success',1);
        }else{
            DB::table('blogs')->where('blog_id',$data->blog_id)->update([
                'blog_title' => $data->blog_title,
                'blog_details' => $data->blog_details,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success',1);
        }

    }
}
