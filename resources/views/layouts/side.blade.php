<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Buddy</title>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="/css/simple-sidebar.css" rel="stylesheet">
  <link href="/css/theme.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right"  id="sidebar-wrapper">
      <div class="sidebar-heading" style="background-color:#68b9d8">
        <a class="text-dark" style="text-decoration: none;" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      {{-- <div class="border-right" id="sidebar-wrapper"> --}}
         
      <div class="list-group list-group-flush">
        
          @foreach ($member as $item)
            @if (Auth::user()->name != $item->name)
              <a href="/chat/{{$item->id}}" class="list-group-item list-group-item-action bg-light">{{$item->name}}</a>
            @endif
          @endforeach
      </div>
    {{-- </div> --}}
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color:#68b9d8!important">
        <button class="btn border" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            {{-- <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a> --}}
              {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div> --}}
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                      <img src="{{ Auth::user()->image }}" class="img-fluid rounded-circle" width="35" height="10" alt="">
                      <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">{{ __('Profile') }}</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
            </li>
          </ul>
        </div>
      </nav>
      <form action="/search" method="post">
        @csrf
        <div class="form-group d-flex border p-1">
          <input type="text" name="search" id="search" class="form-control" style="border:none!important" placeholder="Search Your Friend.. By name and Email" aria-describedby="helpId">
          <button type="submit" class="btn"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
      </form>
      <main class="container-fluid py-4">
        @yield('admin')
      </main>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@yield('js')
</body>

</html>
