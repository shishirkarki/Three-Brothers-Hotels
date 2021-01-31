@extends('layouts.app')
@section('title','Country')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Country</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="{{ route('country.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                  <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Shortcode</label>
                              <input type="text" class="form-control" name="shortcode" placeholder="EX: NP" value="">
                          </div>
                     </div>
                     <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                              <input type="text" class="form-control" name="title" placeholder="Nepal">
                          </div>
                      </div>

                  </div>
                  
                  <div class="row">
                     <div class="col-md-6 pr-1">
                        <div class="form-group">
                           <label>Name*</label>
                             <input type="text" class="form-control" name="name" placeholder="Name" >
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






