<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>User - N14 DJP </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">User</a></div>
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
                <h4>Data User</h4>
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
                    <a href="<?= site_url('user/new'); ?>" class="btn btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body py-1">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-users" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Bagian/Unit</th>
                                <th scope="col">Role</th>
                                <th scope="col">Info User</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $key => $value) : ?>
                                <tr>
                                    <td class="text-center"><?= $key + 1 ?></td>
                                    <td><?= $value->name_user ?></td>
                                    <td><?= $value->username ?></td>
                                    <td><?= $value->nama_bg ?></td>
                                    <?php $role_string = null;
                                    if ($value->role == 0) {
                                        $role_string = "Admin Super";
                                    } elseif ($value->role == 1) {
                                        $role_string = "Admin Bagian";
                                    } else {
                                        $role_string = "User";
                                    }
                                    ?>
                                    <td><?= $role_string ?></td>
                                    <td><?= $value->info_user ?></td>
                                    <td class="text-center">
                                        <?php if ($value->role != 0) { ?>
                                            <a href="<?= site_url('user/' . $value->id_user . '/reset_pass'); ?>" onclick="return confirm('Apakah anda yakin reset password? Password akan di set ke default menjadi 123456')" id="resetConfirm" title="Reset Password" class="btn btn-primary btn-sm"><i class="fas fa-key "></i></a>
                                            <a href="<?= site_url('user/' . $value->id_user . '/edit'); ?>" title="Update" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                                            <form action="<?= site_url('user/' . $value->id_user); ?>" title="Hapus" method="POST" class="d-inline" id="del-<?= $value->id_user; ?>">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_user ?>)">
                                                    <i class=" fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        <?php } ?>
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