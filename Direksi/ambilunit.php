<?php
session_start();
include "../koneksi.inc.php";
$kota = mysql_query("SELECT kodeunit,nama FROM unitkerja WHERE kelompok='$sbu' order by nama");
echo "<option>-- Pilih Unit Kerja--</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['kodeunit']."\">".$k['nama']."</option>\n";
}
?>
