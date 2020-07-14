@csrf
<input type="hidden" id="education_key" name="key" value="{{ empty($education->id)?'education-ref':'education-ref'.$education->id }}">
<div class="row education-ele">
    <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <label for="institution_name"> Institution Name</label>
            	<input id="institution_name" name="institution_name" type="text" value="{{ $education->institution }}" placeholder="Institution Name" class="half-width" />
                <div class="errormsg">{{ $errors->first('isntitution_name') }}</div>
            </div>
            <div class="col-md-4">
                <label for="education_start_date">Start Date</label>
            	<input id="education_start_date" name="education_start_date" type="text" value="{{ !empty($education->start_date)?$education->start_date->toDateString():'' }}" placeholder="Start Date" class="full-width left datepicker" />
                <div class="errormsg">{{ $errors->first('education_start_date') }}</div>
            </div>
            <div class="col-md-4">
                <label for="education_end_date">End Date</label>
                <input id="education_end_date" name="education_end_date" type="text" value="{{ !(empty($education->end_date))?$education->end_date->toDateString():'' }}" placeholder="End Date" class="full-width left datepicker" />
                <div class="errormsg">{{ $errors->first('education_end_date') }}</div>
            </div>
            <div class="col-md-12">
                <label for="">Level</label>
                <select id="education_level" name="education_level" type="text" placeholder="Level" class="form-control half-width" >
                    <option>Select Level</option>
                    <option {{ ($education->study_type=='SEE (SLC)')?'Selected':'' }} value="SEE (SLC)">School Leaving Certificate / SEE</option>
                    <option {{ ($education->study_type=='Higher Secondary')?'Selected':'' }} value="Higher Secondary">10+2/Intermediate level</option>
                    <option {{ ($education->study_type=='Diploma')?'Selected':'' }} value="Diploma">Diploma</option>
                    <option {{ ($education->study_type=='Bachelors Degree')?'Selected':'' }} value="Bachelors Degree">Bachelors Degree</option>
                    <option {{ ($education->study_type=='Masters Degree')?'Selected':'' }} value="Masters Degree">Masters Degree</option>
                    <option {{ ($education->study_type=='PHD')?'Selected':'' }} value="PHD">PHD</option>
                </select>
                <div class="errormsg">{{ $errors->first('education_level') }}</div>
            </div>
            <div class="col-md-12">
                <label for="course_area">Course Area</label>
                <input id="course_area" name="course_area" type="text" value="{{ $education->area }}" placeholder="Like:Bachelors in Information and Technology" class="half-width" />
                <div class="errormsg">{{ $errors->first('course_area') }}</div>
            </div>
            <div class="col-md-12">
                <label for="education_gpa">GPA</label>
                <input id="education_gpa" name="education_gpa" type="text" value="{{ $education->gpa }}" placeholder="GPA" class="half-width" />
                <div class="errormsg">{{ $errors->first('education_gpa') }}</div>
            </div>
            <div class="col-md-12 c-select-form">
                <label for="select_input_education">Courses</label>
                <div class="selected-items">
                    @if(!empty($education->id))
                        @forelse($education->courses as $index=>$cour)
                            <span class="selected-ele" >{{ $cour}} <input type="hidden" name="edu_courses[]" value="{{ $cour }}"><span class="remove-item badge"><i class="fa fa-close"></i></span></span>
                        @empty
                        @endforelse
                    @endif
                </div>
                <div class="c-selection-list">
                    <input id="select_input_education" type="text" ref="edu_courses" class="select-input form-control">
                    <div class="errormsg">{{ $errors->first('select_input_education') }}</div>
                </div>
                <small class="form-text">Type and enter to add a course.</small>
            </div>
            <div class="col-md-12">
                <div class="btns">
                    <button type="submit">{{ empty($education->id)?'Add Education':'Save Changes' }}</button>
                    <button  id="cancel_add_user_education">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>