@forelse($themes->chunk(3) as $chunk)
    @foreach($chunk as $theme)
        @include('component.frontend.theme.theme-select-single',['theme'=>$theme])
    @endforeach
@empty
@endforelse