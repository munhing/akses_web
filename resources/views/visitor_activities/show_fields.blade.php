<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $visitorActivity->id !!}</p>
</div>

<!-- Visitor Uuid Field -->
<div class="form-group">
    {!! Form::label('visitor_uuid', 'Visitor Uuid:') !!}
    <p>{!! $visitorActivity->visitor_uuid !!}</p>
</div>

<!-- Visitor Card Uuid Field -->
<div class="form-group">
    {!! Form::label('visitor_card_uuid', 'Visitor Card Uuid:') !!}
    <p>{!! $visitorActivity->visitor_card_uuid !!}</p>
</div>

<!-- Reason Field -->
<div class="form-group">
    {!! Form::label('reason', 'Reason:') !!}
    <p>{!! $visitorActivity->reason !!}</p>
</div>

<!-- Clock Type Field -->
<div class="form-group">
    {!! Form::label('clock_type', 'Clock Type:') !!}
    <p>{!! $visitorActivity->clock_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $visitorActivity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $visitorActivity->updated_at !!}</p>
</div>

