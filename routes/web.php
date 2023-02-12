<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::controller(UserController::class)->group(function(){

        Route::get('/add-user','AddUser')->name('add_user');
        Route::post('/add-user','AddUserInsert')->name('add_user');
        Route::get('/my-account','MyAccount')->name('my_account');
        Route::post('/my-account','MyAccountUpdate')->name('my_account');
        Route::get('/change-password','ChangePassword')->name('change_password');
        Route::post('/change-password','ChangePasswordUpdate')->name('change_password');
        Route::get('/view-user','ViewUser')->name('view_user');
        Route::get('/update-user-status/{id}/{status}','UpdateUserStatus')->name('update_user_status');
        Route::get('/delete-user/{id}','DeleteUser')->name('delete_user');


        //logo

        Route::get('/logo','Logo')->name('logo');
        Route::post('/logo','LogoUpdate')->name('logo');

    });
    Route::controller(CustomerController::class)->group(function(){

        Route::get('/pending-order','PendingOrder')->name('pending_order');
        Route::get('/order-details/{order_id}','EditOrder')->name('edit_order');
        Route::post('/update-order-service','UpdateOrderService')->name('update_order_service');
        Route::get('/update-order-status/{order_id}/{order_status}','UpdateOrderStatus')->name('update_order_status');
        Route::get('/accepted-order','AcceptedOrder')->name('accepted_order');
        Route::get('/completed-order','CompletedOrder')->name('completed_order');
        Route::get('/review','Reviews')->name('review');
        Route::get('/delete-review/{review_id}','DeleteReview')->name('delete_review');
        Route::get('/update-review/{review_id}/{status}','UpdateReview')->name('update_review');


        Route::get('/update-contact','ViewContact')->name('update_contact');
        Route::post('/update-contact','UpdateContact')->name('update_contact');
        Route::get('/view-message','ViewMessage')->name('view_message');
        Route::get('/update-message-status/{id}/{status}','UpdateMsg')->name('update_message_status');



    });
    Route::controller(CategoryProductController::class)->group(function(){
        Route::get('/add-category','AddCategory')->name('add_category');
        Route::post('/add-category','AddCategoryInsert')->name('add_category');
        Route::get('/view-category','ViewCategory')->name('view_category');
        Route::get('/delete-category/{id}','DeleteCategory')->name('delete_category');
        Route::get('/update-category-status/{id}/{status}','UpdateCategoryStatus')->name('update_category_status');
        Route::get('/edit-category/{id}','EditCategory')->name('edit_categorys');
        Route::post('/edit-category','UpdateCategory')->name('edit_category');

        //product part
        Route::get('/add-service','AddService')->name('add_service');
        Route::post('/add-service','AddServiceInsert')->name('add_service');
        Route::get('/view-service','ViewService')->name('view_service');
        Route::get('/delete-service/{id}','DeleteService')->name('delete_service');
        Route::get('/edit-service/{id}','EditService')->name('edit_services');
        Route::post('/edit-service','UpdateService')->name('edit_service');
        Route::get('/update-service-status/{id}/{status}','UpdateServiceStatus')->name('update_service_status');

        //quotes
        Route::get('/add-quote','AddQuote')->name('add_quote');
        Route::post('/add-quote','QuoteInsert')->name('add_quote');
        Route::get('/view-quote','ViewQuote')->name('view_quote');
        Route::get('/delete-quote/{id}','DeleteQuote')->name('delete_quote');
        Route::get('/update-quotes-status/{id}/{status}','UpdateQuote')->name('update_quotes_status');
    });

    Route::controller(BlogController::class)->group(function(){
        Route::get('/add-blog','AddBlog')->name('add_blog');
        Route::post('/add-blog','AddBlogInsert')->name('add_blog');
        Route::get('/view-blog','ViewBlog')->name('view_blog');
        Route::get('/delete-blog/{id}','DeleteBlog')->name('delete_blog');
        Route::get('/update-blog-status/{id}/{status}','UpdateBlogStatus')->name('update_blog_status');
        Route::get('/edit-blog/{id}','EditBlog')->name('edit_blogs');
        Route::post('/edit-blog','UpdateBlog')->name('edit_blog');
    });
});


//customer part
Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer-login','CustomerLogin')->name('customer_login');
    Route::post('/customer-login','Login')->name('customer_login');
    Route::get('/customer-registration','CustomerRegistration')->name('customer_registration');
    Route::post('/customer-registration','CustomerRegistrationInsert')->name('customer_registration');

    Route::get('/category-details/{id}','CategoryDetails')->name('category_details');

    //blogs
    Route::get('/blogs','Blogs')->name('blogs');
    Route::get('/blog-details/{id}','BlogDetails')->name('blog_details');

    //search
    Route::post('/search','Search')->name('search');

    //contact
    Route::get('/contact','Contact')->name('contact');
    Route::post('/contact','Message')->name('contact');

});
Route::middleware('customer_login')->group(function(){
    Route::controller(CustomerController::class)->group(function(){
        Route::get('/visitor-logout',function(){
            Session::forget('Customer');
            return redirect('/');
        })->name('visitor_logout');

        Route::get('/add-cart/{service_id}/{category_id}','AddCart')->name('add_cart');
        Route::get('/cart','Cart')->name('cart');
        Route::get('/update-cart/{cart_id}/{value}','UpdateCart')->name('update_cart');
        Route::get('/delete-cart/{cart_id}','DeleteCart')->name('delete_cart');
        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/orders','Orders')->name('order');
        Route::post('/review','Review')->name('review');

        Route::get('/customer-profile','CustomerProfile')->name('customer_profile');
        Route::post('/customer-profile','CustomerProfileUpdate')->name('customer_profile');
        Route::get('/customer-change-password','CustomerChangePassword')->name('customer_change_password');
        Route::post('/customer-change-password','CustomerPasswordUpdate')->name('customer_change_password');
    });
});




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
