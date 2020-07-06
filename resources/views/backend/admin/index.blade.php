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
								@foreach($admins as $index=>$user)
								<tr>
									<th scope="row">{{ $index+1 }}</th>
									<td>{{ link_to_route('admin.show',$user->name,$user->id) }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->phone }}</td>
									<td>@foreach($user->roles as $role) {{ $role }} @endforeach</td>
									<td>@if($user->avatar){!! HTML::image('/uploads/avatars/'.$user->avatar, '', array('width' => '50','class'=>'form-image')) !!}@endif</td>
									<td>{{ $user->active?'Yes':'No' }}</td>
									<th>
										{!! Form::open(array('class' => 'form-inline admin-actions', 'method' => 'DELETE', 'route' => array('admin.destroy', $user->id) )) !!}
											<a href="{{ route('admin.edit',$user->id) }}" class="editlink" title="Edit"><i class="fa fa-edit"></i></a>
											<button type="submit" class="dellink" title="Delete" onClick="javascript:if(confirm('Are you sure you want to delete this User?')){ return true;}else{ return false; }" ><i class="fa fa-trash-o"></i></button>
			                			{!! Form::close() !!}
									</th>
								</tr>
								@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>
	</div>
</div>

@stop