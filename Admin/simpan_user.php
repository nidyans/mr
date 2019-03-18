<?php 
session_start();
include"../koneksi.inc.php";


if(empty($namauser))
die("USERNAME HARUS DIISI");
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user);



$sql_risk_owner=mysql_query("select nama from jabatan WHERE kodejab='$risk_owner'");
$row_risk_owner=mysql_fetch_array($sql_risk_owner);


$sql_sbu=mysql_query("select kelompok from unitkerja WHERE kodeunit='$unitkerja'");
$row_sbu=mysql_fetch_array($sql_sbu);

$sql_risiko=mysql_query("insert into user values('','$nrk','$row_risk_owner[0]',
'$nama_pejabat','$row_sbu[0]','$unitkerja','-','$password','$hakakses','$risk_owner','$user','$rayon')");


if($sql_risiko)
{
	//echo"Data Berhasil Disimpan";
	header("location:Datauser.php?i=berhasil");
}
else
{
	
		header("location:Datauser.php?i=gagal");
}

?>