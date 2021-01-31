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
                <h5 class="title">Upload Room</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Enter Room Type</label>
                        <input type="text" class="form-control" name="room_type" placeholder="Eg: Single Room" value="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Enter Room price and time</label>
                        <input type="text" class="form-control" name="price_time" placeholder="Eg: 9$ / Per night" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Facilities</label>
                        <input type="text" class="form-control" name="Facilities" placeholder="Eg: Wifi" value="">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Image</label>
                                <input type="file" name="image">
                            </div>
                        </div>

                  <a href="{{ route('room.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
@endsection