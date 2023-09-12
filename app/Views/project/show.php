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
            <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div> -->
            <div class="breadcrumb-item"><a href="<?= site_url('project'); ?>">Data Pengurusan Legal Aset</a></div>
            <div class="breadcrumb-item active">Detail <?= $project->nama_project; ?></div>
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
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <b>Success !</b>
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success_m3')) : ?>
                            <?php $success_m3 = session()->getFlashdata('success_m3'); ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <b>Success ! </b>
                                    <?= $success_m3['pesan'] ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <b>Error !</b>
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            </div>
                        <?php endif; ?>
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
                                <a class="nav-link" id="file-view" data-toggle="tab" href="#file-view2" role="tab" aria-controls="file-view" aria-selected="false">File</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="history-view" data-toggle="tab" href="#history-view2" role="tab" aria-controls="history-view" aria-selected="false">Log</a>
                            </li>
                        </ul>
                        <!-- END Menu Tab Atas -->

                        <!-- CONTENT -->
                        <div class="tab-content tab-bordered" id="myTab3Content">

                            <!-- PROJECT -->
                            <div class="tab-pane fade show active" id="project-view2" role="tabpanel" aria-labelledby="project-view">
                                <?php $errors = session()->getFlashdata('errors_p3'); ?>
                                <!-- project update -->
                                <form action="<?= site_url('project/' . encrypt_decrypt('encrypt', $project->id_project)) ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <table class="table table-bordered table-striped" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="width:15%">Nama Project</td>
                                                <td style="width:70%"><input type="text" class="form-control <?= isset($errors['nama_project']) ? 'is-invalid' : null; ?>" name="nama_project" value="<?= $project->nama_project ?>" id="nama_project">
                                                    <div class="invalid-feedback"><?= isset($errors['nama_project']) ? $errors['nama_project'] : null; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Project</td>
                                                <td>
                                                    <select name="jenis_project" id="jenis_project" class="form-control <?= isset($errors['jenis_project']) ? 'is-invalid' : null; ?>">
                                                        <option value="0" <?= $project->jenis_project == 0 ? 'selected' : null; ?>>Pengurusan Aset Lahan</option>
                                                        <option value="1" <?= $project->jenis_project == 1 ? 'selected' : null; ?>>Pengurusan Okupasi Lahan</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Aset</td>
                                                <td>
                                                    <select name="id_aset" id="id_aset" class="form-control">
                                                        <?php foreach ($aset as $key => $value) : { ?>
                                                                <option value="<?= $value->id_aset; ?>" <?= $value->id_aset == $project->id_aset ? 'selected' : null; ?>><?= $value->nama_aset; ?></option>
                                                        <?php }
                                                        endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td><textarea name="des_project" class="form-control <?= isset($errors['des_project']) ? 'is-invalid' : null; ?>" style="height: 100px;"><?= $project->des_project ?></textarea>
                                                    <div class="invalid-feedback"><?= isset($errors['des_project']) ? $errors['des_project'] : null; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Start Project Date</td>
                                                <td><input type="date" name="start_project" value="<?= $project->start_project ?>" class="form-control <?= isset($errors['start_project']) ? 'is-invalid' : null; ?>" id="start_project">
                                                    <div class="invalid-feedback"><?= isset($errors['start_project']) ? $errors['start_project'] : null; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Deadline</td>
                                                <td><input type="date" name="end_project" value="<?= $project->end_project ?>" class="form-control <?= isset($errors['end_project']) ? 'is-invalid' : null; ?>" id="end_project">
                                                    <div class="invalid-feedback"><?= isset($errors['end_project']) ? $errors['end_project'] : null; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>
                                                    <select name="status_project" id="status_project" class=" 
                                                    <?php
                                                    if ($project->status_project == 0) {
                                                        echo 'form-control-sm bg-secondary';
                                                    } elseif ($project->status_project == 1) {
                                                        echo 'form-control-sm bg-success';
                                                    } else {
                                                        echo 'form-control-sm bg-danger';
                                                    } ?>">
                                                        <option value="0" class="bg-secondary" <?= $project->status_project == 0 ? 'selected' : null; ?>>Open</option>
                                                        <option value="1" class="bg-success" <?= $project->status_project == 1 ? 'selected' : null; ?>>Finish</option>
                                                        <option value="2" class="bg-danger" <?= $project->status_project == 2 ? 'selected' : null; ?>>Close</option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-start mb-3">
                                        <button type="submit" class="btn btn-light"><i class="fas fa-save"></i> update data project</button>
                                    </div>
                                </form>
                                <?php if (session()->getFlashdata('success_m1')) : ?>
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">x</button>
                                            <b>Success !</b>
                                            <?= session()->getFlashdata('success_m1') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%;">Due date</th>
                                                <th style="width: 30%;">Title</th>
                                                <th style="width: 50%;">Progress</th>
                                                <th class="text-center" style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($milestones as $key => $value) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $value->end_project_m ?></td>
                                                    <td><a href="#" id="pb_<?= $value->id_project ?>_<?= $value->id_project_m ?>"><b><?= $value->nama_project_m ?></b></a></td>
                                                    <td>
                                                        <div class="progress" title="75%">
                                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="<?= site_url('project/del_p_milestone/' . encrypt_decrypt('encrypt', $value->id_project_m)); ?>" title="Hapus Project" method="POST" class="d-inline" id="del-<?= $value->id_project_m; ?>">
                                                            <?= csrf_field() ?>
                                                            <!-- <input type="hidden" name="_method" value="GET"> -->
                                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_project_m ?>)">
                                                                <i class=" fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END PROJECT -->

                            <!-- MILESTONES-->
                            <div class="tab-pane fade" id="milestone-view2" role="tabpanel" aria-labelledby="milestone-view">
                                <div class="row">
                                    <!-- Tab Samping Kiri -->
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <ul class="nav nav-pills flex-column" id="mTab" role="tablist">
                                            <?php foreach ($milestones as $key => $value) : ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="m-tab_<?= $value->id_project ?>_<?= $value->id_project_m ?>" data-toggle="tab" href="#home_<?= $value->id_project ?>_<?= $value->id_project_m ?>" role="tab" aria-controls="home" aria-selected="true"><?= $value->nama_project_m ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                            <li class="nav-item">
                                                <a class="btn btn-icon icon-left" data-toggle="modal" id="modal_milestone2" href="#modalForm1" style="color: #6777ef;"><i class="fa fa-plus"></i> Tambah Milestones</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end Tab Samping Kiri -->

                                    <!-- Tab Samping Kanan -->
                                    <div class="col-12 col-sm-12 col-md-9">
                                        <div class="tab-content no-padding" id="mTabContent">
                                            <?php foreach ($milestones as $key => $value) : ?>
                                                <div class="tab-pane fade" id="home_<?= $value->id_project ?>_<?= $value->id_project_m ?>" role="tabpanel" aria-labelledby="m-tab_<?= $value->id_project ?>_<?= $value->id_project_m ?>">
                                                    <!-- milestone update -->
                                                    <?php $errors_m3 = session()->getFlashdata('errors_m3'); ?>
                                                    <form action="<?= site_url('project/upd_p_milestone/' . encrypt_decrypt('encrypt', $value->id_project_m)) ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="id_project" value="<?= $project->id_project; ?>">
                                                        <input type="hidden" name="start_project" value="<?= $project->start_project; ?>">
                                                        <input type="hidden" name="end_project" value="<?= $project->end_project; ?>">
                                                        <table class="table table-bordered table-striped" style="width:100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:30%">Milestone Title</td>
                                                                    <td style="width:70%"><b><input type="text" class="form-control <?= isset($errors_m3['nama_project_m']) ? 'is-invalid' : null; ?>" name="nama_project_m" value="<?= $value->nama_project_m ?>" id="nama_project_m"></b>
                                                                        <div class="invalid-feedback"><?= isset($errors_m3['nama_project_m']) ? $errors_m3['nama_project_m'] : null; ?></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deskripsi</td>
                                                                    <td><textarea name="des_project_m" class="form-control <?= isset($errors_m3['des_project_m']) ? 'is-invalid' : null; ?>" style="height: 100px;"><?= $value->des_project_m ?></textarea>
                                                                        <div class="invalid-feedback"><?= isset($errors_m3['des_project_m']) ? $errors_m3['des_project_m'] : null; ?></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Start Date Milestone</td>
                                                                    <td><input type="date" name="start_project_m" value="<?= $value->start_project_m ?>" class="form-control <?= isset($errors_m3['start_project_m']) ? 'is-invalid' : null; ?>" id="start_project_m">
                                                                        <div class="invalid-feedback"><?= isset($errors_m3['start_project_m']) ? $errors_m3['start_project_m'] : null; ?></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deadline</td>
                                                                    <td><input type="date" name="end_project_m" value="<?= $value->end_project_m ?>" class="form-control <?= isset($errors_m3['end_project_m']) ? 'is-invalid' : null; ?>" id="end_project_m">
                                                                        <div class="invalid-feedback"><?= isset($errors_m3['end_project_m']) ? $errors_m3['end_project_m'] : null; ?></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Progress</td>
                                                                    <td>
                                                                        <div class="progress" title="75%">
                                                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-start mb-3 ml-3">
                                                            <button type="submit" class="btn btn-light" id="m_update_<?= $value->id_project ?>_<?= $value->id_project_m ?>"><i class="fas fa-save"></i> update data milestone</button>
                                                        </div>
                                                    </form>
                                                    <!-- end milestone update -->

                                                    <!-- TASK LIST -->
                                                    <div class="card-header">
                                                        <div class="col-lg-8" id="header_task_list">
                                                            <h4>List Task untuk Milestone <?= $value->nama_project_m; ?></h4>
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
                                                    <?php if (session()->getFlashdata('success2')) : ?>
                                                        <div class="alert alert-success alert-dismissible show fade">
                                                            <div class="alert-body">
                                                                <button class="close" data-dismiss="alert">x</button>
                                                                <b>Success !</b>
                                                                <?= session()->getFlashdata('success2') ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-md">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width: 10%;">#</th>
                                                                    <th style="width: 30%;">Title</th>
                                                                    <th style="width: 15%;">Start date</th>
                                                                    <th style="width: 15%;">Deadline</th>
                                                                    <th style="width: 20%;">Progress</th>
                                                                    <th class="text-center" style="width: 10%;">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="task_list_<?= $value->id_project_m; ?>">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
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

                            <!-- FILE -->
                            <div class="tab-pane fade" id="file-view2" role="tabpanel" aria-labelledby="file-view">
                                <div class="card-body">
                                    <form action="#" class="dropzone dz-clickable" id="mydropzone">

                                        <div class="dz-default dz-message"><span>Drop file project untuk upload</span></div>
                                    </form>
                                </div>
                            </div>
                            <!-- END FILE -->

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
<!-- MODAL MILESTONES -->
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
                <?php if (session()->getFlashdata('errors_m2') == null) {
                    $errors_mt = session()->getFlashdata('errors_m1');
                } else {
                    $errors_mt = session()->getFlashdata('errors_m2');
                } ?>
                <form action="<?= site_url('project/create_project_m') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" id="cekform_mt" name="cekform_mt" value="">
                    <input type="hidden" name="id_project" value="<?= $project->id_project; ?>">
                    <input type="hidden" name="start_project" value="<?= $project->start_project; ?>">
                    <input type="hidden" name="end_project" value="<?= $project->end_project; ?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="nama_project_m" placeholder="input milestone title" value="<?= old('nama_project_m'); ?>" class="form-control <?= isset($errors_mt['nama_project_m']) ? 'is-invalid' : null; ?>" id="nama_project_m"></input>
                        <div class="invalid-feedback"><?= isset($errors_mt['nama_project_m']) ? $errors_mt['nama_project_m'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Milestone</label>
                        <textarea name="des_project_m" placeholder="Input deskripsi milestones" class="form-control <?= isset($errors_mt['des_project_m']) ? 'is-invalid' : null; ?>" style="height: 100px;"><?= old('des_project_m'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors_mt['des_project_m']) ? $errors_mt['des_project_m'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mulai Milestone</label>
                        <input type="date" name="start_project_m" value="<?= old('start_project_m'); ?>" class="form-control <?= isset($errors_mt['start_project_m']) ? 'is-invalid' : null; ?>" id="start_project_m">
                        <div class="invalid-feedback"><?= isset($errors_mt['start_project_m']) ? $errors_mt['start_project_m'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name="end_project_m" value="<?= old('end_project_m'); ?>" class="form-control <?= isset($errors_mt['end_project_m']) ? 'is-invalid' : null; ?>" id="end_project_m">
                        <div class="invalid-feedback"><?= isset($errors_mt['end_project_m']) ? $errors_mt['end_project_m'] : null; ?></div>
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

<!-- MODAL TASK -->
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
                <?php $errors2 = session()->getFlashdata('errors2'); ?>
                <form action="<?= site_url('project/create_project_t') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" id="id_project" name="id_project" value="<?= $project->id_project; ?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="nama_project_t" placeholder="input task title" value="<?= old('nama_project_t'); ?>" class="form-control <?= isset($errors2['nama_project_t']) ? 'is-invalid' : null; ?>" id="nama_project_t"></input>
                        <div class="invalid-feedback"><?= isset($errors2['nama_project_t']) ? $errors2['nama_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Task</label>
                        <textarea name="des_project_t" placeholder="Input deskripsi task" class="form-control <?= isset($errors2['des_project_t']) ? 'is-invalid' : null; ?>" style="height: 100px;"><?= old('des_project_t'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors2['des_project_t']) ? $errors2['des_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Point</label>
                        <select name="point_t" id="point_t" class="form-control <?= isset($errors2['point_t']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih poin task</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Milestones</label>
                        <select name="id_project_m" id="id_project_m" class="form-control <?= isset($errors2['id_project_m']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih milestones</option>
                            <?php foreach ($milestones as $key => $value) : ?>
                                <option value="<?= $value->id_project_m; ?>" <?= $value->id_project_m == $project->id_project_m ? 'selected' : null; ?>><?= $value->nama_project_m; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mulai Task</label>
                        <input type="date" name="start_project_t" value="<?= old('start_project_t'); ?>" class="form-control <?= isset($errors2['start_project_t']) ? 'is-invalid' : null; ?>" id="start_project_t">
                        <div class="invalid-feedback"><?= isset($errors2['start_project_t']) ? $errors2['start_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name="end_project_t" value="<?= old('end_project_t'); ?>" class="form-control <?= isset($errors2['end_project_t']) ? 'is-invalid' : null; ?>" id="end_project_t">
                        <div class="invalid-feedback"><?= isset($errors2['end_project_t']) ? $errors2['end_project_t'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="progress_t" id="progress_t" class="form-control <?= isset($errors2['progress_t']) ? 'is-invalid' : null; ?>">
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
<!-- CDN jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Background warna status prject
    $('#status_project').on('change', function() {
        const select = $('#status_project').val();
        console.log(select)
        if (select == 0)
            document.getElementById("status_project").className = "form-control-sm bg-secondary";
        else if (select == 1)
            document.getElementById("status_project").className = "form-control-sm bg-success";
        else document.getElementById("status_project").className = "form-control-sm bg-danger";
    });

    // Kembali Menampilkan modal tambah milestone ketika gagal validasi
    <?php if (session()->getFlashdata('errors_m1')) : ?>
        $(document).ready(function() {
            $('#modalForm1').modal('show');
        });
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors_m2')) : ?>
        $(document).ready(function() {
            $('#project-view').removeClass('active');
            $('#project-view2').removeClass('show active');
            $('#milestone-view').addClass('active');
            $('#milestone-view2').addClass('show active');
            $('#modalForm1').modal('show');
        });
    <?php endif; ?>
</script>
<script>
    $(document).ready(function() {
        // Kembali tab  ketika error milestone ketika tambah task gagal validasi
        <?php if (session()->getFlashdata('errors2')) : ?>
            $('#project-view').removeClass('active');
            $('#project-view2').removeClass('show active');
            $('#milestone-view').addClass('active');
            $('#milestone-view2').addClass('show active');
            $('#modalForm2').modal('show');
        <?php endif; ?>


        <?php foreach ($milestones as $key => $value) : ?>
            var id_project = '<?= $value->id_project ?>';
            var id_project_m = '<?= $value->id_project_m ?>';

            // link direct to detail milestones
            $('#pb_<?= $value->id_project ?>_<?= $value->id_project_m ?>, #m-tab_<?= $value->id_project ?>_<?= $value->id_project_m ?>').click(function() {
                $('#project-view').removeClass('active');
                $('#project-view2').removeClass('show active');
                $('#milestone-view').addClass('active');
                $('#milestone-view2').addClass('show active');
                <?php foreach ($milestones as $key2 => $value2) : ?>
                    $('#m-tab_<?= $value2->id_project ?>_<?= $value2->id_project_m ?>').removeClass('active');
                    $('#home_<?= $value2->id_project ?>_<?= $value2->id_project_m ?>').removeClass('show active');
                <?php endforeach; ?>
                $('#m-tab_<?= $value->id_project ?>_<?= $value->id_project_m ?>').addClass('active');
                $('#home_<?= $value->id_project ?>_<?= $value->id_project_m ?>').addClass('show active');

                // Ajax Menampilkan Task berdasarkan Milestone
                reloadTableTaskList()

                function reloadTableTaskList() {
                    $.ajax({
                        url: "/project/gettaskdetail/<?= $value->id_project ?>/<?= $value->id_project_m ?>",
                        dataType: 'json',
                        success: function(data) {
                            var html = data;
                            var i;
                            for (i = 0; i < data.length; i++) {
                                var id_project_m = data[i].id_project_m;
                                var id_project_t = data[i].id_project_t;
                                var site_url = '<?php site_url("project/del_p_task/" . encrypt_decrypt("encrypt", "<script>id_project_t</script>")); ?>';
                                html += '<tr><td class="text-center">' + (i + 1) + '</td>';
                                html += '<td><a href="#" id="mb_' + data[i].id_project + '_' + data[i].id_project_m + '_' + data[i].id_project_t + '"><b>' + data[i].nama_project_t + '</b></a></td>';
                                html += '<td class="text-center">' + data[i].start_project_t + '</td>';
                                html += '<td class="text-center">' + data[i].end_project_t + '</td>';
                                if (data[i].progress_t == 0) {
                                    html += '<td class="text-center"><span class="badge badge-danger p-1"><small>To do</small></span></td>';
                                } else if (data[i].progress_t == 25) {
                                    html += '<td class="text-center"><span class="badge badge-warning p-1"><small>On progress 25%</small></span></td>';
                                } else if (data[i].progress_t == 50) {
                                    html += '<td class="text-center"><span class="badge badge-warning p-1"><small>On progress 50%</small></span></td>';
                                } else if (data[i].progress_t == 75) {
                                    html += '<td class="text-center"><span class="badge badge-warning p-1"><small>On progress 75%</small></span></td>';
                                } else {
                                    html += '<td class="text-center"><span class="badge badge-success p-1"><small>Done</small></span></td>';
                                }
                                html += '<td class="text-center">';
                                html += '<form action="' + site_url + '" title="Hapus Task" method="POST" class="d-inline" id="del-' + data[i].id_project_m + '">';
                                html += '<?= csrf_field() ?>';
                                html += '<button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(' + data[i].id_project_m + ')">';
                                html += '<i class=" fas fa-trash-alt"></i></button></form></td>';
                                $('#task_list_' + id_project_m + '').html(html);
                            }
                        }
                    })
                }
            });
        <?php endforeach; ?>

        // Direct to detail milestones ketika udpate milestone
        <?php if ((session()->getFlashdata('success_m3')) || (session()->getFlashdata('errors_m3'))) : ?>
            <?php $success_m3 = session()->getFlashdata('success_m3'); ?>
            <?php $errors_m3 = session()->getFlashdata('errors_m3'); ?>
            $(document).ready(function() {
                $('#project-view').removeClass('active');
                $('#project-view2').removeClass('show active');
                $('#milestone-view').addClass('active');
                $('#milestone-view2').addClass('show active');
                <?php foreach ($milestones as $key3 => $value3) : ?>
                    $('#m-tab_<?= $value3->id_project ?>_<?= $value3->id_project_m ?>').removeClass('active');
                    $('#home_<?= $value3->id_project ?>_<?= $value3->id_project_m ?>').removeClass('show active');
                <?php endforeach; ?>
                <?php if (session()->getFlashdata('success_m3')) : ?>
                    $('#m-tab_<?= $success_m3['id_project'] ?>_<?= $success_m3['id_project_m'] ?>').addClass('active');
                    $('#home_<?= $success_m3['id_project'] ?>_<?= $success_m3['id_project_m'] ?>').addClass('show active');
                <?php endif; ?>
                <?php if (session()->getFlashdata('errors_m3')) : ?>
                    $('#m-tab_<?= $errors_m3['id_project'] ?>_<?= $errors_m3['id_project_m'] ?>').addClass('active');
                    $('#home_<?= $errors_m3['id_project'] ?>_<?= $errors_m3['id_project_m'] ?>').addClass('show active');
                <?php endif; ?>
            });
        <?php endif; ?>

        $('#modal_milestone2').click(function() {
            $('#cekform_mt').val('1');
        });
    });
</script>



<?= $this->endSection() ?>