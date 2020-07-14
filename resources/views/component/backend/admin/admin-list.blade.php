@foreach($admins as $index=>$admin)
	@include('component.backend.admin.admin-list-single',['admin'=>$admin])
@endforeach