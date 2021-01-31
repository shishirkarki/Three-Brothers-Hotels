@extends('layouts.app')


@section('title')
Dashboard
@endsection



@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Welcome</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('welcome.update',$welcome->id)}}" enctype="multipart/form-data">
                  @csrf
                        @method('PUT')
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>welcome title </label>
                        <input type="text" class="form-control" name="welcome_title" value="{{ $welcome->welcome_title }}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>welcome_description</label>
                        <input type="text" class="form-control" name="welcome_description" value="{{ $welcome->welcome_description }}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Video link</label>
                        <input type="text" class="form-control" name="video_link" value="{{ $welcome->video_link }}">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Photo</label>
                                <input type="file" name="photo">
                            </div>
                        </div>

                  <a href="{{ route('welcome.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
@endsection