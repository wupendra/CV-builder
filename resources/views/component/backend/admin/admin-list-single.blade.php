<tr>
	<th scope="row">{{ $index+1 }}</th>
	<td>{{ link_to_route('admin.show',$admin->name,$admin->id) }}</td>
	<td>{{ $admin->email }}</td>
	<td>{{ $admin->phone }}</td>
	<td>@foreach($admin->roles as $role) {{ $role }} @endforeach</td>
	<td>@if($admin->avatar){!! HTML::image('/uploads/avatars/'.$admin->avatar, '', array('width' => '50','class'=>'form-image')) !!}@endif</td>
	<td>{{ $admin->active?'Yes':'No' }}</td>
	<th>
		{!! Form::open(array('class' => 'form-inline admin-actions', 'method' => 'DELETE', 'route' => array('admin.destroy', $admin->id) )) !!}
			<a href="{{ route('admin.edit',$admin->id) }}" class="editlink" title="Edit"><i class="fa fa-edit"></i></a>
			<button type="submit" class="dellink" title="Delete" onClick="javascript:if(confirm('Are you sure you want to delete this Admin?')){ return true;}else{ return false; }" ><i class="fa fa-trash-o"></i></button>
		{!! Form::close() !!}
	</th>
</tr>