<div class="row interest-ele">
    <div class="col-md-8">
        <h4>{{ $interest->name }}</h4>
        <div class="ele-keywords ">
            @forelse($interest->keywords as $key)
            <span class="badge">{{ $key }}</span>
			@empty
			@endforelse
        </div>
    </div>
</div>