@extends('layouts.main_layout')
@section('content')
<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 mx-auto">
				<article class="single-post">
					<h2>{{ $blog->blog_title }}</h2>
					<ul class="list-inline">
						<li class="list-inline-item">by <a class="text-primary"> {{ $blog->name }}</a></li>
						<li class="list-inline-item">{{ date('F d , Y',strtotime($blog->blog_date)) }}</li>
					</ul>
					<img height="400px" src="{{ asset($blog->blog_image) }}" alt="article-01">
					<p>{!!$blog->blog_details!!}</p>
				</article>
				{{-- <div class="block comment">
					<h4>Leave A Comment</h4>
					<form action="#">
						<!-- Message -->
						<div class="form-group mb-30">
							<label for="message">Message</label>
							<textarea class="form-control" id="message" rows="8" required></textarea>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<!-- Name -->
								<div class="form-group mb-30">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="name" required>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<!-- Email -->
								<div class="form-group mb-30">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" required>
								</div>
							</div>
						</div>
						<button class="btn btn-transparent">Leave Comment</button>
					</form>
				</div> --}}
			</div>

		</div>
	</div>
</section>
@endsection
