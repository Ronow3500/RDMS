  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('./assets/images/logo.png') }}" alt="TIFA Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" title="Respondents Database Management System">
        {{ config('app.name') ?? 'RDMS' }}
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user.profile') }}" class="d-block">
              {{ auth()->user()->name ?? '' }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      @can('is-admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                  <i class="fas fa-user-lock nav-icon"></i>
                  <p>System Users</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
        @endcan
      
      @can('is-staff')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              
              <p>
                 Database
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('respondents.index') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Respondents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('project.index') }}" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
            </ul>
        </li>
        <!-- Options Management Menu -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link active">
              
            <p>
              Options Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('gender.index') }}" class="nav-link">
                <i class="fas fa-venus-mars nav-icon"></i>
                <p>Gender</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('region.index') }}" class="nav-link">
                <i class="fas fa-globe nav-icon"></i>
                <p>Regions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('county.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Counties</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sub_county.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Sub Counties</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('district.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Districts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('division.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Divisions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('location.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Locations</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sub_location.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Sub Locations</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ward.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Wards</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('constituency.index') }}" class="nav-link">
                <i class="fas fa-map nav-icon"></i>
                <p>Constituencies</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('age_group.index') }}" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Age Group</p>
              </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('education_level.index') }}" class="nav-link">
                <i class="fas fa-book-reader nav-icon"></i>
                <p>Education Levels</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('marital_status.index') }}" class="nav-link">
                <i class="fas fa-ring nav-icon"></i>
                <p>Marital Status</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('religion.index') }}" class="nav-link">
                <i class="fas fa-place-of-worship nav-icon"></i>
                <p>Religions</p>
            </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ethnic_group.index') }}" class="nav-link">
                <i class="fas fa-house-user nav-icon"></i>
                <p>Ethnic Groups</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('employment_status.index') }}" class="nav-link">
                <i class="fas fa-address-card nav-icon"></i>
                <p>Employment Status</p>
              </a>
            </li>

            </ul>
        </li>
        </ul>
        @endcan

      @can('is-files-manager')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- FTP -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              
              <p>
                 FTP
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('ftp/index') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Upload File(s)</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
      @endcan

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>