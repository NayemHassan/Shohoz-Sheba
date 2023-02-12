@extends('layouts.main_layout')

@section('content')
<script>
    	$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
</script>

<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->

			<div class="col-lg-10 mx-auto">
				<div class="sidebar shadow">
					<div class="widget price text-center p-2 mb-0">
						<h4 class="">Cart</h4>
					</div>

					<div class="widget user mt-0">
                        <table class="table table-bordered">
                            <tr class="text-center bg-dark text-light">
                                <th>Service Details </th>
                                <th>Service Cost </th>
                                <th>Service Quantity </th>
                                <th>Action</th>
                            </tr>
                            @foreach ($carts as $cart)
                            <tr>
                                <td><strong>{{ $cart->service_name }}</strong>
                                    <p><strong>Category : </strong> {{ $cart->cat_name }}</p>
                                </td>
                                <td>
                                    @if ($cart->service_discount>0)
                                        <p><span class="text-danger mr-2"><strike>BDT {{ $cart->service_cost }} </strike></span> BDT {{ $cart->service_discount_cost }} <span class="text-success weighted"> / {{ $cart->service_unit }}</span></p>
                                    @else
                                    <p> BDT {{ $cart->service_discount_cost }} <span class="text-success weighted"> / {{ $cart->service_unit }}</span></p>
                                    @endif
                                    <p><strong>Total : </strong>
                                        @if ($cart->service_discount>0)
                                            BDT {{$cart->service_discount_cost*$cart->cart_service_quantity." ( ".$cart->cart_service_quantity." ".$cart->service_unit." )"}}
                                        @else
                                            BDT {{$cart->service_cost*$cart->cart_service_quantity." ( ".$cart->cart_service_quantity." ".$cart->service_unit." )"}}
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <div class="input-group mb-3 mt-3 mx-auto">
                                        <div class="input-group-prepend">
                                          <a href="{{ route('update_cart',[$cart->cart_id,-1]) }}" class="input-group-text">-</a>
                                        </div>
                                        <input type="text" style="padding-left: 40px;width:100px" value="{{ $cart->cart_service_quantity }}">
                                        <div class="input-group-append">
                                          <a href="{{ route('update_cart',[$cart->cart_id,1]) }}" class="input-group-text">+</a>
                                        </div>
                                      </div>
                                </td>
                                <td class="text-center">
                                    <a onclick="return confirm('Are You sure want to remove ?')" href="{{ route('delete_cart',$cart->cart_id) }}" class="btn btn-outline-danger px-4 py-1 mt-3" href=""><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </table>

                        {{-- <div class="row">
                            <div class="col-lg-9">

                            </div>
                            <div class="col-lg-3 text-center">
                                <button class="btn btn-outline-danger py-1 px-4"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                        <hr> --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('checkout') }}" class="btn btn-info float-right">Proceed To Checkout</a>
                            </div>

                        </div>
					</div>


				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
@endsection
