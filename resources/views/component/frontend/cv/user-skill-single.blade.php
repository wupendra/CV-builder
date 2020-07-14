<div class="row skill-ele">
    <div class="col-md-8">
        <h4>{{ $skill->name }}</h4>
        <span class="badge {{ $skill->level }}-level">{{ $skill->level }}</span>
        <div class="ele-keywords">
        	@forelse($skill->keywords as $key)
            <span class="badge">{{ $key }}</span>
			@empty
			@endforelse
        </div>
    </div>
    <div class="col-md-4 cv-actions">
        <button class="skill-edit" ref="skill-ref{{ $skill->id }}"><i class="fa fa-edit"></i></button>
        <button  class="skill-delete" ref="skill-ref{{ $skill->id }}"><i class="fa fa-trash-o"></i></button>
    </div>
</div>