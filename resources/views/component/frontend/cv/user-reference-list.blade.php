@forelse($user->references as $reference)
@include('component.frontend.cv.user-reference-single',['reference'=>$reference])
@empty
@endforelse