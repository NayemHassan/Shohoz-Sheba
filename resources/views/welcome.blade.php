@extends('layouts.main_layout')

@section('content')
<style>


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h1,
    h3 {
        font-family: Arial;
    }



    .container input {
        border:1px solid gray;
        margin-top: 4px;
        height: 50px;
        width: 100%;
        outline: none;
        padding: 0 20px 0 20px;
        font-size: 20px;
    }
	@media (max-width: 525px) {
		.container input{
			 font-size: 10px;
			 padding: 0 20px 0 20px;
		}
}
	@media (max-width: 490px){
		.container input{
	    padding: 0 0px 0 5px;
        font-size: 10px;
		height: 41px;
        width: 120%;
		}
		.btn {
    font-size: 13px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 12px 0px;
    border-radius: 4px;
}
		.container-extra {
    max-width: 100%;
    padding: 0 38px 0px 0px;
    margin: 0 auto;
}
	.hero-area .content-block h1, .hero-area-2 .content-block h1 {
    font-size: 30px;
}

element.style {
}
@media (max-width: 768px)
.hero-area .content-block p, .hero-area-2 .content-block p {
    font-size: 15px;
}
	}
</style>
<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Your Personal Assistant</h1>
					<p>One-stop solution for your services. Order any service, anytime.</p>
					{{-- <div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-bed"></i> Ac</a></li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-grav"></i> Painting</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-car"></i> Door</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-cutlery"></i> Moving</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-coffee"></i> Kitchen</a>
							</li>
						</ul>
					</div> --}}

				</div>
				<!-- Advance Search -->
				<div class="advance-search col-9 mx-auto">
					<div class="container container-extra">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form action="{{ route('search') }}" method="POST">
                                    @csrf
									<div class="form-row ml-4">
										<div class="form-group col-lg-8 col-md-6">
											<input type="text" class="form-control my-2 my-lg-1 border-info" placeholder="Search here" name="search" list="programmingLanguages">
                                            <datalist id="programmingLanguages" style="width: 10px">
                                                @php
                                                    $services = DB::table('services')->where('service_status','Enable')->where('service_delete',0)->get();
                                                @endphp
                                                @foreach ($services as $service)
                                                <option value="{{ $service->service_name }}">{{ $service->service_name }}</option>
                                                @endforeach
                                            </datalist>
										</div>
										<div class="form-group col-xl-4 col-lg-3 col-md-6 align-self-center">
											<button type="submit" class="btn btn-primary active">Search Now</button>
										</div>
									</div>
								</form>
                                @if (Session::get('failed'))


                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>No result found </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--===========================================
=            Popular deals section            =
============================================-->

<section id="service" class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>All Categories</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="row">
                    @php
                        $categories = DB::table('categories')->where('cat_status','Enable')->where('cat_delete',0)->get();
                    @endphp
                    @foreach ($categories as $category)


					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
<div class="product-item bg-light border--">
	<div class="card ">
		<div class="thumb-content ">
			<!-- <div class="price">$200</div> -->
			<a href="{{ route('category_details',$category->cat_id) }}">
				<img class="card-img-top img-fluid " src="{{ asset($category->cat_image) }}" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title text-center"><a href="{{ route('category_details',$category->cat_id) }}">{{$category->cat_name}}</a></h4>

		</div>
	</div>
</div>



					</div>

                    @endforeach


				</div>
			</div>
		</div>
	</div>
</section>
<!-- CALL SECTION START-->
<section id="call">
     	<div class="row section-padding-2">
     		<div class="grid-call-container">
     			<div class="grid-call-item1">
     				
     			</div>
     			<div class="grid-call-item2">
     				<h3>One call can solve all <br> your house problems</h3>
     				<span>019111-18319</span>
     				<h6>Not everyone has the expertise, time or is capable of perfectly doing repairs <br>
 					in and around the house.</h6>
    			    <p>Sometimes you need to call in the skill and most qualified person for the
					perfect repair. This is where a handyman comes in handy.
					</p>
    			     
   			   	   
    			   
     			</div>
     		</div>
     	</div>
     </section>
 

<section id="review" class="popular-deals section-1 bg-testi">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Some Of Our Happy Clients</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-10 mx-auto">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					{{-- <ol class="carousel-indicators">
					  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol> --}}
					<div class="carousel-inner">

                    @php
                        $quotes = DB::table('quotes')->get();
                        $i = 0;
                    @endphp
                    @foreach ($quotes as $quote)
                        @php
                            $i++;
                        @endphp

					  <div class="carousel-item @if($i==1) active @endif">
                        <div class="row mb-4">
                            <div class="col-sm-6 mx-auto text-center">
                                <img style="height:120px;width:120px;border-radius:50%" src="{{ asset($quote->quote_author_image) }}" alt="First slide">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 mx-auto text-center">
                                <h3 class="text-black"> {{ $quote->quote_author }} </h3>
                                <p style="color: black;font-weight:600"> " {{ $quote->quote_details }} "</p>
                            </div>
                        </div>
					  </div>
                    @endforeach


					</div>
					<a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
					  <span aria-hidden="true"><i class="fa fa-arrow-left back-g text-black" aria-hidden="true"></i></span>
					  <span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					  <span aria-hidden="true"><i class="fa fa-arrow-right back-g text-black" aria-hidden="true"></i></span>
					  <span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->




<!--====================================
=            Call to Action            =
=====================================-->

{{-- <section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<h2>Start today to get more exposure and
					grow your business</h2>
					<ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-main" href="ad-listing.html">Add Listing</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser Listing</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section> --}}

@endsection
