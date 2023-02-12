@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Add Service</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Service Added Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('add_service') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Select category</strong></label>
                            <select class="form-control border-dark" name="category_id" required>
                                <option value="" selected disabled> Select One </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Service Name</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ old('service_name') }}" name="service_name" required>
                            @error('service_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="exampleInputEmail1"><strong>Service Cost</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ old('service_cost') }}" name="service_cost" required>
                            @error('service_cost')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="exampleInputEmail1"><strong>Service Discount</strong></label>
                            <input type="number" class="form-control border-dark" min="0" value="{{ old('service_discount') }}" name="service_discount" required>
                            @error('service_discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="exampleInputEmail1"><strong>Unit Name</strong></label>
                            <input type="text" class="form-control border-dark" min="0" value="{{ old('service_unit') }}" name="service_unit" required>
                            @error('service_unit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Service Details</strong></label>
                            <textarea id="summernoteExample" class="form-control border-dark" name="service_details" rows="5" required>{{ old('service_address') }}</textarea>
                            @error('service_details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                  <button type="submit" class="btn btn-success mr-2 float-right">Add Service</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
