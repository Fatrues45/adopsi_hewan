<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="<?= base_url('admin/dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-paw" ></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Teman Sejati</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Data -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-database"></i>
                    <span>Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">ut</h6> -->
                        <a class="collapse-item" href="<?= base_url('hewan') ?>">Data Hewan</a>
                        <a class="collapse-item" href="<?= base_url('admin/pengajuan_adopsi') ?>">Data Adopsi</a>
                        <!-- <a class="collapse-item" href="utilities-other.html"></a> -->
                    </div>
                </div>
            </li>                   
           <!-- Nav Item - Donasi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
                    aria-expanded="true" aria-controls="collapse2">
                    <i class="fas fa-wallet"></i>
                    <span>Donasi</span>
                </a>
                <div id="collapse2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">ut</h6> -->
                         <a class="collapse-item" href="<?= base_url('donasi_admin') ?>">Donatur</a>
                        <a class="collapse-item" href="<?= base_url('dokum') ?>">Dokumentasi</a>
                        <!-- <a class="collapse-item" href="utilities-other.html"></a> -->
                    </div>
                </div>
            </li>
            </li>
        <!-- Nav Item - Tanggal (Toggle) -->
            <li class="nav-item">
                <a class="nav-link" href="">
                   <i class="fas fa-clock"></i>
                    <span><?= date('d-m-Y') ?></span></a>   
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

        </ul>
        <!-- End of Sidebar -->