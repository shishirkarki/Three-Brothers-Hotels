@extends('layouts.app')
@section('title','Photo')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Photo</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                     <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Photo Description *</label>
                              <input type="text" class="form-control" name="photo_description" placeholder="Dscription about image" value="">
                          </div>
                     </div>
                  <div class="row">
                     
                      <div class="col-md-6 pl-1">
                           <label class="control-label">Image</label>
                             <input type="file" name="image">
                       </div>
                  </div>

                  
                  

                 
                      
                    
                    
                    
                  </div>
                  <a href="{{ route('photo.index') }}" class="btn btn-danger">Back</a>
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






