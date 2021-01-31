@extends('layouts.app')


@section('title')
Dashboard
@endsection



@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td>{{ $slider->image }}</td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>{{ $slider->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                                                <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
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