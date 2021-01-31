@extends('layouts.app')


@section('title','history Edit')




@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit History</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('history.update',$history->id)}}" enctype="multipart/form-data">
                  @csrf
                        @method('PUT')
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year" value="{{ $history->year }}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $history->title }}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $history->description }}">
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