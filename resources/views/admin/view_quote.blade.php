@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">All Quotes</h4>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table table-bordered">
                          <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">Author</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Quotes</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($quotes as $quotes)

                            <tr class="text-center">
                                <td>{{ $quotes->quote_author }}</td>
                                <td>
                                    <img src="{{ asset($quotes->quote_author_image) }}" alt="">
                                </td>
                                <td>{{ $quotes->quote_details }}</td>
                                <td class="text-pink">{{ $quotes->quote_status }}</td>
                                <td style="width:20%">
                                    <a onclick="return confirm('Are You Sure Want Do Delete This quotes ?')" href="{{ route('delete_quote',$quotes->quote_id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br>
                                    @if ($quotes->quote_status=='Disable')
                                        <a href="{{ route('update_quotes_status',[$quotes->quote_id,'Enable']) }}" class="btn btn-success mt-1"><i class="fa fa-check"></i></a>
                                    @else
                                        <a href="{{ route('update_quotes_status',[$quotes->quote_id,'Disable']) }}" class="btn btn-info mt-1"><i class="fa fa-times"></i></a>
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
