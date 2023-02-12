@extends('layouts.main_layout')

@section('content')
<form action="{{ route('customer_change_password') }}" method="POST" >
    @csrf
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->

			<div class="col-lg-8">
				<div class="sidebar shadow">
					<div class="widget price text-center pt-2 pb-1 mb-0">
						<h4 class="">Change Password</h4>
					</div>

					<div class="widget user mt-0">
                        @if (Session::get('invalid'))
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Invalid Password</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif

                          @if (Session::get('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Password change successfully</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>Current Password</strong></label>
                                    <input type="password" class="form-control" name="current_password" value="{{ old('current_password') }}">
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>New Passwqord</strong></label>
                                    <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" >
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>Re-type New Passwqord</strong></label>
                                    <input type="password" class="form-control" name="rnew_password" value="{{ old('rnew_password') }}" >
                                    @error('rnew_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <button type="submit" class="btn btn-success float-right">Change</button>
                                </div>
                            </div>

					</div>


				</div>
			</div>
            <div class="col-lg-4">
                <div class="sidebar shadow">
					<div class="widget bg-danger price text-center pt-2 pb-1 mb-0">
						<h4 class="">Others</h4>
					</div>

					<div class="widget user mt-0">
                        <ul class="mb-3">
                            <li class="mb-3"><a href="{{ route('order') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> My Orders</a></li>
                            <li class="mb-3"><a href="{{ route('cart') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> My Cart</a></li>
                            <li class="mb-3"><a href="{{ route('blogs') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> Blogs</a></li>
                            <li><a href="{{ route('customer_change_password') }}" style="font-weight: 1000"><i class="fa fa-arrow-right" aria-hidden="true"></i> Change Password</a></li>
                        </ul>
					</div>


				</div>
            </div>

		</div>
	</div>
	<!-- Container End -->
</section>
</form>
@endsection
