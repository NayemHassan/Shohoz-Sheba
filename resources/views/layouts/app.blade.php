<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shohoz Sheba Admin Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <script src="https://use.fontawesome.com/efb4e31c3a.js"></script>
  <link rel="stylesheet" href="{{asset('public/admin/vendors/summernote/dist/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/quill/quill.snow.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/vendors/simplemde/simplemde.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('public/admin/images/favicon.png')}}" />
</head>
<body class="sidebar-fixed sidebar-dark">
  <div class="container-scroller ">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-dark">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        @php
            $logo = DB::table('logos')->first();
        @endphp
        <a class="navbar-brand brand-logo" href="index-2.html"><img src="{{ asset($logo->logo) }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="{{ asset($logo->logo) }}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-lg-flex bg-info">
            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
              <span class="btn"><i class="fa fa-gear fa-spin"></i> Setting</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="{{ route('my_account') }}">
                <i class="icon-user text-primary"></i>
                My Account
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('change_password') }}">
                <i class="icon-user-following text-warning"></i>
                Change Password
              </a>
            </div>
          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
          <div class="bg-info" id="settings-trigger"><i class="fa fa-snowflake-o"></i></div>
          <div id="theme-settings" class="settings-panel" >
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading bg-dark text-light">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2 bg-dark text-light">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark selected"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
            </li>
          </ul>
          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
              <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      <!-- partial -->

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  <img src="{{ asset(Auth::user()->image) }}" alt="image"/>
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                  <p class="name">
                    {{Auth::user()->name}}
                  </p>
                  <p class="designation">
                    @if (Auth::user()->role==1)
                    Super Admin
                    @elseif (Auth::user()->role==2)
                    Admin
                    @endif
                  </p>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/home') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Home</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false">
                  <i class="fa fa-users menu-icon"></i>
                  <span class="menu-title">Users</span>
                </a>
                <div class="collapse" id="users">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('add_user') }}">Add User</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('view_user') }}">View User</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false">
                  <i class="fa fa-wpexplorer menu-icon"></i>
                  <span class="menu-title">Categories</span>
                </a>
                <div class="collapse" id="categories">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('add_category') }}">Add Category</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('view_category') }}">View Category</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false">
                  <i class="fa fa-cubes menu-icon"></i>
                  <span class="menu-title">Services</span>
                </a>
                <div class="collapse" id="services">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('add_service') }}">Add Service</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('view_service') }}">View Service</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false">
                  <i class="fa fa-rss-square menu-icon"></i>
                  <span class="menu-title">Blogs</span>
                </a>
                <div class="collapse" id="blog">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('add_blog') }}">Add Blog</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('view_blog') }}">View Blog</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false">
                  <i class="fa fa-first-order menu-icon"></i>
                  <span class="menu-title">Orders</span>
                </a>
                <div class="collapse" id="order">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('pending_order') }}">Pending Orders</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('accepted_order') }}">Accepted Orders</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('completed_order') }}">Completed Orders</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#contacts" aria-expanded="false">
                  <i class="fa fa-address-book-o menu-icon"></i>
                  <span class="menu-title">Contacts</span>
                </a>
                <div class="collapse" id="contacts">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('update_contact') }}">Update Contact</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('view_message') }}">View Messages</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#quotes" aria-expanded="false">
                  <i class="fa fa-quote-left menu-icon"></i>
                  <span class="menu-title">Quotes</span>
                </a>
                <div class="collapse" id="quotes">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ route('add_quote') }}">Add Quotes</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('view_quote') }}">View Quotes</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('review') }}">
                  <i class="fa fa-star-half-o menu-icon"></i>
                  <span class="menu-title">Review</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logo') }}">
                  <i class="fa fa-picture-o menu-icon"></i>
                  <span class="menu-title">Logo</span>
                </a>
            </li>


            <li class="nav-item nav-doc">
              <a class="nav-link bg-primary" href="{{ route('logout') }}">
                <i class="fa fa-sign-out menu-icon"></i>
                <span class="menu-title">Log Out</span>
              </a>
            </li>

          </ul>
        </nav>
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © All Side Reserved By Shohoz Sheba {{date('Y')}}
                {{-- <a href="#">Bootstrapdash</a>. All rights reserved.</span> --}}
              {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> --}}
            </div>
          </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<!-- Messenger Chat Plugin Code -->

  <!-- plugins:js -->
  <script src="{{asset('public/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('public/admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/morris.js/morris.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/admin/vendors/simplemde/simplemde.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('public/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('public/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('public/admin/js/template.js')}}"></script>
  <script src="{{asset('public/admin/js/settings.js')}}"></script>
  <script src="{{asset('public/admin/js/todolist.js')}}"></script>

  <script src="{{asset('public/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{asset('public/admin/js/data-table.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('public/admin/js/dashboard.js')}}"></script>
  <script src="{{asset('public/admin/js/editorDemo.js')}}"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/victory/template/demo/vertical-default-light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:05:41 GMT -->
</html>

