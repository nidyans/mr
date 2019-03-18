<?php
session_start();
include "../koneksi.inc.php";
$kota = mysql_query("SELECT kode_rayon,nama FROM rayon WHERE kodeunit='$unitkerja' order by nama");
echo "<option value='-'>-</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['kode_rayon']."\">".$k['nama']."</option>\n";
}
?>
