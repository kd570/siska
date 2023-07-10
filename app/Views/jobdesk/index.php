<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Jobdesk - N14 DJP </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Jobdesk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Jobdesk</a></div>
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
                <h4>Data Jobdesk</h4>
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
                    <a href="<?= site_url('jobdesk/new'); ?>" class="btn btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-hover" id="table-jd" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Jobdesk</th>
                                <th scope="col">Nama Jobdesk</th>
                                <th scope="col">Jabatan/Bagian</th>
                                <th scope="col">Deskripsi Jobdesk</th>
                                <th class="text-center" scope="col">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobdesk as $key => $value) : ?>
                                <tr>
                                    <td style="width: 5%;"><?= $key + 1 ?></th>
                                    <td style="width: 10%;"><?= $value->no_jd ?></td>
                                    <td style="width: 25%;"><?= $value->nama_jd ?></td>
                                    <td style="width: 20%;">
                                        <p class="text-wrap mb-0"><?= $value->nama_jb ?><span class="badge badge-pill badge-danger font-size-7 ml-2 p-1"> <small><?= $value->tingkatan ?></small> </span></p>
                                        <p class="text-wrap mb-0"><b><?= $value->nama_bg ?></b></p>
                                    </td>
                                    <td style="width: 15%;"><?= $value->des_jd ?></td>
                                    <td class="text-center" style="width: 25%;">
                                        <a href="<?= site_url('jobdesk/' . $value->id_jd . '/show'); ?>" title="Detail" class="btn btn-success btn-sm"><i class="fas fa-eye "></i></a>
                                        <?php if (userLogin()->role < 2) { ?>
                                            <a href="<?= site_url('jobdesk/' . $value->id_jd . '/edit'); ?>" title="Update" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                                            <form action="<?= site_url('jobdesk/' . $value->id_jd); ?>" title="Hapus" method="POST" class="d-inline" id="del-<?= $value->id_jb; ?>">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm" data-confirm="Hapus data?| Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $value->id_jb ?>)">
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