<div class="row  volunteer-ele abtComp volunteer-detail{{ $volunteer->id }}">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h3><a href="{{ !empty($volunteer->website)?$volunteer->website:'javascript:void(0)' }}" target="_blank"><i class="fa fa-building-o"></i> {{ $volunteer->organization }}</a></h3>
                <h6>{{ $volunteer->start_date->format('jS F Y') }} - {{ !empty($volunteer->end_date)?$volunteer->end_date->format('jS F Y'):'Present' }}</h6>
            </div>
            <div class="col-md-4 cv-actions">
                <button class="volunteer-edit" ref="volunteer-ref{{ $volunteer->id }}"><i class="fa fa-edit"></i></button>
                <button class="volunteer-delete" ref="volunteer-ref{{ $volunteer->id }}"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>
    </div>
    <div class="col-md-12 ele-summary">
        <h4>{{ $volunteer->position }}</h4>
        <h5>Work Summary</h5>
        <p>{{ $volunteer->summary }}</p>
        <h5>Highlights</h5>
        <div class="cv-highlight">
        	@forelse($volunteer->highlights as $high)
            <p>{{ $high }}</p>
            @empty
            @endforelse
        </div>
    </div>
</div>