<!DOCTYPE HTML>
<html>
  <head>
  @include('partial.header')
  </head>
  <body>
  @include('partial.navbar')

  <section class="site-hero inner-page overlay" style="background-image: url({{ asset('frontend/images/hero_4.jpg') }}" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">About Us</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>About</li>
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

  <!-- Wellcome page Start -->
  <section class="py-5 bg-light">
      <div class="container">
      @foreach($welcomes as $key=>$welcome)
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
              <img src="{{ asset('uploads/welcome/'.$welcome->image) }}" alt="Image" class="img-fluid">
            </figure>
            <img src="{{ asset('uploads/welcome/'.$welcome->photo) }}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">{{ $welcome->welcome_title }}!</h2>
            <p class="mb-4">{{ $welcome->welcome_description }}</p>
            <p><a href="#" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <span class="mr-3 font-family-serif"><em>or</em></span> <a href="{{ $welcome->video_link }}"  data-fancybox class="text-uppercase letter-spacing-1">See video</a></p>
          </div>
          
        </div>
        @endforeach
      </div>
    </section>
<!-- Wellcome page End -->




    <div class="container section">

      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7 mb-5">
          <h2 class="heading" data-aos="fade-up">Leadership</h2>
        </div>
      </div>

      <div class="row">
      @foreach($leaderships as $key=>$leadership)
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url({{ asset('uploads/leadership/'.$leadership->image) }})">
                <div class="box">
                  <h2>{{ $leadership->name }}</h2>
                  <p>{{ $leadership->post }}</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;{{ $leadership->description }}&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="{{ asset('uploads/leadership/'.$leadership->image) }}" alt="">
                  </div>
                  <div class="name align-self-center">{{ $leadership->name }} <span class="position">{{ $leadership->post }}</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>
        @endforeach
      </div>
    </div>
    <!-- END .block-2 -->

   
     <!-- Image section start -->
     <section class="section slider-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Photos</h2>
            @foreach($photos as $key=>$photo)
            <p data-aos="fade-up" data-aos-delay="100">{{ $photo->photo_description }}</p>
            @endforeach

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            @foreach($photos as $key=>$photo)
              <div class="slider-item">
                <a href="{{ asset('uploads/photo/'.$photo->image) }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('uploads/photo/'.$photo->image) }}" alt="Image placeholder" class="img-fluid"></a>
              </div>
              @endforeach
            </div>
            <!-- END slider -->
          </div>
        </div>
      </div>
    </section>
    <!-- END Image section -->

    <div class="section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7 mb-5">
            <h2 class="heading" data-aos="fade">History</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8">
          @foreach($historys as $key=>$history)
            <div class="timeline-item" date-is='{{ $history->year }}' data-aos="fade">
              <h3>{{ $history->title }}</h3>
              <p>{{ $history->description }}</p>

            </div>
            @endforeach
            
          </div>
        </div>
        

      </div>
    </div>

    
    
    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    @include('partial.javascript')
  </body>
</html>