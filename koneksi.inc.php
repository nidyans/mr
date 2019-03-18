<?php 
//die("Sedang Migrasi Server! Mohon bersabar.");
$koneksi=mysql_connect("localhost","root","");
$pilih_db=mysql_select_db("mr");
if($koneksi AND $pilih_db)
{ echo"";  }
else { 
//btbp2tin52015
echo"<font size='18'>Koneksi Ke Server Terputus !<br>"; 
echo"<font size='8'>Silahkan Hubungi Bagian Teknologi Informasi ext Telepon 227 atau 228";
echo"<meta http-equiv='refresh' content='5'>";

   }

?>
