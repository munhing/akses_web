<!-- Portuser Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('portuser_uuid', 'Portuser Uuid:') !!}
    {!! Form::text('portuser_uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Clock Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clock_type', 'Clock Type:') !!}
    {!! Form::number('clock_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('portuserActivities.index') !!}" class="btn btn-default">Cancel</a>
</div>
