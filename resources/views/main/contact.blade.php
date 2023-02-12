@extends('layouts.main_layout')

@section('content')
<form action="{{ route('contact') }}" method="POST" >
    @csrf
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->

			<div class="col-lg-8">
				<div class="sidebar shadow">
					<div class="widget price text-center pt-2 pb-1 mb-0">
						<h4 class="">Leave A Message To Us</h4>
					</div>
                    

					<div class="widget user mt-0">
                        @if (Session::get('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thank you very much for your message . </strong> We will surely contact with you .
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>User Name</strong></label>
                                    <input type="text" class="form-control" name="user_name" required>
                                    @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>User Email</strong></label>
                                    <input type="text" class="form-control" name="user_email"  required>
                                    @error('user_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="" class="text-dark"><strong>User Phone</strong></label>
                                    <input type="text" class="form-control" name="user_phone" required>
                                    @error('user_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="" class="text-dark"><strong>Message</strong></label>
                                    <textarea type="text" class="form-control" name="user_message" ></textarea required>
                                    @error('user_message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-12">
                                    <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                </div>
                            </div>

					</div>


				</div>
			</div>
            <div class="col-lg-4">
                <div class="sidebar shadow">
					<div class="widget bg-danger price text-center pt-2 pb-1 mb-0">
						<h4 class="">Contact Information</h4>
					</div>

					<div class="widget user mt-0 text-center">
                        <ul class="mb-3">
                            @php
                                $contact = DB::table('contacts')->first();
                            @endphp
                            <li class="mb-3" style="font-weight: 1000"><i style="font-size: 20px;margin-right:10px" class="fa fa-phone-square" aria-hidden="true"></i> {{$contact->contact_number}} </li>
                            <li class="mb-3" style="font-weight: 1000"><i style="font-size: 20px;margin-right:10px" class="fa fa-envelope" aria-hidden="true"></i> {{$contact->contact_email}}</li>
                            <li class="mb-3" style="font-weight: 1000"><i style="font-size: 20px;margin-right:10px" class="fa fa-address-card" aria-hidden="true"></i> {{$contact->contact_address}}</li>
                            <li class="mb-3" style="font-weight: 1000"><a target="_blank" href="{{$contact->contact_page}}"><i style="font-size: 40px;margin-right:10px" class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
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
