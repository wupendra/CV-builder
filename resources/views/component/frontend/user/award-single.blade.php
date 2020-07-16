<div class="row award-ele">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h3>{{ $award->title }}</h3>
                <h6>{{ !empty($award->date)?$award->date->format('jS F Y'):'' }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-12 ele-summary">
        <h4><i class="fa fa-trophy"></i> {{ $award->awarder }}</h4>
        <p>{{ $award->summary }}</p>
    </div>
</div>