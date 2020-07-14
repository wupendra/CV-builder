@extends('component.backend.layouts.admin')
@section('page_title', 'Add|Theme')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('theme.index') }}">Themes</a></li>
    <li class="breadcrumb-item active">Add Theme</li>
@endsection
@section('content')
<section class="forms">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="col-lg-6 admin-header">
		            <h2>Add Theme</h2>
		        </div>
		        <div class="col-lg-6 action-links">
                </div>
		        <div class="col-lg-12 admin-body">
					{!! Form::model(new App\Theme, ['route' => ['theme.store'], 'files' => true ]) !!}
						@include('backend/theme/partials/_form', ['submit_text' => 'Create Theme'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>	
@stop