@section('additional_style_link')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
@endsection
        
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', isset($admin)?$admin->name:'' ,['class' => 'form-control','maxlength'=>250]) !!}
                    <div class="form-error">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('email', 'Email of the admin: ') !!}
                    {!! Form::text('email', isset($admin)?$admin->email:'' ,['class' => 'form-control','maxlength'=>100]) !!}
                    <div class="form-error">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('phone', 'Phone of the admin: ') !!}
                    {!! Form::text('phone', isset($admin)?$admin->phone:'' ,['class' => 'form-control','maxlength'=>30]) !!}
                    <div class="form-error">{{ $errors->first('[phone]') }}</div>
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('address', 'Adress of the admin: ') !!}
                    {!! Form::text('address', isset($admin)?$admin->address:'' ,['class' => 'form-control','maxlength'=>100]) !!}
                    <div class="form-error">{{ $errors->first('address') }}</div>
                </div>
                 <div class="form-group col-lg-6">
                    {!! Form::label('password', 'Password for the Admin: ') !!}
                    @if(isset($admin))
                        {!! Form::text('password', '' ,['class' => 'form-control','placeholder'=>'Leave the field empty if you don\'t want to change password.']) !!}
                        <small class="form-text">Leave the field empty if you don't want to change password.</small>
                        <div class="form-error">{{ $errors->first('password') }}</div>
                    @else
                        {!! Form::text('password', '' ,['class' => 'form-control']) !!}
                        <small class="form-text">Please note the password before saving. The entered password cannot be retrived.</small>
                    @endif
                </div>
                <div class="form-group col-lg-12">
                    {!! Form::label('roles[]', 'Admin Roles: ') !!}
                    {!! Form::select('roles[]', ['ADMIN'=>'Admin','SUPERADMIN'=>'Super Admin'], isset($admin)?$admin->roles:'', ['class' => 'form-control','id'=>'roles','multiple'=>'multiple']) !!}
                    <div class="form-error">{{ $errors->first('roles') }}</div>
                </div>
                <div class="form-group col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>{!! Form::label('active', 'Active? ') !!}</h5>
                        </div>
                        <div class="col-md-6">
                            <?php $active = old('active'); ?>
                            <input type="checkbox" name="" id="active" class="form-control" @if((!empty($active) && $active==1) || (!empty($admin->active) && $admin->active ==1 )) checked @endif>
                            <input type="hidden" name="active" value="@if(!empty($active)) {{ $active }} @elseif(!empty($admin->active)) {{ $admin->active }} @else 0 @endif">
                        </div>
                        <div class="form-error col-lg-12">{{ $errors->first('active') }}</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4 class="admin-content-seperator">Admin Avatar</h4>
                </div>
                <div class="form-group col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('avatar', 'Admin Avatar:') !!}
                            {!! Form::file('avatar',null) !!}
                            <div class="form-error">{{ $errors->first('avatar') }}</div>
                            @if(!empty($admin) && !empty($admin->avatar))
                                <input type="hidden" value="1" name="edit_page">
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(!empty($admin)  && !empty($admin->avatar))
                                {!! HTML::image('/uploads/avatars/'.$admin->avatar, '', array('width' => '150','class'=>'form-image')) !!}
                            @endif
                            <small class="form-text">The image should be the size of 400 X 400</small>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
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