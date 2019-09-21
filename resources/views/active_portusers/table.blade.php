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
        @foreach($activePortusers as $activePortuser)
            <tr>
                <td class="text-center">
                <div class="avatar">
                    <img class="img-avatar" src="{!! $activePortuser->portuser->getMedia('photos')->first()->getUrl('thumb') !!}" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
                </td>
                <td>
                <div>{!! $activePortuser->portuser->name !!}</div>
                <div class="small text-muted">
                    <span>{!! $activePortuser->portuser->company->name !!}</span>
                    | {!! $activePortuser->portuser->uuid !!}
                </div>
                </td>
                <td>
                    {!! Form::open(['route' => ['activePortusers.destroy', $activePortuser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('activePortusers.show', [$activePortuser->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('activePortusers.edit', [$activePortuser->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>    
</div>