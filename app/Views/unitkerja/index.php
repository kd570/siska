<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Unit Kerja - N14 DJP </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Unit Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Unit Kerja</a></div>
            <!-- <div class="breadcrumb-item">Default Layout</div> -->
        </div>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
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
            <div class="card-header">
                <h4>Data Unit Kerja</h4>
                <div class="card-header-form">
                    <form action="" method="GET" autocomplete="off">
                        <div class="input-group">
                            <input type="text" name="keyword" value="" class="form-control " style="width:155pt; " placeholder=" Keyword pencarian">
                            <div class="input-group-btn mr-1">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search" style="align-items: flex-end;"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-header-action">
                    <a href="<?= site_url('unitkerja/new'); ?>" class="btn btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Unit Kerja</th>
                                <th scope="col">Koordinat</th>
                                <th scope="col">Alamat</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($unit_kerja as $key => $value) : ?>
                                <tr>
                                    <td style="width: 5%;"><?= $key + 1 ?></th>
                                    <td style="width: 15%;"><?= $value->nama_uk ?></td>
                                    <td style="width: 30%;"><?= $value->koordinat ?></td>
                                    <td style="width: 20%;"><?= $value->alamat ?></td>
                                    <td class="text-center" style="width: 20%;">
                                        <a href="<?= site_url('unitkerja/' . $value->id_uk . '/edit'); ?>" title="Update" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                                        <form action="<?= site_url('unitkerja/' . $value->id_uk); ?>" title="Hapus" method="POST" class="d-inline" id="del-<?= $value->id_uk; ?>">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_uk ?>)">
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