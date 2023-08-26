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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">DPL</strong>
                             <span class="text-muted text-xs block">Monitoring KKN</span>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo site_url('Dpl')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Beranda</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('Dpl/pelaporan')?>"><i class="fa fa-book"></i> <span class="nav-label">Pelaporan Kelompok</span></a>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('Dpl/penilaian') ?>">Penilaian Kelompok</a></li>
                        <li><a href="<?php echo base_url('Dpl/penilaian_dosen') ?>">Input Nilai</a></li>
                        <li class="active"><a href="<?php echo base_url('Dpl/daftar_penilaian_dosen') ?>">Daftar Penilaian Dosen</a></li>
                        <li><a href="<?php echo base_url('Dpl/lokasi_kelompok')?>">Lokasi Kelompok</a></li>
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
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang Di Halaman DPL</span>
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
                    <h2>Daftar Nilai Dari Dosen</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">DPL</a>
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
                        <h5>DAFTAR KELOMPOK</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">No</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Menilai</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">A</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">B</th>
                        <th style="text-align:center;" colspan="3">C</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">D</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Total</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Nilai</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Ubah</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Hapus</th>
                    </tr>
                    <td>KH</td>
                    <td>AR</td>
                    <td>PR</td>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($data as $row){?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $row->nama_mahasiswa;?></td>
                        <td><?php echo $row->a;?></td>
                        <td><?php echo $row->b;?></td>
                        <td><?php echo $row->kh;?></td>
                        <td><?php echo $row->ak;?></td>
                        <td><?php echo $row->pr;?></td>
                        <td><?php echo $row->d;?></td>
                        <td><?php echo $row->total;?></td>
                        <td><?php echo $row->nilai;?></td>
                        <td>
                            <a style="cursor: pointer;" onclick="select_data(
                            '<?= $row->id_penilaian_dosen ?>',
                            '<?= $row->nama_mahasiswa ?>',
                            '<?= $row->ak ?>',
                            '<?= $row->a ?>',
                            '<?= $row->b ?>',
                            '<?= $row->kh ?>',
                            '<?= $row->pr ?>',
                            '<?= $row->d ?>',    
                            )" data-toggle="modal" data-target="#ubah"><i class="btn-info btn fa fa-pencil"></i>  
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("Dpl/hapus_penilaian_dosen/".$row->id_penilaian_dosen); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="btn-danger btn fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                    </table>
                       </div>
                        <div class="sidebar-content">
                            <h4>KETERANGAN</h4>
                            <table width="100%">
                            <tbody>
                                <tr>
                                    <td>A  = Penyusunan Program Kerja</td>
                                    <td width="80%">AR = Penilaian Sesama</td>
                                </tr>
                                <tr>
                                    <td>B  = Pelaksanaan Program Kerja</td>
                                    <td width="80%">PR = Prilaku</td>
                                    
                                </tr>
                                <tr>
                                    <td>C  = Personalitas Mahasiswa </td>
                                    <td width="80%">KH = Kehadiran</td>
                                </tr>
                                <tr>
                                    <td>D  = Laporan Akhir</td>
                                </tr>
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

        <div id="ubah" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 style="margin-left: 40%" class="modal-tittle">Input Penilaian</h4>
                                <div class="hr-line-dashed"></div>
                                <form method="post" action="<?php echo site_url('Dpl/dosen_ubah_penilaian')?>">
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <input type="hidden" name="id_penilaian_dosen" id="id_penilaian_dosen">

                                        <!-- Pisah -->
                                        <label class="col-sm-2 control-label">Menilai</label>
                                        <input type="hidden" name="menilai" id="id_peserta" value="id_peserta">
                                        <input class="form-control" style="margin-left: 145px;width: 50%;" type="text" id="nama_mahasiswa" name="nama_mahasiswa" readonly="">
                                        <span  style="margin-left: 150px;"  class="help-block m-b-none">(Anggota yang di nilai)</span>
                                        <div class="hr-line-dashed"></div>

                                        <!-- Pisah -->
                                        <label class="col-sm-2 control-label">AK (Penilaian Sesama)</label>
                                        <input style="margin-left: 60px" type="text" name="ak" id="ak" required="required" maxlength="3"></span>
                                        <span  style="margin-left: 150px;"  class="help-block m-b-none">(nilai 0 s.d 100)</span>
                                        <div class="hr-line-dashed"></div>

                                        <!-- Pisah -->
                                        <label class="col-sm-2 control-label">A (Penyusunan)</label>
                                        <input style="margin-left: 60px" type="text" name="a" id="a" required="required" maxlength="3"></span>
                                        <span  style="margin-left: 150px;"  class="help-block m-b-none">(nilai 0 s.d 100)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">B (Pelaksanaan)</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="b" id="b" required="required" maxlength="3"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 100)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">KH (Kehadiran</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="kh" id="kh" required="required" maxlength="3"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 100)</span>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">PR (Prilaku)</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="pr" id="pr" required="required" maxlength="3"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 100)</span>
                                        <div class="hr-line-dashed"></div>

                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">D (Laporan Akhir)</label>
                                        <input style="margin-top: 20px; margin-left: 60px" type="text" name="d" id="d" required="required" maxlength="3"></span>
                                        <span  style="margin-left: 150px;margin-top: 10px" class="help-block m-b-none">(nilai 0 s.d 100)</span>
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
                    function select_data($id_penilaian_dosen,$nama_mahasiswa,$ak,$a,$b,$kh,$pr,$d){
                        $("#id_penilaian_dosen").val($id_penilaian_dosen);
                        $("#nama_mahasiswa").val($nama_mahasiswa);
                        $("#ak").val($ak);
                        $("#a").val($a);
                        $("#b").val($b);
                        $("#kh").val($kh);
                        $("#pr").val($pr);
                        $("#d").val($d);
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
