<div class="table-responsive-sm">
    <table class="table table-striped" id="activeVisitors-table">
        <thead>
            <th>Visitor Uuid</th>
        <th>Visitor Card Uuid</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($activeVisitors as $activeVisitor)
            <tr>
                <td>{!! $activeVisitor->visitor_uuid !!}</td>
            <td>{!! $activeVisitor->visitor_card_uuid !!}</td>
                <td>
                    {!! Form::open(['route' => ['activeVisitors.destroy', $activeVisitor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('activeVisitors.show', [$activeVisitor->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('activeVisitors.edit', [$activeVisitor->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>