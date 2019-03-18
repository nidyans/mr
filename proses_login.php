<?php 
include "koneksi.inc.php";

$query="select * from user where user='$user' AND password='$password'";
$jalankan_query=mysql_query($query);
$row=mysql_fetch_array($jalankan_query);

if ($row[0] != null){

if($row[10]==$user AND $row[7]==$password AND $row[8]=='RISK_OWNER')
{ session_start();

session_register("namauser");
session_register("passuser");
session_register("kodeunit");
session_register("hak_akses");

$namauser=$row[10];
$passuser=$row[7];
$kodeunit=$row[5];
$hak_akses=$row[8];


header("location:RiskOwner/modul.php");


}

if($row[10]==$user AND $row[7]==$password AND $row[8]=='ADMIN')
{ 
session_start();
session_register("namauser");
session_register("passuser");
session_register("kodeunit");
session_register("hak_akses");

$namauser=$row[10];
$passuser=$row[7];
$kodeunit=$row[5];
$hak_akses=$row[8];


header("location:Admin/modul.php");

}

if($row[10]==$user AND $row[7]==$password AND $row[8]=='DIREKSI')
{ session_start();
session_register("namauser");
session_register("passuser");
session_register("kodeunit");
session_register("hak_akses");

$namauser=$row[10];
$passuser=$row[7];
$kodeunit=$row[5];
$hak_akses=$row[8];




header("location:Direksi/modul.php");

}

if($row[10]==$user AND $row[7]==$password AND $row[8]=='KEY_PERSON')
{ session_start();

session_register("namauser");
session_register("passuser");
session_register("kodeunit");
session_register("hak_akses");

$namauser=$row[10];
$passuser=$row[7];
$kodeunit=$row[5];
$hak_akses=$row[8];


header("location:KeyPerson/modul.php");

}

if($row[10]==$user AND $row[7]==$password AND $row[8]=='SPI')
{ session_start();

session_register("namauser");
session_register("passuser");
session_register("kodeunit");
session_register("hak_akses");

$namauser=$row[10];
$passuser=$row[7];
$kodeunit=$row[5];
$hak_akses=$row[8];


header("location:SPI/modul.php");

}}
else
{
header("location:error.php");

echo "<input type='submit' name='Submit' value='Kembali' ONCLICK='self.history.back();'>";

}
?>



