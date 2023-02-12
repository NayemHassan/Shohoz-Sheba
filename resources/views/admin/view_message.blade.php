@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-11 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">All Messages</h4>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table table-bordered">
                          <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">Customer Info</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($messages as $message)
                            {{-- <div class="modal fade" id="exampleModal{{ $category->cat_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                      <h5 class="modal-title" id="exampleModalLabel">{{ $category->cat_name }}</h5>
                                      <button type="button" class="close bg-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $category->cat_details !!}
                                    </div>
                                    <div class="modal-footer bg-primary">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                            </div> --}}
                            <tr>
                                <td style="width:30%">
                                    <strong>Name : </strong>{{$message->message_user_name}} <br><br>
                                    <strong>Phone : </strong>{{$message->message_user_phone}} <br><br>
                                    <strong>Email : </strong>{{$message->message_user_email}} <br><br>
                                    <strong>Date : </strong>{{$message->created_at}} <br><br>
                                </td>
                                <td style="width:40%">
                                    {{$message->message}}
                                </td>
                                <td>
                                    {{$message->message_status}}
                                </td>
                                <td >
                                    @if ($message->message_status=='Unseen')
                                        <a href="{{ route('update_message_status',[$message->message_id,'Seen']) }}" class="btn btn-success mt-1"><i class="fa fa-check"></i></a>
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
