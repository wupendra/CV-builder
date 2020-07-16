@forelse($user->profiles as $profile)
@include('component.frontend.user.profile-single',['profile'=>$profile])
@empty
@endforelse