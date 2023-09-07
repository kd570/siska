<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Jenis Sertifikat - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Jenis Sertifikat</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('sertifikat'); ?>" method="post" autocomplete="off">
                    <h4>Data Jenis Sertifikat</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data Jenis Sertifikat</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('sertifikat'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('sertifikat') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Jenis Sertifikat</label>
                        <input type="text" name="nama_sertifikat" placeholder="Input jenis sertifikat " value="<?= old('nama_sertifikat'); ?>" class="form-control <?= isset($errors['nama_sertifikat']) ? 'is-invalid' : null; ?>" id="nama_sertifikat"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_sertifikat']) ? $errors['nama_sertifikat'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="des_sertifikat" placeholder="Input keterangan tambahan" class="form-control <?= isset($errors['des_sertifikat']) ? 'is-invalid' : null; ?>"><?= old('des_sertifikat'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['des_sertifikat']) ? $errors['des_sertifikat'] : null; ?></div>
                    </div>
                    <div class="section-button">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
</section>


<?= $this->endSection() ?>