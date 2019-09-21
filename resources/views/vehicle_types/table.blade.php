<div class="table-responsive-sm">
    <table class="table table-striped" id="vehicleTypes-table">
        <thead>
            <th>Type</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($vehicleTypes as $vehicleType)
            <tr>
                <td>{!! $vehicleType->type !!}</td>
                <td>
                    {!! Form::open(['route' => ['vehicleTypes.destroy', $vehicleType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('vehicleTypes.show', [$vehicleType->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('vehicleTypes.edit', [$vehicleType->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>