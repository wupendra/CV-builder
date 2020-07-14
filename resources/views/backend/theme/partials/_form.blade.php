
        @foreach($errors->all() as $error)
            <div class="form-error">{{ $error }}</div>
        @endforeach
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', old('name', $theme->name) ,['class' => 'form-control','maxlength'=>250]) !!}
                    <div class="form-error">{{ $errors->first('name') }}</div>
                    <small class="form-text">Maximum of 250 characters allowded</small>
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('meta_title', 'Meta Title*: ') !!}
                    {!! Form::text('meta_title', old('meta_title', $theme->meta_title),['class' => 'form-control','maxlength'=>55]) !!}
                    <div class="form-error">{{ $errors->first('meta_title') }}</div>
                    <small class="form-text">Maximum of 55 characters long allowded</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('meta_keyword', 'Meta Keywords*: ') !!}
                    {!! Form::textarea('meta_keyword',  old('meta_keyword', $theme->meta_keyword) ,['class' => 'form-control','maxlength'=>255]) !!}
                    <div class="form-error">{{ $errors->first('meta_keyword') }}</div>
                    <small class="form-text">Please enter keywords seperated by comma(eg. reviews, electric cars in nepal, cars).Max 255 Characters.</small>
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('meta_description', 'Meta Description*: ') !!}
                    {!! Form::textarea('meta_description',  old('meta_description', $theme->meta_description) ,['class' => 'form-control','maxlength'=>158]) !!}
                    <div class="form-error">{{ $errors->first('meta_description') }}</div>
                    <small class="form-text">Maximum of 158 characters long allowded</small>
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('credit', 'Theme Credit: ') !!}
                    {!! Form::text('credit', old('credit', $theme->credit) ,['class' => 'form-control','maxlength'=>250]) !!}
                    <div class="form-error">{{ $errors->first('credit') }}</div>
                    <small class="form-text">Maximum of 250 characters allowded</small>
                </div>
                <div class="col-lg-12">
                    <h4 class="admin-content-seperator">Choose the options for Implementation</h4>
                </div>
                <div class="form-group col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>{!! Form::label('active', 'Active? ') !!}</h5>
                        </div>
                        <div class="col-md-6">
                            <?php $active = old('active'); ?>
                            <input type="checkbox" name="" id="active" class="form-control" @if((!empty($active) && $active==1) || (!empty($theme->active) && $theme->active ==1 )) checked @endif>
                            <input type="hidden" name="active" value="@if(!empty($active)) {{ $active }} @elseif(!empty($theme->active)) {{ $theme->active }} @else 0 @endif">
                        </div>
                        <div class="form-error col-lg-12">{{ $errors->first('active') }}</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4 class="admin-content-seperator">Theme Image</h4>
                </div>
                <div class="form-group col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('image', 'Theme Image:') !!}
                            {!! Form::file('image',null) !!}
                            <div class="form-error">{{ $errors->first('image') }}</div>
                            @if(!empty($theme) && !empty($theme->image))
                                <input type="hidden" value="1" name="edit_page">
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(!empty($theme)  && !empty($theme->image))
                                {!! HTML::image('/uploads/theme/'.$theme->image, '', array('width' => '300','class'=>'form-image')) !!}
                            @endif
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
                <div class="admin-submit-btn">
                    {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
@section('javascripts')
    @parent
    <script type='text/javascript'>
        $('#active').on('change',function(){
            if($('#active').is(':checked'))
                $('#active').siblings('input').val(1);
            else
                $('#active').siblings('input').val(0);
        });
    </script>
@endsection