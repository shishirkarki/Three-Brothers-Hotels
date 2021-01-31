@extends('layouts.app')


@section('title','History')





@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('history.create') }}" class="btn btn-primary">Add New Post</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>Year</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($historys as $key=>$history)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $history->year }}</td>
                                            <td>{{ $history->title }}</td>
                                            <td>{{ $history->description }}</td>
                                            <td>{{ $history->created_at }}</td>
                                            <td>{{ $history->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('history.edit',$history->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>
                                                <form id="delete-form-{{ $history->id }}" action="{{ route('history.destroy',$history->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $history->id }}').submit();
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