@csrf
<input type="hidden" id="reference_key" name="key" value="{{ empty($reference->id)?'reference-ref':'reference-ref'.$reference->id }}">
<div class="row reference-ele">
    <div class="col-md-12">
        <label for="reference_detail"></label>
        <textarea id="reference_detail" name="reference_detail" cols="" rows="" placeholder="Reference Info">{{ $reference->reference }}</textarea>
        <div class="errormsg">{{ $errors->first('reference_detail') }}</div>
    </div>
    <div class="col-md-12">
        <label for="reference_name"></label>
        <input id="reference_name" name="reference_name" type="text" value="{{ $reference->name }}" placeholder="Referencer Name" class="full-width" />
        <div class="errormsg">{{ $errors->first('reference_name') }}</div>
    </div>
    <div class="col-md-12">
        <div class="btns">
            <button type="submit">{{ empty($reference->id)?'Add Reference':'Save Changes' }}</button>
            <button id="cancel_add_user_reference">Cancel</button>
        </div>
    </div>
</div>