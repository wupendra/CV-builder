@extends('component.backend.layouts.admin')
@section('page_title', 'Edit|Admin')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
    <li class="breadcrumb-item active">Edit Admin</li>
@endsection
@section('content')

<section class="forms">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="col-lg-6 admin-header">
		            <h2>Edit Admin</h2>
		        </div>
	        	<div class="col-lg-6 action-links">
                    <a href="{{ route('admin.show',$admin->id) }}" class="float-right"> Admin Detail </a>
                </div>
		        <div class="admin-body col-lg-12">
					{!! Form::model($admin, ['method' => 'PATCH', 'files' => true, 'route'=>['admin.update', $admin->id]]) !!}
						@include('backend/admin/partials/_form', ['submit_text' => 'Update Admin'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>	
@stop