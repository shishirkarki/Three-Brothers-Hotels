@extends('layouts.app')


@section('title','Leadership Edit')




@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Leadership</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('leadership.update',$leadership->id)}}" enctype="multipart/form-data">
                  @csrf
                        @method('PUT')
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $leadership->name }}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Post</label>
                        <input type="text" class="form-control" name="post" value="{{ $leadership->post }}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $leadership->description }}">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Image</label>
                                <input type="file" name="image">
                            </div>
                        </div>

                  <a href="{{ route('leadership.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
@endsection