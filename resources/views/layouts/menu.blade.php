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
<li class="nav-item {{ Request::is('activePortusers*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('activePortusers.index') !!}"><i class="nav-icon icon-cursor"></i><span>ActivePortusers</span></a>
</li>
<li class="nav-item {{ Request::is('vehicles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('vehicles.index') !!}"><i class="nav-icon icon-cursor"></i><span>Vehicles</span></a>
</li>
<li class="nav-item {{ Request::is('vehicleTypes*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('vehicleTypes.index') !!}"><i class="nav-icon icon-cursor"></i><span>VehicleTypes</span></a>
</li>

<li class="nav-item {{ Request::is('activeVehicles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('activeVehicles.index') !!}"><i class="nav-icon icon-cursor"></i><span>ActiveVehicles</span></a>
</li>
