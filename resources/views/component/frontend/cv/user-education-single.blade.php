<div class="row education-ele">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h3>{{ $education->institution }}</h3>
                <h6>{{ $education->start_date->format('jS F Y') }} - {{ !empty($education->end_date)?$education->end_date->format('jS F Y'):'Ongoing' }}</h6>
            </div>
            <div class="col-md-4 cv-actions">
                <button class="education-edit" ref="education-ref{{ $education->id }}"><i class="fa fa-edit"></i></button>
                <button class="education-delete" ref="education-ref{{ $education->id }}"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>
    </div>
    <div class="col-md-12 ele-summary">
        <h4>{{ $education->study_type }}</h4>
        <h5>{{ $education->area }}</h5>
        <h5>GPA: {{ $education->gpa }}</h5>
        <h5>Courses</h5>
        <div class="cv-highlight">
            @forelse($education->courses as $high)
            <p>{{ $high }}</p>
            @empty
            @endforelse
        </div>
    </div>
</div>