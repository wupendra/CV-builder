@csrf
<input type="hidden" id="profile_key" name="key" value="{{ empty($profile->id)?'profile-ref':'profile-ref'.$profile->id }}">
<div class="row">
    <div class="col-md-6">
        <input id="profile_network" name="profile_network" type="text" value="{{ $profile->network }}" placeholder="Social Platform" class="full-width" />
        <div class="errormsg">{{ $errors->first('profile_netword') }}</div>
    </div>
    <div class="col-md-6">
        <input id="profile_username" name="profile_username" type="text" value="{{ $profile->username }}" placeholder="@username" class="full-width" />
        <div class="errormsg">{{ $errors->first('profile_username') }}</div>
    </div>
    <div class="col-md-12">
        <input id="profile_link" name="profile_link" type="text" value="{{ $profile->url }}" placeholder="url link" class="full-width" />
        <div class="errormsg">{{ $errors->first('profile_link') }}</div>
    </div>
    <div class="col-md-12">
    	<div class="btns">
            <button type="submit">{{ empty($profile->id)?'Add Profile':'Save Changes' }}</button>
            <button id="cancel_add_user_profile">Cancel</button>
        </div>
    </div>
</div>