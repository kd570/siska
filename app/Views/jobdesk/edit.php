<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Data Jobdesk - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Jobdesk</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('crud2'); ?>" method="post" autocomplete="off">
                    <h4>Data Jobdesk</h4>
                </a>
                <h4>/</h4>
                <h4> Edit Data Jobdesk</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('jobdesk'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i>Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('jobdesk/' . $jobdesk->id_jd) ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>No Jobdesk</label>
                        <input type="text" name="no_jd" value="<?= $jobdesk->no_jd ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Jobdesk</label>
                        <input type="text" name="nama_jd" value="<?= $jobdesk->nama_jd ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jb" class="form-control">
                            <option value="" hidden></option>
                            <?php foreach ($jabatan as $key => $value) : { ?>
                                    <option value="<?= $value->id_jb; ?>" <?= $jobdesk->id_jb == $value->id_jb ? 'selected' : null; ?>><?= $value->nama_jb; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Jobdesk</label>
                        <textarea name="des_jd" class="form-control"><?= $jobdesk->des_jd ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Jobdesk</label>
                        <div class="custom-file">
                            <input type="file" id="file_jd" name="file_jd" class=" <?= isset($errors['file_jd']) ? 'is-invalid' : null; ?>">
                            <label></label>
                        </div>
                        <div class="invalid-feedback"><?= isset($errors['file_jd']) ? $errors['file_jd'] : null; ?></div>
                        <!-- <div class="form-text text-muted">The image must have a maximum size of 1MB</div> -->
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