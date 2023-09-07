<!-- tess -->
<li class="menu-header">Home</li>
<li><a class="nav-link" href="<?= site_url(); ?>"><i class="fas fa-fire" style="color: #6777ef;"></i> <span>Dashboard</span></a></li>

<?php if (userLogin()->role < 2) { ?>
    <li class="menu-header">Master</li>
    <li><a class="nav-link" href="<?= site_url('guna'); ?>"><i class="fas fa-map-signs" style="color: #6777ef;"></i> <span>Guna Area</span></a></li>
    <li><a class="nav-link" href="<?= site_url('sertifikat'); ?>"><i class="fas fa-file" style="color: #6777ef;"></i> <span>Jenis Sertifikat</span></a></li>
<?php } ?>

<li class="menu-header">Data Areal</li>
<li><a class="nav-link" href="<?= site_url('areaaset'); ?>"><i class="fas fa-map" style="color: #47c363;"></i> <span>Data Aset Lahan</span></a></li>
<li><a class="nav-link" href="<?= site_url('areaokupasi'); ?>"><i class="fas fa-map" style="color: #fc544b;"></i> <span>Data Area Okupasi</span></a></li>

<li class="menu-header">Monitoring Legal Aset</li>
<li><a class="nav-link" href="<?= site_url('project'); ?>"><i class="fas fa-university"></i> <span>Data Pengurusan Legal Aset <b style="color: red;">(Cooming Soon)</b></span></a></li>
<!-- <li><a class="nav-link" href="<?= site_url('areaokupasi'); ?>"><i class="fas fa-map" style="color: #fc544b;"></i> <span>Data Area Okupasi</span></a></li> -->

<!-- <li class="menu-header">Monitoring Kasus Hukum</li>
<li><a class="nav-link" href="#"><i class="fas fa-gavel"></i> <span>Data Kasus Hukum</span></a></li> -->
<!-- <li><a class="nav-link" href="<?= site_url('areaokupasi'); ?>"><i class="fas fa-map" style="color: #fc544b;"></i> <span>Data Area Okupasi</span></a></li> -->

<?php if (userLogin()->role < 2) { ?>
    <li class="menu-header">Manajement Apps</li>
    <li><a class="nav-link" href="<?= site_url('unitkerja'); ?>"><i class="fas fa-map-pin" style="color: #6777ef;"></i> <span>Unit Kerja</span></a></li>
    <li><a class="nav-link" href="<?= site_url('user'); ?>"><i class="fas fa-user" style="color: #6777ef;"></i> <span>Users</span></a></li>
<?php } ?>