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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Kormades</strong>
                             <span class="text-muted text-xs block">Kelompok KKN</span>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                        <a href="<?php echo site_url('Mahasiswa/kormades')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Beranda</span></a>
                    </li>
                    <li>
                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Pelaporan</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo site_url('Mahasiswa/daftar_pelaporan')?>">Upload Pelaporan</a></li>
                            <li><a href="<?php echo base_url('Mahasiswa/status_pelaporan') ?>">Status Pelaporan</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="active"><a href="<?php echo base_url('Mahasiswa/penilaian_kormades') ?>">Penilaian Kelompok</a></li>
                            <li><a href="<?php echo base_url('Mahasiswa/daftar_nilai') ?>">Daftar Penilaian</a></li>
                            <li><a href="<?php echo base_url('Mahasiswa/lokasi_kelompok')?>">Input Lokasi Kelompok</a></li>
                            <li><a href="<?php echo base_url('Mahasiswa/lihat_lokasi_kelompok')?>">Lokasi Kelompok</a></li>
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
                    <h2>Daftar Kelompok KKN</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Kormades</a>
                        </li>
                        <li class="active">
                            <strong>Penilaian</strong>
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
                        <h5>Penilaian Kelompok</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Kelompok</th>
                        <th>Input</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($data as $row){?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $row->nama_mahasiswa;?></td>
                        <td><?php echo $row->nim?></td>
                        <td><?php echo $row->nama_kelompok;?></td>
                        <td>
                        <a style="cursor: pointer;" onclick="select_data(
                            '<?= $row->id_peserta ?>',
                            '<?= $row->nama_mahasiswa ?>',
                            '<?= $row->nim ?>',
                            '<?= $row->nama_kelompok ?>',
                            '<?= $row->kelompok ?>', 
                            )" data-toggle="modal" data-target="#input"><i class="btn-info btn fa fa-arrow-down"></i>
                        </a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                    </table>
                       </div>
                    </div>
                    
                     <div id="input" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 style="margin-left: 40%" class="modal-tittle">Input Penilaian</h4>
                                <div class="hr-line-dashed"></div>
                                <form method="post" action="<?php echo site_url('Mahasiswa/kormades_input_nilai')?>">
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <!-- Pisah -->
                                        <input type="hidden" id="kelompok" name="kelompok" value="kelompok">
                                        <label class="col-sm-2 control-label">Menilai</label>
                                        <input class="form-control" style="margin-left: 145px;width: 50%;" type="text" id="nama_mahasiswa" name="menilai" value="nama_mahasiswa" readonly="">
                                        <span  style="margin-left: 150px;"  class="help-block m-b-none">(Anggota yang di nilai)</span>
                                        <div class="hr-line-dashed"></div>

                                        <!-- Pisah -->
                                        <label class="col-sm-2 control-label">Keaktifan</label>
                                        <input style="margin-left: 60px" type="text" name="keaktifan" required="required" maxlength="2"></span>
                                        <span  style="margin-left: 150px;"  class="help-block m-b-none">(nilai 0 s.d 95)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">Kerjasama</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="kerjasama" required="required" maxlength="2"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 95)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">Disiplin</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="disiplin" required="required" maxlength="2"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 95)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">Tanggung Jawab</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="tanggung_jawab" required="required" maxlength="2"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 95)</span>
                                        <div class="hr-line-dashed"></div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button style="margin-top: 5px" type="reset" class="btn btn-danger">Reset</button>
                                    <input type="submit" class="btn btn-primary" value="simpan" name="input_penilaian">    
                                    </div>
                                </form>
                            </div>
                        </div>                
                    </div>
                </div>

                <script type="text/javascript">
                    function select_data($id_peserta, $nama_mahasiswa,$nim,$nama_kelompok,$kelompok){
                        $("#id_peserta").val($id_peserta);
                        $("#nama_mahasiswa").val($nama_mahasiswa);
                        $("#nim").val($nim);
                        $("#nama_kelompok").val($nama_kelompok);
                        $("#kelompok").val($kelompok);
                    }
                </script>

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
