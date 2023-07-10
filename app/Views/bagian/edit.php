<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Data Bagian - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Bagian</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('crud2'); ?>" method="post" autocomplete="off">
                    <h4>Data Bagian</h4>
                </a>
                <h4>/</h4>
                <h4> Edit Data Bagian</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('bagian'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('bagian/' . $bagian->id_bg) ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Nama Bagian</label>
                        <input type="text" name="nama_bg" value="<?= $bagian->nama_bg ?>" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <select name="id_uk" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($unitkerja as $key => $value) : { ?>
                                    <option value="<?= $value->id_uk; ?>" <?= $bagian->id_uk == $value->id_uk ? 'selected' : null; ?>><?= $value->nama_uk; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Bagian</label>
                        <textarea name="des_bg" class="form-control"><?= $bagian->des_bg ?></textarea>
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