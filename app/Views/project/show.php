<?php

use PhpParser\Node\Stmt\Echo_;
?>
<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Pengurusan Legal Aset - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Pengurusan Legal Aset <b style="color: red;">(COOMING SOON)</b></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Data Pengurusan Legal Aset</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-8 ">
                            <h4>Detail Project</h4>
                        </div>
                        <div class="col-lg-4 p-0">
                            <div class="card-button" style="float: right;">
                                <a href="<?= site_url('project'); ?>">
                                    <button class="btn btn-danger btn-lg">
                                        Kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Menu Tab Atas -->
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="project-view" data-toggle="tab" href="#project-view2" role="tab" aria-controls="project-view" aria-selected="true">Project</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="milestone-view" data-toggle="tab" href="#milestone-view2" role="tab" aria-controls="milestone-view" aria-selected="false">Milestone</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="task-view" data-toggle="tab" href="#task-view2" role="tab" aria-controls="task-view" aria-selected="false">Task</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="history-view" data-toggle="tab" href="#history-view2" role="tab" aria-controls="history-view" aria-selected="false">Log</a>
                            </li>
                        </ul>
                        <!-- END Menu Tab Atas -->

                        <!-- CONTENT -->
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <!-- PROJECT DETAILS -->
                            <div class="tab-pane fade show active" id="project-view2" role="tabpanel" aria-labelledby="project-view">
                                <table class="table table-bordered table-striped" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="width:30%">Nama Lahan aset</td>
                                            <td style="width:70%">Tess</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Project</td>
                                            <td>Project 1</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>Project 1 ini merupakan pengurusan sertifikat lahan A</td>
                                        </tr>
                                        <tr>
                                            <td>Start Project Date</td>
                                            <td>20 Agustus 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Plan End Project Date</td>
                                            <td>20 Agustus 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <div class="badge badge-warning">ON-Progres</div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="card-header">
                                    <div class="col-lg-8 ">
                                        <h4>Milestone</h4>
                                    </div>
                                    <div class="col-lg-4 p-0">
                                        <div class="card-button" style="float: right;">
                                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalForm1">
                                                Tambah Milestone
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><b>Project Pengurusan Lahan A</b>
                                            <div class="table-links">
                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            Pengurusan Lahan
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                            </a>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success">Selesai</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><b>Project Pengurusan Lahan B</b>
                                            <div class="table-links">
                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            Pengurusan Lahan
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                            </a>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success">Selesai</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><b>Project Pengurusan Lahan C</b>
                                            <div class="table-links">
                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            Pengurusan Lahan
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                            </a>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success">Selesai</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><b>Project Pengurusan Lahan D</b>
                                            <div class="table-links">
                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            Pengurusan Lahan
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                            </a>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-warning">Progress</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><b>Project Pengurusan Lahan E</b>
                                            <div class="table-links">
                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            Pengurusan Lahan
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                            </a>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-danger">Belum</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- END PROJECT DETAILS -->

                            <!-- MILESTONES -->
                            <div class="tab-pane fade" id="milestone-view2" role="tabpanel" aria-labelledby="milestone-view">
                                <div class="row">
                                    <!-- Tab Samping Kiri -->
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Milestones 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Milestones 2</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="btn btn-icon icon-left" data-toggle="modal" href="#modalForm1" style="color: #6777ef;"><i class="fa fa-plus"></i> Tambah Milestones</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END Tab Samping Kiri -->

                                    <!-- Tab Samping Kanan -->
                                    <div class="col-12 col-sm-12 col-md-9">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                                <!-- MILESTONES DETAILS -->
                                                <table class="table table-bordered table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">Nama Lahan aset</td>
                                                            <td style="width:70%">Tess</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Project</td>
                                                            <td>Project 1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Deskripsi</td>
                                                            <td>Project 1 ini merupakan pengurusan sertifikat lahan A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Start Project Date</td>
                                                            <td>20 Agustus 2023</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plan End Project Date</td>
                                                            <td>20 Agustus 2023</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>
                                                                <div class="badge badge-warning">ON-Progres</div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <div class="card-header">
                                                    <div class="col-lg-8 ">
                                                        <h4>Task</h4>
                                                    </div>
                                                    <div class="col-lg-4 p-0">
                                                        <div class="card-button" style="float: right;">
                                                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalForm2">
                                                                Tambah Task
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- MILESTONES TASK -->
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th class="text-center pt-2">
                                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Author</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><b>Project Pengurusan Lahan A</b>
                                                            <div class="table-links">
                                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                                <div class="bullet"></div>
                                                                <a href="#">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="#" class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            Pengurusan Lahan
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                                            </a>
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-success">Selesai</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><b>Project Pengurusan Lahan B</b>
                                                            <div class="table-links">
                                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                                <div class="bullet"></div>
                                                                <a href="#">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="#" class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            Pengurusan Lahan
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                                            </a>
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-success">Selesai</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><b>Project Pengurusan Lahan C</b>
                                                            <div class="table-links">
                                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                                <div class="bullet"></div>
                                                                <a href="#">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="#" class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            Pengurusan Lahan
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                                            </a>
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-success">Selesai</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><b>Project Pengurusan Lahan D</b>
                                                            <div class="table-links">
                                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                                <div class="bullet"></div>
                                                                <a href="#">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="#" class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            Pengurusan Lahan
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                                            </a>
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-warning">Progress</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><b>Project Pengurusan Lahan E</b>
                                                            <div class="table-links">
                                                                <a href="<?= site_url('project/show'); ?>">View</a>
                                                                <div class="bullet"></div>
                                                                <a href="#">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="#" class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            Pengurusan Lahan
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1">Ade Kurniawan</div>
                                                            </a>
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-danger">Belum</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade active show" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, et! Ipsa nesciunt, dolore labore magnam quos earum fugiat? Harum, corporis nobis! Mollitia consequatur minima animi itaque quos alias asperiores nesciunt voluptas molestias et, expedita omnis atque minus. Delectus, quos dolorum. Reiciendis deleniti eos harum ad quaerat voluptatibus veritatis autem officiis rem adipisci at, facilis temporibus quibusdam facere placeat, illum omnis, error perferendis dolore mollitia! Odit dicta quo assumenda sit, ut illum repudiandae fugiat deleniti veritatis sed ratione eos doloribus, et consequatur quibusdam debitis quae reiciendis corporis, enim nam voluptate similique natus. Debitis id corrupti numquam soluta atque totam, quaerat omnis.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Tab Samping Kanan -->

                                </div>
                            </div>
                            <!-- END MILESTONES -->

                            <!-- TASK -->
                            <div class="tab-pane fade" id="task-view2" role="tabpanel" aria-labelledby="task-view">
                                <div class="row">
                                    <div class="col-lg-3 ">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="text-center pt-2">
                                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Title</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><b>Project Pengurusan Lahan A</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><b>Project Pengurusan Lahan A</b>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="col-lg-9 ">
                                        <table class="table table-bordered table-striped" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <td style="width:30%">Nama Lahan aset</td>
                                                    <td style="width:70%">Tess</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Project</td>
                                                    <td>Project 1</td>
                                                </tr>
                                                <tr>
                                                    <td>Deskripsi</td>
                                                    <td>Project 1 ini merupakan pengurusan sertifikat lahan A</td>
                                                </tr>
                                                <tr>
                                                    <td>Start Project Date</td>
                                                    <td>20 Agustus 2023</td>
                                                </tr>
                                                <tr>
                                                    <td>Plan End Project Date</td>
                                                    <td>20 Agustus 2023</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        <div class="badge badge-warning">ON-Progres</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END TASK -->

                            <!-- LOG -->
                            <div class="tab-pane fade" id="history-view2" role="tabpanel" aria-labelledby="history-view">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="activities">
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-comment-alt"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span class="text-job text-primary">2 min ago</span>
                                                        <span class="bullet"></span>
                                                        <a class="text-job" href="#">View</a>
                                                        <div class="float-right dropdown">
                                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-title">Options</div>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Have commented on the task of "<a href="#">Responsive design</a>".</p>
                                                </div>
                                            </div>
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-arrows-alt"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span class="text-job">1 hour ago</span>
                                                        <span class="bullet"></span>
                                                        <a class="text-job" href="#">View</a>
                                                        <div class="float-right dropdown">
                                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-title">Options</div>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Moved the task "<a href="#">Fix some features that are bugs in the master module</a>" from Progress to Finish.</p>
                                                </div>
                                            </div>
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-unlock"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span class="text-job">4 hour ago</span>
                                                        <span class="bullet"></span>
                                                        <a class="text-job" href="#">View</a>
                                                        <div class="float-right dropdown">
                                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-title">Options</div>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Login to the system with ujang@maman.com email and location in Bogor.</p>
                                                </div>
                                            </div>
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span class="text-job">12 hour ago</span>
                                                        <span class="bullet"></span>
                                                        <a class="text-job" href="#">View</a>
                                                        <div class="float-right dropdown">
                                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-title">Options</div>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Log out of the system after 6 hours using the system.</p>
                                                </div>
                                            </div>
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span class="text-job">Yesterday</span>
                                                        <span class="bullet"></span>
                                                        <a class="text-job" href="#">View</a>
                                                        <div class="float-right dropdown">
                                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-title">Options</div>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Removing task "Delete all unwanted selectors in CSS files".</p>
                                                </div>
                                            </div>
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span class="text-job">Yesterday</span>
                                                        <span class="bullet"></span>
                                                        <a class="text-job" href="#">View</a>
                                                        <div class="float-right dropdown">
                                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-title">Options</div>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Assign the task of "<a href="#">Redesigning website header and make it responsive AF</a>" to <a href="#">Syahdan Ubaidilah</a>.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END LOG -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- modal here -->
<div class="modal fade" id="modalForm1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Milestone</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- <p class="statusMsg"></p> -->
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('project') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="nama_project_m" placeholder="input milestone title" value="<?= old('nama_project_m'); ?>" class="form-control <?= isset($errors['nama_project_m']) ? 'is-invalid' : null; ?>" id="nama_project_m"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_project_m']) ? $errors['nama_project_m'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Milestone</label>
                        <textarea name="des_project_m" placeholder="Input deskripsi milestones" class="form-control <?= isset($errors['des_project_m']) ? 'is-invalid' : null; ?>"><?= old('des_project_m'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['des_project_m']) ? $errors['des_project_m'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mulai Milestone</label>
                        <input type="date" name="start_project_m" value="<?= old('start_project_m'); ?>" class="form-control <?= isset($errors['start_project_m']) ? 'is-invalid' : null; ?>" id="start_project_m">
                        <div class="invalid-feedback"><?= isset($errors['start_project_m']) ? $errors['start_project_m'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name="end_project_m" value="<?= old('end_project_m'); ?>" class="form-control <?= isset($errors['end_project_m']) ? 'is-invalid' : null; ?>" id="end_project_m">
                        <div class="invalid-feedback"><?= isset($errors['end_project_m']) ? $errors['end_project_m'] : null; ?></div>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalForm2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Task</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- <p class="statusMsg"></p> -->
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('project') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="nama_project_t" placeholder="input task title" value="<?= old('nama_project_t'); ?>" class="form-control <?= isset($errors['nama_project_t']) ? 'is-invalid' : null; ?>" id="nama_project_t"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_project_t']) ? $errors['nama_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Task</label>
                        <textarea name="des_project_t" placeholder="Input deskripsi task" class="form-control <?= isset($errors['des_project_t']) ? 'is-invalid' : null; ?>"><?= old('des_project_t'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['des_project_t']) ? $errors['des_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Point</label>
                        <select name="jenis_project" id="jenis_project" class="form-control <?= isset($errors['jenis_project']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih poin task</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Milestones</label>
                        <select name="id_project_m" id="id_project_m" class="form-control <?= isset($errors['id_project_m']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih milestones</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mulai Task</label>
                        <input type="date" name="start_project_t" value="<?= old('start_project_t'); ?>" class="form-control <?= isset($errors['start_project_t']) ? 'is-invalid' : null; ?>" id="start_project_t">
                        <div class="invalid-feedback"><?= isset($errors['start_project_t']) ? $errors['start_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name="end_project_t" value="<?= old('end_project_t'); ?>" class="form-control <?= isset($errors['end_project_t']) ? 'is-invalid' : null; ?>" id="end_project_t">
                        <div class="invalid-feedback"><?= isset($errors['end_project_t']) ? $errors['end_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_project" id="status_project" class="form-control <?= isset($errors['status_project']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih status task</option>
                            <option value="0">To do</option>
                            <option value="25">On Progress 25%</option>
                            <option value="50">On Progress 50%</option>
                            <option value="75">On Progress 75%</option>
                            <option value="100">Done</option>
                        </select>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- script Here -->

<?= $this->endSection() ?>