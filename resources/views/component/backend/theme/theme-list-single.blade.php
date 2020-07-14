<tr ref="{{ $theme->slug }}" class="products">
	<th scope="row">{{ $index+1 }}</th>
	<td>{!! HTML::image('/uploads/theme/'.$theme->image, '', array('width' => '100','class'=>'form-image')) !!}</td>
	<td>{{ link_to_route('theme.show',$theme->name,$theme->slug) }}</td>
	<td class="highlight-td">{!! $theme->active ? '<span class="change-active cool-yes"  title="Change" >Yes </span>' : '<span class="change-active cool-no"  title="Change" >No </span>'!!}</td>
	<td>By {{ $theme->credit }}</td>
	<td>{{ $theme->download_count }}</td>
	<td>{{ $theme->created_at->toDateTimeString() }}</td>
	<th>
		{!! Form::open(array('class' => 'form-inline admin-actions', 'method' => 'DELETE', 'route' => array('theme.destroy', $theme->slug) )) !!}
			<a href="{{ route('theme.edit',$theme->slug) }}" class="editlink" title="Edit"><i class="fa fa-edit"></i></a>
			<a href="{{ route('theme.show',$theme->slug) }}" class="showlink" title="View"><i class="fa fa-eye"></i></a>
			<a href="" title="Preview" target="_blank" class="previewlink"><i class="fa fa-search"></i></a>
			<button type="submit" class="dellink" title="Delete" onClick="javascript:if(confirm('Are you sure you want to delete this Theme?')){ return true;}else{ return false; }" ><i class="fa fa-trash-o"></i></button>
		{!! Form::close() !!}
	</th>
</tr>