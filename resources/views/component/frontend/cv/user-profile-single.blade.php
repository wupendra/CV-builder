<div class="row profile-ele">
    <div class="col-md-8">
        <h5><a href="{{ $profile->url }}" title="{{ $profile->network }}"><i class="fa fa-{{ strtolower($profile->network) }}"></i> {{ $profile->username }}</a></h5>
    </div>
    <div class="col-md-4 cv-actions">
        <button class="profile-edit" ref="profile-ref{{ $profile->id }}"><i class="fa fa-edit"></i></button>
        <button  class="profile-delete" ref="profile-ref{{ $profile->id }}"><i class="fa fa-trash-o"></i></button>
    </div>
</div>