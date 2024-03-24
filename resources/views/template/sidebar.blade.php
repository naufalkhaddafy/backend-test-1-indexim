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

    <!-- Employee -->
    <li
        class="nav-item  {{ in_array(Route::currentRouteName(), ['employee', 'employee.create', 'employee.show']) ? 'active' : '' }}">
        <a class="nav-link {{ in_array(Route::currentRouteName(), ['employee', 'employee.create', 'employee.show']) ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseEmployee" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Employees</span>
        </a>
        <div id="collapseEmployee"
            class="collapse {{ in_array(Route::currentRouteName(), ['employee', 'employee.create', 'employee.show']) ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item  {{ in_array(Route::currentRouteName(), ['employee', 'employee.show']) ? 'active' : '' }}"
                    href="{{ route('employee') }}">List of Employee</a>
                <a class="collapse-item  {{ in_array(Route::currentRouteName(), ['employee.create']) ? 'active' : '' }}"
                    href="{{ route('employee.create') }}">New Employee</a>
            </div>
        </div>
    </li>

    <!-- Attendance -->
    <li class="nav-item  {{ in_array(Route::currentRouteName(), ['shift', 'attendance']) ? 'active' : '' }}">
        <a class="nav-link {{ in_array(Route::currentRouteName(), ['shift', 'attendance']) ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseAttendance" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="far fa-calendar-check"></i>
            <span>Attendance</span>
        </a>
        <div id="collapseAttendance"
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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
