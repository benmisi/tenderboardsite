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
                                    <a class="nav-link" href="{{ route('welcome') }}">{{ __('HOME') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('directory') }}">{{ __('SUPPLIERS DIRECTORY') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories') }}">{{ __('TENDERS BY CATEGORY') }}</a>
                         </li>
                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tenders') }}">{{ __('TENDERS & RFQs') }}</a>
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
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('DASHBOARD') }}</a>
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

            <footer class="footer">
                <div class="row">
            <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">About Us</div>
                    <div class="footer_about_text">
                    We are committed to bringing transparency and efficiency in Public Procurement domain, and we believe that the first step to achieve this objective is to make the procurement opportunities available to a larger supplier base and giving them sufficient time to respond.</div>
                </div>
                <div class="col-md-3">
                    <div class="footer_column_title">Quick Links</div>
                    <ul>
                        <li class="footer_about_text">Tenders & RFQs</li>
                        <li class="footer_about_text">Suppliers Directory</li>
                        <li class="footer_about_text">Suppliers Categories</li>
                        <li class="footer_about_text">Our Services</li>
                        <li class="footer_about_text">Contact Us</li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="footer_column_title">Contact With Us</div>
                    <div class="footer_contact_item">                           
                            <div> <i class="fa fa-facebook"></i> Tender NoticeBoard</div>
                    </div>
                    <div class="footer_contact_item">                           
                            <div> <i class="fa fa-twitter"></i> @NoticeTender</div>
                    </div>
                    <div class="footer_contact_item">                           
                            <div> <i class="fa fa-whatsapp"></i> :+263784929238</div>
                    </div>
                    <div class="footer_contact_item">                           
                            <div> <i class="fa fa-envelope"></i> :tendernoticeboard@gmail.com</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_column_title">Contact Us</div>
                    <div>
                        <div class="d-flex footer_contact_item">
                            <i class="fa fa-phone"></i>
                            <div>+263 784 929 238</div>
                        </div>
                        <div class="d-flex footer_contact_item">
                            <i class="fa fa-mail"></i>
                            <div>tendernoticeboard@gmail.com</div>
                        </div>
                        <div class="d-flex footer_contact_item">
                            <i class="fa fa-mail"></i>
                            <div>No 4 Cameron Road Borrowdale Hararee</div>
                        </div>
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
