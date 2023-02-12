@extends('layouts.main_layout')

@section('content')
<section class="login py-5 border-top-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8 align-item-center">
          <div class="border border">
            <h3 class="bg-dark text-white text-center p-4">Register Now</h3>
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registration Successfully Completed. </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('customer_registration') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <fieldset class="p-4">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Name</strong></label>
                        <input class="form-control" type="text" name="user_name" value="{{ old('user_name') }}" >
                        @error('user_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Email</strong></label>
                        <input class="form-control" type="text" name="user_email" value="{{ old('user_email') }}" >
                        @error('user_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Phone</strong></label>
                        <input class="form-control" type="text" name="user_phone" value="{{ old('user_phone') }}" >
                        @error('user_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Birthday</strong></label>
                        <input class="form-control" type="date" value="{{ old('user_birthday') }}" name="user_birthday" >
                        @error('user_birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Image</strong></label>
                        <input class="form-control" type="file" value="{{ old('user_image') }}" name="user_image" >
                        @error('user_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Gender</strong></label><br>
                        <input type="radio" name="user_gender" value="Male" checked> Male
                        <input type="radio" class="ml-2" name="user_gender" value="Female"> Female
                    </div>
                    <div class="form-group col-12">
                        <label for="" class="text-dark"><strong>User Address</strong></label>
                        <textarea class="form-control" name="user_address" rows="8" >{{ old('user_address') }}</textarea>
                        @error('user_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>User Password</strong></label>
                        <input class="form-control" type="password" name="user_password" value="{{ old('user_password') }}" >
                        @error('user_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="text-dark"><strong>Re-type Password</strong></label>
                        <input class="form-control" type="password" name="retype_password" value="{{ old('retype_password') }}" >
                        @error('retype_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <span class="pl-4 pt-4" href="">Already have an account ? <a style="color:rgba(36, 230, 230, 0.829)" href="{{ route('customer_login') }}">Login</a></span>
                </div>
                <button type="submit" class="btn btn-primary font-weight-bold mt-3 float-right">Register Now</button>
              </fieldset>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
