@forelse($user->awards as $award)
@include('component.frontend.user.award-single',['award'=>$award])
@empty
@endforelse