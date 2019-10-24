@php
    if (count($portuser->getMedia('photos')) > 0) {
        $photo_url = $portuser->getMedia('photos')->first()->getUrl('thumb');
    } else {
        $photo_url = null;
    }

    $qrcode = 'type=1&uuid='. $portuser->uuid;
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
            <div class="chart-wrapper mx-auto" style="height:200px;width:150px">
                <div class="avatar-lg" style="height:150px;width:150px">
                    <img class="img-avatar" src="{!! $photo_url !!}">
                </div>
            </div>
            <div class="text-value-lg text-primary">{!! $portuser->name !!}</div>
            <div class="text-muted font-weight-bold">{!! $portuser->company->name !!}</div>
            <div class="text-muted font-weight-bold">Expires on <span class="badge badge-secondary">{{ date('d M Y', strtotime($portuser->expires_on)) }}<span></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
            <div class="text-muted text-uppercase font-weight-bold">QR Code</div>
            <div class="chart-wrapper mx-auto" style="height:250px;width:250px">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate($qrcode)) !!} ">
            </div>
            <div class="text-muted font-weight-bold">{!! $qrcode !!}</div>
            </div>
        </div>
    </div>

</div>