<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("mr");
$kota = mysql_query("SELECT * FROM faktor WHERE id_kategori='$kategori' order by faktor_risiko");
echo "<option value=\"".$k['id']."\">".$k['faktor_risiko']."</option>\n";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id']."\">".$k['faktor_risiko']."</option>\n";
}
?>
