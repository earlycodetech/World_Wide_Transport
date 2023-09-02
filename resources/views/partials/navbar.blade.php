<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a href="#" class="nav-link"> Home </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> About </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> Services </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> Contact </a>
                </li>


                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('locations.create') }}" class="nav-link"> Add Location </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('locations.index') }}" class="nav-link"> View Locations </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('locations.create') }}" class="nav-link"> Book a Ride </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link"> Profile </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
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
