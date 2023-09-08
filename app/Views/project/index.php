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
    <?php
    if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>




    <div class="section-body">
        <h2 class="section-title">Pengurusan Legal Aset</h2>
        <p class="section-lead">
            Pengurusan Legal Aset merupakan Modul Aplikasi SISKA14 yang berfungsi untuk memonitor progres pengurusan legal aset.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Semua <span class="badge badge-white">5</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Belum <span class="badge badge-primary">1</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Progres <span class="badge badge-primary">1</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Selesai <span class="badge badge-primary">0</span></a>
                            </li>
                        </ul>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-8 ">
                            <h4>Data Pengurusan Legal Aset</h4>
                        </div>
                        <div class="col-lg-4 p-0">
                            <div class="card-button" style="float: right;">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalForm">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th class="text-left" scope="col">Title</th>
                                        <th scope="col">Aset</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Progres</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($project as $key => $value) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></th>
                                            <td class="text-left"><a href="<?= site_url('project/' . encrypt_decrypt('encrypt', $value->id_project) . '/show'); ?>"><b><?= $value->nama_project ?></b></a>
                                                <br><?php
                                                    if ($value->jenis_project == 0) {
                                                        echo "<span class='badge badge-secondary p-1'><small>Pengurusan Aset Lahan</small></span>";
                                                    } else {
                                                        echo "<span class='badge badge-info p-1'><small>Pengurusan Okupasi Lahan</small></span>";
                                                    }; ?>
                                            </td>
                                            <td><?= $value->nama_aset ?></b></td>
                                            <td><?= $value->start_project ?></b></td>
                                            <td><?= $value->end_project ?></b></td>
                                            <?php
                                            if ($value->status_project = 0) {
                                                echo "<td><span class='badge badge-danger'>Close</span></td>";
                                            } elseif ($value->status_project = 1) {
                                                echo "<td><span class='badge badge-warning'>On-Progress</span></td>";
                                            } else {
                                                echo "<td><span class='badge badge-success'>Done</span></td>";
                                            }; ?>
                                            <!-- <td><?= $value->progres_project ?></b></td> -->
                                            <!-- <td>
                                                <div class="badge badge-warning">On-Progres</div>
                                            </td>-->
                                            <td>
                                                <div class="progress" title="75%">
                                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <form action="<?= site_url('project/' . encrypt_decrypt('encrypt', $value->id_project)); ?>" title="Hapus" method="POST" class="d-inline" id="del-<?= $value->id_project; ?>">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_project ?>)">
                                                        <i class=" fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal here -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
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
                        <label>Title Project</label>
                        <input type="text" name="nama_project" placeholder="input project title" value="<?= old('nama_project'); ?>" class="form-control <?= isset($errors['nama_project']) ? 'is-invalid' : null; ?>" id="nama_project"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_project']) ? $errors['nama_project'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Project</label>
                        <select name="jenis_project" id="jenis_project" class="form-control <?= isset($errors['jenis_project']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih jenis project</option>
                            <option value="0">Pengurusan Aset Lahan</option>
                            <option value="1">Pengurusan Okupasi Lahan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Aset</label>
                        <select name="id_aset" id="id_aset" class="form-control <?= isset($errors['id_aset']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih aset</option>
                            <?php foreach ($aset as $key => $value) : { ?>
                                    <option value="<?= $value->id_aset; ?>" <?= $value->id_aset == old('id_aset') ? 'selected' : null; ?>><?= $value->nama_aset; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Project</label>
                        <textarea name="des_project" placeholder="Input deskripsi project" class="form-control <?= isset($errors['des_project']) ? 'is-invalid' : null; ?>" style="height: 100px;"><?= old('des_project'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['des_project']) ? $errors['des_project'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mulai Project</label>
                        <input type="date" name="start_project" value="<?= old('start_project'); ?>" class="form-control <?= isset($errors['start_project']) ? 'is-invalid' : null; ?>" id="start_project">
                        <div class="invalid-feedback" id="invalid-feedback-end-date"><?= isset($errors['start_project']) ? $errors['start_project'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name="end_project" value="<?= old('end_project'); ?>" class="form-control <?= isset($errors['end_project']) ? 'is-invalid' : null; ?>" id="end_project">
                        <div class="invalid-feedback"><?= isset($errors['end_project']) ? $errors['end_project'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_project" id="status_project" class="form-control <?= isset($errors['status_project']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden>pilih status project</option>
                            <option value="0">Open</option>
                            <option value="1">Close</option>
                            <option value="2">Done</option>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['status_project']) ? $errors['status_project'] : null; ?></div>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    <?php if (session()->getFlashdata('errors')) : ?>
        $(document).ready(function() {
            $('#modalForm').modal('show');
        });
    <?php endif; ?>
</script>
<?= $this->endSection() ?>