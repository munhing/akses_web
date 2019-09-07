<!-- Portuser Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('portuser_uuid', 'Portuser Uuid:') !!}
    {!! Form::text('portuser_uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('portuserActives.index') !!}" class="btn btn-default">Cancel</a>
</div>
