<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $portuserActivity->id !!}</p>
</div>

<!-- Portuser Uuid Field -->
<div class="form-group">
    {!! Form::label('portuser_uuid', 'Portuser Uuid:') !!}
    <p>{!! $portuserActivity->portuser_uuid !!}</p>
</div>

<!-- Clock Type Field -->
<div class="form-group">
    {!! Form::label('clock_type', 'Clock Type:') !!}
    <p>{!! $portuserActivity->clock_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $portuserActivity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $portuserActivity->updated_at !!}</p>
</div>

