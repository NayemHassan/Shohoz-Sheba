<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function AddUser(){
        return view('admin.add_user');
    }
    public function AddUserInsert(Request $data){
        $data->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,email',
            'user_phone' => 'required|max:14|unique:users,phone',
            'user_role' => 'required',
            'user_gender' => 'required',
            'user_address' => 'required',
            'user_image' => 'required|mimes:jpg,png,jpeg,gif|max:2000',
            'user_password' => 'required',
            'confirm_password' => 'required|same:user_password'
        ]);
        if($data->user_image){
            $extension = $data->user_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->user_image)->resize(300,300)->save('public/user_images/'.$image);
            $image = 'public/user_images/'.$image;
        }
        DB::table('users')->insert([
            'name' => $data->user_name,
            'email' => $data->user_email,
            'phone' => $data->user_phone,
            'role' => $data->user_role,
            'gender' => $data->user_gender,
            'address' => $data->user_address,
            'image' => $image,
            'password' => Hash::make($data->user_password),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('add_user')->with('success',1);
    }

    public function MyAccount(){
        return view('admin.my_account');
    }

    public function MyAccountUpdate(Request $data){
        $data->validate([
            'user_name' => 'required',
            'user_gender' => 'required',
            'user_address' => 'required',
            'user_image' => 'mimes:jpg,png,jpeg,gif|max:2000',
        ]);
        if($data->user_image){
            $extension = $data->user_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->user_image)->resize(300,300)->save('public/user_images/'.$image);
            $image = 'public/user_images/'.$image;
            DB::table('users')->where('id',Auth::user()->id)->update([
                'name' => $data->user_name,
                'gender' => $data->user_gender,
                'address' => $data->user_address,
                'image' => $image,
                'updated_at' => Carbon::now()
            ]);
        }else{
            DB::table('users')->where('id',Auth::user()->id)->update([
                'name' => $data->user_name,
                'gender' => $data->user_gender,
                'address' => $data->user_address,
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('success',1);
    }
    public function ChangePassword(){
        return view('admin.change_password');
    }
    public function ChangePasswordUpdate(Request $data){
        $data->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'rnew_password' => 'required|same:new_password',
        ]);

        if(Hash::check($data->old_password,Auth::user()->password)){
            DB::table('users')->where('id',Auth::user()->id)->update([
                'password' => Hash::make($data->new_password),
            ]);
            return redirect()->back()->with('success',1);
        }else{
            return redirect()->back()->with('invalid_password',1);
        }
    }

    public function ViewUser(){
        $users = DB::table('users')->where('id','!=','1')->get();
        return view('admin.view_user',compact('users'));
    }

    public function UpdateUserStatus(Request $data){
        DB::table('users')->where('id',$data->id)->update([
            'status' => $data->status,
        ]);
        return redirect()->back();
    }

    public function DeleteUser(Request $data){
        DB::table('users')->where('id',$data->id)->delete();
        return redirect()->back();
    }

    public function Logo(){
        $logo = DB::table('logos')->first();
        return view('admin.logo',compact('logo'));
    }
    public function LogoUpdate(Request $data){
        $logo = DB::table('logos')->first();
        // unlink($logo->logo);
        $extension = $data->logo->getClientOriginalExtension();
        $image = time().".".$extension;
        Image::make($data->logo)->resize(250,100)->save('public/logos/'.$image);
        $image = 'public/logos/'.$image;
        DB::table('logos')->where('id',1)->update([
            'logo' => $image,
        ]);
        return redirect()->back()->with('success',1);
    }


}
