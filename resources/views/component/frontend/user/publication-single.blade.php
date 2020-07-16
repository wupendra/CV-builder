<div class="row publication-ele">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h3><a href="{{ !empty($publication->website)?$publication->website:'javascript:void(0)' }}" target="_blank"><i class="fa fa-bookmark"></i> {{ $publication->name }}</a></h3>
                <h6>{{ !(empty($publication->release_date))?$publication->release_date->format('jS F Y'):'' }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-12 ele-summary">
        <h4>Published By: {{ $publication->publisher }}</h4>
        <p>{{ $publication->summary }}</p>
    </div>
</div>