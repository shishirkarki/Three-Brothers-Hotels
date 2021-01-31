@extends('layouts.app')


@section('title','Leadership')





@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('leadership.create') }}" class="btn btn-primary">Add New Post</a>
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
                        <th>Post</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($leaderships as $key=>$leadership)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $leadership->name }}</td>
                                            <td>{{ $leadership->post }}</td>
                                            <td>{{ $leadership->description }}</td>
                                            <td>{{ $leadership->image }}</td>
                                            <td>{{ $leadership->created_at }}</td>
                                            <td>{{ $leadership->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('leadership.edit',$leadership->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>
                                                <form id="delete-form-{{ $leadership->id }}" action="{{ route('leadership.destroy',$leadership->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $leadership->id }}').submit();
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