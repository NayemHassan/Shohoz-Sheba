@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Add User</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>User Added Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('add_user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>User Role</strong></label>
                            <select class="form-control border-dark" name="user_role" required>
                                <option value="" selected disabled>Select One</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Name</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ old('user_name') }}" name="user_name" required>
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Email</strong></label>
                            <input type="email" class="form-control border-dark" value="{{ old('user_email') }}" name="user_email">
                            @error('user_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Phone</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ old('user_phone') }}" name="user_phone">
                            @error('user_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Gender</strong></label><br>
                            <input type="radio" name="user_gender" value="Male" checked> Male
                            <input type="radio" name="user_gender" value="Female"> Female
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>User Address</strong></label>
                            <textarea class="form-control border-dark" name="user_address" rows="5">{{ old('user_address') }}</textarea>
                            @error('user_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Image</strong></label>
                            <input type="file" class="form-control border-dark" name="user_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
                        </div>
                        <div class="form-group col-6">
                            <label for=""><strong>Preview Image</strong></label><br>
                            <img src="" alt="" id="blah" style="height: 100px; width:100px;">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Password</strong></label>
                            <input type="password" class="form-control border-dark" value="{{ old('user_password') }}" name="user_password">
                            @error('user_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>Re-type Password</strong></label>
                            <input type="password" class="form-control border-dark" value="{{ old('confirm_password') }}" name="confirm_password">
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                  <button type="submit" class="btn btn-success mr-2 float-right">Add User</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
