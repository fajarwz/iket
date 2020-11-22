<nav class="navbar navbar-expand-lg " color-on-scroll="500">
  <div class="container-fluid">
      <a class="navbar-brand" href="#pablo"> {{ \Carbon\Carbon::now('Asia/Phnom_Penh')->format('Y-m-d | H:i') }} </a>
      <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar burger-lines"></span>
          <span class="navbar-toggler-bar burger-lines"></span>
          <span class="navbar-toggler-bar burger-lines"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <ul class="nav navbar-nav mr-auto">
              <li class="nav-item">
                  <a href="#" class="nav-link" data-toggle="dropdown">
                      <span class="d-lg-none">Dashboard</span>
                  </a>
              </li>
              
          </ul>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">

                 <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                 </a>
                 
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                 </form>
                     
              </li>
          </ul>
      </div>
  </div>
</nav>