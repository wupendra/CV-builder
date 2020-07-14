@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection
@section('content')
<section class="banner-sec">
    <div class="resume-banner" >
        <img src="@if(isset($appsetting->options['banner'])) {{ asset('uploads/home/'.$appsetting->options['banner']) }} @endif" alt="Resume Banner" class="image-responsive">
        <figcaption>
            
            <h1>{{ $appsetting->app_name }}</h1>
            <p>@if(isset($appsetting->options['banner_caption'])){{ $appsetting->options['banner_caption'] }} @endif</p>
            <div class="btn-sec pull-left">
                @if(auth()->guard('web')->check())
                    <a href="#">My CV</a>
                @else
                    <a href="{{ route('register') }}">Sign Up</a>
                @endif
            </div>
        </figcaption>
        
    </div>

</section>
            
            
            
<section class="services-sec-main">
	<div class="container services-gurkhaa">
    	
        
        
        <div class="detail-page-wrap">
            <div class="col-md-12 service-detail-sec">
                <div class="intro-header-sec intro-header-sec-adv">
                   <h5>Check Out Some</h5>
                   <h4>Themes We Provide</h4>
                   <hr align="left" style="width:125px;">
                </div>
                @include('component.frontend.theme.theme-list',['themes'=>$themes])
       		</div><!--service-detail-sec-->
        </div><!--detail-page-wrap-->
    </div><!--services-gurkhaa-->
</section><!--services-sec-->
            
<section class="thank-you-gurkhaa">
	<div class="container slider-gurkhaa-test">
    	<div class="intro-header-sec">
            <h5>SOME OF OUR</h5>
            <h4>Thank You Notes</h4>
            <hr align="left" style="width:140px;">
        </div>
        <div id="carousel">
            <div class="btn-bar">
                <div id="buttons"><a id="prev" href="#"></a><a id="next" href="#"></a> </div>
            </div>
            <div id="slides">
                <ul>
                    <li class="slide">
                        <div class="authorContainer">
                            <p class="quote-author quote-author2">KHEM KUMAR BHUSAL</p>
                            <p class="disgnation-gurkhaa">Owner of Soltee Hotel</p>
                            <h5></h5>
                        </div>
          
                        <div class="quoteContainer">
                            <p class="quote-phrase">I was literally BLOWN AWAY by Company A's work! They went above and beyond all of our expectations with design, usability. and branding, I will reccommend them to everyone I know!</p>
                        </div>
            
                    </li>
                    <li class="slide">
                        <div class="authorContainer">
                            <p class="quote-author quote-author2">KHEM KUMAR BHUSAL</p>
                            <p class="disgnation-gurkhaa">Owner of Soltee Hotel</p>
                            <h5></h5>
                        </div>
          
                        <div class="quoteContainer">
                            <p class="quote-phrase">I was literally BLOWN AWAY by Company A's work! They went above and beyond all of our expectations with design, usability. and branding, I will reccommend them to everyone I know!</p>
                        </div>
                    </li>
                    <li class="slide">
                        <div class="authorContainer">
                            <p class="quote-author quote-author2">KHEM KUMAR BHUSAL</p>
                            <p class="disgnation-gurkhaa">Owner of Soltee Hotel</p>
                            <h5></h5>
                        </div>
          
                        <div class="quoteContainer">
                            <p class="quote-phrase">I was literally BLOWN AWAY by Company A's work! They went above and beyond all of our expectations with design, usability. and branding, I will reccommend them to everyone I know!</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div> 
    </div><!--slider-gurkhaa-test-->
</section><!--testimonial-gurkhaa-->

@section('javascripts')
    @parent
<script>
$(document).ready(function () {
    //rotation speed and timer
    var speed = 5000;
    
    var run = setInterval(rotate, speed);
    var slides = $('.slide');
    var container = $('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();
    
    
    //if user clicked on prev button
    
    $('#buttons a').click(function (e) {
        //slide the item
        
        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                'left': 0
            }, 1500, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
        }
        
        if (e.target.id == next) {
            container.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
        }
        
        //cancel the link behavior            
        return false;
        
    });
    
    //if mouse hover, pause the auto rotation, otherwise rotate it    
    container.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });
    
    
    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
            'left': -1 * item_width
        });
    }
    
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
    $('#next').click();
}
</script>
@endsection
@endsection