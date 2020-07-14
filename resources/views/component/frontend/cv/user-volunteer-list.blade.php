@forelse($user->volunteers as $volunteer)
@include('component.frontend.cv.user-volunteer-single',['volunteer'=>$volunteer])
@empty
@endforelse