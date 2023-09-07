<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Jenis Sertifikat - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Sertifikat</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('sertifikat'); ?>" method="post" autocomplete="off">
                    <h4>Data Sertifikat</h4>
                </a>
                <h4>/</h4>
                <h4> Edit Data Jenis Sertifikat</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('sertifikat'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php

                use PhpParser\Node\Stmt\Echo_;

                $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('sertifikat/' . $sertifikat->id_sertifikat) ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Nama Jenis Sertifikat</label>
                        <input type="text" name="nama_sertifikat" placeholder="Input nama jenis sertifikat" value="<?= $sertifikat->nama_sertifikat ?>" class="form-control <?= isset($errors['nama_sertifikat']) ? 'is-invalid' : null; ?>" id="nama_sertifikat"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_sertifikat']) ? $errors['nama_sertifikat'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="des_sertifikat" placeholder="Input keterangan tambahan" class="form-control <?= isset($errors['des_sertifikat']) ? 'is-invalid' : null; ?>"><?= $sertifikat->des_sertifikat ?></textarea>
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