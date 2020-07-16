@forelse($user->work as $work)
@include('component.frontend.user.work-single',['work'=>$work])
@empty
@endforelse