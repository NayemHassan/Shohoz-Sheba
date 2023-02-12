@extends('layouts.main_layout')

@section('content')
<section class="login py-5 border-top-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 align-item-center">
          <div class="border border">
            <h3 class="bg-dark text-white text-center p-4">Login Now</h3>
            <form action="{{ route('customer_login') }}" method="POST">
                @csrf
              <fieldset class="p-4">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="" class="text-dark"><strong>User Phone / Email</strong></label>
                        <input class="form-control" type="text" name="user_email" value="{{ old('user_email') }}" required>
                        @error('user_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (Session::get('invalid_email'))
                            <span class="text-danger">Invalid Email / Phone</span>
                        @endif
                    </div>
                    <div class="form-group col-12">
                        <label for="" class="text-dark"><strong>User Password</strong></label>
                        <input class="form-control" type="password" name="user_password" value="{{ old('user_password') }}" required>
                        @error('user_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (Session::get('invalid_pass'))
                            <span class="text-danger">Invalid Password</span>
                        @endif
                    </div>
                    <span class="pl-4 pt-4" href="">Dont have an account ? <a style="color:rgba(36, 230, 230, 0.829)" href="{{ route('customer_registration') }}">Register</a></span>
                </div>
                <button type="submit" class="btn btn-primary font-weight-bold mt-3 float-right">Login Now</button>
              </fieldset>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
