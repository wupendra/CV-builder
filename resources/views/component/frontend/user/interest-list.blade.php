@forelse($user->interests as $interest)
@include('component.frontend.user.interest-single',['interest'=>$interest])
@empty
@endforelse