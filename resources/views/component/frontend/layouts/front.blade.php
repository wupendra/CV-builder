<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('page_title','Make My CV')</title>
	<meta name="keywords" content="">
	<meta name="title" charset="utf-8" content="@yield('meta_title',$appsetting->meta_title)">
    <meta name="keyword" charset="utf-8" content="@yield('meta_keyword',$appsetting->meta_keyword)">
    <meta name="description" charset="utf-8" content="@yield('meta_description', $appsetting->meta_description)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="icon" type="{{ asset('image/logo.png') }}" href="{{ asset('uploads/home/'.$appsetting->favicon) }}">
    @section('stylesheets')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <link href="{{ asset('css/flickerplate.css') }}"  type="text/css" rel="stylesheet">
    
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    
    @show
    
</head>

<body>

	<div id="wrap">
        @include('component.frontend.layouts.header')
            @yield('content')
        @include('component.frontend.layouts.footer')
	
    
    
		<!-- <div class="container brdcrmb-sec">
                    <div class="btn-group btn-breadcrumb">
                    <a href="index.html" class="btn btn-default btn-myway"><i class="fa fa-home"></i></a>
                    <a href="courses.html" class="btn btn-default">Courses</a>
                </div>
                </div> --><!--breadcrumb-->
		




            


</div><!--main-wrapper-->




@section('javascripts')
<script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript">
    function alertSuccess(message)
    {
        $.notify({
            message: message
            },{
            type: 'success',
            timer: 1500,
            delay: 1500,
            z_index: 9999
        });
    }
    function alertDanger(message)
    {
      $ .notify({
            message: message
            },{
            type: 'danger',
            timer: 1500,
            delay: 1500,
            z_index: 9999
        });
    }
    function alertInfo(message)
    {
        $.notify({
            message: message
            },{
            type: 'info',
            timer: 1500,
            delay: 1500,
            z_index: 9999
        });
    }
    function alertWarning(message)
    {
        $.notify({
            message: message
            },{
            type: 'warning',
            timer: 1500,
            delay: 1500,
            z_index: 9999
        });
    }
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

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1576660612503769',
      cookie     : true,
      xfbml      : true,
      version    : 'v7.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
