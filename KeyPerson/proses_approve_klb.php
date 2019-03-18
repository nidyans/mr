<?php session_start(); ?>
<?php
	include "../koneksi.inc.php";
   if (empty($ctt1)){
	
	$date=date('Y-m-d');
 
	$modal=mysql_query("UPDATE klb SET status = '$status1',tgl_approve='$date', user_app='$namauser' WHERE id = '$id'");
}else{
	
	$date=date('Y-m-d');
 
	$modal=mysql_query("UPDATE klb SET status = '$status1',tgl_approve='$date', ctt_klb= '$ctt1', user_app='$namauser' WHERE id = '$id'");
}
	
   if($modal){
	header("location:modul.php?halaman=detail_kejadian_risiko&&id=$id");}
	
	else {
		
	header("location:modul.php?halaman=detail_kejadian_risiko&&id=$id");
	}	
	
?>