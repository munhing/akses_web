<!-- Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Plate No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate_no', 'Plate No:') !!}
    {!! Form::text('plate_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vehicle Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicle_type_id', 'Vehicle Type Id:') !!}
    {!! Form::number('vehicle_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Expires On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expires_on', 'Expires On:') !!}
    {!! Form::text('expires_on', null, ['class' => 'form-control','id'=>'expires_on']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#expires_on').datetimepicker({
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
    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Cancel</a>
</div>
