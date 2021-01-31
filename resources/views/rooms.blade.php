<!DOCTYPE HTML>
<html>
@include('partial.header')
  <body>
    
@include('partial.navbar')

    <section class="site-hero inner-page overlay" style="background-image: url({{ asset('frontend/images/hero_4.jpg') }}" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="section pb-4">
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <!-- <form action="#">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" id="checkin_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" id="checkout_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Adults</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="adults" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4+</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="children" class="font-weight-bold text-black">Children</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="children" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4+</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
                </div>
              </div>
            </form> -->

  
          
            {!! Form::open(['method' => 'post', 'route' => ['rooms']]) !!}
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
           </div>
          </div>

        @if (isset($rooms) && is_null($rooms))
            <div class="form-group" style="text-align: center">
                <label>No room FOund</label>
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
                                    <!-- Details about the page -->
                                    <!-- <button class="btn btn-danger">
                                        <a style="color: #ffffff;" href="{{ route('reservation') }}">More Details</a>
                                    </button> -->
                                    
                                
                            </td>
                        </tr>
                    @endforeach
                @endif
                
                </tbody>
            </table>
        </div>
    </div>
          </div>

        </div>
      </div>
    </section>

    
    <section class="section">
      <div class="container">
        
        <div class="row">
        @foreach($roomx as $key=>$room)
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="{{ asset('uploads/room/'.$room->image) }}" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>{{ $room->room_type }}</h2>
                <span class="text-uppercase letter-spacing-1">{{ $room->price_time }}</span>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <section class="section bg-light">

      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        @foreach($roomx as $key=>$room)
      
        <div class="site-block-half d-block d-lg-flex bg-white mt-2" data-aos="fade" data-aos-delay="100">
          <a href="{{ route('reservation') }}" class="image d-block bg-image-2" style="background-image: url('{{ asset('uploads/room/'.$room->image) }}');"></a>
          <div class="text">
            <span class="d-block mb-4"><span class="display-4 text-primary">{{ $room->price_time }}</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">{{ $room->room_type }}</h2>
            <p>{{ $room->facilities }}</p>
            <p><a href="{{ route('reservation') }}" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>
        @endforeach


        <!-- <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
          <a href="#" class="image d-block bg-image-2 order-2" style="background-image: url('{{ asset('frontend/images/img_2.jpg') }}');"></a>
          <div class="text order-1">
            <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Presidential Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div> -->

      </div>
    </section>
    @include('partial.footer')
    @include('partial.javascript')
    

    <script src="js/main.js"></script>
  </body>
</html>