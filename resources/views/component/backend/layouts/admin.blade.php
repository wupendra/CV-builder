
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('page_title','Admin')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
@section('stylesheets')
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="{{ asset('assets/css/icon-font.min.css') }}" type='text/css' />
<!-- //lined-icons -->
<!-- Custom CSS -->
<link href="{{ asset('assets/css/custom.css') }}" rel='stylesheet' type='text/css' />
@show
<!-- chart -->
<script src="{{ asset('assets/js/Chart.js') }} "></script>
<!-- //chart -->
<!--animate-->
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ asset('assets/js/wow.min.js') }} "></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="{{ asset('/assets/js/jquery-1.10.2.min.js') }} "></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    @include('component.backend.layouts.sidebar')
    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			@include('component.backend.layouts.header')
			<div id="page-wrapper">
				<div class="graphs">
						<ol class="breadcrumb">							
						  	@yield('breadcrumb')
						</ol>
            		@yield('content')
            	</div>
            </div>
			
        </div>
    	@include('component.backend.layouts.footer')
    	<div id="stop" class="scrollTop">
        	<span><a href=""><i class="fa fa-arrow-up"></i></a></span>
      	</div>
    <!-- main content end-->
   	</section>
 	@section('javascripts') 
	<script src="{{ asset('assets/js/jquery.nicescroll.js') }} "></script>
	<script src="{{ asset('assets/js/scripts.js') }} "></script>
	<!-- Bootstrap Core JavaScript -->
   	<script src="{{ asset('assets/js/bootstrap.min.js') }} "></script>
   	<script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>
   	<script type="text/javascript">
      function alertSuccess(message)
      {
          $.notify({
            message: message
            },{
                type: 'success',
                timer: 1500,
                delay: 1500
          });
      };
      function alertDanger(message)
      {
          $.notify({
            message: message
            },{
                type: 'danger',
                timer: 1500,
                delay: 1500
          });
      };
      function alertInfo(message)
      {
          $.notify({
            message: message
            },{
                type: 'info',
                timer: 1500,
                delay: 1500
          });
      };
      function alertWarning(message)
      {
          $.notify({
            message: message
            },{
                type: 'warning',
                timer: 1500,
                delay: 1500
          });
      };

      /*---------------Scroll Top-------------*/
      $(document).ready(function() {

          
          var scrollTop = $(".scrollTop");

          $(window).scroll(function() {
            
            var topPos = $(this).scrollTop();

            
            if (topPos > 100) {
              $(scrollTop).css("opacity", "1");

            } else {
              $(scrollTop).css("opacity", "0");
            }

          }); 

          
          $(scrollTop).click(function() {
            $('html, body').animate({
              scrollTop: 0
            }, 800);
            return false;

          }); 

        }); 
    </script>
    @if( Session::has('success-msg') )
    <script type="text/javascript">
      alertSuccess('{{ Session::get("success-msg") }}');
    </script> 
    @elseif(Session::has('error-msg'))
    <script type="text/javascript">
      alertDanger('{{ Session::get("error-msg") }}');
    </script> 
    @elseif(Session::has('info-msg'))
    <script type="text/javascript">
      alertInfo('{{ Session::get("info-msg") }}');
    </script> 
    @elseif(Session::has('warning-msg'))
    <script type="text/javascript">
      alertSuccess('{{ Session::get("warning-msg") }}');
    </script>
    @endif
   	@show
</body>
</html>