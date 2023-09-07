<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Jenis Guna Lahan - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Jenis Penggunaan Lahan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('guna'); ?>" method="post" autocomplete="off">
                    <h4>Jenis Penggunaan Lahan</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data Jenis Penggunaan Lahan</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('guna'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('guna') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama Jenis Penggunaan Lahan</label>
                        <input type="text" name="nama_guna" placeholder="Input nama jenis penggunaan lahan " value="<?= old('nama_guna'); ?>" class="form-control <?= isset($errors['nama_guna']) ? 'is-invalid' : null; ?>" id="nama_guna"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_guna']) ? $errors['nama_guna'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="des_guna" placeholder="Input keterangan tambahan" class="form-control <?= isset($errors['des_guna']) ? 'is-invalid' : null; ?>"><?= old('des_guna'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['des_guna']) ? $errors['des_guna'] : null; ?></div>
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