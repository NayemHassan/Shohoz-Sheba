@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">All Pending Orders</h4>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table table-bordered">
                          <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">Customer Info</th>
                                <th class="text-center">Order Info</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($orders as $order)

                            <tr>
                                <td>
                                    <strong>Name : </strong>{{$order->order_customer_name}} <br>
                                    <strong>Email : </strong>{{$order->order_customer_email}} <br>
                                    <strong>Phone : </strong>{{$order->order_customer_phone}} <br>
                                    <strong>Address : </strong>{{$order->order_customer_address}} <br>
                                </td>
                                <td>
                                    <span><strong>Cost : </strong> {{ $order->order_amount }} BDT</span><br> <br>
                                    <span><strong>Method : </strong>
                                        @if ($order->payment_method==1)
                                            Cash On Delevery
                                        @else
                                            Online Payment
                                        @endif
                                    </span><br> <br>
                                    <span><strong>Order Date : </strong> {{ $order->order_date }} </span><br>
                                </td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ route('edit_order',$order->order_id) }}" class="btn btn-dark mt-1"><i class="fa fa-pencil-square-o"></i></a>
                                    @if ($order->order_status=='Pending')
                                        <a href="{{ route('update_order_status',[$order->order_id,'Accepted']) }}" class="btn btn-success mt-1"><i class="fa fa-check"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
