<li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('dashboard') !!}"><i class="nav-icon icon-speedometer text-success"></i><span>Dashboard</span></a>
</li>
<li class="nav-item {{ Request::is('activePortusers*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('activePortusers.index') !!}"><i class="nav-icon icon-people text-primary"></i><span>Active Portusers</span></a>
</li>
<li class="nav-item {{ Request::is('activeVehicles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('activeVehicles.index') !!}"><i class="nav-icon fa fa-car text-warning"></i><span>Active Vehicles</span></a>
</li>
<li class="nav-item {{ Request::is('activeVisitors*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('activeVisitors.index') !!}"><i class="nav-icon fa fa-users text-danger"></i><span>Active Visitors</span></a>
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

<li class="nav-item {{ Request::is('vehicles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('vehicles.index') !!}"><i class="nav-icon icon-cursor"></i><span>Vehicles</span></a>
</li>
<li class="nav-item {{ Request::is('vehicleTypes*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('vehicleTypes.index') !!}"><i class="nav-icon icon-cursor"></i><span>Vehicle Types</span></a>
</li>


<li class="nav-item {{ Request::is('visitors*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('visitors.index') !!}"><i class="nav-icon icon-cursor"></i><span>Visitors</span></a>
</li>
<li class="nav-item {{ Request::is('visitorCards*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('visitorCards.index') !!}"><i class="nav-icon icon-cursor"></i><span>Visitor Pass</span></a>
</li>

