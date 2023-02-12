<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function CustomerLogin(){
        return view('main.customer.customer_login');
    }
    public function CustomerRegistration(){
        return view('main.customer.customer_registration');
    }
    public function CustomerRegistrationInsert(Request $data){
        $data->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:customers,customer_email',
            'user_phone' => 'required|unique:customers,customer_phone',
            'user_birthday' => 'required',
            'user_image' => 'required|mimes:jpg,png,jpeg,gif|max:2000',
            'user_gender' => 'required',
            'user_address' => 'required',
            'user_password' => 'required',
            'retype_password' => 'required|same:user_password',
        ]);
        $extension = $data->user_image->getClientOriginalExtension();
        $image = time().".".$extension;
        Image::make($data->user_image)->resize(300,300)->save('public/customer/'.$image);
        $image = "public/customer/".$image;
        DB::table('customers')->insert([
            'customer_name' => $data->user_name,
            'customer_email' => $data->user_email,
            'customer_phone' => $data->user_phone,
            'customer_birthday' => $data->user_birthday,
            'customer_image' => $image,
            'customer_gender' => $data->user_gender,
            'customer_address' => $data->user_address,
            'customer_password' => md5($data->user_password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success',1);
    }
    public function Login(Request $data){
        $data->validate([
            'user_email' => 'required',
            'user_password' => 'required',
        ]);
        $check_email = DB::table('customers')->where('customer_email',$data->user_email)->first();
        if($check_email){
            $check = DB::table('customers')->where('customer_email',$data->user_email)->where('customer_password',md5($data->user_password))->first();
            if($check){
                session()->put('Customer',$check);
                return redirect('/');
            }else{
                return redirect()->back()->with('invalid_pass',1)->withInput($data->all());
            }
        }else{
            $check_phone = DB::table('customers')->where('customer_phone',$data->user_email)->first();
            if($check_phone){
                $check = DB::table('customers')->where('customer_phone',$data->user_email)->where('customer_password',md5($data->user_password))->first();
                if($check){
                    session()->put('Customer',$check);
                    return redirect('/');
                }else{
                    return redirect()->back()->with('invalid_pass',1)->withInput($data->all());
                }
            }else{
                return redirect()->back()->with('invalid_email',1)->withInput($data->all());
            }
        }
    }

    public function CategoryDetails(Request $data){
        $category = DB::table('categories')->where('cat_id',$data->id)->first();
        return view('main.category_details',compact('category'));
    }

    public function Blogs(){
        $blogs = DB::table('blogs')
        ->join('users','blogs.blog_user_id','users.id')
        ->where('blog_status','Enable')->where('blog_delete',0)
        ->select('blogs.*','users.name')
        ->simplePaginate(10);
        return view('main.blogs',compact('blogs'));
    }

    public function BlogDetails(Request $data){
        $blog = DB::table('blogs')
        ->join('users','blogs.blog_user_id','users.id')
        ->where('blog_status','Enable')->where('blog_delete',0)
        ->where('blog_id',$data->id)
        ->select('blogs.*','users.name')
        ->first(1);
        return view('main.blog_details',compact('blog'));
    }

    public function AddCart(Request $data){
        $check = DB::table('cart')->where('cart_customer_id',Session::get('Customer')->customer_id)->where('cart_service_id',$data->service_id)->where('cart_category_id',$data->category_id)->first();
        if($check){
            DB::table('cart')->where('cart_customer_id',Session::get('Customer')->customer_id)->where('cart_service_id',$data->service_id)->where('cart_category_id',$data->category_id)->update([
                'cart_service_quantity' => $check->cart_service_quantity+1,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success',1);
        }else{
            DB::table('cart')->insert([
                'cart_customer_id'=> Session::get('Customer')->customer_id,
                'cart_category_id'=>$data->category_id,
                'cart_service_id'=>$data->service_id,
                'cart_service_quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success',1);
        }
    }

    public function Cart(){
        $carts = DB::table('cart')
        ->join('services','cart.cart_service_id','services.service_id')
        ->join('categories','cart.cart_category_id','categories.cat_id')
        ->where('cart_customer_id',Session::get('Customer')->customer_id)
        ->select('cart.*','services.service_name','services.service_cost','services.service_discount','services.service_discount_cost','services.service_unit','categories.cat_name')
        ->get();
        return view('main.cart',compact('carts'));
    }
    public function UpdateCart(Request $data){

        $check = DB::table('cart')->where('cart_id',$data->cart_id)->first();
        if($check->cart_service_quantity==1 && $data->value==-1){
            return redirect()->back();
        }
        DB::table('cart')->where('cart_id',$data->cart_id)->update([
            'cart_service_quantity' => $check->cart_service_quantity+$data->value,
        ]);
        return redirect()->back();
    }

    public function DeleteCart(Request $data){
        DB::table('cart')->where('cart_id',$data->cart_id)->delete();
        return redirect()->back();
    }

    //Checkout
    public function Checkout(){
        $carts = DB::table('cart')
        ->join('services','cart.cart_service_id','services.service_id')
        ->join('categories','cart.cart_category_id','categories.cat_id')
        ->where('cart_customer_id',Session::get('Customer')->customer_id)
        ->select('cart.*','services.service_name','services.service_cost','services.service_discount','services.service_discount_cost','services.service_unit','categories.cat_name')
        ->get();
        return view('main.checkout',compact('carts'));
    }

    public function Orders(){
        $orders = DB::table('customer_orders')->where('order_customer_id',Session::get('Customer')->customer_id)->orderBy('order_id','DESC')->get();
        return view('main.orders',compact('orders'));
    }


    //admin

    public function PendingOrder(){
        $orders = DB::table('customer_orders')->where('order_status','Pending')->get();
        return view('admin.pending_order',compact('orders'));
    }

    public function AcceptedOrder(){
        $orders = DB::table('customer_orders')->where('order_status','Accepted')->get();
        return view('admin.accepted_order',compact('orders'));
    }

    public function CompletedOrder(){
        $orders = DB::table('customer_orders')->where('order_status','Completed')->get();
        return view('admin.completed_order',compact('orders'));
    }

    public function EditOrder(Request $data){
        $services = DB::table('order_services')
        ->join('services','order_services.os_service_id','services.service_id')
        ->where('os_order_id',$data->order_id)
        ->select('order_services.*','services.service_name','services.service_unit')
        ->get();
        return view('admin.edit_order',compact('services'));
    }
    public function UpdateOrderService(Request $data){
        DB::table('order_services')->where('os_id',$data->os_id)->update([
            'os_technician_name' => $data->tecnician_name,
            'os_technician_phone' => $data->tecnician_phone,
            'os_service_date' => $data->service_date,
            'os_status' => 'Accepted'
        ]);
        return redirect()->back();
    }

    public function UpdateOrderStatus(Request $data){
        if($data->order_status=='Completed'){
            DB::table('customer_orders')->where('order_id',$data->order_id)->update([
                'order_status' => $data->order_status,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back();
        }else{
            DB::table('customer_orders')->where('order_id',$data->order_id)->update([
                'order_status' => $data->order_status,
            ]);
            return redirect()->back();
        }
    }

    public function Search(Request $data){
        $search = DB::table('services')->where('service_name','like','%'.$data->search.'%')->first();
        if($search){
            return redirect()->route('category_details',$search->service_cat_id);
        }else{
            return redirect()->back()->with('failed',1);
        }
    }

    public function Review(Request $data){
        DB::table('reviews')->insert([
            'review_customer_id' => Session::get('Customer')->customer_id,
            'review_category_id' => $data->cat_id,
            'review' => $data->review,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back();
    }

    public function Reviews(){
        $reviews = DB::table('reviews')
        ->join('customers','reviews.review_customer_id','customers.customer_id')
        ->join('categories','reviews.review_category_id','categories.cat_id')
        ->select('reviews.*','customers.customer_name','categories.cat_name')
        ->get();
        return view('admin.reviews',compact('reviews'));
    }

    public function DeleteReview(Request $data){
        DB::table('reviews')->where('review_id',$data->review_id)->delete();
        return redirect()->back();
    }

    public function UpdateReview(Request $data){
        DB::table('reviews')->where('review_id',$data->review_id)->update([
            'review_status' => $data->status,
        ]);
        return redirect()->back();
    }

    public function CustomerProfile(){
        return view('main.customer.customer_profile');
    }

    public function CustomerProfileUpdate(Request $data){
        $data->validate([
            'user_name' => 'required',
            'user_birthday' => 'required',
            'user_image' => 'mimes:jpg,png,jpeg,gif|max:2000',
            'user_address' => 'required',
        ]);
        if($data->user_image){
            $extension = $data->user_image->getClientOriginalExtension();
            $image = time().".".$extension;
            Image::make($data->user_image)->resize(300,300)->save('public/customer/'.$image);
            $image = "public/customer/".$image;
            DB::table('customers')->where('customer_id',Session::get('Customer')->customer_id)->update([
                'customer_name' => $data->user_name,
                'customer_birthday' => $data->user_birthday,
                'customer_image' => $image,
                'customer_address' => $data->user_address,
                'updated_at' => Carbon::now(),
            ]);
        }else{
            DB::table('customers')->where('customer_id',Session::get('Customer')->customer_id)->update([
                'customer_name' => $data->user_name,
                'customer_birthday' => $data->user_birthday,
                'customer_address' => $data->user_address,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->back()->with('success',1);
    }

    public function CustomerChangePassword(){
        return view('main.customer.change_password');
    }

    public function CustomerPasswordUpdate(Request $data){
        $data->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'rnew_password' => 'required|same:new_password'
        ]);
        $cus = DB::table('customers')->where('customer_id',Session::get('Customer')->customer_id)->first();
        if($cus->customer_password==md5($data->current_password)){
            DB::table('customers')->where('customer_id',Session::get('Customer')->customer_id)->update([
                'customer_password' => md5($data->new_password),
            ]);
            return redirect()->back()->with('success',1);
        }else{
            return redirect()->back()->with('invalid',1);
        }
    }

    public function Contact(){
        return view('main.contact');
    }

    public function Message(Request $data){
        DB::table('messages')->insert([
            'message_user_name' => $data->user_name,
            'message_user_email' => $data->user_email,
            'message_user_phone' => $data->user_phone,
            'message' => $data->user_message,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success',1);
    }

    public function ViewContact(){
        $contact = DB::table('contacts')->first();
        return view('admin.view_contact',compact('contact'));
    }
    public function UpdateContact(Request $data){
        DB::table('contacts')->where('contact_id',1)->update([
            'contact_number' => $data->contact_number,
            'contact_email' => $data->contact_email,
            'contact_address' => $data->contact_address,
            'contact_page' => $data->contact_page,
        ]);

        return redirect()->back()->with('success',1);
    }

    public function ViewMessage(){
        $messages = DB::table('messages')->get();
        return view('admin.view_message',compact('messages'));
    }
    public function UpdateMsg(Request $data){
        DB::table('messages')->where('message_id',$data->id)->update([
            'message_status' =>$data->status,
        ]);
        return redirect()->back();
    }
}
