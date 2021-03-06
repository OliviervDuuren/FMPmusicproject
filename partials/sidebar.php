<?php if ($_SESSION['role'] == "Teacher") : ?>

  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <!-- <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div> -->
      <div class="sidebar-brand-text mx-3">maestro</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($active_page == 'dashboard'){echo "active";}?>">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($active_page == 'leerlingen'){echo "active";}?>">
      <a class="nav-link" href="students.php">
        <i class="fas fa-fw fa-child"></i>
        <span>Leerlingen</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($active_page == 'projectblokken'){echo "active";}?>">
      <a class="nav-link" href="projectblocks.php">
        <i class="fas fa-fw fa-cube"></i>
        <span>Alle blokken</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
<?php endif; ?>
