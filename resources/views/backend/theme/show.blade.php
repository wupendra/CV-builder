@extends('component.backend.layouts.admin')
@section('page_title', 'Edit|Theme')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('theme.index') }}">Themes</a></li>
    <li class="breadcrumb-item active">Theme Detail</li>
@endsection
@section('content')
<div class="col-lg-12">
	<div class="col-lg-6 admin-header">
        <h2>Theme Detail</h2>
    </div>
    <div class="col-lg-6 action-links">
    	<a href="{{ route('theme.edit',$theme->slug) }}" class="float-right"> Edit </a>
    </div>
	<div class="col-lg-12 admin-body">
		@if(empty($theme)) No Data Found @else
			<div class="table-responsive col-lg-12">
				<table class="table table-striped">
					
						<tr>
							<th>Title</th>
							<td>{{ $theme->name }}</td>
						</tr>
						<tr>
							<th>Slug</th>
							<td>{{ $theme->slug }}</td>
						</tr>
						<tr>
							<th>Meta Title</th>
							<td>{{ $theme->meta_title }}</td>
						</tr>
						<tr>
							<th>Meta Keywords</th>
							<td>{{ $theme->meta_keyword }}</td>
						</tr>
						<tr>
							<th>Meta Description</th>
							<td>{{ $theme->meta_description }}</td>
						</tr>
						<tr>
							<th>Downloads</th>
							<td>{{ $theme->download_count }}</td>
						</tr>
						<tr>
							<th>Credit</th>
							<td>{{ $theme->credit }}</td>
						</tr>
						<tr>
							<th>Active</th>
							<td>{{ $theme->active?'Yes':'No' }}</td>
						</tr>
						<tr>
							<th>Image</th>
							<td>{!! HTML::image('/uploads/theme/'.$theme->image, '', array('width' => '100','class'=>'form-image')) !!}</td>
						</tr>
						<tr>
							<th>Created At</th>
							<td>{{ $theme->created_at->toDateTimeString() }}</td>
						</tr>
						<tr>
							<th>Updated At</th>
							<td>{{ $theme->updated_at->toDateTimeString() }}</td>
						</tr>
				</table>
			</div>
		@endif
	</div>
</div>
@section('additional_script')
@endsection

@stop