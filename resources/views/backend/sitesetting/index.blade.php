@extends('component.backend.layouts.admin')
@section('page_title', 'Admin|Dashboard')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Application Settings</li>
@endsection
@section('content')
<section class="forms">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="col-lg-6 admin-header">
		            <h2>Application Settings</h2>
		        </div>
	        	<div class="col-lg-6 action-links">
                    <a href="#" class="float-right">Menu Setting</a>
                </div>
				<div class="col-lg-12 admin-body">
					{!! Form::model($sitesetting, ['method' => 'PATCH', 'files' => true, 'route'=>['sitesetting.update', $sitesetting->id]]) !!}
						@include('backend/sitesetting/partials/_form', ['submit_text' => 'Update Site'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>

@section('javascripts')
	@parent
@endsection
@stop