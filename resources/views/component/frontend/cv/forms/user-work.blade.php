
    @csrf
    <input type="hidden" id="work_key" name="key" value="{{ empty($work->id)?'work-ref':'work-ref'.$work->id }}">
    <div class="row  work-ele abtComp">
        <div class="container-fluid">
        	<div class="row">
            	<div class="col-md-12">
                    <label for="company_name">Company Name</label>
                	<input id="company_name" name="company_name" type="text" value="{{ old('company_name', $work->company) }}" placeholder="Company Name" class="half-width" />
                    <div class="errormsg">{{ $errors->first('company_name') }}</div>
                </div>
                <div class="col-md-12">
                    <label for="company_website">Company Website</label>
                    <input id="company_website" name="company_website" type="text" value="{{ old('company_website', $work->website) }}" placeholder="Company Website" class="half-width" />
                    <div class="errormsg">{{ $errors->first('company_website') }}</div>
                    <small class="help-text">Please enter valid url: https://.... or http://....</small>
                </div>
                <div class="col-md-6">
                    <label for="work_start_date">Start Date</label>
                	<input id="work_start_date" name="work_start_date" type="text" value="{{ !empty($work->start_date)?$work->start_date->toDateString():'' }}" placeholder="Start Date" class="half-width datepicker" />
                    <div class="errormsg">{{ $errors->first('start_date') }}</div>
                </div>
                <div class="col-md-6">
                    <label for="work_end_date">End Date</label>
                    <input id="work_end_date" name="work_end_date" type="text" value="{{ !empty($work->end_date)?$work->end_date->toDateString():'' }}" placeholder="End Date" class="half-width datepicker" />
                    <small>Leave this field empty if you currently work here.</small>
                    <div class="errormsg">{{ $errors->first('end_date') }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-12 ele-summary">
            <div class="co-md-12">
                <label for="company_position">Position</label>
                <input id="company_position" name="company_position" type="text" value="{{ old('company_position', $work->position) }}" placeholder="Position" class="half-width" />
                <div class="errormsg">{{ $errors->first('position') }}</div>
            </div>
            <div class="col-md-12">    
                <label for="work_summary">Work Summary</label>
                <textarea id="work_summary" name="work_summary" cols="" rows="" placeholder="Summary">{{ old('work_summary', $work->summary) }}</textarea>
                <div class="errormsg">{{ $errors->first('work_summary') }}</div>
            </div>
            <div class="col-md-12">
                <label for="work_highlight">Highlights</label>
                <textarea id="work_highlight" name="work_highlight" cols="" rows="" placeholder="Highlights">@if(!empty($work->id))@forelse($work->highlights as $high){{ $high }}@empty @endforelse @endif</textarea>
                <div class="errormsg">{{ $errors->first('work_highlight') }}</div>
            </div>
        </div>
    </div>                                    
    <div class="btns">
        <button type="submit">{{ empty($work->id)?'Add Work':'Save Changes' }}</button>
        <button  id="cancel_add_user_work">Cancel</button>
    </div>