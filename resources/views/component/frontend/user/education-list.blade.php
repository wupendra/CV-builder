@forelse($user->education as $education)
@include('component.frontend.user.education-single',['education'=>$education])
@empty
@endforelse