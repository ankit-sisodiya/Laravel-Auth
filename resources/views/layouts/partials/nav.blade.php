 <!-- ========== App Menu ========== -->
 <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('img/logo.png')}}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('img/logo.png')}}" alt="" height="50">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('img/logo.png')}}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('img/logo.png')}}" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>



            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link menu-link {{ Request::is('dashboard') ? 'active' : '' }} data-key="t-ecommerce"> Dashboard </a>
                        </li> <!-- end Dashboard Menu -->
                        <!-- Authenticated URL -->
                        <li class="menu-title"><span data-key="t-menu">Authenticated Menu</span></li>
                        @if (!empty(game('Orders/add')) or !empty(game('Orders/view')))     
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarorders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Orders</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarorders">
                                <ul class="nav nav-sm flex-column">
                                @if (!empty(game('Orders/add')))
                                    <li class="nav-item {{ Request::is('Orders/add') ? 'active' : '' }}">
                                        <a href="{{ route('Orders/add') }}" class="nav-link" data-key="t-analytics"> Add </a>
                                    </li>
                                @endif
                                @if (!empty(game('Orders/view')))
                                    <li class="nav-item {{ Request::is('Orders/view') ? 'active' : '' }}">
                                        <a href="{{ route('Orders/view') }}" class="nav-link" data-key="t-crm"> View </a>
                                    </li>
                                @endif                                   
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                        @endif 
                        @if (!empty(game('Users/add')))    
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('Users/add') ? 'active' : '' }}" href="{{ route('Users/add') }}">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">{{ ('Users') }} </span>
                            </a>
                        </li>
                        @endif

                        @if (!empty(game('logs-report')))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('logs-report') ? 'active' : '' }}" href="{{ route('logs-report') }}">
                                <i class="ri-honour-line"></i> <span data-key="t-details">{{ ('Logs') }} </span>
                            </a>
                        </li>
                        @endif

                        @if (!empty(game('user-access')))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('user-access') ? 'active' : '' }}" href="{{ route('user-access') }}">
                                <i class="ri-honour-line"></i> <span data-key="t-details">{{ ('User Access') }} </span>
                            </a>
                        </li>
                        @endif
                        <!-- Authenticated URL END -->

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>