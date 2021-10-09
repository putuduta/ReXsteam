<nav class="navbar navbar-expand-md navbar-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'ReXsteam') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="nav-link text-white" href="{{ route('home') }}">{{ __('Home') }}</a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="mr-lg-4">
                    <form action="#" method="GET" class="mb-0">
                        @csrf
                        <div class="d-flex">
                            <input type="text" name="search_value" class="form-control bg-dark text-white" required
                                placeholder="Search">
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </form>
                </div>
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item mr-lg-4">
                    <a class="nav-link" href="#"><img src="/storage/assets/cart-icon.png"
                            style="height:30px;filter:brightness(0) invert(1);" alt=""></a>
                </li>
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="img-profile-navbar"
                            src="/storage/assets/{{ auth()->user()->profile_picture ? auth()->user()->profile_picture : 'user-default.png'}}"
                            alt="">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a>

                        @if(auth()->user()->role == 'member')
                        <a href="{{ route('friends.index') }}" class="dropdown-item">Friends</a>
                        <a href="#" class="dropdown-item">Transaction History</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sign Out') }}
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
