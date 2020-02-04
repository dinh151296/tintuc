<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $admin['link']['index'] ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-newspaper"></i>
    </div>
    <div class="sidebar-brand-text mx-3">News Admin <sup>DNA</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo $admin['link']['index']; ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $admin['link']['category']; ?>">
      <i class="fas fa-fw fa-folder"></i>
      <span>Danh mục</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo $admin['link']['news']; ?>">
      <i class="fas fa-fw fa-folder"></i>
      <span>Tin tức</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>