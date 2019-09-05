<div class="col-md-6">
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $portuser->id !!}</p>
</div>

<!-- Uuid Field -->
<div class="form-group">
    {!! Form::label('uuid', 'Uuid:') !!}
    <p>{!! $portuser->uuid !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $portuser->name !!}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{!! $portuser->company_id !!}</p>
</div>

<!-- Expires On Field -->
<div class="form-group">
    {!! Form::label('expires_on', 'Expires On:') !!}
    <p>{!! $portuser->expires_on !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $portuser->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $portuser->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $portuser->updated_at !!}</p>
</div>
</div>

<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('qrcode', 'QRCode:') !!}
        @php
            $qrcode = 'type=1&uuid='. $portuser->uuid
        @endphp
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate($qrcode)) !!} ">
    </div>
</div>

@php
    if (count($portuser->getMedia('photos')) > 0) {
        $photo_url = $portuser->getMedia('photos')->first()->getUrl();
    } else {
        $photo_url = null;
    }
@endphp

<div class="col-md-6">
    <img src="{!! $photo_url !!}" >
</div>