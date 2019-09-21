<!-- Vehicle Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicle_uuid', 'Vehicle Uuid:') !!}
    {!! Form::text('vehicle_uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('activeVehicles.index') !!}" class="btn btn-default">Cancel</a>
</div>
