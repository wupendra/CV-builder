<div class="row reference-ele">
    <div class="col-md-8 ele-summary">
        <p>{{ $reference->reference }}</p>
        <h4>-- {{ $reference->name }}</h4>                                            
    </div>
    <div class="col-md-4 cv-actions">
        <button class="reference-edit" ref="reference-ref{{ $reference->id }}"><i class="fa fa-edit"></i></button>
        <button  class="reference-delete" ref="reference-ref{{ $reference->id }}"><i class="fa fa-trash-o"></i></button>
    </div>
</div>