<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Data User - N14 DJP</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Users</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('crud2'); ?>" method="post" autocomplete="off">
                    <h4>Data Users</h4>
                </a>
                <h4>/</h4>
                <h4> Edit Data User</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('user'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('user/' . $user->id_user . '/update') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="name_user" value="<?= $user->name_user ?>" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?= $user->username ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <select name="id_bg" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($bagian as $key => $value) : { ?>
                                    <option value="<?= $value->id_bg; ?>" <?= $user->id_bg == $value->id_bg ? 'selected' : null; ?>><?= $value->nama_bg; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_user" value="<?= $user->email_user ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control <?= isset($errors['role']) ? 'is-invalid' : null; ?>">
                            <option value=""></option>
                            <option value="1" <?= $user->role == 1 ? 'selected' : null; ?>>Admin</option>
                            <option value="2" <?= $user->role == 2 ? 'selected' : null; ?>>User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Info User</label>
                        <textarea name="info_user" class="form-control <?= isset($errors['info_user']) ? 'is-invalid' : null; ?>"><?= $user->info_user ?></textarea>
                    </div>
                    <div class="section-button">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
</section>
<?= $this->endSection() ?>