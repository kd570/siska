<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Jobdesk - N14 DJP </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Jobdesk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Jobdesk</a></div>
            <!-- <div class="breadcrumb-item">Default Layout</div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 d-flex flex-row-reverse">
            <div class="font-weight-bold mb-2 text-small p-0"><a href="<?= site_url('jobdesk'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card mt-5  pb-5 profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Jabatan</div>
                                <div class="profile-widget-item-value"><?= $jobdesk->nama_jb; ?></div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Bagian</div>
                                <div class="profile-widget-item-value"><?= $jobdesk->nama_bg; ?></div>
                            </div>
                            <!-- <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Atasan</div>
                                <div class="profile-widget-item-value">-</div>
                            </div> -->
                        </div>
                    </div>
                    <div class="profile-widget-description pb-0">
                        <div class="profile-widget-name">Deskripsi Jabatan</div>
                        <div class="text-muted d-inline font-weight-normal">
                            <?= $jobdesk->des_jb; ?>
                        </div>
                        <div class="profile-widget-name mt-3">Deskripsi Jobdesk</div>
                        <div class="text-muted d-inline font-weight-normal">
                            <?= $jobdesk->des_jd; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 ">
                <div class="card mt-5 ">
                    <div class="card-header d-flex justify-content-center">
                        <h4>Lampiran</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <figure class="avatar avatar-xl mb-3" data-initial='Pdf'></figure>
                        </div>
                        <div class=" font-weight-bold mb-2 text-small d-flex justify-content-center"><a href="<?= site_url('jobdesk/download/' . $jobdesk->id_jd); ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download Jobdesk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>