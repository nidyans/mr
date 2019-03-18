<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("mr");
$kota = mysql_query("SELECT * FROM kelompok WHERE id_faktor='$faktor' order by kelompok_risiko");
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id']."\">".$k['kelompok_risiko']."</option>\n";
}
?>
