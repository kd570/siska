<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Aset - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>ASET</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('areaaset'); ?>" method="post" autocomplete="off">
                    <h4>Data User</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data Aset</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('areaaset'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('areaaset') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama Aset</label>
                        <input type="text" name="nama_aset" placeholder="Input nama aset" value="<?= old('nama_aset'); ?>" class="form-control <?= isset($errors['nama_aset']) ? 'is-invalid' : null; ?>" id="nama_aset"></input>
                        <div class="invalid-feedback"><?= isset($errors['nama_aset']) ? $errors['nama_aset'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <select name="nama_pemilik" id="nama_pemilik" class="form-control <?= isset($errors['nama_pemilik']) ? 'is-invalid' : null; ?>">
                            <option value="PTPN XIV" hidden>PTPN XIV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <select name="id_uk" id="id_uk" class="form-control <?= isset($errors['id_uk']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden></option>
                            <?php foreach ($unit_kerja as $key => $value) : { ?>
                                    <option value="<?= $value->id_uk; ?>" <?= $value->id_uk == old('id_uk') ? 'selected' : null; ?>><?= $value->nama_uk; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['id_uk']) ? $errors['id_uk'] : null; ?></div>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control" id="provinsi">
                            <option value="" hidden></option>
                            <?php foreach ($provinsi as $key => $value) : { ?>
                                    <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <select name="kota" class="form-control" id="kota">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control" id="kecamatan">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Desa/Kelurahan</label>
                        <select name="kelurahan" class="form-control" id="kelurahan">
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Jenis Sertifikat</label>
                        <select name="j_setifikat" id="j_setifikat" class="form-control <?= isset($errors['j_setifikat']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden></option>
                            <?php foreach ($j_sertifikat as $key => $value) : { ?>
                                    <option value="<?= $value->id_sertifikat; ?>" <?= $value->id_sertifikat == old('j_setifikat') ? 'selected' : null; ?>><?= $value->nama_sertifikat; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['id_bg']) ? $errors['id_bg'] : null; ?></div>
                    </div>

                    <div class="form-group">
                        <label>Nomor Sertifikat</label>
                        <input type="text" name="no_sertifikat" value="<?= old('no_sertifikat'); ?>" class="form-control <?= isset($errors['no_sertifikat']) ? 'is-invalid' : null; ?>" id="no_sertifikat">
                        <div class="invalid-feedback"><?= isset($errors['no_sertifikat']) ? $errors['no_sertifikat'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terbit</label>
                        <input type="date" name="tgl_terbit" value="<?= old('tgl_terbit'); ?>" class="form-control <?= isset($errors['tgl_terbit']) ? 'is-invalid' : null; ?>" id="tgl_terbit">
                        <div class="invalid-feedback"><?= isset($errors['tgl_terbit']) ? $errors['tgl_terbit'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Berakhir</label>
                        <input type="date" name="tgl_expire" value="<?= old('tgl_expire'); ?>" class="form-control <?= isset($errors['tgl_expire']) ? 'is-invalid' : null; ?>" id="tgl_expire">
                        <div class="invalid-feedback"><?= isset($errors['tgl_expire']) ? $errors['tgl_expire'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guna Lahan</label>
                        <select name="guna" id="guna" class="form-control <?= isset($errors['guna']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden></option>
                            <?php foreach ($guna as $key => $value) : { ?>
                                    <option value="<?= $value->id_guna; ?>" <?= $value->id_guna == old('guna') ? 'selected' : null; ?>><?= $value->nama_guna; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['id_bg']) ? $errors['id_bg'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Luas</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Ha
                                </div>
                            </div>
                            <input type="number" class="form-control" placeholder="0,00" step="0.01" name="luas" min="0" title="luas">
                        </div>
                        <div class="invalid-feedback"><?= isset($errors['luas']) ? $errors['luas'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="des_aset" placeholder="Input keterangan tambahan" class="form-control <?= isset($errors['des_aset']) ? 'is-invalid' : null; ?>"><?= old('des_aset'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['des_aset']) ? $errors['des_aset'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" name="file_gambar[]" id="file_gambar" class="form-control" multiple>
                        <div id="file_gambar_select"></div>
                        <div class="form-text text-muted">file harus ekstensi gambar</div>
                    </div>
                    <div class="form-group">
                        <label>Upload File Geo</label>
                        <input type="file" name="file_geo[]" id="file_geo" class="form-control" multiple>
                        <div id="file_geo_select"></div>
                        <div class="form-text text-muted">File harus Geojson dengan koordinat gorgrafis (latitude and longitude)</div>
                    </div>
                    <div class="section-button">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
</section>
<script>
    var selDiv = "";
    var selDiv2 = "";
    document.addEventListener("DOMContentLoaded", init, false);
    document.addEventListener("DOMContentLoaded", init2, false);

    function init() {
        document.querySelector('#file_gambar').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#file_gambar_select");
    }

    function init2() {
        document.querySelector('#file_geo').addEventListener('change', handleFileSelect2, false);
        selDiv2 = document.querySelector("#file_geo_select");
    }

    function handleFileSelect(e) {
        if (!e.target.files) return;
        selDiv.innerHTML = "";
        var files = e.target.files;
        for (var i = 0; i < files.length; i++) {
            var f = files[i];
            selDiv.innerHTML += f.name + " ";
        }
    }

    function handleFileSelect2(e) {
        if (!e.target.files) return;
        selDiv2.innerHTML = "";
        var files = e.target.files;
        for (var i = 0; i < files.length; i++) {
            var f = files[i];
            selDiv2.innerHTML += f.name + " ";
        }
    }
</script>
<?= $this->endSection() ?>