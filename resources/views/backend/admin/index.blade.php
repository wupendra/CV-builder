@extends('component.backend.layouts.admin')
@section('page_title', 'List|Admin')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">List Admins       </li>
@endsection
@section('content')

<div class="col-lg-12">
	<div class="card">
		<div class="col-lg-6 admin-header">
			<h2>Admin List</h2>
		</div>
		<div class="col-lg-6 action-links">
        </div>
		<div class="col-lg-12 admin-body">
			@if($admins->count()==0) No Data Found @else
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>email</th>
								<th>Phone</th>
								<th>Roles</th>
								<th>Avatar</th>
								<th>Active</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@include('component.backend.admin.admin-list',['admins'=>$admins])
						</tbody>
					</table>
				</div>
			@endif
		</div>
	</div>
</div>

@stop