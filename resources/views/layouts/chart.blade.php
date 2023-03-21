<!DOCTYPE html>
<html>
<head>
    <title>Deliveboo - Team 6</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{Vite::asset('resources/img/favicon.ico.png')}}" type="image/x-icon">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>
    
<body>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container">
                {{-- da cancellare --}}
                @include('pages.errors')

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto align-items-center">
                        <li>
                            <a class="nav-link" href="{{url('http://localhost:5174/') }}">
                                <img src="{{Vite::asset('resources/img/logo-white.png')}}" alt="logo" class="logo-form">
                            </a>
                        </li>
                        {{-- @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/restaurant') }}">{{ __('Il tuo ristorante') }}</a>
                            </li>  
                        @endauth --}}
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{Auth::user()-> restaurant->business_name}}
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Request::is('dashboard'))
                                    <a class="dropdown-item" href="{{ url('restaurant') }}">{{__('Il tuo ristorante')}}</a>
                                    <a class="dropdown-item" href="{{ url('order') }}">{{__('I tuoi ordini')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profilo')}}</a>
                                @elseif (Request::is('restaurant'))
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('order') }}">{{__('I tuoi ordini')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profilo')}}</a>
                                @elseif (Request::is('order'))
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('restaurant') }}">{{__('Il tuo ristorante')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profilo')}}</a>
                                @elseif (Request::is('profile'))
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('restaurant') }}">{{__('Il tuo ristorante')}}</a>
                                    <a class="dropdown-item" href="{{ url('order') }}">{{__('I tuoi ordini')}}</a>
                                @elseif (Request::is('chart'))
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('restaurant') }}">{{__('Il tuo ristorante')}}</a>
                                    <a class="dropdown-item" href="{{ url('order') }}">{{__('I tuoi ordini')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profilo')}}</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
    <div class="my_container">
        <canvas id="myChart" height="100px"></canvas>
    </div>

</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
      var orders =  {{ Js::from($data) }};
  
      const data = {
        labels: labels,
        datasets: [{
          label: 'Le statistiche dei tuoi ordini',
          backgroundColor: '#ee5743',
          borderColor: 'rgb(255, 99, 132)',
          data: orders,
        }]
      };
  
      const config = {
        type: 'bar',
        data: data,
        options: {
            y: {
                min: 0,
                max: 100
            }
        }
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>
</html>