<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Data Jabatan - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Jabatan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('crud2'); ?>" method="post" autocomplete="off">
                    <h4>Data Jabatan</h4>
                </a>
                <h4>/</h4>
                <h4> Edit Data Jabatan</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('jabatan'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('jabatan/' . $jabatan->id_jb) ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="nama_jb" value="<?= $jabatan->nama_jb ?>" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <select name="id_bg" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($bagian as $key => $value) : { ?>
                                    <option value="<?= $jabatan->id_bg; ?>" <?= $jabatan->id_bg == $value->id_bg ? 'selected' : null; ?>><?= $value->nama_bg; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tingkatan</label>
                        <select name="tingkatan" class="form-control" required>
                            <option value=""></option>
                            <option value="BOD-1" <?= $jabatan->tingkatan == 'BOD-1' ? 'selected' : null; ?>>BOD-1</option>
                            <option value="BOD-2" <?= $jabatan->tingkatan == 'BOD-2' ? 'selected' : null; ?>>BOD-2</option>
                            <option value="BOD-3" <?= $jabatan->tingkatan == 'BOD-3' ? 'selected' : null; ?>>BOD-3</option>
                            <option value="BOD-4" <?= $jabatan->tingkatan == 'BOD-4' ? 'selected' : null; ?>>BOD-4</option>
                            <option value="BOD-5" <?= $jabatan->tingkatan == 'BOD-5' ? 'selected' : null; ?>>BOD-5</option>
                            <option value="BOD-6" <?= $jabatan->tingkatan == 'BOD-6' ? 'selected' : null; ?>>BOD-6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Jabatan</label>
                        <textarea name="des_jb" class="form-control"><?= $jabatan->des_jb ?></textarea>
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