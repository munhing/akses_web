<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $activeVehicle->id !!}</p>
</div>

<!-- Vehicle Uuid Field -->
<div class="form-group">
    {!! Form::label('vehicle_uuid', 'Vehicle Uuid:') !!}
    <p>{!! $activeVehicle->vehicle_uuid !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $activeVehicle->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $activeVehicle->updated_at !!}</p>
</div>

