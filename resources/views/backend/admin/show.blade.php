@extends('component.backend.layouts.admin')
@section('page_title', 'Admin|Details')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admins</a></li>
    <li class="breadcrumb-item active">Admin: <strong>{{ $admin->name }}</strong> Profile</li>
@endsection
@section('content')


<div class="col-lg-12">
		<div class="col-lg-6 admin-header">
			<h2>Admin: <strong>{{ $admin->name }}</strong> Profile</h2>
		</div>
		<div class="col-lg-6 action-links">
			<a href="{{ route('admin.edit',$admin->id) }}" class="float-right"> Edit </a>
        </div>
		<div class="col-lg-12 admin-body">
			@if(empty($admin)) No Data Found @else
				<div class="table-responsive">
					<table class="table table-striped">
						
							<tr>
								<th>Name</th>
								<td>{{ $admin->name }}</td>
							</tr>
							<tr>
								<th>email</th>
								<td>{{ $admin->email }}</td>
							</tr>
							<tr>
								<th>Admin Roles</th>
								<td>@foreach($admin->roles as $role) {{ $role }}, @endforeach</td>
							</tr>
							<tr>
								<th>Address</th>
								<td>{{ $admin->address }}</td>
							</tr>
							<tr>
								<th>Phone</th>
								<td>{{ $admin->phone }}</td>
							</tr>
							<tr>
								<th>Active</th>
								<td>{{ $admin->active?'Active':'Inactive' }}</td>
							</tr>
							<tr>
								<th>Avatar</th>
								<td>@if($admin->avatar) {!! HTML::image('/uploads/avatars/'.$admin->avatar, '', array('width' => '50','class'=>'form-image')) !!} @endif</td>
							</tr>
					</table>
				</div>
			@endif
		</div>
	</div>
</div>
@section('additional_script')
@endsection

@stop