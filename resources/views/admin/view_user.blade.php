@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-11 d-flex align-items-stretch grid-margin m-auto">
        <div class="row flex-grow ">
          <div class="col-12 grid-margin ">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-auto text-center">All Users</h4>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table table-bordered">
                          <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">More Details</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span><strong>Role : </strong>
                                    @if ($user->role==1)
                                        Super Admin
                                    @elseif ($user->role==2)
                                        Admin
                                    @endif
                                    </span> <br><br>
                                    <span><strong>Address : </strong> {{ $user->address }}</span> <br>
                                </td>
                                <td>
                                    <img src="{{ asset($user->image) }}" alt="">
                                </td>
                                <td>{{ $user->status }}</td>
                                <td style="width:20%" class="text-center">
                                    <a onclick="return confirm('Are You Sure Want Do Delete This User ?')" href="{{ route('delete_user',$user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    @if ($user->status=='Disable')
                                        <a href="{{ route('update_user_status',[$user->id,'Enable']) }}" class="btn btn-success ml-1"><i class="fa fa-check"></i></a>
                                    @else
                                        <a href="{{ route('update_user_status',[$user->id,'Disable']) }}" class="btn btn-info ml-1"><i class="fa fa-times"></i></a>
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
