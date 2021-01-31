@extends('layouts.app')


@section('title')
Dashboard
@endsection



@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-8">
          @include('layouts.partial.message')
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Slidebar</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Your Intro</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter your title" value="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Your Slogen</label>
                        <input type="text" class="form-control" name="sub_title" placeholder="Enter Your Sub title" value="">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Image</label>
                                <input type="file" name="image">
                            </div>
                        </div>

                  <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
@endsection