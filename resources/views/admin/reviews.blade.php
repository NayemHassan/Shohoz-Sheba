@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-11 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">All Categories</h4>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table table-bordered">
                          <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">User Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Review</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($reviews as $review)

                            <tr class="text-center">
                                <td>{{ $review->customer_name }}</td>
                                <td>{{ $review->cat_name }}</td>
                                <td>{{ $review->review }}</td>
                                <td class="text-pink">{{ $review->review_status }}</td>
                                <td>

                                    <a onclick="return confirm('Are You Sure Want Do Delete This review ?')" href="{{ route('delete_review',$review->review_id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br>
                                    @if ($review->review_status=='Disable')
                                        <a href="{{ route('update_review',[$review->review_id,'Enable']) }}" class="btn btn-success mt-1"><i class="fa fa-check"></i></a>
                                    @else
                                        <a href="{{ route('update_review',[$review->review_id,'Disable']) }}" class="btn btn-info mt-1"><i class="fa fa-times"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
