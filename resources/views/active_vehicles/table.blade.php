<div class="table-responsive-sm">
    <table class="table table-striped" id="activeVehicles-table">
        <thead>
            <th>Vehicle Uuid</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($activeVehicles as $activeVehicle)
            <tr>
                <td>{!! $activeVehicle->vehicle_uuid !!}</td>
                <td>
                    {!! Form::open(['route' => ['activeVehicles.destroy', $activeVehicle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('activeVehicles.show', [$activeVehicle->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('activeVehicles.edit', [$activeVehicle->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>