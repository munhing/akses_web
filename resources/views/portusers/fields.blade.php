<!-- Uuid Field -->

@php
    if(! isset($uuid)) {
        $uuid = null;
    }
@endphp

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('uuid', 'Uuid:') !!}
            {!! Form::text('uuid', $uuid, ['class' => 'form-control', 'readonly']) !!}

        </div>

        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <!-- Company Id Field -->
        <div class="form-group">
            <my-select default-id="{{ isset($portuser) ? $portuser->company_id : '' }}"></my-select>
        </div>

        <!-- Expires On Field -->


        <div class="form-group">
            {!! Form::label('expires_on', 'Expires On:') !!}
            <my-datepicker field-date="{{ isset($portuser) ? $portuser->expires_on : '' }}"></my-datepicker>
        </div>
    </div>

    @php
        $photo_url = null;
        $uploadImgLabel = "Upload Photo:";

        if(isset($portuser)) {
            $uploadImgLabel = "Upload New Photo:";
            if (count($portuser->getMedia('photos')) > 0) {
                $photo_url = $portuser->getMedia('photos')->first()->getUrl('thumb');
            } 
        }
    @endphp

    <div class="col-sm-6">
        <div>
            <img src="{!! $photo_url !!}" >
        </div>
        <div class="form-group">
            {!! Form::label('photo', $uploadImgLabel) !!}

            <input id="photo" type="file" class="form-control" name="photo">
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('portusers.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
