<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Jabatan - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Jabatan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('crud3'); ?>" method="post" autocomplete="off">
                    <h4>Data Jabatan</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data Jabatan</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('jabatan'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php

                use PhpParser\Node\Stmt\Echo_;

                $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('jabatan') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="nama_jb" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <select name="id_bg" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($bagian as $key => $value) : { ?>
                                    <option value="<?= $value->id_bg; ?>"><?= $value->nama_bg; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tingkatan</label>
                        <select name="tingkatan" class="form-control" required>
                            <option value=""></option>
                            <option value="BOD-1">BOD-1</option>
                            <option value="BOD-2">BOD-2</option>
                            <option value="BOD-3">BOD-3</option>
                            <option value="BOD-4">BOD-4</option>
                            <option value="BOD-5">BOD-5</option>
                            <option value="BOD-6">BOD-6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Jabatan</label>
                        <textarea name="des_jb" class="form-control"></textarea>
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