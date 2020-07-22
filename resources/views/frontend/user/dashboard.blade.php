@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
@endsection
@section('content')
	<div class="container brdcrmb-sec">
        	<div class="btn-group btn-breadcrumb">
            <a href="{{ route('home') }}" class="btn btn-default btn-myway"><i class="fa fa-home"></i></a>
            <a href="#" class="btn btn-default">My Cv</a>
        </div>
    </div><!--breadcrumb-->
    <section class="services-sec-main">
    	<div class="container services-gurkhaa">
        	
            
            
            <div class="detail-page-wrap">
                <div class="col-md-12 service-detail-sec">
                    <div class="intro-header-sec intro-header-sec-adv">
                        @if(empty($user->username))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Please edit your <strong><a href="{{ route('frontend.user.settings') }}">Settings</a><strong> to view your profile.
                            </div>
                        @endif
                        <div class="col-md-6">                            
                           <h1>My CV</h1>
                           <hr align="left" style="width:125px;">
                        </div>
                        <div class="col-md-6 cv-menu">
                            <a href="{{ route('frontend.user.settings') }}">Cv Settings</a>
                            <a href="{{ route('frontend.theme.selection') }}">Download CV</a>
                        </div>
                    </div>
                    <div class="col-md-12 user-info cv-ele">
                        <div class="row">
                            <div class="col-md-4 profile-picture">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-camera"></i> Picture</h2>
                                    <button class="pull-right" id="change_profile">change</button>
                                </div>
                                <div class="cv-ele-body">
                                    <img id="profile_image" src="@if(!empty($user->picture) &&(str_contains($user->picture, 'http://') || str_contains($user->picture, 'https://'))) {{ $user->picture }} @elseif(!empty($user->picture)) {{ '/uploads/avatars/'.$user->picture }} @else {{ '/img/avatar.jpg' }} @endif" class="profile-pic image-responsive">
                                    <form class="ele-form" id="image_uploader" class="form-group cv-actions" enctype="multipart/form-data" style="display: none;">
                                        @csrf
                                        <label for="image">Choose an Image</label>
                                        <input id="image" type="file" name="image">
                                        <div class="errormsg"></div>
                                        <button type="submit" id="upload">Change</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8 personal-info">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-user-secret"></i> Personal Information</h2>
                                    <button class="pull-right" id="personal_edit">Edit</button>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.cv.user-info',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-work">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-briefcase"></i> Work</h2>
                                    <button class="pull-right" id="add_work">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="work_form">
                                        @include('component.frontend.cv.forms.user-work',['work'=>$work])
                                    </form>
                                    @include('component.frontend.cv.user-work-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-profile">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-globe"> Social Pofile</i></h2>
                                    <button class="pull-right" id="add_profile">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="profile_form">
                                        @include('component.frontend.cv.forms.user-profile',['profile'=>$profile])
                                    </form>
                                    @include('component.frontend.cv.user-profile-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-education">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-graduation-cap"></i> Education</h2>
                                    <button class="pull-right" id="add_education">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="education_form">
                                        @include('component.frontend.cv.forms.user-education',['education'=>$education])
                                    </form>
                                    @include('component.frontend.cv.user-education-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-skill">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-tasks"></i> Skills</h2>
                                    <button class="pull-right" id="add_skill">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="skill_form">
                                        @include('component.frontend.cv.forms.user-skill',['skill'=>$skill])
                                    </form>
                                    @include('component.frontend.cv.user-skill-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-award">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-certificate"></i> Award</h2>
                                    <button class="pull-right" id="add_award">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="award_form">
                                        @include('component.frontend.cv.forms.user-award',['award'=>$award])
                                    </form>
                                    @include('component.frontend.cv.user-award-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-language">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-language"></i> Languages</h2>
                                    <button class="pull-right" id="add_language">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="language_form">
                                        @include('component.frontend.cv.forms.user-language',['language'=>$language])
                                    </form>
                                    @include('component.frontend.cv.user-language-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-volunteer">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-users"></i> Volunteers</h2>
                                    <button class="pull-right" id="add_volunteer">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="volunteer_form">
                                        @include('component.frontend.cv.forms.user-volunteer',['volunteer'=>$volunteer])
                                    </form>
                                    @include('component.frontend.cv.user-volunteer-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-interest">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-heart"></i> Interests</h2>
                                    <button class="pull-right" id="add_interest">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="interest_form">
                                        @include('component.frontend.cv.forms.user-interest',['interest'=>$interest])
                                    </form>
                                    @include('component.frontend.cv.user-interest-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-publication">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-book"></i> Publications</h2>
                                    <button class="pull-right" id="add_publication">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="publication_form">
                                        @include('component.frontend.cv.forms.user-publication',['publication'=>$publication])
                                    </form>
                                    @include('component.frontend.cv.user-publication-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-reference">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-check-square"></i> References</h2>
                                    <button class="pull-right" id="add_reference">Add</button>
                                </div>
                                <div class="cv-ele-body">
                                    <form class="ele-form" id="reference_form">
                                        @include('component.frontend.cv.forms.user-reference',['reference'=>$reference])
                                    </form>
                                    @include('component.frontend.cv.user-reference-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
           		</div><!--service-detail-sec-->
                
                
                
                
            
            
            </div><!--detail-page-wrap-->
            
            
            
            
        </div><!--services-gurkhaa-->
    </section><!--services-sec-->
		



            
            
            
@section('javascripts')
    @parent
    <script src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $( ".datepicker" ).datepicker({
                defaultDate: "-3y",
                changeYear: true,
                changeMonth: true,
                yearRange: "-40:today",
                dateFormat: "yy-mm-dd",
                maxDate:0
            });
            $('form').hide();
        });

        //Multi input
        $('.service-detail-sec').on('keydown','.select-input',function(event) {
            if(event.keyCode == 13) {
                event.preventDefault();
                var art = $.trim($(this).val());
                var field = $(this).attr('ref');
                if(art != '' && $($(this).parent('.c-selection-list').siblings('.selected-items').children(".selected-ele").children('input')).filter(function() { if($(this).val()==art) return $(this).val(); }).length == 0)
                {
                    var ele = '<span class="selected-ele">'+art+' <input type="hidden" name="'+field+'[]" value="'+art+'"><span class="remove-item"><i class="fa fa-close"></i></span></span>';
                    $(ele).appendTo( $(this).parent('.c-selection-list').siblings('.selected-items'));
                    $(this).val('');
                }
                else if(art == '')
                    alertDanger('Please enter the course name.');
                else
                {
                    alertDanger('This course is already present.');
                }
                return false;
            }
        });
        //remove selected item
        $('.service-detail-sec').on('click','.remove-item',function(e) {
            $(this).parent('.selected-ele').remove();
        });

        //Edit personal Info
        $('.personal-info').on('click','#personal_edit',function(){
            if(!$('#personal_form').length)
            {
                var formData = new FormData(); // high importance!
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.personal.form") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        //console.log(data);
                        if(data && !data.hasOwnProperty('error')){
                            $('.personal-info').children('.cv-ele-body').hide();
                            $(data.content).insertAfter($('.personal-info').children('.cv-ele-head'));
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        //Save personal Info
        $('.personal-info').on('submit','#personal_form',function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.personal.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: new FormData(this), // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        $('#personal_form').remove();
                        $('.personal-info').children('.cv-ele-body').remove();
                        $(data.content).insertAfter($('.personal-info').children('.cv-ele-head'));
                        alertSuccess('Personal Information updated Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $.each(data.error, function(i,val){
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Cancel edit personal info
        $('.personal-info').on('click','#personal_cancel',function(e){
            e.preventDefault();
            $('#personal_form').remove();
            $('.personal-info').children('.cv-ele-body').show();
        });
        //show profile picture form
        $('.profile-picture').on('click','#change_profile',function(){
            $('#image_uploader').show();
        });
        //upload profile picture
        $('.profile-picture').on('submit','#image_uploader',function(e){
            e.preventDefault();
            if($('#image').val()){
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.profile.picture") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: new FormData(this), // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        console.log(data);
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $('#image_uploader').hide();
                            $('#profile_image').attr('src','/uploads/avatars/'+data);
                            alertSuccess('Profile Picture changed Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            $('#image').siblings('.errormsg').text(data.error['image']);
                            alertDanger('Couldnot upload image.');
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
            else{
                alertWarning('Please choose a file before submitting.');
            }
        });
        //Add work
        $('#user-work').on('click','#add_work',function(){
            console.log($($('.ele-form').is(':visible')).length);
            $('#work_form').show();
            $('#work_form input').val('');
            $('#work_form textarea').val('');
            $('#work_form .errormsg').text('');
            $('#work_form input').removeClass('is-invalid');
            $('#work_form textarea').removeClass('is-invalid');
            $('#work_form [type=submit]').text('Add Work');
        });
        //cancel adding work
        $('#user-work').on('click','#cancel_add_user_work',function(e){
            e.preventDefault();
            $('#work_form').hide();
            $('.work-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-work').offset().top - 70)
                }, 1000);
         }); 
        //save the work
        $('#user-work').on('submit','#work_form',function(e){
            e.preventDefault();
            var k = $('#work_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.work.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.work-ele').remove();
                        $(data.content).insertAfter('#work_form');
                        $('#work_form').hide();
                        alertSuccess('Work Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#work_form .errormsg').text('');
                        $('#work_form input').removeClass('is-invalid');
                        $('#work_form .textarea').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing work
        $('#user-work').on('click','.work-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.work.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.work-ele').show();
                    $(ele).closest('.work-ele').hide();
                    $('#work_form').empty();
                    $(data.content).appendTo($('#work_form'));
                    $('#work_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#work_form').offset().top - 70)
                        }, 1000);
                    $( ".datepicker" ).datepicker({
                        defaultDate: "-3y",
                        changeYear: true,
                        changeMonth: true,
                        yearRange: "-40:today",
                        dateFormat: "yy-mm-dd",
                        maxDate:0
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing work
        $('#user-work').on('click','.work-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved work?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.work.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.work-ele').remove();
                            $('#work_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#work_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Work Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        //Add profile
        $('#user-profile').on('click','#add_profile',function(){
            $('#profile_form').show();
            $('#profile_form input').val('');
            $('#profile_form .errormsg').text('');
            $('#profile_form input').removeClass('is-invalid');
            $('#profile_form [type=submit]').text('Add Profile');
        });
        //cancel adding profile
        $('#user-profile').on('click','#cancel_add_user_profile',function(e){
            e.preventDefault();
            $('#profile_form').hide();
            $('.profile-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-profile').offset().top - 70)
                }, 1000);
         }); 
        //save the profile
        $('#user-profile').on('submit','#profile_form',function(e){
            e.preventDefault();
            var k = $('#profile_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.profile.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.profile-ele').remove();
                        $(data.content).insertAfter('#profile_form');
                        $('#profile_form').hide();
                        alertSuccess('Profile Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#profile_form .errormsg').text('');
                        $('#profile_form input').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing profile
        $('#user-profile').on('click','.profile-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.profile.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.profile-ele').show();
                    $(ele).closest('.profile-ele').hide();
                    $('#profile_form').empty();
                    $(data.content).appendTo($('#profile_form'));
                    $('#profile_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#profile_form').offset().top - 70)
                        }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing profile
        $('#user-profile').on('click','.profile-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved profile?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.profile.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.profile-ele').remove();
                            $('#profile_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#profile_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Profile Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        //Add education
        $('#user-education').on('click','#add_education',function(){
            $('#education_form').find('.selected-ele').remove();
            $('#education_form').find('select option:selected').removeAttr('selected');
            $('#education_form').show();
            $('#education_form input').val('');
            $('#education_form .errormsg').text('');
            $('#education_form input').removeClass('is-invalid');
            $('#education_form [type=submit]').text('Add Education');
        });
        //cancel adding education
        $('#user-education').on('click','#cancel_add_user_education',function(e){
            e.preventDefault();
            $('#education_form').hide();
            $('.education-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-education').offset().top - 70)
                }, 1000);
         }); 
        //save the education
        $('#user-education').on('submit','#education_form',function(e){
            e.preventDefault();
            var k = $('#education_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.education.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.education-ele').remove();
                        $(data.content).insertAfter('#education_form');
                        $('#education_form').hide();
                        alertSuccess('Education Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#education_form .errormsg').text('');
                        $('#education_form input').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing education
        $('#user-education').on('click','.education-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.education.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.education-ele').show();
                    $(ele).closest('.education-ele').hide();
                    $('#education_form').empty();
                    $(data.content).appendTo($('#education_form'));
                    $('#education_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#education_form').offset().top - 70)
                        }, 1000);
                    $( ".datepicker" ).datepicker({
                        defaultDate: "-3y",
                        changeYear: true,
                        changeMonth: true,
                        yearRange: "-40:today",
                        dateFormat: "yy-mm-dd",
                        maxDate:0
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing education
        $('#user-education').on('click','.education-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved education?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.education.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.education-ele').remove();
                            $('#education_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#education_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Education Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        //Add skill
        $('#user-skill').on('click','#add_skill',function(){
            $('#skill_form').show();
            $('#skill_form').find('.selected-ele').remove();
            $('#skill_form').find('select option:selected').removeAttr('selected');
            $('#skill_form input').val('');
            $('#skill_form .errormsg').text('');
            $('#skill_form input').removeClass('is-invalid');
            $('#skill_form [type=submit]').text('Add Skill');
        });
        //cancel adding skill
        $('#user-skill').on('click','#cancel_add_user_skill',function(e){
            e.preventDefault();
            $('#skill_form').hide();
            $('.skill-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-skill').offset().top - 70)
                }, 1000);
         }); 
        //save the skill
        $('#user-skill').on('submit','#skill_form',function(e){
            e.preventDefault();
            var k = $('#skill_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.skill.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.skill-ele').remove();
                        $(data.content).insertAfter('#skill_form');
                        $('#skill_form').hide();
                        alertSuccess('Skill Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#skill_form .errormsg').text('');
                        $('#skill_form input').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing skill
        $('#user-skill').on('click','.skill-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.skill.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.skill-ele').show();
                    $(ele).closest('.skill-ele').hide();
                    $('#skill_form').empty();
                    $(data.content).appendTo($('#skill_form'));
                    $('#skill_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#skill_form').offset().top - 70)
                        }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing skill
        $('#user-skill').on('click','.skill-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved skill?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.skill.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.skill-ele').remove();
                            $('#skill_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#skill_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Skill Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        //Add award
        $('#user-award').on('click','#add_award',function(){
            $('#award_form').show();
            $('#award_form input').val('');
            $('#award_form textarea').val('');
            $('#award_form .errormsg').text('');
            $('#award_form input').removeClass('is-invalid');
            $('#award_form [type=submit]').text('Add Award');
        });
        //cancel adding award
        $('#user-award').on('click','#cancel_add_user_award',function(e){
            e.preventDefault();
            $('#award_form').hide();
            $('.award-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-award').offset().top - 70)
                }, 1000);
         }); 
        //save the award
        $('#user-award').on('submit','#award_form',function(e){
            e.preventDefault();
            var k = $('#award_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.award.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.award-ele').remove();
                        $(data.content).insertAfter('#award_form');
                        $('#award_form').hide();
                        alertSuccess('Award Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#award_form .errormsg').text('');
                        $('#award_form input').removeClass('is-invalid');
                        $('#award_form textarea').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing award
        $('#user-award').on('click','.award-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.award.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.award-ele').show();
                    $(ele).closest('.award-ele').hide();
                    $('#award_form').empty();
                    $(data.content).appendTo($('#award_form'));
                    $('#award_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#award_form').offset().top - 70)
                        }, 1000);
                    $( ".datepicker" ).datepicker({
                        defaultDate: "-3y",
                        changeYear: true,
                        changeMonth: true,
                        yearRange: "-40:today",
                        dateFormat: "yy-mm-dd",
                        maxDate:0
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing award
        $('#user-award').on('click','.award-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved award?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.award.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.award-ele').remove();
                            $('#award_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#award_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Award Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        //Add language
        $('#user-language').on('click','#add_language',function(){
            $('#language_form').show();
            $('#language_form input').val('');
            $('#language_form').find('select option:selected').removeAttr('selected');
            $('#language_form .errormsg').text('');
            $('#language_form input').removeClass('is-invalid');
            $('#language_form [type=submit]').text('Add Language');
        });
        //cancel adding language
        $('#user-language').on('click','#cancel_add_user_language',function(e){
            e.preventDefault();
            $('#language_form').hide();
            $('.language-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-language').offset().top - 70)
                }, 1000);
         }); 
        //save the language
        $('#user-language').on('submit','#language_form',function(e){
            e.preventDefault();
            var k = $('#language_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.language.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.language-ele').remove();
                        $(data.content).insertAfter('#language_form');
                        $('#language_form').hide();
                        alertSuccess('Award Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#language_form .errormsg').text('');
                        $('#language_form input').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing language
        $('#user-language').on('click','.language-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.language.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.language-ele').show();
                    $(ele).closest('.language-ele').hide();
                    $('#language_form').empty();
                    $(data.content).appendTo($('#language_form'));
                    $('#language_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#language_form').offset().top - 70)
                        }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing language
        $('#user-language').on('click','.language-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved language?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.language.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.language-ele').remove();
                            $('#language_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#language_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Language Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        //Add volunteer
        $('#user-volunteer').on('click','#add_volunteer',function(){
            $('#volunteer_form').show();
            $('#volunteer_form input').val('');
            $('#volunteer_form textarea').val('');
            $('#volunteer_form .errormsg').text('');
            $('#volunteer_form input').removeClass('is-invalid');
            $('#volunteer_form textarea').removeClass('is-invalid');
            $('#volunteer_form [type=submit]').text('Add Volunteer Work');
        });
        //cancel adding volunteer
        $('#user-volunteer').on('click','#cancel_add_user_volunteer',function(e){
            e.preventDefault();
            $('#volunteer_form').hide();
            $('.volunteer-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-volunteer').offset().top - 70)
                }, 1000);
         }); 
        //save the volunteer
        $('#user-volunteer').on('submit','#volunteer_form',function(e){
            e.preventDefault();
            var k = $('#volunteer_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.volunteer.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.volunteer-ele').remove();
                        $(data.content).insertAfter('#volunteer_form');
                        $('#volunteer_form').hide();
                        alertSuccess('Volunteer work Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#volunteer_form .errormsg').text('');
                        $('#volunteer_form input').removeClass('is-invalid');
                        $('#volunteer_form .textarea').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing volunteer
        $('#user-volunteer').on('click','.volunteer-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.volunteer.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.volunteer-ele').show();
                    $(ele).closest('.volunteer-ele').hide();
                    $('#volunteer_form').empty();
                    $(data.content).appendTo($('#volunteer_form'));
                    $('#volunteer_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#volunteer_form').offset().top - 70)
                        }, 1000);
                    $( ".datepicker" ).datepicker({
                        defaultDate: "-3y",
                        changeYear: true,
                        changeMonth: true,
                        yearRange: "-40:today",
                        dateFormat: "yy-mm-dd",
                        maxDate:0
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing volunteer
        $('#user-volunteer').on('click','.volunteer-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved volunteer?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.volunteer.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.volunteer-ele').remove();
                            $('#volunteer_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#volunteer_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Work Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        //Add interest
        $('#user-interest').on('click','#add_interest',function(){
            $('#interest_form').show();
            $('#interest_form').find('.selected-ele').remove();
            $('#interest_form input').val('');
            $('#interest_form .errormsg').text('');
            $('#interest_form input').removeClass('is-invalid');
            $('#interest_form [type=submit]').text('Add Skill');
        });
        //cancel adding interest
        $('#user-interest').on('click','#cancel_add_user_interest',function(e){
            e.preventDefault();
            $('#interest_form').hide();
            $('.interest-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-interest').offset().top - 70)
                }, 1000);
         }); 
        //save the interest
        $('#user-interest').on('submit','#interest_form',function(e){
            e.preventDefault();
            var k = $('#interest_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.interest.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.interest-ele').remove();
                        $(data.content).insertAfter('#interest_form');
                        $('#interest_form').hide();
                        alertSuccess('Interest Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#interest_form .errormsg').text('');
                        $('#interest_form input').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing interest
        $('#user-interest').on('click','.interest-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.interest.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.interest-ele').show();
                    $(ele).closest('.interest-ele').hide();
                    $('#interest_form').empty();
                    $(data.content).appendTo($('#interest_form'));
                    $('#interest_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#interest_form').offset().top - 70)
                        }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing interest
        $('#user-interest').on('click','.interest-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved interest?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.interest.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.interest-ele').remove();
                            $('#interest_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#interest_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Interest Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        //Add publication
        $('#user-publication').on('click','#add_publication',function(){
            $('#publication_form').show();
            $('#publication_form input').val('');
            $('#publication_form textarea').val('');
            $('#publication_form .errormsg').text('');
            $('#publication_form input').removeClass('is-invalid');
            $('#publication_form [type=submit]').text('Add Publication');
        });
        //cancel adding publication
        $('#user-publication').on('click','#cancel_add_user_publication',function(e){
            e.preventDefault();
            $('#publication_form').hide();
            $('.publication-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-publication').offset().top - 70)
                }, 1000);
         }); 
        //save the publication
        $('#user-publication').on('submit','#publication_form',function(e){
            e.preventDefault();
            var k = $('#publication_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.publication.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.publication-ele').remove();
                        $(data.content).insertAfter('#publication_form');
                        $('#publication_form').hide();
                        alertSuccess('Publication Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#publication_form .errormsg').text('');
                        $('#publication_form input').removeClass('is-invalid');
                        $('#publication_form textarea').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing publication
        $('#user-publication').on('click','.publication-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.publication.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.publication-ele').show();
                    $(ele).closest('.publication-ele').hide();
                    $('#publication_form').empty();
                    $(data.content).appendTo($('#publication_form'));
                    $('#publication_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#publication_form').offset().top - 70)
                        }, 1000);
                    $( ".datepicker" ).datepicker({
                        defaultDate: "-3y",
                        changeYear: true,
                        changeMonth: true,
                        yearRange: "-40:today",
                        dateFormat: "yy-mm-dd",
                        maxDate:0
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing publication
        $('#user-publication').on('click','.publication-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved publication?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.publication.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.publication-ele').remove();
                            $('#publication_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#publication_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Publication Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        //Add reference
        $('#user-reference').on('click','#add_reference',function(){
            $('#reference_form').show();
            $('#reference_form input').val('');
            $('#reference_form textarea').val('');
            $('#reference_form .errormsg').text('');
            $('#reference_form input').removeClass('is-invalid');
            $('#reference_form [type=submit]').text('Add Reference');
        });
        //cancel adding reference
        $('#user-reference').on('click','#cancel_add_user_reference',function(e){
            e.preventDefault();
            $('#reference_form').hide();
            $('.reference-ele').show();
            $('html, body').animate({
                    scrollTop: eval($('#user-reference').offset().top - 70)
                }, 1000);
         }); 
        //save the reference
        $('#user-reference').on('submit','#reference_form',function(e){
            e.preventDefault();
            var k = $('#reference_key').val();
            var formData = new FormData(this);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.reference.store") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    
                    if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                        if(k!='')
                            $('[ref='+k+']').closest('.reference-ele').remove();
                        $(data.content).insertAfter('#reference_form');
                        $('#reference_form').hide();
                        alertSuccess('Reference Added Successfully.');
                    }
                    else if(!$.isEmptyObject(data.error))
                    {
                        $('#reference_form .errormsg').text('');
                        $('#reference_form input').removeClass('is-invalid');
                        $('#reference_form textarea').removeClass('is-invalid');
                        $.each(data.error, function(i,val){
                            $('#'+i).addClass('is-invalid');
                            $('#'+i).siblings('div').text(val[0]);
                        });
                        alertDanger('Please check the fields and submit again.');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //Edit existing reference
        $('#user-reference').on('click','.reference-edit',function(e){
            e.preventDefault();
            var ele = $(this);
            var formData = new FormData(); // high importance!
            formData.append('key', $(this).attr('ref'));
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                type: 'POST',
                url: '{{ route("frontend.reference.form") }}',
                dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    $('.reference-ele').show();
                    $(ele).closest('.reference-ele').hide();
                    $('#reference_form').empty();
                    $(data.content).appendTo($('#reference_form'));
                    $('#reference_form').show();
                    $('html, body').animate({
                            scrollTop: eval($('#reference_form').offset().top - 70)
                        }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //delete existing reference
        $('#user-reference').on('click','.reference-delete',function(e){
            e.preventDefault();
            var con = confirm('Are Sure you want to delete this saved reference?');
            if(con == true)
            {
                var ele = $(this);
                var formData = new FormData(); // high importance!
                formData.append('key', $(this).attr('ref'));
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("frontend.reference.delete") }}',
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    data: formData, // high importance!
                    processData: false, // high importance!
                    success: function (data) {
                        if($.isEmptyObject(data.error) && !data.hasOwnProperty('error')){
                            $(ele).closest('.reference-ele').remove();
                            $('#reference_form').hide();
                            ('html, body').animate({
                                scrollTop: eval($('#reference_form').offset().top - 70)
                            }, 1000);
                            alertSuccess('Reference Deleted Successfully.');
                        }
                        else if(!$.isEmptyObject(data.error))
                        {
                            alertDanger(data.error);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    
    </script>
@endsection
@endsection