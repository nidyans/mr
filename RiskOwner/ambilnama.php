<?php
session_start();
include "../koneksi.inc.php";
mysql_select_db("mr");
$kota = mysql_query("SELECT id,nama_risiko FROM nama WHERE id_kelompok='$kelompok' order by nama_risiko");
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id']."\">".$k['nama_risiko']."</option>\n";
}
?>
