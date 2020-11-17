<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
  <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
  <div class="sidebar-wrapper">
      <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text">
              Creative Tim
          </a>
      </div>
      <ul class="nav">
          <li class="nav-item active">
              <a class="nav-link" href="dashboard.html">
                  <i class="nc-icon nc-chart-pie-35"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('user.request') }}">
                <i class="nc-icon nc-circle-09"></i>
                <p>List Request</p>
            </a>
          </li>
          <li>
              <a class="nav-link" href="./user.html">
                  <i class="nc-icon nc-circle-09"></i>
                  <p>User Profile</p>
              </a>
          </li>
      </ul>
  </div>
</div>