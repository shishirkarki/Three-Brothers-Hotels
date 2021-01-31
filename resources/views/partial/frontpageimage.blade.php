

<!-- Front page image start -->
@foreach($sliders as $key=>$slider)
    <section class="site-hero overlay" style="background-image: url({{ asset('uploads/slider/'.$slider->image) }})" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <span class="custom-caption text-uppercase text-white d-block  mb-3">{{ $slider->title }} <span class="fa fa-star text-primary"></span></span>
            <h1 class="heading">{{ $slider->sub_title }}</h1>
          </div>
          @endforeach
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- End Front page image start -->