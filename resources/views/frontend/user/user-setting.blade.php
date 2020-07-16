@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
@endsection
@section('content')
<div class="container brdcrmb-sec">
	<div class="btn-group btn-breadcrumb">
        <a href="{{ route('home') }}" class="btn btn-default btn-myway"><i class="fa fa-home"></i></a>
        <a href="#" class="btn btn-default">setting</a>
    </div>
</div><!--breadcrumb-->
<section class="services-sec-main">
	<div class="container services-gurkhaa">
    	
        
        
        <div class="detail-page-wrap">
            <div class="col-md-12 service-detail-sec">
                <div class="intro-header-sec intro-header-sec-adv">
                    <div class="col-md-12">                            
                       <h1>Settings</h1>
                       <hr align="left" style="width:125px;">
                    </div>
                </div>
            </div>
            <div class="row  user-settings">
	            <div class="col-md-6 abtCom">
	            	<h4>Profile Preference</h4>
	            	<hr>
					<div class="row" >
						<form method="POST" action="{{ route('frontend.visibility.submit') }}">
							@csrf
							<div class="col-md-12 profile-visibility">
								<input type="checkbox" id="profile_visibility" name="profile_visibility" {{ $user->visibility?'Checked':'' }}>
								<label for="profile_visibility"> Profile visible to everyone?</label><br/>
								<small class="help-text">By checking this your profile will be visible to everyone.</small>
							</div>
							@if(empty($user->username))
							<div class="col-md-12">
								<label for="username"> Enter a Username *</label>
								<input type="text" id="username" name="username" class="half-width" value="{{ old('username') }}">
                                    <button type="button" id="check_username" class="btn btn-success">Check</button>
								<div class="errormsg">{{ $errors->first('username') }}</div>
								<small class="help-text">You can only select your username once to help the search engines to find your profile in the internet.</small>
							</div>
							@endif
							
							@if(empty($user->email))
							<div class="col-md-12">
								<label for="email">Enter Email*</label>
								<input type="text" id="email" name="email" class="half-width" value="{{ old('email') }}">
								<div class="errormsg">{{ $errors->first('email') }}</div>
							</div>
							@endif

							<div class="col-md-12 btns">
								<button type="submit">Save</button>
							</div>
						</form>
					</div>
	            </div>
	            <div class="col-md-6 abtCom">
	            	<h4>Change Password</h4>
	            	<hr>
					<div class="row">
						<form method="POST" action="{{ route('frontend.change.password') }}">
							@csrf
							@if(!empty($user->password))
							<div class="col-md-12">
								<label for="old_password"> Old Password</label>
								<input type="password" id="old_password" name="old_password" class="half-width" >
								<div class="errormsg">{{ $errors->first('old_password') }}</div>
								<small class="help-text">Please leave the field blank if you have sign up via Facebook/Google</small>
							</div>
							@endif
							<div class="col-md-12">
								<label for="password"> New Password</label>
								<input type="password" id="password" name="password" onKeyup="checkMatch()" class="half-width">
								<div class="errormsg">{{ $errors->first('password') }}</div>
							</div>
							<div class="col-md-12">
								<label for="password_confirmation"> Retype Password</label>
								<input type="password" id="password_confirmation" name="password_confirmation" onKeyup="checkMatch()" class="half-width">
								<div class="errormsg">{{ $errors->first('password_confirmation') }}</div>
							</div>
							<div class="col-md-12 btns">
								<button type="submit">Save</button>
							</div>
						</form>
					</div>
	            </div>
	            <div class="col-md-12">
	            	<small class="help-text">Fields with * are required</small>
	            </div>
	        </div>
        </div>
    </div>
</section>
@section('javascripts')
    @parent
    <script type="text/javascript">
    	$('.user-settings').on('click','#check_username',function(){
            var name = $('#username').val();
            var nick = new RegExp('^[a-zA-Z0-9-_]+$');
            if(nick.test(name)){
                ele = $(this);
                $.ajax({
                    type: 'POST',
                    data:{'_token': '{{ csrf_token() }}','name':name},
                    url: '{{ route("frontend.check.username") }}',
                    success: function (data) {
                        //console.log(data);
                        if(data==0){
                            $(ele).siblings('.errormsg').addClass('successmsg');
                            $(ele).siblings('.errormsg').removeClass('errormsg');
                            $(ele).siblings('input').removeClass('is-invalid');
                            $(ele).siblings('.successmsg').text('The Username is available.');
                        }
                        else{
                            $(ele).siblings('.successmsg').addClass('errormsg');
                            $(ele).siblings('.errormsg').removeClass('successmsg');
                            $(ele).siblings('input').addClass('is-invalid');
                            $(ele).siblings('.errormsg').text('The Username is taken.');
                        }
                        $('#ajaxLoading').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#ajaxLoading').modal('hide');
                    }
                });
            }
            else{
                $(this).siblings('.errormsg').removeClass('successmsg');
                $(this).siblings('input').addClass('is-invalid');
                $(this).siblings('.errormsg').addClass('errormsg');
                $(this).siblings('.errormsg').text('Username can only contain alphabets, numbers, dash and underscore.');
            }
        });

        function checkMatch(){
            if($('#password').val()!=$('#password_confirmation').val()){
                $('#password_confirmation').addClass('is-invalid');
                $('#password_confirmation').siblings('.errormsg').text('Password does not match.');
            }else{
                $('#password_confirmation').removeClass('is-invalid');
                $('#password_confirmation').siblings('.errormsg').text('');
            }
        }
    </script>

@endsection
@endsection