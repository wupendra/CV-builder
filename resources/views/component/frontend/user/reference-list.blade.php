@forelse($user->references as $reference)
@include('component.frontend.user.reference-single',['reference'=>$reference])
@empty
@endforelse