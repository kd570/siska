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
                            140
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
                            105.996,58 Ha
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
                            36.144,01 Ha
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
                        <div class="pt-2" id="map" style="width: 100%; height: 400px;"></div>
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

<script>
    const unitkerja = L.layerGroup();

    // const LeafIcon = L.Icon.extend({
    //     options: {
    //         shadowUrl: '<?= base_url() ?>/leaflet/images/marker-shadow.png',
    //         // iconSize: [38, 95],
    //         // shadowSize: [50, 64],
    //         // iconAnchor: [22, 94],
    //         // shadowAnchor: [4, 62],
    //         // popupAnchor: [-3, -76]
    //     }
    // });
    // const greenIcon = new LeafIcon({
    //     iconUrl: '<?= base_url() ?>/leaflet/images/marker-icon.png'
    // });

    <?php foreach ($unit_kerja as $key => $value) { ?>
        const unit_<?= $key + 1 ?> = L.marker([<?= $value->koordinat ?>]).bindPopup('<b><?= $value->nama_uk ?></b><br><?= $value->alamat ?>').addTo(unitkerja);
    <?php } ?>

    // const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19
    // });
    const googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    // const map = L.map('map').setView([-4.208018, 125.388059], 5.3);
    const map = L.map('map', {
        center: [-4.208018, 125.388059],
        zoom: 5,
        // layers: [osm, unitkerja]
        layers: [googleStreets, unitkerja]
    });

    const baseLayers = {
        'Peta Standart': googleStreets
    };

    const overlays = {
        'Unit Kerja': unitkerja
    };

    const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

    // const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19,
    // });
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