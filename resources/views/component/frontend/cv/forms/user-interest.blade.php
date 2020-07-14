@csrf
<input type="hidden" id="interest_key" name="key" value="{{ empty($interest->id)?'interest-ref':'interest-ref'.$interest->id }}">
<div class="row">
    <div class="col-md-12">
        <input id="interest_name" name="interest_name" type="text" value="{{ $interest->name }}" placeholder="Interested Field" class="full-width" />
        <div class="errormsg">{{ $errors->first('interest_name') }}</div>
    </div>
    <div class="col-md-12 c-select-form">
        <label for="select_input_interest">Keywords</label>
        <div class="selected-items">
            @if(!empty($interest->id))
                @forelse($interest->keywords as $index=>$cour)
                    <span class="selected-ele" >{{ $cour}} <input type="hidden" name="interest_keywords[]" value="{{ $cour }}"><span class="remove-item badge"><i class="fa fa-close"></i></span></span>
                @empty
                @endforelse
            @endif
        </div>
        <div class="c-selection-list">
            <input id="select_input_interest" type="text" ref="interest_keywords" class="select-input form-control">
            <div class="errormsg">{{ $errors->first('select_input_interest') }}</div>
        </div>
        <small class="form-text">Type and enter to add a interest keyword.</small>
    </div>
    <div class="col-md-12">
    	<div class="btns">
            <button type="submit">{{ empty($interest->id)?'Add Interest':'Save Changes' }}</button>
            <button id="cancel_add_user_interest">Cancel</button>
        </div>
    </div>
</div>