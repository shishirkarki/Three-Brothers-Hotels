<div class="sidebar" data-color="orange">
     
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
            <a href="{{ route('admin.dashboard') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/slider*') ? 'active': '' }}">
             <a href="{{ route('slider.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Slider</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/country*') ? 'active': '' }}">
             <a href="{{ route('country.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Country</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/leadership*') ? 'active': '' }}">
             <a href="{{ route('leadership.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Leadership</p>
            </a>
          </li>
          
          <li class="{{ Request::is('admin/room*') ? 'active': '' }}">
             <a href="{{ route('room.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Room</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/booking*') ? 'active': '' }}">
             <a href="{{ route('booking.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Booking</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/photo*') ? 'active': '' }}">
             <a href="{{ route('photo.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Photos</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/history*') ? 'active': '' }}">
             <a href="{{ route('history.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Historys</p>
            </a>
          </li>



          <li class="{{ Request::is('admin/contact*') ? 'active': '' }}">
             <a href="{{ route('contact.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Contacts</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/welcome*') ? 'active': '' }}">
             <a href="{{ route('welcome.index') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Welcomes</p>
            </a>
          </li>

        </ul>
      </div>
    </div>