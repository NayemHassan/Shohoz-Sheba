@extends('layouts.main_layout')

@section('content')

<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
        @foreach ($orders as $order)


		<div class="row">
			<!-- Left sidebar -->
            <div class="col-lg-4">
                <div class="sidebar shadow">
					<div class="widget price text-center p-2 mb-0">
						<h4 class="">Oreder Details ( {{$order->order_status}} )</h4>
					</div>
					<div class="row ml-2 mt-2">
                        <div class="col-lg-3">
                            <strong>Name </strong>
                        </div>
                        <div class="col-lg-9">
                            {{$order->order_customer_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-2">
                        <div class="col-lg-3">
                            <strong>Email </strong>
                        </div>
                        <div class="col-lg-9">
                            {{$order->order_customer_email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-2">
                        <div class="col-lg-3" >
                            <strong>Phone </strong>
                        </div>
                        <div class="col-lg-9">
                            {{$order->order_customer_phone}}
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-2">
                        <div class="col-lg-3" >
                            <strong>Address </strong>
                        </div>
                        <div class="col-lg-9" style="width: 40px">
                            @php
                                $explode = explode(',',$order->order_customer_address)
                            @endphp
                            @foreach ($explode as $add)
                            {{$add." , "}}
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-2 text-success">
                        <div class="col-lg-5" >
                            <strong>Order Method </strong>
                        </div>
                        <div class="col-lg-7">
                            @if ($order->payment_method==1)
                            Cash On Delevery
                            @else
                            Online
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-2 text-danger">
                        <div class="col-lg-6" >
                            <strong>Order Amount </strong>
                        </div>
                        <div class="col-lg-6">
                            BDT {{$order->order_amount}}
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-2 text-primary">
                        <div class="col-lg-5" >
                            <strong>Order Date </strong>
                        </div>
                        <div class="col-lg-7">
                             {{date("d F Y",strtotime($order->order_date))}}
                        </div>
                    </div>
                    <hr>
                    @if ($order->updated_at!=NULL)
                    <div class="row ml-2 mt-2 text-success">
                        <div class="col-lg-5" >
                            <strong>Completed At</strong>
                        </div>
                        <div class="col-lg-7">
                             {{date("d F Y",strtotime($order->updated_at))}}
                        </div>
                    </div>
                    <hr>
                    @endif
				</div>
            </div>
			<div class="col-lg-8">
				<div class="sidebar shadow">
					<div class="widget price text-center p-2 mb-0">
						<h4 class="">Ordered Service Details</h4>
					</div>

					<div class="widget user mt-0">
                        <table class="table table-bordered">
                            <tr class="text-center bg-dark text-light">
                                <th>Details</th>
                                @if ($order->order_status!='Pending')
                                <th>Technician Details</th>
                                @endif
                                <th>Status</th>
                            </tr>
                            @php
                                $oss = DB::table('order_services')
                                ->join('services','order_services.os_service_id','services.service_id')
                                ->select('order_services.*','services.service_name','services.service_unit')
                                ->where('os_order_id',$order->order_id)->get();
                            @endphp
                            @foreach ($oss as $os)
                                <tr>
                                    <td style="width:40%">
                                        <span>{{$os->service_name}}</span><br>
                                        <span class="text-info">{{ $os->os_service_total_cost." / ".$os->service_unit." ( ".$os->os_service_quantity." ) " }}</span><br>
                                    </td>
                                    @if ($order->order_status!='Pending')
                                    <td>
                                        <span>{{$os->os_technician_name}}</span><br>
                                        <span>{{$os->os_technician_phone}}</span><br>
                                        @if ($os->os_service_date!=NULL)
                                        <span class="text-success">Service Date </span><br>
                                        <span>{{date('d F Y',strtotime($os->os_service_date))}}</span>
                                        @endif

                                    </td>
                                    @endif
                                    <td class="text-center">
                                        <span class="text-danger">{{$os->os_status}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
					</div>


				</div>
			</div>

		</div>
        @endforeach
	</div>
	<!-- Container End -->
</section>
@endsection
