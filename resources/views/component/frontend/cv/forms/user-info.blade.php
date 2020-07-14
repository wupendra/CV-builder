
<form action="" id="personal_form">
    @csrf
    <div class="cv-ele-body">
        <table class="table table-responsive">
            <tr>
                <th><label for="about">About</label></th>
                <td>
                    <textarea cols="" rows="" placeholder="About" id="about" name="about">{{ old('about', $user->summary) }}</textarea>
                    <div class="errormsg">{{ $errors->first('about') }}</div>
                </td>
                
            </tr>
            <tr>
                <th><label for="phone">Phone</label></th>
                <td><input name="phone" type="text" value="{{ old('phone', $user->phone) }}" placeholder="Phone" class="half-width" id="phone" /></td>
                <div class="errormsg">{{ $errors->first('phone') }}</div>
            </tr>
            <tr>
                <th><label for="website">Website</label></th>
                <td><input name="website" type="text" value="{{ old('website', $user->website) }}" placeholder="Website" class="half-width" id="website" /></td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-12">
                            <input name="street" type="text" value="{{ old('street', $user->location->address) }}" placeholder="Street" class="full-width" id="street" />
                            <div class="errormsg">{{ $errors->first('address') }}</div>
                        </div>
                        <div class="col-md-6">
                            <input name="postal_code" type="text" value="{{ old('postal_code', $user->location->postal_code) }}" placeholder="Postal Code" class="full-width" id="postal_code" />
                            <div class="errormsg">{{ $errors->first('postal_code') }}</div>
                        </div>
                        <div class="col-md-6">
                            <input name="city" type="text" value="{{ old('city', $user->location->city) }}" placeholder="City" class="full-width" id="city" />
                            <div class="errormsg">{{ $errors->first('city') }}</div>
                        </div>
                        <div class="col-md-6">
                            <input name="region" type="text" value="{{ old('region', $user->location->region) }}" placeholder="Region" class="full-width" id="region" />
                            <div class="errormsg">{{ $errors->first('region') }}</div>
                        </div>
                        <div class="col-md-6">
                            <input name="country_code" type="text" value="{{ old('country_code', $user->location->country_code) }}" placeholder="Country Code" class="full-width" id="country_code" />
                            <div class="errormsg">{{ $errors->first('country_code') }}</div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="profession">Profession</label></th>
                <td><input name="profession" type="text" value="{{ old('profession', $user->label) }}" placeholder="profession" class="half-width" id="profession" /></td>
                <div class="errormsg">{{ $errors->first('profession') }}</div>
            </tr>

        </table>
    </div>
    <div class="btns">
        <button type="submit" id="personal_save">Save</button>
        <button id="personal_cancel">Cancel</button>
    </div>
</form>