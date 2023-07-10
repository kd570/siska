<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Jenis - crud3</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Unit Kerja</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('crud3'); ?>" method="post" autocomplete="off">
                    <h4>Data Unit Kerja</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data Unit Kerja</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('unitkerja'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php

                use PhpParser\Node\Stmt\Echo_;

                $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('unitkerja') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama Unit Kerja</label>
                        <input type="text" name="nama_uk" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Titik Koordinat</label>
                        <input type="text" name="koordinat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Unit Kerja</label>
                        <textarea name="des_uk" class="form-control"></textarea>
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