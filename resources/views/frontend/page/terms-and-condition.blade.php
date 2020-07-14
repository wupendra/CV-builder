@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection
@section('content')
<section class="services-sec-main">
	<div class="container services-gurkhaa">
    	
        
        
        <div class="detail-page-wrap">
            <div class="col-md-12 service-detail-sec">
                <div class="intro-header-sec intro-header-sec-adv">
                   <h1>Terms and Conditions</h1>
                   <hr align="left" style="width:125px;">
                </div>
                <ul class="listings">
                  <li><i class="fa fa-arrow-right"></i>We provide free service to the users and help them with any charge or fee for the upgrade and maintainance of the application.</li>
                    <li><i class="fa fa-arrow-right"></i>Membership of the application is free and only registered members can manage and edit their CV.</li>
                    <li><i class="fa fa-arrow-right"></i>The users can download their CV on their will.</li>
                    <li><i class="fa fa-arrow-right"></i>We 'Make my CV' team will not be responsible for the loss of data when the CV is downloaded.</li>
                    <li><i class="fa fa-arrow-right"></i>We hope you to write feedback regarding this application so that we can improvise it though its not cumpolsary.</li>
                </ul><!--listings-->
                
       		</div><!--service-detail-sec-->
        </div><!--detail-page-wrap-->
    </div><!--services-gurkhaa-->
</section><!--services-sec-->
@section('javascripts')
    @parent

@endsection
@endsection