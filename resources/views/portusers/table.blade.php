<div class="table-responsive">
    <table class="table" id="portusers-table">
        <thead>
            <tr>
                <th>Uuid</th>
        <th>Name</th>
        <th>Company Id</th>
        <th>Expires On</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($portusers as $portuser)
            <tr>
                <td>{!! $portuser->uuid !!}</td>
            <td>{!! $portuser->name !!}</td>
            <td>{!! $portuser->company_id !!}</td>
            <td>{!! $portuser->expires_on !!}</td>
                <td>
                    {!! Form::open(['route' => ['portusers.destroy', $portuser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('portusers.show', [$portuser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('portusers.edit', [$portuser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
