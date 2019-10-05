<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vehicleActivity->id !!}</p>
</div>

<!-- Vehicle Uuid Field -->
<div class="form-group">
    {!! Form::label('vehicle_uuid', 'Vehicle Uuid:') !!}
    <p>{!! $vehicleActivity->vehicle_uuid !!}</p>
</div>

<!-- Clock Type Field -->
<div class="form-group">
    {!! Form::label('clock_type', 'Clock Type:') !!}
    <p>{!! $vehicleActivity->clock_type !!}</p>
</div>

<!-- Clock Time Field -->
<div class="form-group">
    {!! Form::label('clock_time', 'Clock Time:') !!}
    <p>{!! $vehicleActivity->clock_time !!}</p>
</div>

