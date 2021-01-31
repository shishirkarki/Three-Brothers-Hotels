@extends('layouts.app')

@section('content')
@include('partial.header')


    

        {!! Form::open(['method' => 'post', 'route' => ['find_rooms.index']]) !!}
        <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    {!! Form::text('checkin_date', old('checkin_date'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    </div>
                     <p class="help-block"></p>
                    @if($errors->has('checkin_date'))
                        <p class="help-block">
                            {{ $errors->first('checkin_date') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    {!! Form::text('checkout_date', old('checkout_date'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                  </div>
                    <p class="help-block"></p>
                    @if($errors->has('checkout_date'))
                        <p class="help-block">
                            {{ $errors->first('checkout_date') }}
                        </p>
                    @endif
            </div>
            <div class="col-md-6 col-lg-3 align-self-end">
                    {!! Form::submit('Search for rooms', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        @if (isset($rooms) && is_null($rooms))
            <div class="form-group" style="text-align: center">
                <label>@lang('quickadmin.find-room.no_rooms_found')</label>
            </div>
        @endif
        @if (!is_null($rooms))
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>@lang('quickadmin.rooms.fields.room-type')</th>
                    <th>@lang('quickadmin.rooms.fields.price-time')</th>
                    <!-- <th>@lang('quickadmin.rooms.fields.description')</th> -->
                </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr data-entry-id="{{ $room->id }}">
                            <td></td>
                            <td field-key='room_type'>{{ $room->room_type }}</td>
                            <td field-key='price_time'>{{ $room->price_time }}</td>
                            <!-- <td field-key='description'>{!! $room->description !!}</td> -->
                            <td>
                                
                                    <button class="btn btn-danger">
                                        <a style="color: #ffffff;" href="{{ route('reservation',
                                        ['room_id' => $room->id,'checkin_date' => $checkin_date, 'checkout_date' => $checkout_date]) }}">
                                            Book</a>
                                    </button>
                                
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    
@stop
@section('javascript')
    @parent
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm"
        });
    </script>
    @include('partial.javascript')
@stop
