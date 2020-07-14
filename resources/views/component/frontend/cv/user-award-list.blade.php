@forelse($user->awards as $award)
@include('component.frontend.cv.user-award-single',['award'=>$award])
@empty
@endforelse