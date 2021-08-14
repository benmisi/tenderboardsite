<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tender Notice Board</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="/img/logo2.png"/>
            </div>
            

            <ul class="list-unstyled components">
                <p class="sidebar-title">Tender Notice Board</p>
             
                <li>
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{route('praz-service.index')}}">PRAZ registrations</a>
                </li>
                <li>
                    <a href="{{route('Company-service.index')}}">Company Deed registration</a>
                </li>
                <li>
                    <a href="{{route('vendor-registrations.index')}}">Vendor registration</a>
                </li>
                <li>
                    <a href="{{route('directory.index')}}">My Directory</a>
                </li>
                <li>
                    <a href="{{route('procurement-notice.index')}}">RFQs & Tenders</a>
                </li>
               
            </ul>
            <ul class="list-unstyled components">
                <p class="sidebar-title">Reports</p>
             
               
              
                <li>
                    <a href="{{route('report-invoices')}}">Invoices</a>
                </li>
                <li>
                    <a href="{{route('report-paynow')}}">Paynow Payments</a>
                </li>
                <li>
                    <a href="{{route('report-transfers')}}">Bank transfers</a>
                </li>
            </ul>

         

           
        </nav>

        <!-- Page Content  -->
        
        <div id="content">

           
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                <a class="navbar-brand d-inline-block d-lg-none" href="{{ route('welcome') }}">
                   <img src="/img/logo2.png"/>
                 </a>
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-light d-inline-block d-lg-none">
                        <i class="fa fa-bars"></i>
                    </button>
                    

                    
                        <ul class="nav navbar-nav ml-auto">
                          
                        <li class="nav-item dropdown">
                            <button class="btn btn-sm btn-outline-light"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                              <span class="badge badge-success"  style="float:right;margin-bottom:-15px;font-size:10px">{{count(Auth::user()->notifications)}}</span>
                 
                        </button>
                          @if (count(Auth::user()->notifications)>0)
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           @foreach (Auth::user()->notifications as $notification)
                           <a class="dropdown-item" href="#">$notification->message</a>
                            <div class="dropdown-divider"></div>
                           @endforeach
                           
                           
                            </div>
                          @endif
                           
                      </li>   
                        <li class="nav-item dropdown">
                            <a class="nav-link mobile-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profie Settings</a>
                            
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
                           
                        </ul>
                
                </div>
            </nav>
             <div>
             @yield('content')
             </div>
         </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>