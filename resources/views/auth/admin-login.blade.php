
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="/assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="/assets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="/assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- Custom CSS -->
<link href="/assets/css/custom.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="/assets/js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Sign In to</span> <a href="index.html">Admin</a></p>
						</div>
						<div class="signin">
							<form method="POST" class="text-left form-validate" action="{{ route('admin.login.submit') }}">
	              				@csrf
	              				@if( Session::has('login-error') )
					                <div class="form-error">{{ Session::get('login-error') }}</div>
				              	@endif
								<div class="log-input">
									<div class="log-input-left">
									   <span class="form-error">{{ $errors->first('email') }}</span>
									   <input id="login-username" type="text" name="email" required data-msg="Please enter your Email" class="user" placeholder="Email" value="{{ old('email') }}">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="log-input">
									<div class="log-input-left">
									   <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="lock" placeholder="Password">
									</div>
									<span class="checkbox2">
										 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
									</span>
									<div class="clearfix"> </div>
								</div>
								<div class="log-input">
									<div class="form-group">
									   <div class="checkbox-inline1"><label><input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}> &nbsp;&nbsp;Remember Me</label></div>
									</div>
									<div class="clearfix"> </div>
								</div>
								<input type="submit" value="Login to your account">
							</form>	 
						</div>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer>
			   <p>&copy 2015 Admin </a></p>
			</footer>
        <!--footer section end-->
	</section>
	
<script src="/assets/js/jquery.nicescroll.js"></script>
   <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>