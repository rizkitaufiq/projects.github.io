<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIMKKN</title>

    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/Unsoed.png')?>"/>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url('assets/css/plugins/toastr/toastr.min.css')?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" style="width: 15%;height:15%" class="img-circle" src="<?php echo base_url('assets/img/user.jpg')?>" />
                             </span>
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">LPPM</strong>
                             <span class="text-muted text-xs block">Monitoring KKN</span>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('Lppm')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Beranda</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Lppm/pendaftar')?>"><i class="fa fa-user"></i> <span class="nav-label">Pendaftar</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo site_url('Lppm/kelola_lokasi')?>">Kelola Lokasi</a></li>
                            <li><a href="<?php echo site_url('Lppm/kelola_kelompok')?>">Kelola kelompok</a></li>
                            <li><a href="<?php echo site_url('Lppm/pembagian_kelompok')?>">Pembagian kelompok</a></li>
                            <li><a href="<?php echo site_url('Lppm/daftar_kelompok')?>">Daftar Kelompok</a></li>
                           <!--  <li><a href="graph_morris.html">Lokasi Kelompok</a></li> -->
                        </ul>
                    </li>
                   <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Pelaporan Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                             <li>
                             <a href="<?php echo site_url('Lppm/pelaporan_disahkan_dpl')?>"><span class="nav-label">Disahkan DPL</span>
                             </a>
                            </li>
                             <li>
                             <a href="<?php echo site_url('Lppm/pelaporan_disahkan_lppm')?>"><span class="nav-label">Disahkan Lppm</span>
                             </a>
                            </li>
                        </ul>
                    </li>
                   <!--  <li>
                        <a href="widgets.html"><i class="fa fa-pencil"></i> <span class="nav-label">Penilaian</span></a>
                    </li> -->
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang Di Halaman LPPM UNSOED</span>
                </li>

                <li>
                    <a href="<?php echo site_url('Login/logout')?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        <div class="wrapper wrapper-content">
        <div class="row">
                    <a href="<?php echo site_url('Lppm/pendaftar')?>">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Mahasiswa KKN</span>
                               
                                <h5>Pendaftar</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $peserta;?></h1>
                                <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i></div>
                                <small>Total</small>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="<?php echo site_url('Lppm/kelola_kelompok')?>">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">KKN UNSOED</span>
                                <h5>Kelompok</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $kelompok ?></h1>
                                <div class="stat-percent font-bold text-info"><i class="fa fa-group"></i></div>
                                <small>Total</small>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="<?php echo site_url('Lppm/kelola_kelompok')?>">    
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">KKN UNSOED</span>
                                <h5>DPL</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $dpl ?></h1>
                                <div class="stat-percent font-bold text-navy"><i class="fa fa-user"></i></div>
                                <small>Total</small>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="<?php echo site_url('Lppm/pelaporan_disahkan_dpl')?>">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Diterima DPL</span>
                                <h5>Laporan</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $pelaporan?></h1>
                                <div class="stat-percent font-bold text-danger"><i class="fa fa-book"></i></div>
                                <small>Total</small>
                            </div>
                        </div>                     
                    </div>
                    </a>
               </div>
                        <div class="sidebar-content">
                            <h4>Tentang Sistem</h4>
                            <div class="small">
                                Sistem ini memuat tentang informasi dan progrees seputar kkn mahasiswa UNSOED
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>

    <!-- Flot -->
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.spline.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.pie.js')?>"></script>

    <!-- Peity -->
    <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/demo/peity-demo.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js')?>"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.min.js')?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js')?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url('assets/js/demo/sparkline-demo.js')?>"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url('assets/js/plugins/chartJs/Chart.min.js')?>"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js')?>"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('UNIVERSITAS JENDERAL SOEDIRMAN', 'Selamat datang di SIMKKN');

            }, 1300);


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#F2FC62","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#F2FC62","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
</body>
</html>
