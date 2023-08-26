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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Anggota</strong>
                             <span class="text-muted text-xs block">Kelompok KKN</span>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                 <li class="active">
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('Mahasiswa/anggota') ?>">Penilaian Kelompok</a></li>
                            <li class="active"><a href="<?php echo base_url('Mahasiswa/anggota_daftar_nilai') ?>">Daftar Penilaian</a></li>
                        </ul>
                    </li>
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
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang Di Halaman Kormades</span>
                </li>

                <li>
                    <a href="<?php echo site_url('Mahasiswa/logout')?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Daftar Nilai Kelompok</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Anggota</a>
                        </li>
                        <li class="active">
                            <strong>Nilai</strong>
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
                        <h5>DAFTAR PENILAIAN ANGGOTA</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Keaktifan</th>
                        <th>Kerjasama</th>
                        <th>Disiplin</th>
                        <th>Tanggung Jawab</th>
                        <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($data as $row){?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $row->menilai;?></td>
                        <td><?php echo $row->keaktifan?></td>
                        <td><?php echo $row->kerjasama?></td>
                        <td><?php echo $row->disiplin?></td>
                        <td><?php echo $row->tanggung_jawab?></td>
                        <td>
                         <a href="<?php echo base_url()?>Mahasiswa/anggota_hapus_penilaian/<?php echo $row->id_penilaian ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><button class="btn-danger btn fa fa-trash"></button></a>
                        </td>
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
            });

        });

    </script>

</body>

</html>
