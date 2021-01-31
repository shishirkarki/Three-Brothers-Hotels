@extends('layouts.app')

@section('title','Edit Item')

@push('css')
   
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit Item</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <form method="POST" action="{{ route('item.update',$item->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Category</label>
                                    <select class="form-control" name= "category">
                                    @foreach($categories as $category)
                                    <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{ $item->price }}" >
                                </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <label class="control-label">Image</label>
                                  <input type="file" name="image">
                              </div>
                          </div>
                        <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
        
    </script>
@endpush