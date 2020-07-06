@extends('component.backend.layouts.admin')
@section('page_title', 'Create|Admin')
@section('stylesheets')
    @parent
@endsection
@section('content')
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
    <li class="breadcrumb-item active">Add Admin</li>
@endsection
<section class="forms">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="col-lg-6 admin-header">
		            <h2>Add Admin</h2>
		        </div>
		        <div class="col-lg-6 action-links">
                </div>
		        <div class="col-lg-12 admin-body">
					{!! Form::model(new App\Admin, ['route' => ['admin.store'], 'files' => true ]) !!}
						@include('backend/admin/partials/_form', ['submit_text' => 'Save Admin'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>	
@stop