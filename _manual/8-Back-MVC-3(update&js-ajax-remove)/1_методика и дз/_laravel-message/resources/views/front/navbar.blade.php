<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
   <div class="container">
       <a class="navbar-brand size" href="{{route('home')}}">
           {{ config('app.name') }}
       </a>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Left Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>
           <!-- Center Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>

           <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                      <a class="nav-link" href="{{route('home')}}">Home </a>
                   </li>           
                   <!-- Authentication Links -->
                   @guest
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                   @else
                   <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <div class="dropdown-menu dropdown-menu-right size" aria-labelledby="navbarDropdown">
                              @admin
                              <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                              @endadmin
                           <a class="dropdown-item" href="#"
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
           </ul>
       </div>
   </div>
  </nav>