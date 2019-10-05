<!-- Visitor Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visitor_uuid', 'Visitor Uuid:') !!}
    {!! Form::text('visitor_uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Visitor Card Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visitor_card_uuid', 'Visitor Card Uuid:') !!}
    {!! Form::text('visitor_card_uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason', 'Reason:') !!}
    {!! Form::text('reason', null, ['class' => 'form-control']) !!}
</div>

<!-- Clock Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clock_type', 'Clock Type:') !!}
    {!! Form::number('clock_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('visitorActivities.index') !!}" class="btn btn-default">Cancel</a>
</div>
