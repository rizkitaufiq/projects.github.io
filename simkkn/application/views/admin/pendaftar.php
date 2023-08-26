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
                    <li class="active">
                        <a href="<?php echo site_url('Lppm/pendaftar')?>"><i class="fa fa-user"></i> <span class="nav-label">Pendaftar</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo site_url('Lppm/kelola_lokasi')?>">Kelola lokasi</a></li>
                            <li><a href="<?php echo site_url('Lppm/kelola_kelompok')?>">Kelola kelompok</a></li>
                            <li><a href="<?php echo site_url('Lppm/pembagian_kelompok')?>">Pembagian kelompok</a></li>
                            <li><a href="<?php echo site_url('Lppm/daftar_kelompok')?>">Daftar Kelompok</a></li>
                            <!-- <li><a href="graph_morris.html">Lokasi Kelompok</a></li> -->
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
                    <!-- <li>
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
                    <h2>Data Pendaftar KKN</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Lppm</a>
                        </li>
                        <li class="active">
                            <strong>Pendaftar</strong>
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
                        <h5>Data Pendaftar Mahasiswa KKN</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nim</th>
                        <th>Jenis KKN</th>
                        <th>Lokasi KKN</th>
                        <!-- <th>Surat Cek Kesehatan</th> -->
                        <th>Status</th>
                        <th>Konfirmasi</th>
                        <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($data as $row){?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $row->nama_mahasiswa;?></td>
                        <td><?php echo $row->nim;?></td>
                        <td><?php echo $row->jenis_kkn;?></td>
                        <td><?php echo $row->kabupaten;?></td>
                       <!--  <td><?php echo $row->surat_cek_kesehatan;?></td> -->
                        <td><?php echo $row->konfirmasi;?></td>
                        <td><a style="cursor: pointer;" onclick="select_data(
                            '<?= $row->id_peserta ?>',
                            '<?= $row->nama_mahasiswa ?>',
                            '<?= $row->nim ?>',
                            '<?= $row->jenis_kkn ?>',
                            '<?= $row->kabupaten ?>',
                            // '<?= $row->surat_cek_kesehatan ?>',
                            // '<?= $row->bukti_pendaftaran ?>', 
                            '<?= $row->konfirmasi ?>'  
                            )" data-toggle="modal" data-target="#konfirmasi"><i class="btn-info btn fa fa-arrow-down"></i>  
                        </a></td>
                        <td><a href="<?php echo base_url()?>Lppm/hapus_pendaftar/<?php echo $row->id_peserta ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><button  class="btn-danger btn fa fa-trash-o"></button></a></td>
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

                <div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="konfirmasi" class="modal fade">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 style="margin-left: 40%" class="modal-tittle">Konfirmasi Pendaftaran</h4>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post" action="<?php echo site_url('Lppm/konfirmasi_pendaftar')?>">
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Mahasiswa</label>
                                        <input type="hidden" id="id_peserta" name="id_peserta">
                                        <input class="form-control" style="margin-left: 150px;width: 50%" name="nama_mahasiswa" readonly="" type="text" id="nama_mahasiswa" value="<?php echo $row->nama_mahasiswa ?>" ></span>
                                        <span  style="margin-left: 150px;"  class="help-block m-b-none">(Nama Lengkap)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">NIM</label>
                                        <input class="form-control" style="margin-top: 20px; margin-left: 150px;width: 50%" readonly="" name="nim" id="nim" type="text" value="<?php echo $row->nim?>">
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(Nomer Induk Mahasiswa)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">Jenis KKN</label>
                                        <input class="form-control" style="margin-top: 20px; margin-left: 150px;width: 50%" type="text" readonly="" value="<?php echo $row->jenis_kkn?>">
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(Pemberdayaan Masyarakat, PPM, TEMATIK)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">Lokasi KKN</label>
                                        <input class="form-control" style="margin-top: 20px; margin-left: 150px;width: 50%" type="text" readonly="" id="lokasi_kkn" value="<?php echo $row->kabupaten ?>"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(Pengesahan sudah di tanda tangani dpl dan kepala desa)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                       <!--  <label style="margin-top: 20px;" class="col-sm-2 control-label">Surat Cek Kesehatan</label>
                                        <iframe src="<?php echo base_url()?>./upload/pendaftaran/s.kes/<?php echo $row->surat_cek_kesehatan?>" id="surat_cek_kesehatan"></iframe>
                                        <div class="hr-line-dashed"></div>
                                         -->
                                        <!-- Pisah- -->
                                       <!--  <label style="margin-top: 20px;" class="col-sm-2 control-label">Bukti Pendaftaran</label>
                                        <input class="form-control" style="margin-top: 20px; margin-left: 150px;width: 50%" type="text" readonly="" name="bukti_pendaftaran" id="bukti_pendaftaran" value="<?php echo $row->bukti_pendaftaran ?>"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(softfile bukti pendaftaran dari SIA)</span>
                                        <div class="hr-line-dashed"></div> -->

                                        <!-- Pisah -->
                                        <label class="col-sm-2 control-label">Status Pendaftaran</label>
                                        <select style="margin-left: 150px; width: 200px" class="form-control m-b" name="konfirmasi" id="konfirmasi" ">
                                            <option selected="selected" disabled="disabled">--Pilih Status--</option>
                                            <option value="ditolak">Ditolak</option>
                                            <option value="diterima">Diterima</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button style="margin-top: 5px" type="reset" class="btn btn-danger">Reset</button>
                                    <input type="submit" class="btn btn-primary" value="simpan" name="konfirmasi_pendaftar">    
                                    </div>
                                </form>
                            </div>  
                        </div>
                    </div>
                </div>

    <script type="text/javascript">
        function select_data($id_peserta, $nama_mahasiswa,$nim,$jenis_kkn,$kabupaten,$konfirmasi){
            $("#id_peserta").val($id_peserta);
            $("#nama_mahasiswa").val($nama_mahasiswa);
            $("#nim").val($nim);
            $("#jenis_kkn").val($jenis_kkn);
            $("#lokasi_kkn").val($kabupaten);
            // $("#surat_cek_kesehatan").val($surat_cek_kesehatan);
            // $("#bukti_pendaftaran").val($bukti_pendaftaran);
            $("#konfirmasi").val($konfirmasi);
        }
    </script>



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
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    // { extend: 'copy'},
                    // {extend: 'csv'},
                    // {extend: 'excel', title: 'ExampleFile'},
                    // {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

</body>

</html>
