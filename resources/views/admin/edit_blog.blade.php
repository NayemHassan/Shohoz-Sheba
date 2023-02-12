@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-9 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">Edit Blog</h4>
                </div>
              <div class="card-body">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Blog Updated Successfully . </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('edit_blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="blog_id" value="{{ $blog->blog_id }}">
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Blog Title</strong></label>
                            <input type="text" class="form-control border-dark" value="{{ $blog->blog_title }}" name="blog_title" required>
                            @error('blog_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="exampleInputEmail1"><strong>Blog Details</strong></label>
                            <textarea id="summernoteExample" class="form-control border-dark" name="blog_details" rows="5" required>{!! $blog->blog_details !!}</textarea>
                            @error('blog_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-8">
                            <label for="exampleInputEmail1"><strong>Blog Image</strong></label>
                            <input type="file" class="form-control border-dark" name="blog_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group col-4">
                            <label for=""><strong>Preview Image</strong></label><br>
                            <img src="{{ asset($blog->blog_image) }}" alt="" id="blah" style="height: 100px; width:100px;">
                        </div>
                    </div>
                  <button type="submit" class="btn btn-success mr-2 float-right">Update Blog</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
