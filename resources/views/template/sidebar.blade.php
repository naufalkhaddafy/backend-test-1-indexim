<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">Indexim Coalindo</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ in_array(Route::currentRouteName(), ['dashboard']) ? 'active' : '' }}">
        <a class="nav-link " href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ in_array(Route::currentRouteName(), ['employee']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('employee') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Employee</span></a>
    </li>
    <!-- Divider -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  {{ in_array(Route::currentRouteName(), ['shift', 'attendance']) ? 'active' : '' }}">
        <a class="nav-link {{ in_array(Route::currentRouteName(), ['shift', 'attendance']) ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="far fa-calendar-check"></i>
            <span>Attendance</span>
        </a>
        <div id="collapseTwo"
            class="collapse {{ in_array(Route::currentRouteName(), ['shift', 'attendance']) ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item  {{ in_array(Route::currentRouteName(), ['shift']) ? 'active' : '' }}"
                    href="{{ route('shift') }}">Shift</a>
                <a class="collapse-item  {{ in_array(Route::currentRouteName(), ['attendance']) ? 'active' : '' }}"
                    href="{{ route('attendance') }}">Report Attendance</a>
            </div>
        </div>
    </li>

</ul>
