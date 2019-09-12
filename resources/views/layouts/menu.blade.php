<li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('dashboard') !!}"><i class="nav-icon icon-speedometer"></i><span>Dashboard</span></a>
</li>
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
<li class="nav-item {{ Request::is('portusersActive*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('portusersActive.index') !!}"><i class="nav-icon icon-cursor"></i><span>PortusersActive</span></a>
</li>
