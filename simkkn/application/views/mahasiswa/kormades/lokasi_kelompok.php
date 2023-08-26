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

    <!-- css pencarian map -->
     <style>
     
      #map {
        height: 100%;
      }
     
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>

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
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Pelaporan</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo site_url('Mahasiswa/daftar_pelaporan')?>">Upload Pelaporan</a></li>
                            <li><a href="<?php echo base_url('Mahasiswa/status_pelaporan') ?>">Status Pelaporan</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href=""><i class="fa fa-group"></i> <span class="nav-label">Kelompok</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('Mahasiswa/penilaian_kormades') ?>">Penilaian Kelompok</a></li>
                            <li><a href="<?php echo base_url('Mahasiswa/daftar_nilai') ?>">Daftar Penilaian</a></li>
                            <li class="active"><a href="<?php echo base_url('Mahasiswa/lokasi_kelompok')?>">Input Lokasi Kelompok</a></li>
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
                    <h2>Lokasi Posko Kelompok</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Kormades</a>
                        </li>
                        <li class="active">
                            <strong>Lokasi Posko</strong>
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
                        <h5>INPUT LOKASI KELOMPOK</h5>
                    </div>

            <div class="ibox-content">
                <div class="panel panel-primary">
                        <div class="panel-heading"><span class="glyphicon glyphicon-globe"></span> Peta</div>
                        </div>
                        <div class="map">
                          <input id="pac-input" style="height: 34px;width: 25%" class="controls" type="text" placeholder="Cari Lokasi">
                        <div style="height:300px;" id="map">
                 </div>
            </div>
            </div>
            
            <div class="ibox-content">
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> Koordinat Posko</div>
                    <div class="panel-body" style="min-height:300px;">
                        <form action="<?php echo site_url('Mahasiswa/tambah_lokasi')?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" name="lat" id="lat">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" name="lng" id="lng">
                                
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <button class="btn btn-info btn-sm" id="simpankoordinatposko"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
                </div>
                                        
                </div> 
    </div>

<!-- Maps coba2 -->
<script type="text/javascript">
 
 function initAutocomplete() {
        var infowindow;
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -7.404111354506565, lng: 109.24682378768921},
          zoom: 15,
          mapTypeId: 'roadmap'
        });

          // my location
           infoWindow = new google.maps.InfoWindow;
           if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };

              infoWindow.setPosition(pos);
              infoWindow.setContent('Lokasi Saya.');
              infoWindow.open(map);
              map.setCenter(pos);
            }, function() {
              handleLocationError(true, infoWindow, map.getCenter());
            });
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
          infoWindow.setPosition(pos);
          infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
          infoWindow.open(map);
        }

            // even listner ketika peta diklik
            google.maps.event.addListener(map, 'click', function(event) {
            taruhMarker(this, event.latLng);
            });

          // Create the search box and link it to the UI element.
          var input = document.getElementById('pac-input');
          var searchBox = new google.maps.places.SearchBox(input);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

          // Bias the SearchBox results towards current map's viewport.
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });

          var markers = [];
          // Listen for the event fired when the user selects a prediction and retrieve
          // more details for that place.
          searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

        var marker;
          
        function taruhMarker(map, posisiTitik){
            
            if( marker ){
              // pindahkan marker
              marker.setPosition(posisiTitik);
            } else {
              // buat marker baru
              marker = new google.maps.Marker({
                position: posisiTitik,
                map: map,
                animation: google.maps.Animation.BOUNCE
              });
            }
          
             // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
            
        }


</script>

    <!-- Maps -->
   <!--  <script type="text/javascript">
        var marker;
          
        function taruhMarker(peta, posisiTitik){
            
            if( marker ){
              // pindahkan marker
              marker.setPosition(posisiTitik);
            } else {
              // buat marker baru
              marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta,
                animation: google.maps.Animation.BOUNCE
              });
            }
          
             // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
            
        }
        
        // konten infowindow
        var contentString = '<h2>Posko Kelompok Saya</h2>';

        // membuat objek info window
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          position: posisiTitik
        });

         // event saat marker diklik
        marker.addListener('click', function() {
          // tampilkan info window di atas marker
          infowindow.open(marker);
        });

        // --Pisah Fungsi--
        function initMap() {
          var propertiPeta = {
            center:new google.maps.LatLng(-6.879704, 109.125595),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          };
          
          var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
          
          // even listner ketika peta diklik
          google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
          });

        } 

    </script> -->
  
    <div id="initMap" style="margin-left: 30px; width:100%;">
  
      </div>
     
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0Di-e81uG7hXdq7nmcRZqucb3K_YVuF4&libraries=places&callback=initAutocomplete"  async defer>
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
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

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
