@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Change Password</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Password Changed Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('change_password') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Old Password</strong></label>
                            <input type="password" class="form-control border-dark" value="{{ old('old_password') }}" name="old_password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if (Session::get('invalid_password'))
                                <span class="text-danger">Invalid Password</span>
                            @endif
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>New Password</strong></label>
                            <input type="password" class="form-control border-dark" value="{{ old('new_password') }}" name="new_password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Re-type New Password</strong></label>
                            <input type="password" class="form-control border-dark" value="{{ old('rnew_password') }}" name="rnew_password">
                            @error('rnew_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                  <button type="submit" class="btn btn-success mr-2 float-right">Change Password</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
