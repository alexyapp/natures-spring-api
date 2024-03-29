<nav class="navbar navbar-expand-md navbar-light navbar-custom py-3">
    <div class="container">
        <a style="width: 100px; height: 50px;" class="navbar-brand position-relative" href="{{ url('/') }}">
            <img class="position-absolute" style="height: 125px; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%);" src="{{ asset('images/NatureSpring_Logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                {{-- @guest
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
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                @endguest --}}
                <li class="nav-item mx-md-3">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('website.home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link {{ request()->is('about-us*') ? 'active' : '' }}" href="{{ route('website.about') }}">
                        About Us
                    </a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link {{ request()->is('events*') ? 'active' : '' }}" href="{{ route('website.events') }}">
                        Events
                    </a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('website.products') }}">
                        Products
                    </a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link {{ request()->is('careers*') ? 'active' : '' }}" href="{{ route('website.careers') }}">
                        Careers
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>