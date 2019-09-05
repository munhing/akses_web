
@php
    $qrcode = 'type=1&uuid='. $portuser->uuid
@endphp

<p><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate($qrcode)) !!} "></p>
{!! Form::label('qrcode', 'QRCode:') !!}
<p>{!! $qrcode !!}</p>