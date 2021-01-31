@extends('layouts.app')


@section('title')
Dashboard
@endsection



@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('room.create') }}" class="btn btn-primary">Add New Room</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>Room Type</th>
                        <th>Room price & Time</th>
                        <th>Facilities</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($rooms as $key=>$room)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $room->room_type }}</td>
                                            <td>{{ $room->price_time }}</td>
                                            <td>{{ $room->facilities }}</td>
                                            <td>{{ $room->slug }}</td>
                                            <td>{{ $room->image }}</td>
                                            <td>{{ $room->created_at }}</td>
                                            <td>{{ $room->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('room.edit',$room->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>
                                                <form id="delete-form-{{ $room->id }}" action="{{ route('room.destroy',$room->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $room->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
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

@endsection


@section('scripts')
@endsection