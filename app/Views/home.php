<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <!-- <div class="card">
            <div class="card-Header py-0">
                <H5>Selamat Datang di SISKA14 (Sistem Monitoring Keaman Aset) PT Perkebunan Nusantara XIV</H5>
            </div>
            <div class="card-body py-0">
                <p>Siska14 merupakan Sistem Monitoring Keaman Aset PT Perkebunan Nusantara XIV .</p>
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-building"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Unit Kerja</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_uk; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Aset Terdaftar</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_aset; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Luasan Aset</h4>
                        </div>
                        <div class="card-body">
                            <?php echo number_format($luas_aset, 2, ",", ".") ?> Ha
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-map-marked"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Luasan Bermasalah</h4>
                        </div>
                        <div class="card-body">
                            <?php echo number_format($luas_okupasi, 2, ",", ".") ?> Ha
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Peta Aset PTPN XIV</h4>
                    </div>
                    <div class="card body px-4">
                        <div class="pt-2" id="map" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Unit Kerja</h4>
                        <div class="card-header-action">
                            <a href="<?= site_url('unitkerja'); ?>" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="car-body">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Unit Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($unit_kerja as $key => $value) : ?>
                                        <tr>
                                            <td style="width: 5%;"><?= $key + 1 ?></th>
                                            <td style="width: 15%;"><?= $value->nama_uk ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    const unitkerja = L.layerGroup();
    const aset = L.layerGroup();
    const okupasi = L.layerGroup();


    //MENAMPILKAN TITIK KOORDINAT
    <?php foreach ($unit_kerja as $key => $value) { ?>
        const unit_<?= $key + 1 ?> = L.marker([<?= $value->koordinat ?>]).bindPopup('<b><?= $value->nama_uk ?></b><br><?= $value->alamat ?>').addTo(unitkerja);
    <?php } ?>

    //MENAMPILKAN POLIGON GEOJSON ASET
    <?php $h = 0; ?>
    <?php foreach ($area_aset as $key => $value) { ?>
        <?php
        $json_string = $value->file;
        $file = explode(',', $json_string);
        $i = 0;
        ?>
        <?php foreach ($file as $key2) { ?>
            $.getJSON('<?= base_url() ?>/upload/aset/<?= $value->id_aset ?>/file_geo/<?= $file[$i] ?>', function(data) {
                aset<?= $h ?>_<?= $i ?> = L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            opacity: 1.0,
                            weight: 0.5,
                            color: 'green',
                            fillOpacity: 0.3,
                            fillColor: 'green',
                        }
                    },
                }).bindPopup("<h6><?= $value->nama_aset ?></h6><br><b>Nama Okupan :</b> <?= $value->nama_pemilik ?><br><b>Alamat :</b> <?= $value->nama_kelurahan ?>, Kec.<?= $value->nama_kecamatan ?>, <?= $value->nama_kabupaten ?>, <?= $value->nama_provinsi ?><br><b>Penggunaan Lahan :</b> <?= $value->nama_guna ?><br><b>Luas Okupasi :</b> <?= $value->luas ?> Ha").addTo(aset);
            });
        <?php $i = $i + 1;
        } ?>
    <?php $h = $h + 1;
    } ?>

    //MENAMPILKAN POLIGON GEOJSON OKUPASI
    <?php $h = 0; ?>
    <?php foreach ($area_okupasi as $key => $value) { ?>
        <?php
        $json_string = $value->file;
        $file = explode(',', $json_string);
        $i = 0;
        ?>
        <?php foreach ($file as $key2) { ?>
            $.getJSON('<?= base_url() ?>/upload/okupasi/<?= $value->id_okupasi ?>/file_geo/<?= $file[$i] ?>', function(data) {
                okupasi<?= $h ?>_<?= $i ?> = L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            opacity: 1.0,
                            weight: 0.5,
                            color: 'red',
                            fillOpacity: 0.3,
                            fillColor: 'red',
                        }
                    },
                }).bindPopup("<h6><?= $value->nama_okupasi ?></h6><br><b>Nama Okupan :</b> <?= $value->nama_okupan ?><br><b>Alamat :</b> <?= $value->nama_kelurahan ?>, Kec.<?= $value->nama_kecamatan ?>, <?= $value->nama_kabupaten ?>, <?= $value->nama_provinsi ?><br><b>Penggunaan Lahan :</b> <?= $value->nama_guna ?><br><b>Luas Okupasi :</b> <?= $value->luas_okupasi ?> Ha").addTo(okupasi);
            });
        <?php $i = $i + 1;
        } ?>
    <?php $h = $h + 1;
    } ?>

    // MENAMPILKAN PETA DASAR;
    const googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    const map = L.map('map', {
        center: [-3.3931201108463394, 124.41851120215803],
        zoom: 6,
        layers: [googleStreets, unitkerja, aset, okupasi],
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        }
    });
    const baseLayers = {
        'Peta Standart': googleStreets
    };
    const overlays = {
        'Unit Kerja': unitkerja,
        'Aset': aset,
        'Okupasi': okupasi
    };


    //MENAMBAHKAN KONTROL LAYER PETA
    const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

    const googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    const googleTerrain = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    const googleSat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    layerControl.addBaseLayer(googleHybrid, 'Peta Hybrid');
    layerControl.addBaseLayer(googleTerrain, 'Peta Topografi');
    layerControl.addBaseLayer(googleSat, 'Peta Satelit');
</script>

<?= $this->endSection() ?>