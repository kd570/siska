<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Jobdesk - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Jobdesk</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('jobdesk'); ?>" method="post" autocomplete="off">
                    <h4>Data Jobdesk</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data Jobdesk</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('jobdesk'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('jobdesk') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>No Jobdesk</label>
                        <input type="text" name="no_jd" value="<?= old('no_jd'); ?>" class="form-control <?= isset($errors['no_jd']) ? 'is-invalid' : null; ?>">
                        <div class="invalid-feedback"><?= isset($errors['no_jd']) ? $errors['no_jd'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nama Jobdesk</label>
                        <input type="text" name="nama_jd" value="<?= old('nama_jd'); ?>" class="form-control <?= isset($errors['nama_jd']) ? 'is-invalid' : null; ?>">
                        <div class="invalid-feedback"><?= isset($errors['nama_jd']) ? $errors['nama_jd'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jb" class="form-control <?= isset($errors['id_jb']) ? 'is-invalid' : null; ?>">
                            <option id="" value="" hidden></option>
                            <?php foreach ($jabatan as $key => $value) : { ?>
                                    <option value="<?= $value->id_jb; ?>" <?= $value->id_jb == old('id_jb') ? 'selected' : null; ?>><?= $value->nama_jb; ?> - <?= $value->nama_bg; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['id_jb']) ? $errors['id_jb'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Jobdesk</label>
                        <textarea id="des_jd" name="des_jd" class="form-control"><?= old('des_jd'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <!-- <label>File Jobdesk</label> -->
                        <!-- <div class="custom-file"> -->

                        <label class="form-label"><?= old('file_jd'); ?>File Jobdesk</label>
                        <input type="file" id="file_jd" name="file_jd" class="form-control form-control <?= isset($errors['file_jd']) ? 'is-invalid' : null; ?>">
                        <div class="invalid-feedback"><?= isset($errors['file_jd']) ? $errors['file_jd'] : null; ?></div>
                        <!-- </div> -->
                        <div class="form-text text-muted">Ekstensi file harus Pdf</div>
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