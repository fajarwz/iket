<div class="sidebar" data-image="{{ asset('assets/img/sidebar-5.jpg')}}">
  <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
  <div class="sidebar-wrapper">
      <div class="logo">
          <a href="#" class="simple-text">
              IKET <small>(IT Ticketing)</small>
          </a>
      </div>
      <ul class="nav">
          <li class="nav-item {{ request()->is('/') || 
            request()->is('t') || 
            request()->is('m') ? 
            'active' : '' }}">
              <a class="nav-link" href="{{ route('user.dashboard') }}">
                  <i class="nc-icon nc-chart-pie-35"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          <li class="nav-item {{ request()->is('request') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('user.request') }}">
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>List Request</p>
            </a>
          </li>
      </ul>
  </div>
</div>