<div class="table-responsive-sm">
    <table class="table table-striped" id="visitors-table">
        <thead>
            <th>Uuid</th>
        <th>Name</th>
        <th>Nric</th>
        <th>Company</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($visitors as $visitor)
            <tr>
                <td>{!! $visitor->uuid !!}</td>
            <td>{!! $visitor->name !!}</td>
            <td>{!! $visitor->nric !!}</td>
            <td>{!! $visitor->company !!}</td>
                <td>
                    {!! Form::open(['route' => ['visitors.destroy', $visitor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('visitors.show', [$visitor->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('visitors.edit', [$visitor->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>