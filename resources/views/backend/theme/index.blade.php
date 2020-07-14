@extends('component.backend.layouts.admin')
@section('page_title', 'Admin|Dashboard')
@section('stylesheets')
    @parent
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">List Themes</li>
@endsection
@section('content')
<div class="col-lg-12 index-wrapper">
	<div class="col-lg-6 admin-header">
        <h2>Edit Theme</h2>
    </div>
    <div class="col-lg-6 action-links">
    </div>
	<div class="col-md-12">
		<span class="pagination-total float-right">Showing <span class="row-showing">{{ $themes->count() }}</span> of {{ $themes->total() }} Themes</span>
	</div>
	<div class="col-lg-12 admin-body">
		<div class="row">			
			@if($themes->count()==0) No Data Found @else
				<div class="col-md-6">
					<?php echo $themes->render(); ?>
				</div>
				<div class="col-md-6">
					<form class="form-inline row" id="brand-search">
                        <div class="input-group float-right">
                            <input class="form-control" name="brand-search" id="key-input" placeholder="Search Theme by Name" type="text">
	                        <div class="input-group-append">
	                        	<button id="search-brand" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
	                    	</div>
                        </div>
                   	</form>
				</div>
				<div class="table-responsive col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>&nbsp;</th>
								<th>Theme</th>
								<th>Status</th>
								<th>Credit</th>
								<th>Downloads</th>
								<th>Created</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
								@include('component.backend.theme.theme-list',['themes'=>$themes])
						</tbody>
					</table>
				</div>
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<?php echo $themes->render(); ?>
				</div>
			@endif
		</div>
	</div>
</div>

	@section('javascripts')
    	@parent
    	<script type="text/javascript">
    		//Change active status of the theme
		 	$(".index-wrapper").on('click','.change-active',function (e) {
		 		if(confirm('Are you sure you want to change the Active status of the Article?'))
    		 	{
					var attr = $(this).parent('td').parent('tr').attr('ref');
					var ele =$(this).parent('td');
				    var urladdress = '<?php echo url('/'); ?>'+'/admins/change-active-theme/'+attr;
			        $.ajax({
			            type: 'GET',
			            data:{'_token': '{{ csrf_token() }}','item':attr},
			            url: urladdress,
			            success: function (data) {
			                if(data.log){
			            		ele.children('span').remove();
			                	if(data.changed)
			                		$('<span class="change-active cool-yes">Yes </span>').appendTo(ele);
			                	else
			                		$('<span class="change-active cool-no">No </span>').appendTo(ele);
			                }

			            },
			            error: function (data) {
			                console.log('Error:', data);
			            }
			        });
			    }
			});
			//theme ajax search
    		$(".index-wrapper").on('submit','#brand-search',function (event) {
		        event.preventDefault();
		        $.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		            }
		        });/*


		        var form = document.forms.namedItem("brandform"); // high importance!, here you need change "yourformname" with the name of your form*/
		        var formData = new FormData(); // high importance!
		        formData.append('_token', '{{csrf_token()}}');
		        formData.append('key', $('#key-input').val());
		        var baseUrl = "<?php echo url('/'); ?>/admins/";
		        var homeUrl = "<?php echo url('/'); ?>";
		        $.ajax({
		            type: 'POST',
		            url: '{{ route("search.theme.name") }}',
		            dataType: "json", // or html if you want...
		            contentType: false, // high importance!
		            data: formData, // high importance!
		            processData: false, // high importance!
		            success: function (data) {
		            	console.log(data);
		                $('.products').remove();
		                $('.pagination').remove();
	                	$('.row-showing').text(data.rows);
		                if(data){
		                	$(data.content).appendTo('tbody');
		            	}

			    	},
		        	error: function (data) {
		        		console.log('Error:', data);
		        	}
		    	});
		    });
    	</script>
  	@endsection
@stop