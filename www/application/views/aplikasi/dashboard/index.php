<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<div class="container-fluid ">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Pendapatan Hari Ini :<br>Rp. <?= number_format($countPendapatan->total) ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" data-toggle="modal" data-target="#countPendapatan" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Transaksi Hari Ini :<br><?= $countPenjualan->total ?> Barang terjual</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" data-toggle="modal" data-target="#countTerjual" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Keuntungan Hari Ini :<br> Rp. <?= number_format($countKeuntungan->total) ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" data-toggle="modal" data-target="#countKeuntungan" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Stok Hampir Habis :<br> <?= $countHabis; ?> Barang </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" data-toggle="modal" data-target="#countStok" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-3 pb-3 mb-4">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Data penjualan harian
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Data Pendapatan Bulanan
                </div>
                <div class="card-body">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Count Pendapatan Modal Start-->
<div class="modal fade" id="countPendapatan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data total pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nota</th>
                                    <th>Total</th>
                                    <th>Bayar</th>
                                    <th>Kembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataPendapatan as $pendapatan) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $pendapatan->nota; ?></td>
                                        <td>Rp. <?= number_format($pendapatan->total); ?></td>
                                        <td>Rp. <?= number_format($pendapatan->bayar); ?></td>
                                        <td>Rp. <?= number_format($pendapatan->kembalian); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Count Pendapatan Modal End-->

<!-- Count Pendapatan Modal Start-->
<div class="modal fade" id="countTerjual" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data total pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataTerjual as $terjual) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $terjual->nama; ?></td>
                                        <td><?= $terjual->total; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Count Pendapatan Modal End-->

<!-- Count Pendapatan Modal Start-->
<div class="modal fade" id="countKeuntungan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data total pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Keuntungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataKeuntungan as $keuntungan) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $keuntungan->nama; ?></td>
                                        <td><?= $keuntungan->jumlah; ?></td>
                                        <td>Rp. <?= number_format($keuntungan->untung); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Count Pendapatan Modal End-->

<!-- Count Pendapatan Modal Start-->
<div class="modal fade" id="countStok" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data total pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataStok as $stok) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $stok->nama; ?></td>
                                        <td><?= $stok->stok; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Count Pendapatan Modal End-->

<?php $this->load->view('template/footer') ?>

<script>
    $(document.body).ready(function() {
        $('#countPendapatan').on('shown.bs.modal', function() {
            $('#dataTable1').DataTable();
        })

        $('#countTerjual').on('shown.bs.modal', function() {
            $('#dataTable2').DataTable();
        })

        $('#countKeuntungan').on('shown.bs.modal', function() {
            $('#dataTable3').DataTable();
        })

        $('#countStok').on('shown.bs.modal', function() {
            $('#dataTable4').DataTable();
        })
    })
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= site_url('/ajax/chart/bar') ?>',
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var databulan = [];
                var dataisi = [];
                for (let index = 0; index < data.bulan.length; index++) {
                    databulan.push(data.bulan[index]);
                    dataisi.push(parseInt(data.data[index]));
                };
                var view = Math.max.apply(Math, dataisi).toString()
                for (let a = 0; a <= view.length; a++) {
                    var isimax = 10 ** a;
                }
                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#292b2c';

                // Bar Chart Example
                var ctx = document.getElementById("myBarChart");
                var myLineChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: databulan,
                        datasets: [{
                            label: "Pendapatan",
                            backgroundColor: "rgba(2,117,216,1)",
                            borderColor: "rgba(2,117,216,1)",
                            data: dataisi,
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'month'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 6
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: isimax,
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    display: true
                                }
                            }],
                        },
                        legend: {
                            display: false
                        }
                    }
                });

            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= site_url('/ajax/chart/area') ?>',
            method: "GET",
            dataType: 'json',
            success: function(params) {

                var tanggal = [];
                var isi = [];
                for (let ab = 0; ab < params.tanggal.length; ab++) {
                    tanggal.push(params.tanggal[ab]);
                    isi.push(params.isi[ab]);
                }

                var view2 = Math.max.apply(Math, isi).toString()
                for (let a = 0; a <= view2.length; a++) {
                    var isimax2 = 10 ** a;
                }

                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#292b2c';

                // Area Chart Example
                var ctx = document.getElementById("myAreaChart");
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: tanggal,
                        datasets: [{
                            label: "Pendapatan",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: isi,
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: isimax2,
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                }
                            }],
                        },
                        legend: {
                            display: false
                        }
                    }
                });

            }
        })
    })
</script>