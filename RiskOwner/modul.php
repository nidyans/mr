<?php session_start();  
 ob_start();
    error_reporting();
    if (isset($namauser)){
        require_once("../koneksi.inc.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>RiMos</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
<script type="text/javascript" src="jquery.js"></script>
<style type="text/css">
.AJI {
  text-align: center;
}
.bold {
  font-weight: bold;
  text-align: center;
}
.tengah {
  text-align: center;
}
</style>

</head>
<body>
<?php 
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
  $row_user=mysql_fetch_array($sql_user); 

  $sql_periode=mysql_query("select * from periode WHERE id='1'");
  $row_per=mysql_fetch_array($sql_periode); 

$tgl=date('Y-m-d');

?>
<!--Header-part-->
<div id="header">
  <h1><a href="menuAdmin.php">Risiko Management Online</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $row_user['nama_pejabat'];?></span><b class="caret"></b></a>
      
    </li>
    
    <li class=""><a title="" href="?halaman=keluar"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="?halaman=home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>


    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Proses Manajemen Risiko</span></a>
    <?php if($tgl == $row_per['tgl_mulai'] or $tgl < $row_per['tgl_akhir']) {?>
      <ul>
        <li><a href="?halaman=sasaran&uname=<?php echo $namauser; ?>" >Sasaran</a></li>
        <li><a href="?halaman=identifikasi_analisa&uname=<?php echo $namauser; ?>" >Identifikasi Risiko Dan Analisa Risiko</a></li>
        <li><a href="?halaman=evaluasi" >Evaluasi Risiko</a></li>
       <li><a href="?halaman=laporan_kejadian" >Laporan Kejadian Risiko</a></li>
      </ul> <?php } else if ($tgl > $row_per['tgl_akhir'] ) {?>  
        <ul>
        <li><a href="?halaman=sasaran&uname=<?php echo $namauser; ?>" >Sasaran</a></li>
        <li><a href="?halaman=identifikasi_analisa&uname=<?php echo $namauser; ?>" >Identifikasi Risiko Dan Analisa Risiko</a></li>
        <li><a href="?halaman=evaluasi" >Evaluasi Risiko</a></li>
        <li><a href="?halaman=laporan_kejadian" >Laporan Kejadian Risiko</a></li>
      </ul>
      <?php } ?>
     
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Monitoring Dan Review</span></a>
      <ul>
      <li><a href="?halaman=sasaran_monitoring" >Sasaran Monitoring</a></li>
        <li><a href="?halaman=register_risiko" >Register Risiko</a></li>
        <li><a href="?halaman=kejadian_risiko" >Kejadian Risiko</a></li>        
        <li><a href="?halaman=evaluasi" >Evaluasi Risiko</a></li>           
        
      </ul>
    </li>
    
    
</div>
<!--sidebar-menu-->
<div id="content">
   <div id="content-header">
    <div id="breadcrumb"> <a href="?halaman=home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="container-fluid">
     <?php
                        if (isset($halaman)){
                            if ($halaman == "home"){
                                require_once("kananRiskOwner.php");                            
                            } elseif ($halaman == 'identifikasi_analisa') {
                                require_once("identifikasi_analisa.php");
                             } elseif ($halaman == 'dt_nama_risiko') {
                                require_once("Data_nm_risiko.php");
                                } elseif ($halaman == 'register_risiko') {
                                require_once("register_risiko.php");
                                } elseif ($halaman == 'pilih_risiko') {
                                  require_once("pilih_risiko.php");
                                } elseif ($halaman == 'evaluasi') {
                                require_once("evaluasi.php");
                                 } elseif ($halaman == 'laporan_kejadian') {
                                require_once("laporan_kejadian.php");
                                } elseif ($halaman == 'kejadian_risiko') {
                                require_once("kejadian_risiko.php");
                                } elseif ($halaman == 'detail_kejadian_risiko') {
                                require_once("detail_kejadian_risiko.php");
                                } elseif ($halaman == 'sasaran') {
                                require_once("sasaran.php");
                              } elseif ($halaman == 'sasaran_monitoring') {
                                require_once("sasaran_monitoring.php");
                              } elseif ($halaman == 'detail_sasaran') {
                                require_once("detail_sasaran.php");
                              }elseif ($halaman == 'detail_risiko') {
                                require_once("detail_risiko_all.php");
                                
                            }elseif ($halaman == "keluar"){
                                session_destroy();
                                header("location: ../");
                            } else {
                                header("location: ./modul.php?halaman=home");
                            }
                        } else {
                            header("location: ./modul.php?halaman=home");
                        }
                        echo "\n";
                    ?>
  
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin</a> </div>
</div>
<!--end-Footer-part-->

<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script>  
<script src="js/matrix.js"></script>
<!--script src="js/jquery.toggle.buttons.js"></script--> 
<script src="js/matrix.tables.js"></script>
<script src="js/jquery.validate.js"></script> 
<script src="js/jquery.wizard.js"></script>  
<script src="js/matrix.wizard.js"></script>
<script src="js/matrix.interface.js"></script> 

 <script src="js/bootstrap-datepicker.js"></script> 
</body>
</html>
<?php
      mysql_close();
    } else {
        header("location: ./");
    }
?>
