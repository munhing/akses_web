<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $activeVisitor->id !!}</p>
</div>

<!-- Visitor Uuid Field -->
<div class="form-group">
    {!! Form::label('visitor_uuid', 'Visitor Uuid:') !!}
    <p>{!! $activeVisitor->visitor_uuid !!}</p>
</div>

<!-- Visitor Card Uuid Field -->
<div class="form-group">
    {!! Form::label('visitor_card_uuid', 'Visitor Card Uuid:') !!}
    <p>{!! $activeVisitor->visitor_card_uuid !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $activeVisitor->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $activeVisitor->updated_at !!}</p>
</div>

