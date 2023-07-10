<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Ubah Password - N14 DJP </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <!-- <div class="login-brand">
                    <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div> -->
                <?php

                use PhpParser\Node\Stmt\Echo_;

                if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Success !</b>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Error !</b>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card card-primary mt-5">
                    <div class="card-header">
                        <h4>Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        <?php $errors = session()->getFlashdata('errors');
                        // if ($errors != null) {
                        //     dd($errors);
                        // }
                        ?>

                        <form action="<?= site_url('auth/updatepassword/' . userLogin()->id_user) ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="password_old">Password Lama</label>
                                <input id="password_old" type="password" class="form-control" name="password_old" autofocus="" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Password Baru</label>
                                    <input type="password" name="password_user" value="" class="form-control <?= isset($errors['password_user']) ? 'is-invalid' : null; ?>">
                                    <!-- <input id="password_user" type="password" class="form-control" <?= isset($errors['password_user']) ? 'is-invalid' : null; ?> name="password_user"> -->
                                    <div class="invalid-feedback"><?= isset($errors['password_user']) ? $errors['password_user'] : null; ?></div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Konfirmasi Password Baru</label>

                                    <!-- <input id="password_user2" type="password" class="form-control" <?= isset($errors['password_user2']) ? 'is-invalid' : null; ?> name="password_user2"> -->
                                    <input type="password" name="password_user2" value="" class="form-control <?= isset($errors['password_user2']) ? 'is-invalid' : null; ?>">
                                    <div class="invalid-feedback"><?= isset($errors['password_user2']) ? $errors['password_user2'] : null; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>