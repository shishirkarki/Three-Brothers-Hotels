@extends('layouts.app')
@section('title','Country Edit')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Country</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('country.update',$country->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    
                  <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Shortcode</label>
                              <input type="text" class="form-control" name="shortcode" value="{{ $country->shortcode }}">
                          </div>
                     </div>
                     <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                              <input type="text" class="form-control" name="title" value="{{ $country->title }}">
                          </div>
                      </div>

                  </div>
                  
                  <div class="row">
                     <div class="col-md-6 pr-1">
                        <div class="form-group">
                           <label>Name</label>
                             <input type="text" class="form-control" name="name" value="{{ $country->name }}">
                        </div>
                      </div>

                  </div>
                  </div>
                  <a href="{{ route('country.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
@endsection

@push('scripts')
@endpush






