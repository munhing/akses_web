<div class="table-responsive-sm">
    <table class="table table-hover table-outline table-striped mb-0">
        <thead class="thead-light">
        <tr>
            <th class="text-center">
                <i class="icon-people"></i>
            </th>
            <th>Portuser</th>
            <th>Activity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($portusersActive as $portuserActive)
            <tr>
                <td class="text-center">
                <div class="avatar">
                    <img class="img-avatar" src="{!! $portuserActive->portuser->getMedia('photos')->first()->getUrl('thumb') !!}" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
                </td>
                <td>
                <div>{!! $portuserActive->portuser->name !!}</div>
                <div class="small text-muted">
                    <span>{!! $portuserActive->portuser->company->name !!}</span>
                    | {!! $portuserActive->portuser->uuid !!}
                </div>
                </td>
                <td>
                    {!! Form::open(['route' => ['portusersActive.destroy', $portuserActive->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('portusersActive.show', [$portuserActive->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('portusersActive.edit', [$portuserActive->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>    
</div>