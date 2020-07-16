@forelse($user->skills as $skill)
@include('component.frontend.user.skill-single',['skill'=>$skill])
@empty
@endforelse