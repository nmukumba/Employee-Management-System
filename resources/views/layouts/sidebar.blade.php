<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{ Request::is('employees*') || Request::is('employees/*') ? 'active' : '' }}"><a href="/employees"><i class="fa fa-user"></i> <span>Employees</span></a></li>
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Employees</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <li><a href="/employees"><i class="fa fa-user"></i> Employees</a></li>
          <ul class="treeview-menu">
            <li><a href="/employee/create"><i class="fa fa-user-plus"></i> Add Employee</a></li>
            <li><a href="/employees"><i class="fa fa-user"></i> Employees</a></li>
            <li><a href="/ex/employee/create"><i class="fa fa-user-plus"></i> Add Ex-Employee</a></li>
            <li><a href="/ex/employees"><i class="fa fa-user-times"></i> Ex-Employees</a></li>
          </ul>
        </li> -->
        <li class="{{ Request::is('companies*') || Request::is('companies/*') ? 'active' : '' }}"><a href="/companies"><i class="fa fa-industry"></i> <span>Companies</span></a></li>
        <li class="{{ Request::is('branches/*') ? 'active' : '' }}"><a href="/branches"><i class="fa fa-building-o"></i> <span>Branches</span></a></li>
        <li class="{{ Request::is('departments/*') ? 'active' : '' }}"><a href="/departments"><i class="fa fa-building"></i> <span>Departments</span></a></li>
        <li class="{{ Request::is('roles/*') ? 'active' : '' }}"><a href="/roles"><i class="fa fa-cogs"></i> <span>Roles</span></a></li>
        <li class="{{ Request::is('document/types/*') ? 'active' : '' }}"><a href="/document/types"><i class="fa fa-file-pdf-o"></i> <span>Document Types</span></a></li>
        <li class="{{ Request::is('qualification/types/*') ? 'active' : '' }}"><a href="/qualification/types"><i class="fa fa-graduation-cap"></i> <span>Qualification Types</span></a></li>
        <li class="{{ Request::is('leave/types/*') ? 'active' : '' }}"><a href="/leave/types"><i class="fa fa-list"></i> <span>Leave Types</span></a></li>
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>E-Recrutment</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/vacancies/create"><i class="fa fa-user-plus"></i> Add Vacancy</a></li>
            <li><a href="/vacancies"><i class="fa fa-user"></i> Vacancies</a></li>
            <li><a href="/candidates"><i class="fa fa-user-times"></i> Candidates</a></li>
          </ul>
        </li> -->
        <li class="{{ Request::is('reports/*') ? 'active' : '' }}"><a href="/reports/downloadable"><i class="fa fa-bar-chart"></i> <span>Reports</span></a></li>
        @if (Auth::user()->user_type_id == 1)
          <li class="{{ Request::is('user/types/*') ? 'active' : '' }}"><a href="/user/types"><i class="fa fa-users"></i> <span>User Types</span></a></li>
        @endif
         @if (Auth::user()->user_type_id == 1)
          <li class="{{ Request::is('users/*') ? 'active' : '' }}"><a href="/users"><i class="fa fa-users"></i> <span>Users</span></a></li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>