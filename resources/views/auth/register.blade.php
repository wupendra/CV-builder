@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
@endsection
@section('content')
<div class="container brdcrmb-sec">
    <div class="btn-group btn-breadcrumb">
    <a href="{{ route('home') }}" class="btn btn-default btn-myway"><i class="fa fa-home"></i></a>
        <a href="#" class="btn btn-default">Sign Up</a>
    </div>
</div><!--breadcrumb-->
<div class="container">
    <div class="row justify-content-center login-form">
        <div class="col-md-8">
            <div class="card">
                <div class="login-head intro-header-sec col-md-12">
                    <h4>{{ __('Register') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" onsubmit=" validateFields(event);">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <div class="errormsg">{{ $errors->first('name') }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <div class="errormsg">{{ $errors->first('email') }}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username*</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                <div class="input-group-append">
                                    <button type="button" id="checkUsername" class="btn btn-success">Check</button>
                                </div>
                                <small>Usernames are unique names, can only contain alphabets, numbers and underscore.</small>

                                <div class="u-alert">{{ $errors->first('username') }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" onKeyup="checkMatch()" required autocomplete="new-password">

                                <div class="errormsg">{{ $errors->first('password') }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" onKeyup="checkMatch()" required autocomplete="new-password">
                                <div class="errormsg"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone*</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="on">

                                <div class="errormsg">{{ $errors->first('phone') }}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" autocomplete="on">

                                <div class="errormsg">{{ $errors->first('website') }}</div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 pull-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <p class="help-text">Note: Fields with * are required.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascripts')
    @parent
    <script type="text/javascript">
        $('#checkUsername').on('click',function(){
            var name = $('#username').val();
            var nick = new RegExp('^[a-zA-Z0-9_]+$');
            if(nick.test(name)){
                ele = $(this);
                $.ajax({
                    type: 'POST',
                    data:{'_token': '{{ csrf_token() }}','name':name},
                    url: '{{ route("frontend.check.username") }}',
                    success: function (data) {
                        console.log(data);
                        if(data==0){
                            console.log('here');
                            $(ele).parent('div').siblings('.u-alert').removeClass('errormsg');
                            $(ele).parent('div').siblings('.u-alert').addClass('successmsg');
                            $(ele).parent('div').siblings('input').removeClass('is-invalid');
                            $(ele).parent('div').siblings('.u-alert').text('The Username is available.');
                        }
                        else{
                            $(ele).parent('div').siblings('.u-alert').removeClass('successmsg');
                            $(ele).parent('div').siblings('input').addClass('is-invalid');
                            $(ele).parent('div').siblings('.u-alert').addClass('errormsg');
                            $(ele).parent('div').siblings('.u-alert').text('The Username is taken.');
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
                $(this).parent('div').siblings('.u-alert').removeClass('successmsg');
                $(this).parent('div').siblings('input').addClass('is-invalid');
                $(this).parent('div').siblings('.u-alert').addClass('errormsg');
                $(this).parent('div').siblings('.u-alert').text('Username can only contain alphabets, numbers and underscore.');
            }
        });
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        function checkMatch(){
            if($('#password').val()!=$('#password_confirmation').val()){
                $('#password_confirmation').addClass('is-invalid');
                $('#password_confirmation').siblings('.errormsg').text('Password does not match.');
            }else{
                $('#password_confirmation').removeClass('is-invalid');
                $('#password_confirmation').siblings('.errormsg').text('');
            }
        }
        function validateFields(){
            var val = true;
            if($('#name').val()!=''){
                if(typeof ($('#name').val()) != 'string'){
                    $('#name').addClass('is-invalid');
                    $('#name').siblings('.errormsg').text('The name must of alphabets.');
                    val = false;
                }
                else{
                    $('#name').removeClass('is-invalid');
                    $('#name').siblings('.errormsg').text('');
                }
            }
            else{
                $('#name').addClass('is-invalid');
                $('#name').siblings('.errormsg').text('The name cannot be empty.');
                val = false;
            }
            if($('#email').val()==''){
                $('#email').addClass('is-invalid');
                $('#email').siblings('.errormsg').text('Email cannot be empty.');
                val = false;
            }
            else if(!isEmail($('#email').val())){
                $('#email').addClass('is-invalid');
                $('#email').siblings('.errormsg').text('Invalid Email.');
                val = false;
            }
            else{
                $('#email').removeClass('is-invalid');
                $('#email').siblings('.errormsg').text('');
            }
            if($('#username').val()==''){
                $('#username').addClass('is-invalid');
                $('#username').siblings('.u-alert').text('Username cannot be empty.');
                val = false;
            }
            else{
                var name = $('#username').val();
                var nick = new RegExp('^[a-zA-Z0-9_]+$');
                if(nick.test(name)){
                    ele = $('#username');
                    $.ajax({
                        type: 'POST',
                        data:{'_token': '{{ csrf_token() }}','name':name},
                        url: '{{ route("frontend.check.username") }}',
                        success: function (data) {
                            //console.log(data);
                            if(data==0){
                                //console.log('here');
                                $(ele).siblings('.u-alert').removeClass('errormsg');
                                $(ele).siblings('.u-alert').addClass('successmsg');
                                $(ele).siblings('input').removeClass('is-invalid');
                                $(ele).siblings('.u-alert').text('The Username is available.');
                            }
                            else{
                                $(ele).siblings('.u-alert').removeClass('successmsg');
                                $(ele).siblings('input').addClass('is-invalid');
                                $(ele).siblings('.u-alert').addClass('errormsg');
                                $(ele).siblings('.u-alert').text('The Username is taken.');
                                val = false;
                            }
                            $('#ajaxLoading').modal('hide');
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
                else{
                    $(this).parent('div').siblings('.u-alert').removeClass('successmsg');
                    $(this).parent('div').siblings('input').addClass('is-invalid');
                    $(this).parent('div').siblings('.u-alert').addClass('errormsg');
                    $(this).parent('div').siblings('.u-alert').text('Username can only contain alphabets, numbers and underscore.');
                    val = false;
                }
            }
            if($('#password').val()==''){
                $('#password').addClass('is-invalid');
                $('#password').siblings('.errormsg').text('Password cannot be empty.');
                val = false;
            }
            else{
                if($('#password').val().length<8){
                    $('#password').addClass('is-invalid');
                    $('#password').siblings('.errormsg').text('Password should contain at least 8 characters.');
                    val = false;
                }
                else{
                    $('#password').removeClass('is-invalid');
                    $('#password').siblings('.errormsg').text('');
                    if($('#password_confirmation').val()==''){
                        $('#password_confirmation').addClass('is-invalid');
                        $('#password_confirmation').siblings('.errormsg').text('Please Retype Password.');
                        val = false;
                    }
                    else if($('#password_confirmation').val()!=$('#password').val()){
                        $('#password_confirmation').addClass('is-invalid');
                        $('#password_confirmation').siblings('.errormsg').text('Password do not match.');
                        val = false;
                    }
                    else{
                        $('#password_confirmation').removeClass('is-invalid');
                        $('#password_confirmation').siblings('.errormsg').text('');
                    }
                }
            }
            if($('#phone').val()==''){
                $('#phone').addClass('is-invalid');
                $('#phone').siblings('.errormsg').text('Phone cannot be empty.');
                val = false;
            }
            else{
                    $('#phone').removeClass('is-invalid');
                    $('#phone').siblings('.errormsg').text('');
            }
            if(!val){
                event.preventDefault();
                $.notify({
                    message: 'Please Check the required fields and submit again.'
                    },{
                        type: 'danger',
                        timer: 1500,
                        delay: 1500,
                        z_index: 9999
                });
            }
        }
    </script>
@endsection
@endsection
