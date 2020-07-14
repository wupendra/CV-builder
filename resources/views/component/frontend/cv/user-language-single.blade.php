<div class="row language-ele">
    <div class="col-md-8">
        <h4>{{ $language->language }}</h4>
        <span class="badge">{{ $language->fluency }}</span>
    </div>
    <div class="col-md-4 cv-actions">
        <button class="language-edit" ref="language-ref{{ $language->id }}"><i class="fa fa-edit"></i></button>
        <button  class="language-delete" ref="language-ref{{ $language->id }}"><i class="fa fa-trash-o"></i></button>
    </div>
</div>