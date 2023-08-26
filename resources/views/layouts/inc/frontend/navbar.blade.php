<div class="container-fluid">

    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name"></h5>
                    </div>

                    <div class="col-md-5 my-auto">

                    </div>

                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                            @if (Auth::user() && Auth::user()->role_as != '1')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('cart') }}">
                                        <i class="fa fa-shopping-cart"></i> Cart
                                        (<livewire:frontend.cart.cart-count />)
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('wishlist') }}" class="nav-link">
                                        <i class="fa fa-heart"></i> Wishlist
                                        (<livewire:frontend.wishlist-count />)
                                    </a>
                                </li>
                            @endif
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
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        @if (Auth::user() && Auth::user()->role_as == '1')
                                            <li><a class="dropdown-item" href="{{ url('admin/dashboard') }}"><i
                                                        class="fa fa-user"></i> admin dashboard</a></li>
                                        @elseif(Auth::user() && Auth::user()->role_as !== '1')
                                            <li><a class="dropdown-item" href="{{ url('profile') }}"><i
                                                        class="fa fa-user"></i> Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ url('orders') }}"><i
                                                        class="fa fa-list"></i> My Orders</a></li>
                                            <li><a class="dropdown-item" href="{{ url('wishlist') }}"><i
                                                        class="fa fa-heart"></i> My Wishlist</a></li>
                                            <li><a class="dropdown-item" href="{{ url('cart') }}"><i
                                                        class="fa fa-shopping-cart"></i> My Cart</a></li>
                                        @endif
                                        <li>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluied">
            <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">

                <a class="navbar-brand" href="index.html"></a>
                <div class="social-media order-lg-last">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="{{ url('https://www.instagram.com/drip4stickers/?igshid=YzcxN2Q2NzY0OA%3D%3D') }}"
                            target="_blank" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>

                    </p>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav pt-4 mr-md-3">
                        <li class="nav-item">
                            <img src="{{ asset('images/logo3.png') }}" alt="Logo" width="150" height="100">
                        </li>
                        <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('/collections') }}" class="nav-link">
                                Categories</a></li>

                        <li class="nav-item"><a href="{{ url('/customcategories') }}" class="nav-link">Custom</a>
                        </li>


                    </ul>
                </div>

                <nav class="navbar  col-md-3 m-1">

                    <form action="{{ url('search') }}" method="GET" role="search" class="d-flex">
                        <input class="form-control me-5" name="search" value="{{ Request::get('search') }}"
                            type="search" placeholder="Search" aria-label="Search">
                        <button class="btn_c" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </nav>
            </nav>
            <!-- END nav -->
        </div>
