<div class="col-md-4 courses-item">
	<img src="{{ asset('uploads/theme/'.$theme->image) }}" class="img-responsive" />
    <figcaption>
    	<h5>{{ $theme->name }}</h5>
        <h6>By {{ $theme->credit }}</h6>
        <div class="extra-icons-sec">
        	<span class="cmt-sec"><i class="fa fa-download"></i>{{ $theme->download_count }}</span>
            <span class="cmt-sec-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
        </div><!--extra-icons-sec-->
        <div class="show-more-hidden-btn">
        	<a class="btn btn-default" title="Preview" target="_blank" href="{{ route('frontend.theme.preview',$theme->slug) }}">Preview</a>
        </div>
    </figcaption>
</div><!--courses-item-->