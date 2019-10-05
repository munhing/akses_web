<!-- Vehicle Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicle_uuid', 'Vehicle Uuid:') !!}
    {!! Form::text('vehicle_uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Clock Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clock_type', 'Clock Type:') !!}
    {!! Form::number('clock_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Clock Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clock_time', 'Clock Time:') !!}
    {!! Form::text('clock_time', null, ['class' => 'form-control','id'=>'clock_time']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#clock_time').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicleActivities.index') !!}" class="btn btn-default">Cancel</a>
</div>
