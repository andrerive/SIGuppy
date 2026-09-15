<!-- Sidebar -->
      <div class="sidebar" data-background-color="white">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header">
            <a href="index.php" class="logo d-flex align-items-center">
              <i class="fas fa-map-marker-alt" style="font-size: 26px; color: #2196F3; margin-right: 8px;"></i>
              <div>
                <div style="font-weight: 700; font-size: 17px; color: #1a237e; line-height: 1;">SIGuppy</div>
                <div style="font-size: 10px; color: #7a869a; line-height: 1;">Control Biológico contra el Dengue</div>
              </div>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">

              <li class="nav-item <?php echo !isset($_GET['modulo']) ? 'active' : ''; ?>">
                <a href="index.php">
                  <i class="fas fa-home"></i>
                  <p>Resumen</p>
                </a>
              </li>

              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] === 'reportes') ? 'active' : ''; ?>">
                <a href="index.php?modulo=reportes">
                  <i class="fas fa-chart-bar"></i>
                  <p>Reportes</p>
                </a>
              </li>

              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] === 'zoocriadero') ? 'active' : ''; ?>">
                <a href="index.php?modulo=zoocriadero">
                  <i class="fas fa-fish"></i>
                  <p>Zoocriaderos</p>
                </a>
              </li>

              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] === 'control_terreno') ? 'active' : ''; ?>">
                <a href="index.php?modulo=control_terreno">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>Terreno</p>
                </a>
              </li>

              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] === 'usuarios') ? 'active' : ''; ?>">
                <a href="index.php?modulo=usuarios">
                  <i class="fas fa-users"></i>
                  <p>Usuarios</p>
                </a>
              </li>

              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] === 'configuraciones') ? 'active' : ''; ?>">
                <a href="index.php?modulo=configuraciones">
                  <i class="fas fa-cog"></i>
                  <p>Configuraciones</p>
                </a>
              </li>

            </ul>

            <div class="px-3 mt-4">
              <a href="../lib/helpersLogin.php?accion=logout" class="btn btn-outline-danger btn-block w-100">
                <i class="fas fa-sign-out-alt me-1"></i> Cerrar Sesión
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->