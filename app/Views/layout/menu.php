<!-- tess -->
<li class="menu-header">Home</li>
<li><a class="nav-link" href="<?= site_url(); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

<?php if (userLogin()->role < 2) { ?>
    <li class="menu-header">Master</li>
    <li><a class="nav-link" href="<?= site_url('unitkerja'); ?>"><i class="fas fa-th"></i> <span>Unit Kerja</span></a></li>
    <li><a class="nav-link" href="<?= site_url('bagian'); ?>"><i class="fas fa-th"></i> <span>Guna Area</span></a></li>
    <li><a class="nav-link" href="<?= site_url('jabatan'); ?>"><i class="fas fa-th"></i> <span>Jenis Sertifikat</span></a></li>
<?php } ?>

<li class="menu-header">Data Areal</li>
<li><a class="nav-link" href="<?= site_url('jobdesk'); ?>"><i class="fas fa-book"></i> <span>Data Aset Lahan</span></a></li>
<li><a class="nav-link" href="<?= site_url('jobdesk'); ?>"><i class="fas fa-book"></i> <span>Data Area Bermasalah</span></a></li>

<?php if (userLogin()->role < 2) { ?>
    <li class="menu-header">Manajement Apps</li>
    <li><a class="nav-link" href="<?= site_url('user'); ?>"><i class="fas fa-user"></i> <span>Users</span></a></li>
<?php } ?>