
    @csrf
    <input type="hidden" id="volunteer_key" name="key" value="{{ empty($volunteer->id)?'volunteer-ref':'volunteer-ref'.$volunteer->id }}">
    <div class="row  volunteer-ele abtComp">
        <div class="container-fluid">
        	<div class="row">
            	<div class="col-md-12">
                    <label for="organization_name">Organization Name</label>
                	<input id="organization_name" name="organization_name" type="text" value="{{ old('organization_name', $volunteer->organization) }}" placeholder="Organization Name" class="half-width" />
                    <div class="errormsg">{{ $errors->first('organization_name') }}</div>
                </div>
                <div class="col-md-12">
                    <label for="organization_website">Organization Website</label>
                    <input id="organization_website" name="organization_website" type="text" value="{{ old('organization_website', $volunteer->website) }}" placeholder="Organization Website" class="half-width" />
                    <div class="errormsg">{{ $errors->first('organization_website') }}</div>
                    <small class="help-text">Please enter valid url: https://.... or http://....</small>
                </div>
                <div class="col-md-6">
                    <label for="volunteer_start_date">Start Date</label>
                	<input id="volunteer_start_date" name="volunteer_start_date" type="text" value="{{ !empty($volunteer->start_date)?$volunteer->start_date->toDateString():'' }}" placeholder="Start Date" class="half-width datepicker" />
                    <div class="errormsg">{{ $errors->first('start_date') }}</div>
                </div>
                <div class="col-md-6">
                    <label for="volunteer_end_date">End Date</label>
                    <input id="volunteer_end_date" name="volunteer_end_date" type="text" value="{{ !empty($volunteer->end_date)?$volunteer->end_date->toDateString():'' }}" placeholder="End Date" class="half-width datepicker" />
                    <small>Leave this field empty if you currently volunteer here.</small>
                    <div class="errormsg">{{ $errors->first('end_date') }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-12 ele-summary">
            <div class="co-md-12">
                <label for="organization_position">Position in Position</label>
                <input id="organization_position" name="organization_position" type="text" value="{{ old('organization_position', $volunteer->position) }}" placeholder="Position" class="half-width" />
                <div class="errormsg">{{ $errors->first('position') }}</div>
            </div>
            <div class="col-md-12">    
                <label for="volunteer_summary">Volunteer Work Summary</label>
                <textarea id="volunteer_summary" name="volunteer_summary" cols="" rows="" placeholder="Summary">{{ old('volunteer_summary', $volunteer->summary) }}</textarea>
                <div class="errormsg">{{ $errors->first('volunteer_summary') }}</div>
            </div>
            <div class="col-md-12">
                <label for="volunteer_highlight">Highlights</label>
                <textarea id="volunteer_highlight" name="volunteer_highlight" cols="" rows="" placeholder="Highlights">@if(!empty($volunteer->id))@forelse($volunteer->highlights as $high){{ $high }}@empty @endforelse @endif</textarea>
                <div class="errormsg">{{ $errors->first('volunteer_highlight') }}</div>
            </div>
        </div>
    </div>                                    
    <div class="btns">
        <button type="submit">{{ empty($volunteer->id)?'Add Volunteer Work':'Save Changes' }}</button>
        <button  id="cancel_add_user_volunteer">Cancel</button>
    </div>