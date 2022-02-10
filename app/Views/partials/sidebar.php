<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text">Admin Panel</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?=  base_url('mobil') ?>" class="nav-link <?= (strpos(current_url(), 'mobil') !== false ) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-car-alt"></i>
            <p>
              Mobil
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=  base_url('pelanggan') ?>" class="nav-link <?= (strpos(current_url(), 'pelanggan') !== false ) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pelanggan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=  base_url('booking') ?>" class="nav-link <?= (strpos(current_url(), 'booking') !== false ) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Booking
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>