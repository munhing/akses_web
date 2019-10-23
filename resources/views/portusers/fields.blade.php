<!-- Uuid Field -->

@php
    if(! isset($uuid)) {
        $uuid = null;
    }
@endphp

<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', $uuid, ['class' => 'form-control', 'readonly']) !!}

</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    <my-select default-id="{{ isset($portuser) ? $portuser->company_id : '' }}"></my-select>
</div>

<!-- Expires On Field -->


<div class="form-group col-sm-6">
    {!! Form::label('expires_on', 'Expires On:') !!}
    <my-datepicker field-date="{{ isset($portuser) ? $portuser->expires_on : '' }}"></my-datepicker>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Profile Picture:') !!}

    <input id="photo" type="file" class="form-control" name="photo">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('portusers.index') !!}" class="btn btn-default">Cancel</a>
</div>
