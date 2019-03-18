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
$year=date('Y');
 $not_approve ="";
 $yes_approve="";

 $not_efektif="";
 $yes_efektif="";
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
  $row_user=mysql_fetch_array($sql_user); 
 
if ($row_user['rayon']=='-'){
$sql = "SELECT count(*) AS jumlah FROM risiko where status = '0' and status2= '0' and kodeunit='$row_user[kodeunit]' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$not_approve = mysql_fetch_array($query);
} else {
$sql = "SELECT count(*) AS jumlah FROM risiko where status = '0' and status2= '0' and rayon ='$row_user[rayon]' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$not_approve = mysql_fetch_array($query);

}

if ($row_user['rayon']=='-'){
$sql = "SELECT count(*) AS jumlah FROM risiko where status = '1' and kodeunit='$row_user[kodeunit]' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_approve = mysql_fetch_array($query);
} else {
$sql = "SELECT count(*) AS jumlah FROM risiko where status = '1' and rayon ='$row_user[rayon]' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_approve = mysql_fetch_array($query);

}

if ($row_user['rayon']=='-'){
$sql = "SELECT count(*) AS jumlah FROM risiko where  kefektifan3 != '0'  and kodeunit='$row_user[kodeunit]' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_efektif = mysql_fetch_array($query);
} else {
$sql = "SELECT count(*) AS jumlah FROM risiko where  kefektifan3 != '0' and rayon ='$row_user[rayon]' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_efektif = mysql_fetch_array($query);

}

if ($row_user['rayon']=='-'){
$sql = "SELECT count(*) AS jumlah FROM risiko where kefektifan3 = '0'  and kodeunit='$row_user[kodeunit]' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$no_efektif = mysql_fetch_array($query);
} else {
$sql = "SELECT count(*) AS jumlah FROM risiko where  kefektifan3 = '0' and rayon ='$row_user[rayon]' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$no_efektif = mysql_fetch_array($query);

}
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

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="?halaman=home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Monitoring Dan Review</span></a>
      <ul>
        <li><a href="?halaman=register_risiko_personal" >Register Risiko Personal</a></li>
        <li><a href="?halaman=register_risiko_all" >Register Risiko Unit</a></li>
        <li><a href="?halaman=kejadian_risiko" >Kejadian Risiko</a></li>
        <li><a href="?halaman=sasaran" >Sasaran</a></li>
        
      </ul>
    </li>
    
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Approve Risiko</span></a>
      <ul>
        <li><a href="?halaman=telah_approve" ><span class="label label-important"><?php echo $yes_approve['jumlah'];?></span>Risiko Sudah Diapprove</a></li>
        <li><a href="?halaman=belum_approve" ><span class="label label-important"><?php echo $not_approve['jumlah'];?></span>Risiko Belum di Approve</a></li>
        
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Efektifitas Risiko</span></a>
      <ul>
        <li><a href="?halaman=telah_dinilai" ><span class="label label-important"><h5><?php echo $yes_efektif['jumlah'];?></h5></span>Risiko Sudah Di Nilai</a></li>
        <li><a href="?halaman=belum_dinilai" ><span class="label label-important"><h5><?php echo $no_efektif['jumlah'];?></h5></span>Risiko Belum di Nilai</a></li>
        
      </ul></li>

      <li><a href="?halaman=status_pengendalian"><i class="icon icon-th-list"></i> <span>Rekap Status Pengendalian</span></a> </li>
    
    
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
                                require_once("kananKeyPerson.php");                            
                            } elseif ($halaman == 'status_pengendalian') {
                                require_once("status_pengendalian.php");
                             } 
                            elseif ($halaman == 'register_risiko_personal') {
                                require_once("register_risiko_personal.php");
                             } elseif ($halaman == 'register_risiko_all') {
                                require_once("register_risiko_all.php");
                                } elseif ($halaman == 'register_risiko') {
                                require_once("register_risiko.php");
                                } elseif ($halaman == 'evaluasi') {
                                require_once("evaluasi.php");
                                 } elseif ($halaman == 'laporan_kejadian') {
                                require_once("laporan_kejadian.php");
                                } elseif ($halaman == 'kejadian_risiko') {
                                require_once("kejadian_risiko.php");
                                } elseif ($halaman == 'detail_kejadian_risiko') {
                                require_once("detail_kejadian_risiko.php");
                                } elseif ($halaman == 'detail_risiko') {
                                require_once("detail_risiko_all.php");
                                } elseif ($halaman == 'telah_approve') {
                                require_once("telah_approve.php");
                                } elseif ($halaman == 'belum_approve') {
                                require_once("belum_approve.php");
                                } elseif ($halaman == 'telah_dinilai') {
                                require_once("telah_dinilai.php");
                                } elseif ($halaman == 'belum_dinilai') {
                                require_once("belum_dinilai.php");                                
                            }elseif ($halaman == 'sasaran') {
                                require_once("sasaran.php");                                
                            }elseif ($halaman == 'detail_sasaran') {
                                require_once("detail_sasaran.php");                                
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
<script src="js/jquery.toggle.buttons.js"></script> 
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
