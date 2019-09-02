<!-- Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', $uuid, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}

    {!! Form::select('company_id', $companies, null, ['class' => 'form-control']) !!}

</div>

<!-- Expires On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expires_on', 'Expires On:') !!}
    {!! Form::text('expires_on', null, ['class' => 'form-control','id'=>'expires_on']) !!}
</div>

@section('scripts')
   <script>
           $('#expires_on').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           });
           $('#company_id').select2({
                theme: 'bootstrap'
            });
        
       </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('portusers.index') !!}" class="btn btn-default">Cancel</a>
</div>
