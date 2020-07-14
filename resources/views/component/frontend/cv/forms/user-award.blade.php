@csrf
<input type="hidden" id="award_key" name="key" value="{{ empty($award->id)?'award-ref':'award-ref'.$award->id }}">
<div class="row award-ele">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label for="award_name">Name of the Award</label>
                <input id="award_name" name="award_name" type="text" value="{{ $award->title }}" placeholder="Award Title" class="half-width" />
                <div class="errormsg">{{ $errors->first('award_name') }}</div>
            </div>
            <div class="col-md-12">
                <label for="awarded_by">Awarded By</label>
                <input id="awarded_by" name="awarded_by" type="text" value="{{ $award->awarder }}" placeholder="Awarded By" class="half-width" />
                <div class="errormsg">{{ $errors->first('awarded_by') }}</div>
            </div>
            <div class="col-md-12">
                <label for="award_date">Award received date</label>
                <input id="award_date" name="award_date" type="text" value="{{ !empty($award->date)?$award->date->toDateString():'' }}" placeholder="Award Date" class="half-width datepicker" />
                <div class="errormsg">{{ $errors->first('award_date') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-12 ele-summary">
        <label for="award_summary">Award Summary</label>
        <textarea id="award_summary" name="award_summary" cols="" rows="" placeholder="Award Summary">{{ $award->summary }}</textarea>
        <div class="errormsg">{{ $errors->first('award_summary') }}</div>
    </div>
</div>
<div class="btns">
    <button>{{ empty($award->id)?'Add Award':'Save Changes' }}</button>
    <button id="cancel_add_user_award">Cancel</button>
</div>