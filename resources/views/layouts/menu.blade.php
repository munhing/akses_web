<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('users.index') !!}"><i class="nav-icon icon-cursor"></i><span>Users</span></a>
</li>
<li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('companies.index') !!}"><i class="nav-icon icon-cursor"></i><span>Companies</span></a>
</li>
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('roles.index') !!}"><i class="nav-icon icon-cursor"></i><span>Roles</span></a>
</li>
<li class="nav-item {{ Request::is('portusers*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('portusers.index') !!}"><i class="nav-icon icon-cursor"></i><span>Portusers</span></a>
</li>
