<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tes<?= $this->extend('layout/default') ?>

        <?= $this->section('title') ?>
        <title>Area Aset - SISKA14 </title>
        <?= $this->endSection() ?>

        <?= $this->section('content') ?>
        <section class="section">
            <div class="section-header">
                <h1>Area Aset</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Area Aset</a></div>
                    <!-- <div class="breadcrumb-item">Default Layout</div> -->
                </div>
            </div>
            <?php

            use PhpParser\Node\Stmt\Echo_;

            if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Success !</b>
                        <?= session()->getFlashdata('success') ?>
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
            <div class="section-body">
                <div class="card">
                    <div class="card-header py-1">
                        <h4>Data Area Aset</h4>
                        <!-- <div class="card-header-form">
                    <form action="" method="GET" autocomplete="off">
                        <div class="input-group">
                            <input type="text" name="keyword" value="" class="form-control " style="width:155pt; " placeholder=" Keyword pencarian">
                            <div class="input-group-btn mr-1">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search" style="align-items: flex-end;"></i></button>
                            </div>
                        </div>
                    </form>
                </div> -->
                        <div class="card-header-action">
                            <a href="<?= site_url('areaaset/new'); ?>" class="btn btn-primary">Tambah data</a>
                        </div>
                    </div>
                    <div class="card-body py-1">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-aset" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:5%" scope="col" class="text-center">#</th>
                                        <th style="width:15%" scope="col">Nama Aset</th>
                                        <th style="width:15%" scope="col">Unit Kerja</th>
                                        <th style="width:10%" scope="col">Jenis Sertifikat</th>
                                        <th style="width:10%" scope="col">Luas (Ha)</th>
                                        <th style="width:15%" scope="col">Guna</th>
                                        <th style="width:20%" scope="col">Ket</th>
                                        <th style="width:10%" scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($area_aset as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1 ?></td>
                                            <td><b><?= $value->nama_aset ?></b></td>
                                            <td><b><?= $value->nama_uk ?></b></td>
                                            <td><?= $value->nama_sertifikat ?></td>
                                            <td><?= number_format($value->luas, 2, ",", ".") ?> Ha</td>
                                            <td><?= $value->nama_guna ?></td>
                                            <td><?= $value->des_aset ?></td>
                                            <td class="text-center">

                                                <a href="<?= site_url('areaaset/' . encrypt_decrypt('encrypt', $value->id_aset) . '/show'); ?>" title="Update" class="btn btn-success btn-sm"><i class="fas fa-eye "></i></a>
                                                <a href="<?= site_url('areaaset/' . encrypt_decrypt('encrypt', $value->id_aset) . '/edit'); ?>" title="Update" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                                                <form action="<?= site_url('areaaset/' . encrypt_decrypt('encrypt', $value->id_aset)); ?>" title="Hapus" method="POST" class="d-inline" id="del-<?= $value->id_aset; ?>">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_aset ?>)">
                                                        <i class=" fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class=" float-left">

                            </div>
                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!-- Modal Import Contact -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-import-contact">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= site_url('contacts/import'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label>FIle Excel</label>
                            <div class="custom-file">
                                <?= csrf_field() ?>
                                <input type="file" name="file_excel" class="form-control" id="file_excel" required>
                                <!-- <label for="file_excel" class="custom-file-label">
                            Pilih File
                        </label> -->
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?= $this->endSection() ?>
    </h1>
</body>

</html>