<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Jenis Sertifikat - N14 DJP </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Jenis Sertifikat</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Jenis Sertifikat</a></div>
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
                <h4>Data Jenis Sertifikat</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('sertifikat/new'); ?>" class="btn btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-hover" id="table-sertifikat" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis Sertifikat</th>
                                <th scope="col">Keterangan</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sertifikat as $key => $value) : ?>
                                <tr>
                                    <td style="width: 5%;"><?= $key + 1 ?></th>
                                    <td style="width: 35%;"><?= $value->nama_sertifikat ?></td>
                                    <td style="width: 40%;"><?= $value->des_sertifikat ?></td>
                                    <td class="text-center" style="width: 20%;">
                                        <a href="<?= site_url('sertifikat/' . $value->id_sertifikat . '/edit'); ?>" title="Update" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                                        <form action="<?= site_url('sertifikat/' . $value->id_sertifikat); ?>" title="Hapus" method="POST" class="d-inline" id="del-<?= $value->id_sertifikat; ?>">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_sertifikat ?>)">
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