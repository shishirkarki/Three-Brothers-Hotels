@extends('layouts.app')


@section('title')
Dashboard
@endsection



@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('welcome.create') }}" class="btn btn-primary">Add New welcome</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>welcome title</th>
                        <th>welcome description</th>
                        <th>video link</th>
                        <th>Image</th>
                        <th>Photo</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($welcomes as $key=>$welcome)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $welcome->welcome_title }}</td>
                                            <td>{{ $welcome->welcome_description }}</td>
                                            <td>{{ $welcome->video_link }}</td>
                                            <td>{{ $welcome->image }}</td>
                                            <td>{{ $welcome->photo }}</td>
                                            <td>{{ $welcome->created_at }}</td>
                                            <td>{{ $welcome->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('welcome.edit',$welcome->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>
                                                <form id="delete-form-{{ $welcome->id }}" action="{{ route('welcome.destroy',$welcome->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $welcome->id }}').submit();
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