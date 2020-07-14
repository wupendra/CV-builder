<div id="header-1">
    
    	<div class="top-sec">
        	<div class="container">
            	<div class="col-sm-5 col-xs-12 left-side-prt">
                	<div class="quick-links-head">
                    	<span><a href="#">About Us</a></span>
                        <span><a href="{{ route('frontend.theme.list') }}">Themes</a></span>
                    </div><!--quick-links-head-->
                </div><!--left-side-prt-->
                
                <div class="col-sm-7 col-xs-12 right-side-prt">
                
                	<div class="right-side-items pull-right">
                    	<span><i class="fa fa-phone"></i>{{ $appsetting->contact }}</span>
                        <span><i class="fa fa-map-marker"></i>{{ $appsetting->address }}</span>
                        
                    </div><!--reg-buttons-->
                    
                	
                    
                </div><!--right-side-prt-->
                
            </div><!--container-->
        </div><!--top-sec-->
    
    </div><!--header-1-->
    
    <div id="header-2">
    	<div class="nav-sec">
        	<div class="container">
                 <nav id="navbarr" class="navbar nav-bar-mine">
                  <div class="container navbar-collapse-mine">
                    <div class="navbar-header"> 
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      	<a class="navbar-brand" href="index.html">
                            <img src="img/logo.png" alt="Entire Gorkhali Group Security PVT. LTD" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse header_main_menu_wrapper">
                    <div class="nav-bar-sec"> 
                      <ul class="nav navbar-nav pull-right navul header-menu">
                        <li class="cl-effect-3 {{ (Route::is('home')?'active-menu':'') }}"><a class="" href="{{ route('home') }}">Home</a></li>
                        <li class="cl-effect-3 {{ (Request::is('themes*')) ?  'active-menu'  :''}}"><a href="{{ route('frontend.theme.list') }}">Themes</a></li>
                        <li class="cl-effect-3 cl-effect-4"><a href="#">Support</a></li>
                        @if(Auth::guard('web')->guest())
                            <li class="cl-effect-3 cl-effect-4"><a href="{{ route('login') }}">Login</a></li>
                            <li class="cl-effect-3 cl-effect-4"><a href="{{ route('register') }}">SignUp</a></li>
                        @else
                                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <a href="#">
                                    My CV
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif

                      </ul>
                      
                    </div>
                    
							
                    </div><!--/.nav-collapse -->
                    
                  </div>
                  
                </nav>
            </div><!--container-->
        </div><!--nav-sec-->
    </div><!--header-2-->