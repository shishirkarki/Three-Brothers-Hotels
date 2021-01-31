@extends('layouts.app')
@section('title','Photo Edit')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Photo</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="{{ route('photo.update',$photo->id) }}" enctype="multipart/form-data">
                 @csrf
                  @method('PUT')
                  <div class="row">
                    
                     <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>photo Description *</label>
                              <input type="text" class="form-control" name="photo_description" placeholder="Username" value="{{ $photo->photo_description }}">
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






