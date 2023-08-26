<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIMKKN</title>

    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/Unsoed.png')?>"/>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

</head>

<body class="gray-bg">

     <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Isikan Data <small>Pendaftaran KKN Mahasiswa Unsoed</small></h5>
                            <div class="ibox-tools">
                                <a class="close-link">
                                    <a href="<?php echo site_url('Login')?>"><i class="fa fa-times"></i></a>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('Pendaftaran/daftar')?>"> 
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                    <input name="nama_mahasiswa" type="text" class="form-control" required="required">
									<span class="help-block m-b-none">Isikan nama lengkap anda (huruf besar kecil)</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <!-- Pisah -->
                                <div class="form-group"><label class="col-sm-2 control-label">NIM</label>
                                    <div class="col-sm-10"><input name="nim" type="text" class="form-control" required="required">
                                    <span class="help-block m-b-none">Isikan nim anda (huruf besar)</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <!-- Pisah -->
                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10"><input name="password" type="text" class="form-control" required="required">
                                    <span class="help-block m-b-none">Isikan password akun anda</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    
                                <!-- Pisah -->
                                <div class="form-group"><label class="col-sm-2 control-label">Lokasi KKN</label>
                                    <div class="col-sm-10"><select class="form-control m-b" name="lokasi_kkn" required="required">
                                        <option selected="selected" disabled="disabled">--Pilih Lokasi--</option>
                                        <?php foreach($data as $row){
                                            $pendaftar = $row->pendaftar;
                                            $kuota     = $row->kuota;
                                            $sisa      = $kuota - $pendaftar;
                                        if ($sisa == 0) 
                                        echo "<option disabled='disabled'>".$row->kabupaten." -- ".$row->kecamatan." -- (".$row->jenis_kkn.") -- kuota(".$sisa.")</option>";
                                        else
                                        echo "<option value='".$row->id_lokasi."'>".$row->kabupaten." -- ".$row->kecamatan." -- (".$row->jenis_kkn.") -- kuota(".$sisa.")</option>";
                                        }
                                    ?> 
                                    </select>
                                    <span class="help-block m-b-none">Pilih lokasi KKN</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <!-- Pisah -->
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Surat Cek Kesehatan</label>
                            	<input style="margin-left: 245px" type="file" name="surat_cek_kesehatan" required="required"></span>
                                <span  style="margin-left: 245px;margin-top: 10px" class="help-block m-b-none">(Surat keterangan sehat dari klnik pratama)</span>
                            	<div class="hr-line-dashed"></div>

                                <!-- Pisah -->
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Bukti Pendaftaran</label>
                            	<input style="margin-left: 257px" type="file" name="bukti_pendaftaran" required="required"></span>
                            	<span  style="margin-left: 257px;margin-top: 10px" class="help-block m-b-none">(Bukti pendaftaran dari SIA)</span>
                            	<div class="hr-line-dashed"></div>

                                <!-- Pisah -->
                                <input type="hidden" name="masuk" value="1">
                                
                                <!-- Pisah -->
                                <div class="form-group">
                                    <div class="col-lg-10"><input style="margin-left: 250px;width: 95%" type="text" disabled="" placeholder="Data yang dinputkan benar keasliannya !" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">      
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button style="margin-left: 13px" class="btn btn-white" type="submit">Batal</button>
                                        <button  name="daftar" class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   <!--  Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

</body>

</html>
