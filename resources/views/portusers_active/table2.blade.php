
@foreach($portusersActive as $portuserActive)
    <div class="col-sm-3 col-lg-2">

        @php
            if (count($portuserActive->portuser->getMedia('photos')) > 0) {
                $photo_url = $portuserActive->portuser->getMedia('photos')->first()->getUrl('thumb');
            } else {
                $photo_url = '/storage/0/conversions/default-thumb.jpg';
            }
        @endphp

        <profile-component photo_url="{!! $photo_url!!}" name="{!! $portuserActive->portuser->name !!}" company="{!! $portuserActive->portuser->company->name !!}"></profile-component>

    </div>
    <!-- /.col--> 
@endforeach

