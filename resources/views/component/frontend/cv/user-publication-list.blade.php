@forelse($user->publications as $publication)
@include('component.frontend.cv.user-publication-single',['publication'=>$publication])
@empty
@endforelse