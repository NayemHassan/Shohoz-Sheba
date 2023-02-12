@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-11 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">All Services</h4>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table table-bordered">
                          <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Cost Details</th>

                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($services as $service)
                            <div class="modal fade" id="exampleModal{{ $service->service_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                      <h5 class="modal-title" id="exampleModalLabel">{{ $service->service_name }}</h5>
                                      <button type="button" class="close bg-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $service->service_details !!}
                                    </div>
                                    <div class="modal-footer bg-primary">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <tr>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->service_cat_name }}</td>
                                <td>
                                    <span><strong>Regular : </strong> {{ $service->service_cost }} BDT</span><br>
                                    <span><strong>Discount : </strong> {{ $service->service_discount }} %</span><br>
                                    <span><strong>Discount Cost : </strong> {{ $service->service_discount_cost }} BDT</span><br>
                                </td>
                                <td>{{ $service->service_status }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $service->service_id }}"><i class="fa fa-television"></i></button>
                                    <a onclick="return confirm('Are You Sure Want Do Delete This Service ?')" href="{{ route('delete_service',$service->service_id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br>
                                    <a href="{{ route('edit_services',$service->service_id) }}" class="btn btn-dark mt-1"><i class="fa fa-pencil-square-o"></i></a>
                                    @if ($service->service_status=='Disable')
                                        <a href="{{ route('update_service_status',[$service->service_id,'Enable']) }}" class="btn btn-success mt-1"><i class="fa fa-check"></i></a>
                                    @else
                                        <a href="{{ route('update_service_status',[$service->service_id,'Disable']) }}" class="btn btn-info mt-1"><i class="fa fa-times"></i></a>
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
