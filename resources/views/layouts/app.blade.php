<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TenderNoticeBoard') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/84f2462d41.js"></script>
</head>
<body>
           <section id="nav-bar">
        <nav class="navbar navbar-main navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                   <img src="/img/logo2.png"/>
                 </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                      
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('services') }}">{{ __('OUR SERVICES') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('directory') }}">{{ __('SUPPLIERS DIRECTORY') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories') }}">{{ __('CATEGORIES') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tenders') }}">{{ __('TENDERS & RFQs') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contacts') }}">{{ __('CONTACT US') }}</a>
                         </li>
                         <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </section>

        <main>
            @yield('content')
        </main>

            <footer>
            <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>About Us</div>
                    <div>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam consequatur obcaecati numquam delectus error iusto consequuntur maxime consectetur eius nihil esse, ipsum voluptate debitis sit nemo voluptatibus, odit, hic totam.
                    </div>
                </div>
                <div class="col-md-4">
                    <div>Quick Links</div>
                    <ul>
                        <li>Tenders & RFQs</li>
                        <li>Suppliers Directory</li>
                        <li>Suppliers Categories</li>
                        <li>Our Services</li>
                        <li>Contact Us</li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <div>Contact Us</div>
                    <div>
                        <div class="d-flex">
                            <i class="fa fa-phone"></i>
                            <div>+2637700000/+26388000000</div>
                        </div>
                        <div class="d-flex">
                            <i class="fa fa-mail"></i>
                            <div>info@tendernoticeboard.co.zw</div>
                        </div>
                        <div class="d-flex">
                            <i class="fa fa-mail"></i>
                            <div>146 Samora Macheal Borrowdale</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </footer>
        
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
