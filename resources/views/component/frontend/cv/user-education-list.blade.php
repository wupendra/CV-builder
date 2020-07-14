@forelse($user->educations as $education)
@include('component.frontend.cv.user-education-single',['education'=>$education])
@empty
@endforelse