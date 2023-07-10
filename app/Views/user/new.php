<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data User - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('user'); ?>" method="post" autocomplete="off">
                    <h4>Data User</h4>
                </a>
                <h4>/</h4>
                <h4> Tambah Data User</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('user'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('user') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="name_user" value="<?= old('name_user'); ?>" class="form-control <?= isset($errors['name_user']) ? 'is-invalid' : null; ?>" id="name_user">
                        <div class="invalid-feedback"><?= isset($errors['name_user']) ? $errors['name_user'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Username (*untuk login)</label>
                        <input type="text" name="username" value="<?= old('username'); ?>" class="form-control <?= isset($errors['username']) ? 'is-invalid' : null; ?>" id="username">
                        <div class="invalid-feedback"><?= isset($errors['username']) ? $errors['username'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <select name="id_bg" class="form-control <?= isset($errors['id_bg']) ? 'is-invalid' : null; ?>">
                            <option value="" hidden></option>
                            <?php foreach ($bagian as $key => $value) : { ?>
                                    <option value="<?= $value->id_bg; ?>" <?= $value->id_bg == old('id_bg') ? 'selected' : null; ?>><?= $value->nama_bg; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['id_bg']) ? $errors['id_bg'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_user" value="<?= old('email_user'); ?>" class="form-control <?= isset($errors['email_user']) ? 'is-invalid' : null; ?>" id="email_user">
                        <div class="invalid-feedback"><?= isset($errors['email_user']) ? $errors['email_user'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_user" value="" class=" form-control <?= isset($errors['password_user']) ? 'is-invalid' : null; ?>">
                        <div class="invalid-feedback"><?= isset($errors['password_user']) ? $errors['password_user'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Verifikasi Password</label>
                        <input type="password" name="password_user2" value="" class=" form-control <?= isset($errors['password_user2']) ? 'is-invalid' : null; ?>">
                        <div class="invalid-feedback"><?= isset($errors['password_user2']) ? $errors['password_user2'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control <?= isset($errors['role']) ? 'is-invalid' : null; ?>">
                            <option value=""></option>
                            <option value="1" <?= old('role') == 1 ? 'selected' : null; ?>>Admin</option>
                            <option value="2" <?= old('role') == 2 ? 'selected' : null; ?>>User</option>
                        </select>
                        <div class="invalid-feedback"><?= isset($errors['role']) ? $errors['role'] : null; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Info User</label>
                        <textarea name="info_user" class="form-control <?= isset($errors['info_user']) ? 'is-invalid' : null; ?>"><?= old('info_user'); ?></textarea>
                        <div class="invalid-feedback"><?= isset($errors['info_user']) ? $errors['info_user'] : null; ?></div>
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