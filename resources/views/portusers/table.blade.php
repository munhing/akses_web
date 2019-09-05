<div class="table-responsive-sm">
    <table class="table table-striped" id="portusers-table">
        <thead>
        <th>Name</th>
        <th>Company</th>
        <th>QR Code</th>
        <th>Expires On</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($portusers as $portuser)
            @php
                $qrcode = 'type=1&uuid='. $portuser->uuid
            @endphp
            <tr>
            <td>{!! $portuser->name !!}</td>
            <td>{!! $companies->find($portuser->company_id)->name !!}</td>
            <td>{!! $qrcode !!}</td>
            <td>{!! $portuser->expires_on->format('Y-m-d') !!}</td>
                <td>
                    {!! Form::open(['route' => ['portusers.destroy', $portuser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="#" onClick="window.open('{!! route('portusers.show_qrcode', [$portuser->id]) !!}','QRCode','resizable,height=500,width=400'); return false;" class='btn btn-ghost-primary'><i class="fa fa-qrcode"></i></a>
                        <a href="{!! route('portusers.show', [$portuser->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('portusers.edit', [$portuser->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>