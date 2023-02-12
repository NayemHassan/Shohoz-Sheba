@extends('layouts.main_layout')
@section('content')
<section class="blog section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<!-- Article 01 -->
                @foreach ($blogs as $blog)


				<article class="shadow">
	<!-- Post Image -->
	<div class="image">
		<img class="img-fluid" style="height:400px" src="{{ asset($blog->blog_image) }}" alt="article-01">
	</div>
	<!-- Post Title -->
	<h3>{{ $blog->blog_title }}</h3>
	<ul class="list-inline">
		<li class="list-inline-item">by <a class="text-primary">{{ $blog->name }}</a></li>
		<li class="list-inline-item">{{ date('F d , Y',strtotime($blog->blog_date)) }}</li>
	</ul>
	<!-- Post Description -->
	<p>{!!\Illuminate\Support\Str::limit($blog->blog_details, 250, $end=' .........')!!}</p>
	<!-- Read more button -->
	<a href="{{ route('blog_details',$blog->blog_id) }}" class="btn btn-transparent">Read More</a>
</article>
@endforeach

				<!-- Pagination -->
				<nav aria-label="Page navigation example">
				  {{$blogs->links()}}
				</nav>
			</div>

		</div>
	</div>
</section>
@endsection
