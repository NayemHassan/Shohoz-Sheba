@extends('layouts.main_layout')

@section('content')
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-lg-7">
				<div class="product-details shadow">
					<h1 class="product-title text-center bg-dark text-white p-4">{{ $category->cat_name }}</h1>
					<div class="product-meta">

					</div>

					<!-- product slider -->
					<div class="product-meta">
						{{-- <div class="product-slider-item my-4" data-image="{{ asset($category->cat_image) }}"> --}}
							<div class="row">
                                <div class="col-lg-7 mx-auto">
                                    <img class="img-fluid w-100" src="{{ asset($category->cat_image) }}"  alt="product-img">
                                </div>
                            </div>
						{{-- </div> --}}
					</div>
					<!-- product slider -->

					<div class="content pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Service Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>

                            <li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">Add Review</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Service Details</h3>
								<p>
                                    {!!$category->cat_details!!}
                                </p>
							</div>

							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
                                    @php
                                        $reviews = DB::table('reviews')
                                        ->join('customers','reviews.review_customer_id','customers.customer_id')
                                        ->where('review_status','Enable')
                                        ->where('review_category_id',$category->cat_id)
                                        ->select('reviews.*','customers.customer_name')
                                        ->orderBy('review_id','DESC')
                                        ->limit(4)
                                        ->get();
                                    @endphp
                                    @foreach ($reviews as $review)
									<div class="media">
										<div class="media-body">
											<!-- Ratings -->

											<div class="name">
												<h5>{{ $review->customer_name }}</h5>
											</div>
											<div class="date">
												<p>{{ date('d F Y',strtotime($review->created_at)) }}</p>
											</div>
											<div class="review-comment">
												<p>
													{{ $review->review }}
												</p>
											</div>
										</div>
									</div>
                                    @endforeach

								</div>

							</div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                @if (Session::get('Customer'))
								<div class="review-submission">
                                    <h3 class="tab-title">Submit your review</h3>
                                    <!-- Rate -->
                                    <div class="review-submit">
                                        <form action="{{ route('review') }}" method="POST" class="row">

                                            @csrf
                                            <input type="hidden" name="cat_id" value="{{$category->cat_id}}">
                                            <div class="col-lg-6 mb-3">
                                                <input type="text" name="name"  class="form-control" value="{{ Session::get('Customer')->customer_name }}" readonly>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <input type="email" name="email" class="form-control" value="{{ Session::get('Customer')->customer_email }}" readonly>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <textarea name="review" rows="6" class="form-control" placeholder="Review" required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-main">Sumbit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @else
                                <h3 class="tab-title text-danger">Login to Add Review</h3>
                                @endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="sidebar shadow">
					<div class="widget price text-center p-4 mb-0">
						<h4 class="">Add your service to cart</h4>
					</div>
					<!-- User Profile widget -->
                    @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully added to the cart. </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
					<div class="widget user">
                        @php
                            $services = DB::table('services')->where('service_cat_id',$category->cat_id)->where('service_status','Enable')->where('service_delete',0)->get();
                        @endphp
                        @foreach ($services as $service)


                        <div class="row mt-2">
                            <div class="col-lg-8">
                                <h4>{{$service->service_name}}</h4>
                                @if ($service->service_discount>0)
                                <span class="badge badge-warning p-1">{{ $service->service_discount }} % OFF</span><br>
                                <span class="mt-2 text-danger"><strike>BDT {{ $service->service_cost }} </strike></span><span class="ml-2 text-success"> BDT {{ $service->service_discount_cost }} / {{ $service->service_unit }}</span>
                                @else
                                <span class="ml-2 text-success">BDT {{ $service->service_discount_cost }} / {{ $service->service_unit }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <a href="{{ route('add_cart',[$service->service_id,$category->cat_id]) }}" class="btn btn-outline-info px-4 py-2 mt-2">Add +</a>
                            </div>
                        </div>
                        <hr>

                        @endforeach

					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
@endsection
