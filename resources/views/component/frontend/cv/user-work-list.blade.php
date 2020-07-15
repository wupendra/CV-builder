@forelse($user->work as $work)
@include('component.frontend.cv.user-work-single',['work'=>$work])
@empty
@endforelse