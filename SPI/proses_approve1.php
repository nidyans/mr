<?php session_start(); ?>
<?php
    
	include "koneksi.inc.php";
    $ctt1= $_POST['ctt1'];
    $data="";
    $cek = mysql_num_rows(mysql_query("SELECT * FROM approve WHERE id_risiko='$id'"));
    if ($cek > 0){
        $data = "ada";
    } else{
       $data = "false"; 
    }
    if ($hak_akses == "KEY_PERSON"){
     
	if($data == "false"){
    $sql_risk_owner=mysql_query("select * from user WHERE user='$namauser'");
    $row_risk_owner=mysql_fetch_array($sql_risk_owner);
	$tgl=date('Y-m-d');
 
	$modal=mysql_query("UPDATE risiko SET status = '$status1' WHERE id = '$id'");

	$sql_approve=mysql_query("INSERT into approve values('','$id','$status1',now(),'-','-','$row_risk_owner[0]','-','$ctt1','-')");
    
	header("location:modul.php?halaman=detail_risiko&&id=$id"); }else{
	$tgl=date('Y-m-d');
	$sql_risk_owner=mysql_query("select * from user WHERE user='$namauser'");
    $row_risk_owner=mysql_fetch_array($sql_risk_owner);
	$tgl=date('Y-m-d');
 
	$modal=mysql_query("UPDATE risiko SET status = '$status1' WHERE id = '$id'");

	$sql_approve=mysql_query("UPDATE approve SET status_approve1='$status1',tgl1='$tgl',ctt1='$ctt1',id_user='$row_risk_owner[0]' WHERE id_risiko='$id'");	
    
    header("location:modul.php?halaman=detail_risiko&&id=$id");
	}}
	else {

	
    $sql_risk_owner=mysql_query("select * from user WHERE user='$namauser'");
    $row_risk_owner=mysql_fetch_array($sql_risk_owner);
	$tgl=date('Y-m-d');
 
	$modal=mysql_query("UPDATE risiko SET status2 = '$status1' WHERE id = '$id'");

	$sql_approve=mysql_query("UPDATE approve SET status_approve2='$status1',tgl2='$tgl',ctt2='$ctt1',id_user2='$row_risk_owner[0]' WHERE id_risiko='$id'");

	header("location:modul.php?halaman=detail_risiko&&id=$id");
	}
?>