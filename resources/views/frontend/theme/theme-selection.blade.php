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
                   <h5>click and</h5>
                   <h4>Select a Theme</h4>
                   <hr align="left" style="width:125px;">
                </div>
                @include('component.frontend.theme.theme-select-list',['themes'=>$themes])
       		</div><!--service-detail-sec-->
        </div><!--detail-page-wrap-->
    </div><!--services-gurkhaa-->
</section><!--services-sec-->
			<form  id="select_form" method="POST" action="{{ route('frontend.theme.selection') }}" style="display: none;">
				@csrf
				<input id="theme-item" type="hidden" name="theme" value="">
				<button type="submit" class="btn btn-primary">Select</button>
			</form>

@section('javascripts')
    @parent
    <script type="text/javascript">
    	$('.courses-item').on('click','.select-theme-btn',function(e){
    		e.preventDefault();
    		$('#theme-item').val($(this).closest('.courses-item').attr('ref'));
    		$('#select_form').submit();
        });
    	
    </script>

@endsection
@endsection