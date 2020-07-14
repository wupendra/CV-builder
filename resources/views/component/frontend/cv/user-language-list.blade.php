@forelse($user->languages as $language)
@include('component.frontend.cv.user-language-single',['language'=>$language])
@empty
@endforelse