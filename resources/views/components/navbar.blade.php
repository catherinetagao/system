<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-gray shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/mug.png') }}" alt="" srcset="" width="50" height="50">
                    CupsCath
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ">
                    @guest
                        <!-- <a class="me-3 text-black text-decoration-none" href="/about"><li>About</li></a>
                        <a class="me-3 text-black text-decoration-none" href="/contacts"><li>Contact Us</li></a> -->
                    @else

                    @if (auth()->user()->hasRole('admin'))
                        <a class="me-3 text-black text-decoration-none" href="/dashboard"><li>Dashboard</li></a>
                        <a class="me-3 text-black text-decoration-none" href="/store"><li>Store</li></a>
                        <a class="me-3 text-black text-decoration-none" href="/products"><li>Products</li></a>
                        <!-- <a class="me-3 text-black text-decoration-none" href="/dashboard"><li>Dashboard</li></a> -->
                    @endif


                    @if (auth()->user()->hasRole('store'))
                        <a class="me-3 text-black text-decoration-none" href="/store"><li>Store</li></a>
                        <a class="me-3 text-black text-decoration-none" href="/products"><li>Products</li></a>
                    @endif

                    @endguest
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/home"><li>Home</li></a>
                                <a class="nav-link" href="/about"><li>About</li></a>
                                <a class="nav-link" href="/contacts"><li>Contact Us</li></a>
                            </li>
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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