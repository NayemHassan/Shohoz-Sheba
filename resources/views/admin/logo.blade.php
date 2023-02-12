@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Logo</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Logo Updated Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-7">
                            <label for="exampleInputEmail1"><strong>Logo</strong></label>
                            <input type="file" class="form-control border-dark" name="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                        </div>
                        <div class="form-group col-5">
                            <label for=""><strong>Preview Image</strong></label><br>
                            <img src="{{ asset($logo->logo) }}" alt="" id="blah" style="height: 50px; width:150px;">
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
