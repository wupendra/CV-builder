@forelse($user->skills as $skill)
@include('component.frontend.cv.user-skill-single',['skill'=>$skill])
@empty
@endforelse