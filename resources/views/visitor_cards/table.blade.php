<div class="table-responsive-sm">
    <table class="table table-striped" id="visitorCards-table">
        <thead>
            <th>Description</th>
        <th>Uuid</th>
        <th>Visitor Uuid</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($visitorCards as $visitorCard)
            <tr>
                <td>{!! $visitorCard->description !!}</td>
            <td>{!! $visitorCard->uuid !!}</td>
            <td>{!! $visitorCard->visitor_uuid !!}</td>
                <td>
                    {!! Form::open(['route' => ['visitorCards.destroy', $visitorCard->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('visitorCards.show', [$visitorCard->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('visitorCards.edit', [$visitorCard->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>