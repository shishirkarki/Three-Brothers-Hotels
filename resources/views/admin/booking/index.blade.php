@extends('layouts.app')
@section('title','Booking')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Room Type</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($bookings as $key=>$booking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>{{ $booking->room->room_type }}</td>
                                            <td>{{ $booking->checkin_date }}</td>
                                            <td>{{ $booking->checkout_date }}</td>
                                            <td>{{ $booking->note }}</td>
                                            <td>{{ $booking->created_at }}</td>
                                            <td>{{ $booking->updated_at }}</td>
                                            <td>

                                                <form id="delete-form-{{ $booking->id }}" action="{{ route('booking.destroy',$booking->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $booking->id }}').submit();
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

@push('scripts')
@endpush






