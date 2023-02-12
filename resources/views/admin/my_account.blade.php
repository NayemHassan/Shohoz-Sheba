@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">My Information</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Profile Updated Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('my_account') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Name</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ Auth::user()->name }}" name="user_name" required>
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Email</strong></label>
                            <input type="email" class="form-control border-dark" value="{{ Auth::user()->email }}" name="user_email" required readonly>
                            @error('user_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Phone</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ Auth::user()->phone }}" name="user_phone" required readonly>
                            @error('user_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Gender</strong></label><br>
                            <input type="radio" name="user_gender" value="Male" @if(Auth::user()->gender=='Male') checked @endif> Male
                            <input type="radio" name="user_gender" value="Female" @if(Auth::user()->gender=='Female') checked @endif> Female
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>User Address</strong></label>
                            <textarea class="form-control border-dark" name="user_address" rows="5" required>{{ Auth::user()->address }}</textarea>
                            @error('user_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>User Image</strong></label>
                            <input type="file" class="form-control border-dark" name="user_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                        </div>
                        <div class="form-group col-6">
                            <label for=""><strong>Preview Image</strong></label><br>
                            <img src="{{ asset(Auth::user()->image) }}" alt="" id="blah" style="height: 100px; width:100px;">
                        </div>

                    </div>
                  <button type="submit" class="btn btn-success mr-2 form-control">UPDATE</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
