@forelse($user->interests as $interest)
@include('component.frontend.cv.user-interest-single',['interest'=>$interest])
@empty
@endforelse