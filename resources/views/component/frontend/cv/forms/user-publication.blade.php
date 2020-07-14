@csrf
<input type="hidden" id="publication_key" name="key" value="{{ empty($publication->id)?'publication-ref':'publication-ref'.$publication->id }}">
<div class="row publication-ele">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label for="publication_name">Publication Name</label>
                <input id="publication_name" name="publication_name" type="text" value="{{ $publication->name }}" placeholder="Publication Title" class="half-width" />
                <div class="errormsg">{{ $errors->first('publication_name') }}</div>
            </div>
            <div class="col-md-12">
                <label for="publication_date">Publication Date</label>
                <input id="publication_date" name="publication_date" type="text" value="{{ $publication->release_date }}" placeholder="published Date" class="half-width datepicker" />
                <div class="errormsg">{{ $errors->first('publication_date') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-12"> 
        <label for="pulished_by">Published By:</label> 
        <input id="published_by" name="published_by" type="text" value="{{ $publication->publisher }}" placeholder="published By" class="half-width" />
        <div class="errormsg">{{ $errors->first('published_by') }}</div>
    </div>
    <div class="col-md-12"> 
        <label for="publication_website">Website:</label> 
        <input id="publication_website" name="publication_website" type="text" value="{{ $publication->website }}" placeholder="Publication Website" class="half-width" />
        <div class="errormsg">{{ $errors->first('publication_website') }}</div>
    </div>
    <div class="col-md-12">
        <label for="publication_summary">Summary</label>
        <textarea id="publication_summary" name="publication_summary" cols="" rows="" placeholder="Publication Summary">{{ $publication->summary }}</textarea>
        <div class="errormsg">{{ $errors->first('publication_summary') }}</div>
    </div>
    <div class="col-md-12">
        <div class="btns">
            <button type="submit">{{ empty($publication->id)?'Add Publication':'Save Changes' }}</button>
            <button id="cancel_add_user_publication">Cancel</button>
        </div>
    </div>
</div>