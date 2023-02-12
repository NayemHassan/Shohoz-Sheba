@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Add Category</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Contact Updated Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('update_contact') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Contact Number</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ $contact->contact_number }}" name="contact_number" required>
                            @error('contact_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Contact Email</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ $contact->contact_email }}" name="contact_email" required>
                            @error('contact_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Contact Address</strong></label>
                            <textarea type="text" class="form-control border-dark" rows="8" name="contact_address" required>{{ $contact->contact_address }}</textarea>
                            @error('contact_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Contact Page</strong></label>
                            <textarea type="text" class="form-control border-dark" rows="8" name="contact_page" required>{{ $contact->contact_page }}</textarea>
                            @error('contact_page')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                  <button type="submit" class="btn btn-success mr-2 float-right">Update Contact</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
