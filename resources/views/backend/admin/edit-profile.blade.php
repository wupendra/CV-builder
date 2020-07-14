@extends('component.backend.layouts.admin')
@section('page_title', 'Edit|Profile')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6 admin-header">
                    <h2>Edit Profile</h2>
                </div>
                <div class="col-lg-6 action-links">
                    <a href="{{ route('backend.view.profile') }}" class="float-right"> View Profile </a>
                </div>
                <div class="col-lg-12 admin-body">
                    <form method="POST" action="{{ route('backend.edit.profile') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                {!! Form::label('name', 'Name: ') !!}
                                {!! Form::text('name', isset($admin)?$admin->name:'' ,['class' => 'form-control']) !!}
                                <div class="form-error">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('email', 'Email of the admin: ') !!}
                                {!! Form::text('email', isset($admin)?$admin->email:'' ,['class' => 'form-control']) !!}
                                <div class="form-error">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('phone', 'Phone of the admin: ') !!}
                                {!! Form::text('phone', isset($admin)?$admin->phone:'' ,['class' => 'form-control']) !!}
                                <div class="form-error">{{ $errors->first('[phone]') }}</div>
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('address', 'Adress of the admin: ') !!}
                                {!! Form::text('address', isset($admin)?$admin->address:'' ,['class' => 'form-control']) !!}
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
                                        <small class="form-text">The image should be the size of 538 X 356</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="admin-submit-btn">
                                {!! Form::submit('Save Profile', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>  

        
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
@stop