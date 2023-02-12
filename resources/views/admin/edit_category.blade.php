@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Edit Category</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Category Updated Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('edit_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="category_id" value="{{ $category->cat_id }}">
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Category Name</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ $category->cat_name }}" name="category_name" required>
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Category Details</strong></label>
                            <textarea id="summernoteExample" class="form-control border-dark" name="category_details" rows="5" required>{!! $category->cat_details !!}</textarea>
                            @error('category_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1"><strong>Category Image</strong></label>
                            <input type="file" class="form-control border-dark" name="category_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group col-6">
                            <label for=""><strong>Preview Image</strong></label><br>
                            <img src="{{ asset($category->cat_image) }}" alt="" id="blah" style="height: 100px; width:100px;">
                        </div>
                    </div>
                  <button type="submit" class="btn btn-success mr-2 float-right">Update Category</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
