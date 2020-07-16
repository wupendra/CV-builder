@forelse($user->languages as $language)
@include('component.frontend.user.language-single',['language'=>$language])
@empty
@endforelse