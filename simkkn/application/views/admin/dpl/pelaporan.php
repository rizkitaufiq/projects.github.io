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
                <li class="active">
                    <a href="<?php echo site_url('Dpl/pelaporan')?>"><i class="fa fa-book"></i> <span class="nav-label">Pelaporan Kelompok</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('Dpl/penilaian') ?>">Penilaian Kelompok</a></li>
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
                    <h2>Data Pendaftar KKN</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">DPL</a>
                        </li>
                        <li class="active">
                            <strong>Pelaporan</strong>
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
                        <h5>PELAPORAN KELOMPOK</h5>
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
                        <th>LPJ</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Komentar</th>
                        <th>Konfirmasi</th>
                        <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($data as $row){?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $row->nama_kelompok;?></td>
                        <td><a href="<?php echo base_url()?>Dpl/download_tentatif/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><a href="<?php echo base_url()?>Dpl/download_definitif/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><a href="<?php echo base_url()?>Dpl/download_roadmap/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><a href="<?php echo base_url()?>Dpl/download_lpj/<?php echo $row->id_pelaporan?>"><button class="btn-primary btn fa fa-file"></button></a></td>
                        <td><?php echo $row->waktu;?></td>
                        <td><?php echo $row->status;?></td>
                        <td><?php echo $row->komentar;?></td>
                        <td>
                        <a style="cursor: pointer;" onclick="select_data(
                            '<?= $row->id_pelaporan ?>',
                            '<?= $row->nama_kelompok ?>', 
                            '<?= $row->tentatif ?>',
                            '<?= $row->definitif ?>',
                            '<?= $row->roadmap ?>',
                            '<?= $row->lpj ?>',
                            '<?= $row->komentar ?>',
                            '<?= $row->status ?>',  
                            )" data-toggle="modal" data-target="#konfirmasi"><i class="btn-info btn fa fa-arrow-down"></i>
                        </a>
                        </td>
                        <td><a href="<?php echo base_url()?>Dpl/hapus_pelaporan/'.$row->id_pelaporan;?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><button class="btn-danger btn fa fa-trash" ></button></a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                    </table>
                       </div>
                    </div>
                     <div id="konfirmasi" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 style="margin-left: 30%" class="modal-tittle">Konfirmasi Status Pelaporan</h4>
                                <div class="hr-line-dashed"></div>
                                <form method="post" action="<?php echo site_url('Dpl/status_pelaporan')?>">
                                    <div class="modal-body">
                                    <div class="form-group">
                                       <!--  <label class="col-sm-2 control-label">Kelompok</label> -->
                                        <input type="hidden" name="id_pelaporan" id="id_pelaporan">
                                        <input style="margin-left: 60px" type="hidden" id="nama_kelompok" name="nama_kelompok" required="required" maxlength="2" readonly="">
                                        <!-- <div class="hr-line-dashed"></div> -->
                                        
                                        <!-- Pisah- -->
                                        <!-- <label style="margin-top: 20px;" class="col-sm-2 control-label">Tentatif</label> -->
                                        <input style="margin-top: 20px; margin-left: 60px" type="hidden" id="tentatif" name="tentatif" required="required" maxlength="2" readonly="">
                                      <!--   <div class="hr-line-dashed"></div> -->
                                        
                                        <!-- Pisah- -->
                                       <!--  <label style="margin-top: 20px;" class="col-sm-2 control-label">Definitf</label> -->
                                        <input style="margin-top: 20px; margin-left: 60px" type="hidden" id="definitif" name="definitif" required="required" maxlength="2" readonly="">
                                       <!--  <div class="hr-line-dashed"></div> -->
                                        
                                        <!-- Pisah- -->
                                       <!--  <label style="margin-top: 20px;" class="col-sm-2 control-label">Roadmap</label> -->
                                        <input style="margin-top: 20px; margin-left: 60px" type="hidden" name="roadmap" id="roadmap" required="required" maxlength="2" readonly="">
                                       <!--  <div class="hr-line-dashed"></div>-->
                                       
                                       <!-- Pisah- -->
                                       <!--  <label style="margin-top: 20px;" class="col-sm-2 control-label">LPJ</label> -->
                                        <input style="margin-top: 20px; margin-left: 60px" type="hidden" name="lpj" id="lpj" required="required" maxlength="2" readonly="">
                                        <!--   <div class="hr-line-dashed"></div> -->

                                         <!-- Pisah- -->
                                        <label class="col-sm-2 control-label">Komentar</label>
                                        <textarea id="komentar" name="komentar" style="margin-left: 55px;width: 50%;height:120px;"></textarea>
                                        <div class="hr-line-dashed"></div>
                                        

                                        <!-- Pisah- -->
                                        <label style="margin-top: 20px;" class="col-sm-2 control-label">Status</label>
                                        <select style="margin-left: 140px; width: 200px" class="form-control m-b" name="status" id="status" ">
                                            <option selected="selected" disabled="disabled">--Pilih Status--</option>
                                            <option value="diperbaiki">Diperbaiki</option>
                                            <option value="diterima dpl">Diterima</option>
                                        </select>
                                       <!--  <div class="hr-line-dashed"></div> -->
                                        
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
                    function select_data($id_pelaporan,$nama_kelompok, $tentatif,$definitif,$roadmap,$lpj,$komentar, $status){
                        $("#id_pelaporan").val($id_pelaporan);
                        $("#nama_kelompok").val($nama_kelompok);
                        $("#tentatif").val($tentatif);
                        $("#definitif").val($definitif);
                        $("#roadmap").val($roadmap);
                        $("#lpj").val($lpj);
                        $("#komentar").val($komentar);
                        $("#status").val($status);
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
                // dom: '<"html5buttons"B>lTfgitp',
                // buttons: [
                //     { extend: 'copy'},
                //     {extend: 'csv'},
                //     {extend: 'excel', title: 'ExampleFile'},
                //     {extend: 'pdf', title: 'ExampleFile'},

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
