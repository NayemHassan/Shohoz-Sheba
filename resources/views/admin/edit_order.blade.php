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
                                <th class="text-center">Service Info</th>
                                <th class="text-center">Service Cost</th>
                                <th class="text-center">Technician Info</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($services as $service)
                            <div class="modal fade" id="exampleModal{{ $service->os_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">{{ $service->service_name }}</h5>
                                      <button type="button" class="close bg-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{route('update_order_service')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="os_id" value="{{$service->os_id}}">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for=""><strong>Technician Name</strong></label>
                                                <input type="text" name="tecnician_name" class="form-control border-dark" value="{{ $service->os_technician_name }}" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for=""><strong>Technician Phone</strong></label>
                                                <input type="text" name="tecnician_phone" class="form-control border-dark" value="{{ $service->os_technician_phone }}" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for=""><strong>Service Date</strong></label>
                                                <input type="date" name="service_date" class="form-control border-dark" value="{{ $service->os_service_date }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-success" >Submit</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            <tr>
                                <td>
                                    <strong>{{$service->service_name}}</strong> <br>
                                </td>
                                <td>
                                    <span><strong>Cost : </strong> {{ $service->os_service_cost }} BDT</span><br> <br>
                                    <span><strong>Discount : </strong> {{ $service->os_service_discount }} %</span><br> <br>
                                    <span><strong>Quantity : </strong> {{ $service->os_service_quantity }} {{ $service->service_unit }}</span><br><br>
                                    <span><strong>After Discount : </strong> {{ $service->os_service_discount_cost }} BDT</span><br><br>
                                    <span><strong>Total Cost : </strong> {{ $service->os_service_total_cost }} BDT</span><br>
                                </td>
                                <td>
                                    {{ $service->os_technician_name }} <br><br>
                                    {{ $service->os_technician_phone }} <br><br>
                                    <strong>Service Date : </strong>{{ $service->os_technician_phone }} <br><br>
                                </td>
                                <td>{{ $service->os_status }}</td>

                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $service->os_id }}"><i class="fa fa-television"></i></button>
                                    {{-- @if ($order->order_status=='Disable')
                                        <a href="{{ route('update_order_status',[$order->order_id,'Enable']) }}" class="btn btn-success mt-1"><i class="fa fa-check"></i></a>
                                    @else
                                        <a href="{{ route('update_order_status',[$order->order_id,'Disable']) }}" class="btn btn-info mt-1"><i class="fa fa-times"></i></a>
                                    @endif --}}
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
