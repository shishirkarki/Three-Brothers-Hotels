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
                <h5 class="title">Upload welcome</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('welcome.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>welcome title</label>
                        <input type="text" class="form-control" name="welcome_title" placeholder="Eg: Single welcome" value="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>welcome_description</label>
                        <input type="text" class="form-control" name="welcome_description" placeholder="Eg: 9$ / Per night" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>video link</label>
                        <input type="text" class="form-control" name="video_link" placeholder="Eg: Wifi" value="">
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