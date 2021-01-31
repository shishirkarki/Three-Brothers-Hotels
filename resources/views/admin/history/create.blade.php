@extends('layouts.app')


@section('title','History Create')



@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload History</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('history.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year" placeholder="Eg: 2018" value="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Eg: More Branches Worldwide" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Bio:" value="">
                      </div>
                    </div>
                  </div>


                  <a href="{{ route('history.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
@endsection