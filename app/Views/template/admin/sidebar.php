  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?= base_url() ?>/admin_lte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MotoGO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <?= view_cell('\App\Libraries\Menu::getProfileUser') ?>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <?= view_cell('\App\Libraries\Menu::getMenuUser') ?>

          <li class="nav-item">
                <a href="<?= site_url("") ?>" class="nav-link">                  
                  <i class="fas fa-globe-americas nav-icon"></i>
                  <p>Acessar Site</p>
                </a>
              </li>
          <li class="nav-item">
                <a href="<?= site_url("login/sair") ?>" class="nav-link">                  
                  <i class="fas fa-door-closed nav-icon"></i>
                  <p>Sair</p>
                </a>
              </li>                                             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>