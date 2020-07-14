@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection
@section('content')
	<div class="container brdcrmb-sec">
        	<div class="btn-group btn-breadcrumb">
            <a href="{{ route('home') }}" class="btn btn-default btn-myway"><i class="fa fa-home"></i></a>
            <a href="#" class="btn btn-default">Courses</a>
        </div>
    </div><!--breadcrumb-->
    <section class="services-sec-main">
    	<div class="container services-gurkhaa">
        	
            
            
            <div class="detail-page-wrap">
                <div class="col-md-12 service-detail-sec">
                    <div class="intro-header-sec intro-header-sec-adv">
                       <h4>Themes</h4>
                       <hr align="left" style="width:125px;">
                    </div>
                    
                    @include('component.frontend.theme.theme-list',['themes'=>$themes])
                    
                    
                    
                    
           		</div><!--service-detail-sec-->
                
                
                
                
            
            
            </div><!--detail-page-wrap-->
            
            
            
            
        </div><!--services-gurkhaa-->
    </section><!--services-sec-->
		



            
            
            
@section('javascripts')
    @parent
@endsection
@endsection