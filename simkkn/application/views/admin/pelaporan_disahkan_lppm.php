<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <li>
                        <a href="<?php echo site_url('Lppm')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Beranda</span></a>
                    </li>
                    <li>
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
                    <li class="active">
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Pelaporan Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                             <li>
                             <a href="<?php echo site_url('Lppm/pelaporan_disahkan_dpl')?>"><span class="nav-label">Disahkan DPL</span>
                             </a>
                            </li>
                             <li class="active">
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

        <div id="page-wrapper" class="gray-bg">
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
                    <a href="<?php echo site_url('Lppm/logout')?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Pelaporan Kelompok KKN</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Lppm</a>
                        </li>
                        <li class="active">
                            <strong>Pelaporan disahkan LPPM</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pelaporan Kelompok</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelompok</th>
                        <th>Tentatif</th>
                        <th>Definitif</th>
                        <th>Roadmap</th>
                        <th>Lpj</th>
                        <th>Konfirmasi DPL</th>
                        <th>Komentar</th>
                        <th>Status</th>
                       <!--  <th>Konfirmasi</th> -->
                      <!--   <th>Konfirmasi</th> -->
                    </tr>
                    </thead>
                    <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($data as $row){?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $row->nama_kelompok;?></td>
                        <td><a href="<?php echo base_url()?>Lppm/download_tentatif/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><a href="<?php echo base_url()?>Lppm/download_definitif/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><a href="<?php echo base_url()?>Lppm/download_roadmap/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><a href="<?php echo base_url()?>Lppm/download_lpj/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><?php echo $row->waktu;?></td>
                        <td><?php echo $row->komentar;?></td>
                        <td><?php echo $row->status;?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                    </table>
                    </div>
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

    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                // dom: '<"html5buttons"B>lTfgitp',
                // buttons: [
                //     // { extend: 'copy'},
                //     // {extend: 'csv'},
                //     // {extend: 'excel', title: 'ExampleFile'},
                //     // {extend: 'pdf', title: 'ExampleFile'},

                //     {extend: 'print',
                //      customize: function (win){
                //             $(win.document.body).addClass('white-bg');
                //             $(win.document.body).css('font-size', '10px');

                //             $(win.document.body).find('table')
                //                     .addClass('compact')
                //                     .css('font-size', 'inherit');
                //     }
                //     }
                // ]

            });

        });

    </script>

</body>

</html>
