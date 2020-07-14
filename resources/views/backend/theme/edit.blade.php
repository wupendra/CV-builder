@extends('component.backend.layouts.admin')
@section('page_title', 'Edit|Theme')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('theme.index') }}">Theme</a></li>
    <li class="breadcrumb-item active">Edit Theme</li>
@endsection
@section('content')
<section class="forms">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="col-lg-6 admin-header">
		            <h2>Edit Theme</h2>
		        </div>
		        <div class="col-lg-6 action-links">
		        	<a href="{{ route('theme.show',$theme->slug) }}" class="float-right"> Theme Detail </a>
                </div>
		        <div class="col-lg-12 admin-body">
					{!! Form::model($theme, ['method' => 'PATCH', 'files' => true, 'route'=>['theme.update', $theme->slug]]) !!}
						@include('backend/theme/partials/_form', ['submit_text' => 'Update Theme'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>

@stop