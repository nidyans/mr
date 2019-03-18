<?php session_start();  
 ob_start();
    error_reporting(0);
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

<!--Header-part-->
<div id="header">
  <h1><a href="menuAdmin.php">Risiko Management Online</a></h1>
</div>
<!--close-Header-part--> 
<?php 
$year=date('Y');
$not_approve ="";
 $yes_approve="";

 $not_efektif="";
 $yes_efektif="";
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
  $row_user=mysql_fetch_array($sql_user); 
 

$sql = "SELECT count(*) AS jumlah FROM risiko where status = '0' and status2= '0' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$not_approve = mysql_fetch_array($query);


$sql = "SELECT count(*) AS jumlah FROM risiko where status = '1' and status2= '1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_approve = mysql_fetch_array($query);



$sql = "SELECT count(*) AS jumlah FROM risiko where kefektifan1 != '0' and kefektifan2 != '0' and kefektifan3 != '0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_efektif = mysql_fetch_array($query);


$sql = "SELECT count(*) AS jumlah FROM risiko where kefektifan1 = '0' and kefektifan2 = '0' and kefektifan3 = '0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$no_efektif = mysql_fetch_array($query);

?>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $namauser;?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="?halaman=keluar"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
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
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Rekap Risiko</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="?halaman=rekap_corporate" >Rekap Risiko Corporate</a></li>
        <li><a href="?halaman=rekap_sbu" >Rekap Risiko Per SBU</a></li>
        <li><a href="?halaman=rekap_unit" >Rekap Risiko Bagian/Kebun/PKS/Unit</a></li>
        <li><a href="?halaman=rekap_personal" >Rekap Risiko Personal</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Rekap Status Pengendalian</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="?halaman=sp_corporate">Rekapitulasi Risiko Corporate</a></li>
        <li><a href="?halaman=SBU_sp">Rekapitulasi Risiko SBU</a></li>
        <li><a href="?halaman=kebun_sp">Rekapitulasi Risiko Bagian/Kebun/PKS/Unit</a></li>
      </ul>
    </li>
    
    <li> <a href="?halaman=laporan_kejadian"><i class="icon icon-info-sign"></i> <span>Laporan Kejadian Risiko</span> <span class="label label-important"></span></a></li>
    
   
  </ul>
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
                                require_once("kananDireksi.php");                            
                                } elseif ($halaman == 'sp_corporate') {
                                require_once("sp_corporate.php");
                                } elseif ($halaman == 'kebun_sp') {
                                require_once("kebun_sp.php");
                                } elseif ($halaman == 'laporan_kejadian') {
                                require_once("laporan_kejadian.php");
                                } elseif ($halaman == 'SBU_sp') {
                                require_once("SBU_sp.php");
                            }elseif ($halaman == 'rekap_corporate') {
                                require_once("Tahun_corporate.php");
                            }elseif ($halaman == 'rekap_sbu') {
                                require_once("Tahun_SBU.php");
                                }elseif ($halaman == 'data_likon') {
                                require_once("data_likon.php");
                            }elseif ($halaman == 'rekap_unit') {
                                require_once("Tahun_unit.php"); 
                            }elseif ($halaman  == 'rekap_personal') {
                                require_once ("Tahun_Personal.php");
                            }elseif ($halaman == 'dt_nama_risiko') {
                                require_once ("data_nama_risiko.php"); 
                            }elseif ($halaman == 'detail_risiko') {
                              require_once ("detail_risiko_all.php");
                               }elseif ($halaman == 'telah_approve') {
                              require_once ("telah_approve.php"); 
                              }elseif ($halaman == 'belum_approve') {
                              require_once ("belum_approve.php"); 
                              }elseif ($halaman == 'sudah_dinilai') {
                              require_once ("sudah_dinilai.php");
                              }elseif ($halaman == 'belum_dinilai') {
                              require_once ("belum_dinilai.php");
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
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script>
 <script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.calendar.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 


<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php
      mysql_close();
    } else {
        header("location: ./");
    }
?>