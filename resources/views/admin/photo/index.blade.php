@extends('layouts.app')
@section('title','Photo')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('photo.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>photo Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($photos as $key=>$photo)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $photo->photo_description }}</td>
                                            <td>{{ $photo->image }}</td>
                                            <td>{{ $photo->created_at }}</td>
                                            <td>{{ $photo->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('photo.edit',$photo->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                                                <form id="delete-form-{{ $photo->id }}" action="{{ route('photo.destroy',$photo->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $photo->id }}').submit();
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






