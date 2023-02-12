@extends('layouts.main_layout')

@section('content')
<form action="{{ url('/pay') }}" method="POST" >
    @csrf
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->

			<div class="col-lg-7">
				<div class="sidebar shadow">
					<div class="widget price text-center pt-2 pb-1 mb-0">
						<h4 class="">Customer Information</h4>
					</div>

					<div class="widget user mt-0">

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="" class="text-dark"><strong>Customer Name</strong></label>
                                    <input type="text" class="form-control" name="customer_name" value="{{ Session::get('Customer')->customer_name }}">
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="" class="text-dark"><strong>Customer Email</strong></label>
                                    <input type="text" class="form-control" name="customer_email" value="{{ Session::get('Customer')->customer_email }}">
                                    @error('customer_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="" class="text-dark"><strong>Customer Phone</strong></label>
                                    <input type="text" class="form-control" name="customer_phone" value="{{ Session::get('Customer')->customer_phone }}">
                                    @error('customer_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="" class="text-dark"><strong>Customer Address</strong></label>
                                    <textarea type="text" class="form-control" name="customer_address" >{{ Session::get('Customer')->customer_address }}</textarea>
                                    @error('customer_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

					</div>


				</div>
			</div>
            <div class="col-lg-5">
                <div class="sidebar shadow">
					<div class="widget bg-danger price text-center pt-2 pb-1 mb-0">
						<h4 class="">Service Information</h4>
					</div>

					<div class="widget user mt-0">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $cart)
                        <div class="row">
                            <div class="col-lg-7">
                                <strong>{{ $cart->service_name }}</strong>
                                <p><strong>Category : </strong> {{ $cart->cat_name }} <br>
                                    {{" ( ".$cart->cart_service_quantity." ".$cart->service_unit." )"}}
                                </p>

                            </div>
                            <div class="col-lg-5">
                                @if ($cart->service_discount>0)
                                <span class="text-danger"><strike>BDT {{ $cart->service_cost }} </strike></span> <span class="text-success weighted"> / {{ $cart->service_unit }}</span><br> BDT {{ $cart->service_discount_cost }} <span class="text-success weighted"> / {{ $cart->service_unit }}</span><br>
                                <span class="text-primary">Sub : BDT {{ $cart->service_discount_cost*$cart->cart_service_quantity }}</span>
                                @php
                                    $total = $total + ($cart->service_discount_cost*$cart->cart_service_quantity);
                                @endphp
                                @else
                                BDT {{ $cart->service_cost }} <span class="text-success weighted"> / {{ $cart->service_unit }}</span><br>
                                <span class="text-primary">Sub : BDT {{ $cart->service_cost*$cart->cart_service_quantity }}</span>
                                @php
                                    $total = $total + ($cart->service_cost*$cart->cart_service_quantity);
                                @endphp
                                @endif
                            </div>
                        </div>
                        <hr>
                        @endforeach

                        <div class="row mt-3">
                            <div class="col-lg-7">
                                <h2 style="font-weight:1000">Total</h2>
                            </div>
                            <div class="col-lg-5">
                                <h2 style="font-weight:1000">BDT {{$total}}</h2>
                                <input type="hidden" name="service_amount" value="{{$total}}">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <h4 style="font-weight: 1000">Select Payment method</h4>
                            </div>

                            <div class="col-lg-6">
                                <input type="radio" value="1" name="method"> Cash On Delevery
                            </div>
                            <div class="col-lg-6">
                                <input type="radio" value="2" name="method" checked> Online Payment
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-3">
                            @if ($total>0)
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-info float-right p-1">Continue</button>
                            </div>
                            @endif

                        </div>
					</div>


				</div>
            </div>

		</div>
	</div>
	<!-- Container End -->
</section>
</form>
@endsection
