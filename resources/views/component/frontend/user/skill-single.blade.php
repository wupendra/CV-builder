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
</div>