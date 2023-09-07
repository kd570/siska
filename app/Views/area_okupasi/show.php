<?php

use PhpParser\Node\Stmt\Echo_;
?>
<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Detail Area Okupasi - SISKA14</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header mb-3">
        <h1>Okupasi</h1>
    </div>
    <div class="section-body">
        <div class="card author-box card-primary">
            <div class="card-header">
                <a href="<?= site_url('areaokupasi'); ?>" method="post" autocomplete="off">
                    <h4>Data Okupasi</h4>
                </a>
                <h4>/</h4>
                <h4> Lihat Data Okupasi</h4>
                <div class="card-header-action">
                    <a href="<?= site_url('areaokupasi'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <!-- TESSS -->
                <h3 id="title">Areal Okupasi : <?= $okupasi->nama_okupasi; ?></h3>
                <div class="row">
                    <div class="col-md-7">
                        <!-- Info -->
                        <table class="table table-bordered table-striped" style="width:100%">
                            <tbody>
                                <tr>
                                    <td style="width:30%">Nama Lahan Okupasi</td>
                                    <td style="width:70%"><?= $okupasi->nama_okupasi; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Okupan</td>
                                    <td><?= $okupasi->nama_okupan ?></td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja</td>
                                    <td><?= $okupasi->nama_uk ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>
                                        <?= $okupasi->nama_kelurahan ?>, <?= $okupasi->nama_kecamatan ?>, <?= $okupasi->nama_kabupaten ?>, <?= $okupasi->nama_provinsi ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Terbit Sertifikat</td>
                                    <td><?= $okupasi->tgl_terbit ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Berakhir Sertifikat</td>
                                    <td><?= $okupasi->tgl_expire ?></td>
                                </tr>
                                <tr>
                                    <td>Masa Berlaku Sertifikat</td>
                                    <td>
                                        <?php
                                        $lama_simpan_awal = $okupasi->tgl_terbit;
                                        $lama_simpan_akhir = $okupasi->tgl_expire;
                                        if ($lama_simpan_awal === '0000-00-00' || $lama_simpan_akhir === '0000-00-00' || empty($lama_simpan_awal) || empty($lama_simpan_akhir)) {
                                            echo "none";
                                        } else {
                                            $awal = new DateTime($lama_simpan_awal);
                                            $akhir = new DateTime($lama_simpan_akhir);
                                            $diff = $akhir->diff($awal);
                                            if ($diff->y != 0) {
                                                echo "<b><i>" .  $diff->y . " tahun " . $diff->m . " bulan " . $diff->d . " hari</b></i>";
                                            } elseif ($diff->y == 0 && $diff->m != 0) {
                                                echo "<b><i>" . $diff->m . " bulan " . $diff->d . " hari</b></i>";
                                            } elseif ($diff->y == 0 && $diff->m == 0 && $diff->d != 0) {
                                                echo "<b><i>" . $diff->d . " hari</b></i>";
                                            } else {
                                                echo "<b><i><b><i syle:'color:red;'>none</b></i>";
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sisa Masa Berlaku Sertifikat</td>
                                    <td>
                                        <?php
                                        $now = date("Y-m-d");
                                        $lama_simpan_akhir = $okupasi->tgl_expire;
                                        if ($lama_simpan_awal === '0000-00-00' || $lama_simpan_akhir === '0000-00-00' || empty($lama_simpan_awal) || empty($lama_simpan_akhir)) {
                                            echo "none";
                                        } else {
                                            $awal = new DateTime($now);
                                            $akhir = new DateTime($lama_simpan_akhir);
                                            $diff = $akhir->diff($awal);
                                            if ($akhir > $awal) {
                                                if ($diff->y != 0) {
                                                    echo "<b><i>" .  $diff->y . " tahun " . $diff->m . " bulan " . $diff->d . " hari</b></i>";
                                                } elseif ($diff->y == 0 && $diff->m != 0) {
                                                    echo "<b><i>" . $diff->m . " bulan " . $diff->d . " hari</b></i>";
                                                } elseif ($diff->y == 0 && $diff->m == 0 && $diff->d != 0) {
                                                    echo "<b><i>" . $diff->d . " hari</b></i>";
                                                }
                                            } else {
                                                echo "<b style='color: red;'><i>expire</b></i>";
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Guna Lahan</td>
                                    <td>
                                        <?= $okupasi->nama_guna ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Luas Okupasi (Ha)</td>
                                    <td>
                                        <?php echo number_format($okupasi->luas_okupasi, 2, ",", ".") ?> Ha
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>
                                        <?= $okupasi->des_okupasi ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gambar Dokumentasi</td>
                                    <td>
                                        <div class="gallery mt-2">
                                            <?php
                                            $gambar = explode(',', $okupasi->gambar);
                                            $i = 0;
                                            ?>
                                            <?php foreach ($gambar as $key2) { ?>
                                                <div class="gallery-item" data-image="<?= base_url() ?>/upload/okupasi/<?= $okupasi->id_okupasi ?>/file_gambar/<?= $gambar[$i] ?>" data-title="<?= $gambar[$i] ?>" href="<?= base_url() ?>/upload/okupasi/<?= $okupasi->id_okupasi ?>/file_gambar/<?= $gambar[$i] ?>" title="<?= $gambar[$i] ?>" style="background-image: url(&quot;<?= base_url() ?>/upload/okupasi/<?= $okupasi->id_okupasi ?>/file_gambar/<?= $gambar[$i] ?>" title="<?= $gambar[$i] ?>&quot;);"></div>
                                            <?php $i = $i + 1;
                                            } ?>
                                            <!-- <div class="gallery-item" data-image="<?= base_url() ?>/template/assets/img/news/img01.jpg" data-title="Image 1" href="assets/img/news/img01.jpg" title="Image 1" style="background-image: url(&quot;assets/img/news/img01.jpg&quot;);"></div>
                                            <div class="gallery-item" data-image="<?= base_url() ?>/template/assets/img/news/img02.jpg" data-title="Image 2" href="assets/img/news/img02.jpg" title="Image 2" style="background-image: url(&quot;assets/img/news/img02.jpg&quot;);"></div>
                                            <div class="gallery-item" data-image="<?= base_url() ?>/template/assets/img/news/img03.jpg" data-title="Image 3" href="assets/img/news/img03.jpg" title="Image 3" style="background-image: url(&quot;assets/img/news/img03.jpg&quot;);"></div>
                                            <div class="gallery-item gallery-more" data-image="<?= base_url() ?>/template/assets/img/news/img04.jpg" data-title="Image 4" href="assets/img/news/img04.jpg" title="Image 4" style="background-image: url(&quot;assets/img/news/img04.jpg&quot;);">
                                                <div>+2</div>
                                            </div> -->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Lokasi</h4>
                            </div>
                            <div class="card body px-4">
                                <div class="pt-2" id="map" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TESSS -->

        </div>
    </div>
    </div>
</section>
<!-- script Here -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    const okupasi = L.layerGroup();

    //MENAMPILKAN POLIGON GEOJSON OKUPASI
    <?php
    $file_string = $okupasi->file;
    $file = explode(',', $file_string);
    $i = 0;
    ?>
    <?php foreach ($file as $key2) { ?>
        $.getJSON('<?= base_url() ?>/upload/okupasi/<?= $okupasi->id_okupasi ?>/file_geo/<?= $file[$i] ?>', function(data) {
            okupasi<?= $i ?> = L.geoJSON(data, {
                style: function(feature) {
                    return {
                        opacity: 1.0,
                        weight: 0.8,
                        color: 'red',
                        fillOpacity: 0.3,
                        fillColor: 'red',
                    }
                }
            }).bindPopup("<?= $okupasi->nama_okupasi ?>").addTo(okupasi);
        });
    <?php $i = $i + 1;
    } ?>


    // MENAMPILKAN PETA DASAR;
    const googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    const map = L.map('map', {
        center: [<?= $okupasi->koordinat ?>],
        zoom: 8,
        layers: [googleStreets, okupasi],
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        }
    });
    const baseLayers = {
        'Peta Standart': googleStreets
    };
    const overlays = {
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