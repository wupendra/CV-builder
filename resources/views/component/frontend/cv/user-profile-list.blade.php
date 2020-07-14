@forelse($user->profiles as $profile)
@include('component.frontend.cv.user-profile-single',['profile'=>$profile])
@empty
@endforelse