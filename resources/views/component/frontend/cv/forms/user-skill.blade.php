@csrf
<input type="hidden" id="skill_key" name="key" value="{{ empty($skill->id)?'skill-ref':'skill-ref'.$skill->id }}">
<div class="row">
    <div class="col-md-12">
        <input id="skill_name" name="skill_name" type="text" value="{{ $skill->name }}" placeholder="Skill name" class="full-width" />
        <div class="errormsg">{{ $errors->first('skill_name') }}</div>
    </div>
    <div class="col-md-12">
        <select id="skill_level" name="skill_level" type="text" placeholder="Level" class="form-control full-width" >
            <option>Select Level</option>
            <option {{ ($skill->level=='beginner')?'Selected':'' }} value="beginner">Beginner</option>
            <option {{ ($skill->level=='intermediate')?'Selected':'' }} value="intermediate">Intermediate level</option>
            <option {{ ($skill->level=='master')?'Selected':'' }} value="master">Master</option>
        </select>
        <div class="errormsg">{{ $errors->first('skill_level') }}</div>
    </div>
    <div class="col-md-12 c-select-form">
        <label for="select_input_skill">Keywords</label>
        <div class="selected-items">
            @if(!empty($skill->id))
                @forelse($skill->keywords as $index=>$cour)
                    <span class="selected-ele" >{{ $cour}} <input type="hidden" name="skill_keywords[]" value="{{ $cour }}"><span class="remove-item badge"><i class="fa fa-close"></i></span></span>
                @empty
                @endforelse
            @endif
        </div>
        <div class="c-selection-list">
            <input id="select_input_skill" type="text" ref="skill_keywords" class="select-input form-control">
            <div class="errormsg">{{ $errors->first('select_input_skill') }}</div>
        </div>
        <small class="form-text">Type and enter to add a skill keyword.</small>
    </div>
    <div class="col-md-12">
    	<div class="btns">
            <button type="submit">{{ empty($skill->id)?'Add Skill':'Save Changes' }}</button>
            <button id="cancel_add_user_skill">Cancel</button>
        </div>
    </div>
</div>