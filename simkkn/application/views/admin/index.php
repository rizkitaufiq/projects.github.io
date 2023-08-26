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

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            </div>
            <img style="width: 100px;height: 100px;margin-bottom: 15px" src="<?php echo base_url('assets/img/Unsoed.png')?>">
            <h3>Selamat Datang di Sistem Informasi KKN</h3>
            <p>UNIVERSITAS JENDERAL SOEDIRMAN</p>
            <p>Masukan Akun Anda</p>
            <form method="post" class="m-t" role="form" action="<?php echo site_url('Login/ceklogin')?>">
                <div class="form-group">
                    <input name="nama_pengawas" type="text" class="form-control" placeholder="NAMA PENGAWAS" required="">
                </div>
                <div class="form-group">
                    <input name="pass" type="Password" class="form-control" placeholder="PASSWORD" required="">
                </div>
                <input name="login" type="submit" class="btn btn-primary block full-width m-b" value="LOGIN"></input>
            </form>
        </div>
    </div>

   <!--  Mainly scripts --> -->
    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

</body>

</html>
