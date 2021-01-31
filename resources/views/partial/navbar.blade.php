<!-- Navbar start -->
<header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="{{ route('welcome') }}">3 Brother Hotel</a></div>
          <div class="col-6 col-lg-8">

            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="{{ route('rooms') }}">Rooms</a></li>
                        <li><a href="{{ route('aboutus') }}">About</a></li>
                        <!-- <li><a href="events.html">Events</a></li> -->
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('reservation') }}">Reservation</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END Navbar -->