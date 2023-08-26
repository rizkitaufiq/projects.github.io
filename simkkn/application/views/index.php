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
            <br><br>
            <img style="margin-top: 30px; width: 100px;height: 100px;margin-bottom: 15px" src="<?php echo base_url('assets/img/Unsoed.png')?>">
            <h3>Selamat Datang di Sistem Informasi KKN</h3>
            <p>UNIVERSITAS JENDERAL SOEDIRMAN</p>
            <p>MENU</p>
            <br>
            <table>
            <tr>
                <th>
                <a href="<?php echo site_url('Login/pengawas')?>">
                    <button style="margin-left: -15%" class="btn btn-danger block full-width m-b">HALAMAN DOSEN</button>
                </a>
                </th>
                <th>
                <a href="<?php echo site_url('Mahasiswa')?>">
                <button style="margin-left: 2%" class="btn btn-primary block full-width m-b">HALAMAN MAHASISWA</button>
                </a>
                <th>

            </tr>
            </table>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

</body>

</html>
