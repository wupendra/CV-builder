@foreach($themes as $index=>$theme)
	@include('component.backend.theme.theme-list-single',['theme'=>$theme])
@endforeach