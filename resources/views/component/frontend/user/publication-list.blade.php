@forelse($user->publications as $publication)
@include('component.frontend.user.publication-single',['publication'=>$publication])
@empty
@endforelse