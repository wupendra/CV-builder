<div class="row  work-ele abtComp work-detail{{ $work->id }}">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h3><a href="{{ !empty($work->website)?$work->website:'javascript:void(0)' }}" target="_blank"><i class="fa fa-building-o"></i> {{ $work->company }}</a></h3>
                <h6>{{ $work->start_date->format('jS F Y') }} - {{ !empty($work->end_date)?$work->end_date->format('jS F Y'):'Present' }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-12 ele-summary">
        <h4>{{ $work->position }}</h4>
        <h5>Work Summary</h5>
        <p>{{ $work->summary }}</p>
        <h5>Highlights</h5>
        <div class="cv-highlight">
        	@forelse($work->highlights as $high)
            <p>{{ $high }}</p>
            @empty
            @endforelse
        </div>
    </div>
</div>