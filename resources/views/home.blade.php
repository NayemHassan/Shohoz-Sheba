@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-basket icon-lg text-success"></i>
              <div class="ml-3">
                <a style="text-decoration: none;" class="text-dark mb-0" href="{{ route('view_category') }}" >Categories</a>
                <h6>
                    @php
                        $categories = DB::table('categories')->where('cat_delete',0)->count();
                        echo $categories;
                    @endphp
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-rocket icon-lg text-warning"></i>
              <div class="ml-3">
                <a style="text-decoration: none;" class="text-dark mb-0" href="{{ route('view_service') }}" >Services</a>
                <h6>
                    @php
                        $services = DB::table('services')->where('service_delete',0)->count();
                        echo $services;
                    @endphp
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div  class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-diamond icon-lg text-info"></i>
              <div class="ml-3">
                <a style="text-decoration: none;" class="text-dark mb-0" href="{{ route('view_blog') }}" >Blogs</a>
                <h6>
                    @php
                        $blogs = DB::table('blogs')->where('blog_delete',0)->count();
                        echo $blogs;
                    @endphp
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
              <div class="ml-3">
                <p class="mb-0">Total User</p>
                <h6>
                    @php
                        $customers = DB::table('customers')->count();
                        echo $customers;
                    @endphp
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
