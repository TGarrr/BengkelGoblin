        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class='fab fa-grunt' style='font-size:48px; color:red'></i></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bengkel Goblin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Looping Menu-->
            <div class="sidebar-heading">
                Home
            </div>
            <li class="nav-item active">
                <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                    <i class="fa fa-fw fa book"></i>
                    <span>Dashboard</span></a>
            </li>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('sparepart'); ?>">
                    <i class="fa fa-fw fa book"></i>
                    <span>Data Sparepart</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('user/anggota'); ?>">
                    <i class="fa fa-fw fa book"></i>
                    <span>Data Anggota</span></a>
            </li>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar --   > 
        
        