<?php
session_start();
include "../koneksi.inc.php";
$kota = mysql_query("SELECT user,risk_owner FROM user WHERE kodeunit='$kode_unit' order by risk_owner");
echo "<option>-- Pilih Jabatan--</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['user']."\">".$k['risk_owner']."</option>\n";
}
?>
