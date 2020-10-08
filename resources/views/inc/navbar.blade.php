<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        @guest
      <a class="py-2 d-none d-md-inline-block" href="/"><h5>{{config('app.name', 'UKM VRS')}}</h5></a>
      <a class="py-2 d-none d-md-inline-block" href="/about"><h5>About Us</h5></a>
      <a class="py-2 d-none d-md-inline-block" href="/vehicle"><h5>Rent Vehicles</h5></a>
      <a class="py-2 d-none d-md-inline-block" href="/myvehicles"><h5>My Vehicles</h5></a>
      <a class="py-2 d-none d-md-inline-block" href="/smartSearch"><h5>Search</h5></a>
          <!-- Authentication Links -->
          <a {{-- class="py-2 d-none d-md-inline-block" --}} style="margin-top:1.5vh" href="{{ route('login') }}">{{ __('Login') }}</a>
             {{--  @if (Route::has('register'))
          <a class="py-2 d-none d-md-inline-block" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif --}}
          @else
          <div class="container d-flex flex-column flex-md-row justify-content-between">
              <a class="py-2 d-none d-md-inline-block" href="/"><h5>{{config('app.name', 'UKM VRS')}}</h5></a>
              <a class="py-2 d-none d-md-inline-block" href="/about"><h5>About Us</h5></a>
              <a class="py-2 d-none d-md-inline-block" href="/vehicle"><h5>Rent Vehicles</h5></a>
              <a class="py-2 d-none d-md-inline-block" href="/myvehicles"><h5>My Vehicles</h5></a>
              <a class="py-2 d-none d-md-inline-block" href="/smartSearch"><h5>Search</h5></a>
              <div class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" style="margin-top:1.5vh" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
              </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/">Home</a><br>
                    <a class="dropdown-item" href="/about">About Us</a><br>
                    <a class="dropdown-item" href="/vehicle">Rent Vehicles</a><br>
                    <a class="dropdown-item" href="/myvehicles">My Vehicles</a><br>
                    <a class="dropdown-item" href="/smartSearch">Search</a><br>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                </div>
          @endguest
    </div>
  </nav>
