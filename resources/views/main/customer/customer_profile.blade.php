@extends('layouts.main_layout')

@section('content')
<form action="{{ route('customer_profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->

			<div class="col-lg-8">
				<div class="sidebar shadow">
					<div class="widget price text-center pt-2 pb-1 mb-0">
						<h4 class="">My Information</h4>
					</div>
                    @php
                        $customer = DB::table('customers')->where('customer_id',Session::get('Customer')->customer_id)->first();
                    @endphp

					<div class="widget user mt-0">
                            
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <img class="shadow" src="{{ asset($customer->customer_image) }}" height="200px" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="" class="text-dark"><strong>User Name</strong></label>
                                    <input type="text" class="form-control" name="user_name" value="{{ $customer->customer_name }}">
                                    @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>User Email</strong></label>
                                    <input type="text" class="form-control" name="user_email" value="{{ $customer->customer_email }}" readonly>
                                    @error('user_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>User Phone</strong></label>
                                    <input type="text" class="form-control" name="user_phone" value="{{ $customer->customer_phone }}" readonly>
                                    @error('user_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="text-dark"><strong>User Birthday</strong></label>
                                    <input class="form-control" type="date" value="{{$customer->customer_birthday }}" name="user_birthday" >
                                    @error('user_birthday')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="" class="text-dark"><strong>User Address</strong></label>
                                    <textarea type="text" class="form-control" name="user_address" >{{ $customer->customer_address }}</textarea>
                                    @error('user_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="" class="text-dark"><strong>User Image</strong></label>
                                    <input class="form-control" type="file" value="{{ old('user_image') }}" name="user_image" >
                                    @error('user_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <button type="submit" class="btn btn-success float-right">Update</button>
                                </div>
                            </div>

					</div>


				</div>
			</div>
            <div class="col-lg-4">
                <div class="sidebar shadow">
					<div class="widget bg-danger price text-center pt-2 pb-1 mb-0">
						<h4 class="">Others</h4>
					</div>

					<div class="widget user mt-0">
                        <ul class="mb-3">
                            <li class="mb-3"><a href="{{ route('order') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> My Orders</a></li>
                            <li class="mb-3"><a href="{{ route('cart') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> My Cart</a></li>
                            <li class="mb-3"><a href="{{ route('blogs') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> Blogs</a></li>
                            <li><a href="{{ route('customer_change_password') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> Change Password</a></li>
                        </ul>
					</div>


				</div>
            </div>

		</div>
	</div>
	<!-- Container End -->
</section>
</form>
@endsection
