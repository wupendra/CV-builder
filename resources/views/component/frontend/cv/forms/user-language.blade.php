@csrf
<input type="hidden" id="language_key" name="key" value="{{ empty($language->id)?'language-ref':'language-ref'.$language->id }}">
<div class="row language-ele">
    <div class="col-md-12">
        <label for="language">Language</label>
        <input type="text" name="language" id="language" value="{{ $language->language }}" placeholder="Language">
        <div class="errormsg">{{ $errors->first('language') }}</div>
    </div>
    <div class="col-md-12">
        <label>Proficiency</label>
        <select id="language_fluency" name="language_fluency" class="form-control half-width">
            <option>Select Proficiency</option>
        	<option {{ ($language->fluency=='Basic Knowledge')?'Selected':'' }}  value="Basic Knowledge">Basic Knowledge</option>
            <option {{ ($language->fluency=='Conversant')?'Selected':'' }}  value="Conversant">Conversant</option>
            <option {{ ($language->fluency=='Proficient')?'Selected':'' }}  value="Proficient">Proficient</option>
            <option {{ ($language->fluency=='Fluent')?'Selected':'' }}  value="Fluent">Fluent</option>
            <option {{ ($language->fluency=='Native Speaker')?'Selected':'' }}  value="Native Speaker">Native Speaker</option>
        </select>
        <div class="errormsg">{{ $errors->first('language_fluency') }}</div>
    </div>
    <div class="col-md-12">
        <div class="btns">
            <button type="submit">{{ empty($language->id)?'Add Language':'Save Changes' }}</button>
            <button  id="cancel_add_user_language">Cancel</button>
        </div>
    </div>
</div>