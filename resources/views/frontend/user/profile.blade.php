@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
@endsection
@section('content')
<section class="services-sec-main">
    	<div class="container services-gurkhaa">
        	
            
            
            <div class="detail-page-wrap">
                <div class="col-md-12 service-detail-sec">
                    <div class="intro-header-sec intro-header-sec-adv">
                        <div class="col-md-12">                            
                           <h1>{{ $user->name }}</h1>
                           <hr align="left" style="width:125px;">
                        </div>
                    </div>
                    <div class="col-md-12 user-info cv-ele">
                        @if(auth()->guard('web')->check() && auth()->guard('web')->user()->id == $user->id)
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @if($user->visibility==0) Your profile is <strong>Private</strong>. Only you can see this! @else Your profile is <strong>Public</strong>. It is visible to everyone. @endif
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4 profile-picture">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-camera"></i> Picture</h2>
                                </div>
                                <div class="cv-ele-body">
                                    <img id="profile_image" src="@if(!empty($user->picture) &&(str_contains($user->picture, 'http://') || str_contains($user->picture, 'https://'))) {{ $user->picture }} @elseif(!empty($user->picture)) {{ '/uploads/avatars/'.$user->picture }} @else {{ '/img/avatar.jpg' }} @endif" class="profile-pic image-responsive">
                                </div>
                            </div>
                            <div class="col-md-8 personal-info">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-user-secret"></i> Personal Information</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.info',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-work">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-briefcase"></i> Work</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.work-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-profile">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-globe"> Social Pofile</i></h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.profile-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-education">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-graduation-cap"></i> Education</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.education-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-skill">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-tasks"></i> Skills</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.skill-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-award">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-certificate"></i> Award</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.award-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-language">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-language"></i> Languages</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.language-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-volunteer">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-users"></i> Volunteers</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.volunteer-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-interest">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-heart"></i> Interests</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.interest-list',['user'=>$user])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 cv-ele">
                        <div class="row">
                            <div class="col-md-8" id="user-publication">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-book"></i> Publications</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.publication-list',['user'=>$user])
                                </div>
                            </div>
                            <div class="col-md-4" id="user-reference">
                                <div class="cv-ele-head">
                                    <h2><i class="fa fa-check-square"></i> References</h2>
                                </div>
                                <div class="cv-ele-body">
                                    @include('component.frontend.user.reference-list',['user'=>$user])
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

@endsection
@endsection