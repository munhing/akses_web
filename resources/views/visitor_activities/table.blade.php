<div class="table-responsive-sm">
    <table class="table table-striped" id="visitorActivities-table">
        <thead>
            <th>Visitor Uuid</th>
        <th>Visitor Card Uuid</th>
        <th>Reason</th>
        <th>Clock Type</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($visitorActivities as $visitorActivity)
            <tr>
                <td>{!! $visitorActivity->visitor_uuid !!}</td>
            <td>{!! $visitorActivity->visitor_card_uuid !!}</td>
            <td>{!! $visitorActivity->reason !!}</td>
            <td>{!! $visitorActivity->clock_type !!}</td>
                <td>
                    {!! Form::open(['route' => ['visitorActivities.destroy', $visitorActivity->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('visitorActivities.show', [$visitorActivity->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('visitorActivities.edit', [$visitorActivity->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>