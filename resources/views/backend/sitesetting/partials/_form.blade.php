@section('additional_style_link')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
@endsection

    <div class="row">
        <div class=" col-md-6">
            {!! Form::label('app_name', 'Application Name: ') !!}
            {!! Form::text('app_name', isset($sitesetting)?$sitesetting->app_name:'' ,['class' => 'form-control','maxlength'=>100]) !!}
            <small class="form-text">Maximum of 100 characters allowded</small>
        </div>
        <div class=" col-md-6">
            {!! Form::label('meta_title', 'Meta Title: ') !!}
            {!! Form::text('meta_title', isset($sitesetting)?$sitesetting->meta_title:'' ,['class' => 'form-control','maxlength'=>55]) !!}
            <small class="form-text">Maximum of 55 characters allowded</small>
        </div>
        <div class=" col-md-6">
            {!! Form::label('address', 'Address: ') !!}
            {!! Form::text('address', isset($sitesetting)?$sitesetting->address:'' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
        <div class=" col-md-6">
            {!! Form::label('contact', 'Contact No: ') !!}
            {!! Form::text('contact', isset($sitesetting)?$sitesetting->contact:'' ,['class' => 'form-control','maxlength'=>55]) !!}
        </div>
        <div class=" col-md-6">
            {!! Form::label('mobile', 'Mobile No: ') !!}
            {!! Form::text('mobile', isset($sitesetting)?$sitesetting->mobile:'' ,['class' => 'form-control','maxlength'=>20]) !!}
            <small class="form-text">Maximum of 20 characters allowded</small>
        </div>
        <div class=" col-md-6">
            {!! Form::label('admin_eamil', 'Admin Email: ') !!}
            {!! Form::text('admin_email', isset($sitesetting)?$sitesetting->admin_email:'' ,['class' => 'form-control','maxlength'=>255]) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('meta_keyword', 'Meta Keywords: ') !!}
            {!! Form::textarea('meta_keyword', isset($sitesetting)?$sitesetting->meta_keyword:'' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('meta_description', 'Meta Description: ') !!}
            {!! Form::textarea('meta_description', isset($sitesetting)?$sitesetting->meta_description:'' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 158 characters long allowded</small>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('short_note', 'Short Description: ') !!}
            {!! Form::textarea('short_note', isset($sitesetting)?$sitesetting->short_note:'' ,['class' => 'form-control']) !!}
        </div>
    </div>
<div class="card-header d-flex align-items-center">
    <h4>Social Links</h4>
</div>
<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('facebook', 'Facebook Link: ') !!}
            {!! Form::text('facebook', $sitesetting->facebook?$sitesetting->facebook:'#' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('googleplus', 'Googleplus Link: ') !!}
            {!! Form::text('googleplus', $sitesetting->googleplus?$sitesetting->googleplus:'#' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('twitter', 'Twitter Link: ') !!}
            {!! Form::text('twitter', $sitesetting->twitter?$sitesetting->twitter:'#' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('instagram', 'Instagram Link: ') !!}
            {!! Form::text('instagram', $sitesetting->instagram?$sitesetting->instagram:'#' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('youtube', 'Youtube Link: ') !!}
            {!! Form::text('youtube', $sitesetting->youtube?$sitesetting->youtube:'#' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('linkedin', 'Linkedin Link: ') !!}
            {!! Form::text('linkedin', $sitesetting->linkedin?$sitesetting->linkedin:'#' ,['class' => 'form-control','maxlength'=>255]) !!}
            <small class="form-text">Maximum of 255 characters allowded</small>
        </div>
    </div>
</div>
<div class="card-header d-flex align-items-center">
    <h4>Logo Image for the Application</h4>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('logo', 'Logo:') !!}
            {!! Form::file('logo', null) !!}
        </div>
        <div class="col-sm-6">
            <span class="form-info">Image Size 315 X 80 (or its proportion)</span></br>
            @isset($sitesetting)
            {!! Html::image('/uploads/home/'.$sitesetting->logo,'' , ['width' => 150]) !!}
            @endisset
        </div>
    </div>
</div>
<div class="card-header d-flex align-items-center">
    <h4>Favicon Image for the Application</h4>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('favicon', 'Site Favicon:') !!}
            {!! Form::file('favicon', null) !!}
        </div>
        <div class="col-sm-6">
            <span class="form-info">Favicon item must be square</span><br/>
            @isset($sitesetting)
            {!! Html::image('/uploads/home/'.$sitesetting->favicon) !!}
            @endisset
        </div>
    </div>
</div>
@foreach($errors->all() as $error)
<div class="col-md-6 form-error">
    {{ $error }}
</div>
@endforeach

<div class="admin-submit-btn">
    {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
</div>
@section('additional_script')
<script type='text/javascript' src="{{ asset('assets/js/select2.min.js') }}"></script>
<script type="text/javascript">
   
</script>
@endsection