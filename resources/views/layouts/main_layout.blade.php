<!DOCTYPE html>

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Shohoz Sheba
</title>

 <!--<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">-->
  <!-- ** Mobile Specific Metas ** -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

  <!-- theme meta -->
  <meta name="theme-name" content="classimax" />

  <!-- favicon -->
  <link href="images/favicon.png" rel="shortcut icon" >
  <!--
  Essential stylesheets
  =====================================-->
  <link href="{{asset('public/main/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/main/plugins/bootstrap/bootstrap-slider.css')}}" rel="stylesheet">
  <link href="{{asset('public/main/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/main/plugins/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('public/main/plugins/slick/slick-theme.css')}}" rel="stylesheet">
  <link href="{{asset('public/main/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 <!-- <link href="{{asset('public/main/css/owl.theme.default.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/main/css/owl.carousel.min.css')}}" rel="stylesheet">=-->
  <link href="{{asset('public/main/css/style.css')}}" rel="stylesheet">

</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63af21cb47425128790ae1f1/1gli1o1ck';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



<body class="body-wrapper">


<header style="background: #054FBB;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="{{ url('/') }}">
                        @php
                            $logo = DB::table('logos')->first();
                        @endphp
						<img src="{{ asset($logo->logo) }}" style="height: 40px" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav">
							<li class="nav-item">
								<a class="nav-link text-light font-weight-bold" href="{{ url('/') }}">Home</a>
							</li>

							<li class="nav-item dropdown dropdown-slide @@pages">
								<a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Categories <span><i class="fa fa-angle-down"></i></span>
								</a>
                                @php
                                    $categories = DB::table('categories')->where('cat_status','Enable')->where('cat_delete',0)->get();
                                @endphp

								<!-- Dropdown list -->
								<ul class="dropdown-menu">
                                    @foreach ($categories as $category)
									<li><a class="dropdown-item @@about" href="{{ route('category_details',$category->cat_id) }}">{{ $category->cat_name }}</a></li>
                                    @endforeach
								</ul>
							</li>
                            <li class="nav-item">
								<a class="nav-link text-light font-weight-bold" href="{{ route('cart') }}">Cart
                                    @if (Session::get('Customer'))
                                        @php
                                            $cart = DB::table('cart')->where('cart_customer_id',Session::get('Customer')->customer_id)->count();
                                            if($cart>0){
                                                echo " ( ".$cart." ) ";
                                            }
                                        @endphp
                                    @endif
                                </a>
							</li>
                            <li class="nav-item">
								<a class="nav-link text-light font-weight-bold" href="{{ route('contact') }}">Contact
                                </a>
							</li>
                            <li class="nav-item">
								<a class="nav-link text-light font-weight-bold" href="{{ route('blogs') }}">Blogs</a>
							</li>
							{{-- <li class="nav-item dropdown dropdown-slide @@listing">
								<a class="nav-link dropdown-toggle text-light font-weight-bold" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<ul class="dropdown-menu">
									<li><a class="dropdown-item @@category" href="category.html">Ad-Gird View</a></li>
									<li><a class="dropdown-item @@listView" href="ad-list-view.html">Ad-List View</a></li>

									<li class="dropdown dropdown-submenu dropleft">
										<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0201" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

										<ul class="dropdown-menu" aria-labelledby="dropdown0201">
											<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
											<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
										</ul>
									</li>
								</ul>
							</li> --}}
						</ul>

						<ul class="navbar-nav ml-auto mt-10">
                            @if (Session::get('Customer'))
                            <li class="nav-item mr-1">
                                <img src="{{ asset(Session::get('Customer')->customer_image) }}" style="border-radius: 100%" height="37px" alt="">
							</li>
                            <li class="nav-item">

								<a href="{{ route('customer_profile') }}" class="nav-link login-button text-light" >
                                    {{ Session::get('Customer')->customer_name }}
                                </a>
							</li>
                            <li class="nav-item">
								<a class="nav-link login-button text-light" href="{{ route('visitor_logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
							</li>
                            @else
                            <li class="nav-item">
								<a class="nav-link login-button text-light" href="{{ route('customer_login') }}">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="{{ route('customer_registration') }}"><i class="fa fa-plus-circle"></i> Register</a>
							</li>
                            @endif

						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<!--===============================
=            Hero Area            =
================================-->

@yield('content')

<!--============================
=            Footer            =
=============================-->

   <!-- FOOTER  SECTION START-->
    <section id="footer" class="">
    	<div class="footer-container section-padding-5">
    		<div class="row">
    			<div class="footer-grid-container">
    				<div class="footer-grid-item">
    					<div class="img-info">
    						<div class="img-dis-2">
    							<a href=""><h2 class="logo">SHOHOZ SHEBA</h2></a>
    						</div>
    					<p>Our mission is to provide the best renovation service at an reasonable price without sacrificing quality. You will be satisfy with our work knowing we take the necessary steps to meet your needs and get the job done right</p>
    					
    					<div class="footer-icon colo">
    						<a href="https://www.facebook.com/" target="_blank"><span><i class="fa-brands fa-facebook-f"></i></span></a>
    						<a href="https://twitter.com/" target="_blank"><span><i class="fa-brands fa-twitter"></i></span></a>
							<a href="https://www.instagram.com/" target="_blank"><span><i class="fa-brands fa-instagram" ></i></span></a>
							<a href="https://www.youtube.com/" target="_blank"><span> <ion-icon name="logo-youtube"></ion-icon></span></a>
    					</div>
    				</div>
    					</div>
    				
    				<div class="footer-grid-item">
    					<div class="information">
    						<h6>Information</h6>
    						<hr>
    						<ul class="clearfix">
    							
    							<li><a href="#service"><ion-icon name="arrow-forward-outline"></ion-icon>Services</a></li>
    							<li><a href="#review"><ion-icon name="arrow-forward-outline"></ion-icon>Our Happy Clients</a></li>
    							<li><a href="https://sites.google.com/diu.edu.bd/shohoz-sheba/about-us?authuser=0" target="_blank"><ion-icon name="arrow-forward-outline"></ion-icon>Contact</a></li>
    							<li><a href="https://sites.google.com/diu.edu.bd/shohoz-sheba/home" target="_blank"><ion-icon name="arrow-forward-outline"></ion-icon>Information</a></li>
    							<li><a href="https://sites.google.com/diu.edu.bd/shohoz-sheba/about-us"><ion-icon name="arrow-forward-outline"></ion-icon>About us</a></li>
    							
    							
    						</ul>
    					</div>
    				</div>
    				<div class="footer-grid-item">
    					<div class="information-2">
    						<h6>Office</h6>
    						<hr>
    						<ul class="office">
    							<li><a href="">
    								<ion-icon name="location-outline"></ion-icon><p> 14 Tottenham Road, Dhaka, Bangladesh.</p>
    							</a></li>
    							<li><a href="">
    								<ion-icon name="call-outline"></ion-icon>
    								<p> (+880) 11-01 8319</p>
    							</a></li>
    							<li><a href="">
    								<ion-icon name="mail-outline"></ion-icon>
    							<p>info@shohozsheba.com</p>
    							</a></li>
    							<li><ion-icon name="time-outline"></ion-icon>
    							<p> Mon - Sat: 9:00 - 18:00</p></li>
    						</ul>
    					</div>
    				</div>
    				</div>
    			</div>
    		</div>
    	</section>
  <!-- Container End -->


<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright &copy; <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. Designed & Developed by <a class="text-white" href="https://sites.google.com/diu.edu.bd/shohoz-sheba/home">Shohoz Sheba Team</a></p>
        </div>
      </div>
     
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="fa fa-angle-up"></i>
  </div>
</footer>

<!--
Essential Scripts
=====================================-->
 <!-----Effect---->
 <script src="/vendor/js/modernizr.custom.js"></script>
     <script src="/vendor/js/toucheffects.js"></script>
      <!-----Effect End---->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="{{asset('public/main/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/main/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('public/main/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('public/main/plugins/bootstrap/bootstrap-slider.js')}}"></script>
<script src="{{asset('public/main/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('public/main/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{asset('public/main/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('public/main/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="{{asset('public/main/plugins/google-map/map.js')}}" defer></script>
<!--<script src="{{asset('public/main/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('public/main/js/owl.carousel.min.js')}}"></script>=-->
<script src="{{asset('public/main/js/script.js')}}"></script>

</body>

</html>



