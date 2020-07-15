@forelse($user->education as $education)
@include('component.frontend.cv.user-education-single',['education'=>$education])
@empty
@endforelse