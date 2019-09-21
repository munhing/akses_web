<div class="table-responsive-sm">
    <table class="table table-striped" id="vehicles-table">
        <thead>
            <th>Uuid</th>
        <th>Plate No</th>
        <th>Company Id</th>
        <th>Vehicle Type Id</th>
        <th>Expires On</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{!! $vehicle->uuid !!}</td>
            <td>{!! $vehicle->plate_no !!}</td>
            <td>{!! $vehicle->company_id !!}</td>
            <td>{!! $vehicle->vehicle_type_id !!}</td>
            <td>{!! $vehicle->expires_on !!}</td>
                <td>
                    {!! Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('vehicles.show', [$vehicle->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('vehicles.edit', [$vehicle->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>