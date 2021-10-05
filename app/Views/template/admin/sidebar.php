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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/admin_lte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">             
              <i class="nav-icon fab fa-wpforms"></i>
              <p>
                Cadastros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url("restrito/empresa/index") ?>" class="nav-link">
                  <i class="far fa-building nav-icon"></i>
                  <p>Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url("restrito/motoboy/index") ?>" class="nav-link">                  
                  <i class="fas fa-motorcycle nav-icon"></i>
                  <p>Motoboy</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="<?= site_url("restrito/usuario/index") ?>" class="nav-link">                  
                  <i class="fas fa-user nav-icon"></i>
                  <p>Usuários</p>
                </a>
              </li>          
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= site_url("restrito/entrega/index") ?>" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Entregas
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> 
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