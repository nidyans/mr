<?php $year=date('Y'); ?>
<?php
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user); 

 ?>

<?php if (isset($tahun) and isset($aksi)) { ?>
<?php if ($row_user['rayon'] == '-'){ ?>
<div class="container-fluid">

  <div class="row-fluid">

    <div class="span12">
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 1 AND $level_risiko == 5){
                       $jumlah1x5++; }
  
                      $no++;
                    }   
                       $jumlah1x5;                  
                    ?>
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=5&&level=5&&kode_unit=$row_user[kodeunit]&&tahun=$tahun'><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 2 AND $level_risiko == 10){
                       $jumlah2x5++; }
  
                      $no++;
                    }   
                       $jumlah2x5;                  
                    ?>
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=5&&kode_unit=$row_user[kodeunit]&&level=10&&tahun=$tahun'><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 3 AND $level_risiko == 15){
                        $jumlah3x5++; }
  
                      $no++;
                    }   
                        $jumlah3x5;                  
                    ?>
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=5&&kode_unit=$row_user[kodeunit]&&level=15&&tahun=$tahun'><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 4 AND $level_risiko == 20){
                        $jumlah4x5++; }
  
                      $no++;
                    }   
                        $jumlah4x5;                  
                    ?>
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=5&&kode_unit=$row_user[kodeunit]&&level=20&&tahun=$tahun'><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 5 AND $level_risiko == 25){
                       $jumlah5x5++; }
  
                      $no++;
                    }   
                        $jumlah5x5;                  
                    ?>
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=5&&kode_unit=$row_user[kodeunit]&&level=25&&tahun=$tahun'><div align=center><font size=3>$jumlah5x5</a>";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 1 AND $level_risiko == 4){
                       $jumlah1x4++; }
  
                      $no++;
                    }   
                       $jumlah1x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=4&&kode_unit=$row_user[kodeunit]&&level=4&&tahun=$tahun'><div align=center><font size=3>$jumlah1x4</a>";?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 2 AND $level_risiko == 8){
                       $jumlah2x4++; }
  
                      $no++;
                    }   
                       $jumlah2x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=4&&kode_unit=$row_user[kodeunit]&&level=8&&tahun=$tahun'><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 3 AND $level_risiko == 12){
                       $jumlah3x4++; }
  
                      $no++;
                    }   
                       $jumlah3x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=4&&kode_unit=$row_user[kodeunit]&&level=12&&tahun=$tahun'><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 4 AND $level_risiko == 16){
                        $jumlah4x4++; }
  
                      $no++;
                    }   
                        $jumlah4x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=4&&kode_unit=$row_user[kodeunit]&&level=16&&tahun=$tahun'><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 5 AND $level_risiko == 20 ){
                        $jumlah5x4++; }
  
                      $no++;
                    }   
                       $jumlah5x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&kode_unit=$row_user[kodeunit]&&likelihood=4&&level=20&&tahun=$tahun'><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 1 AND $level_risiko == 3){
                      $jumlah1x3++; }
  
                      $no++;
                    }   
                     $jumlah1x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=3&&kode_unit=$row_user[kodeunit]&&level=3&&tahun=$tahun'><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 2 AND $level_risiko == 6){
                      $jumlah2x3++; }
  
                      $no++;
                    }   
                      $jumlah2x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=3&&kode_unit=$row_user[kodeunit]&&level=6&&tahun=$tahun'><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 3 AND $level_risiko == 9){
                        $jumlah3x3++; }
  
                      $no++;
                    }   
                       $jumlah3x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=3&&kode_unit=$row_user[kodeunit]&&level=9&&tahun=$tahun'><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 4 AND $level_risiko == 12){
                       $jumlah4x3++; }
  
                      $no++;
                    }   
                       $jumlah4x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=3&&kode_unit=$row_user[kodeunit]&&level=12&&tahun=$tahun'><div align=center><font size=3>$jumlah4x3";   ?></td>
    <?php
      $jumlah5x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 5 AND $level_risiko == 15){
                     $jumlah5x3++; }
  
                      $no++;
                    }   
                       $jumlah5x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=3&&kode_unit=$row_user[kodeunit]&&level=15&&tahun=$tahun'><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 1 AND $level_risiko == 2){
                       $jumlah1x2++; }
  
                      $no++;
                    }   
                       $jumlah1x2;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=2&&kode_unit=$row_user[kodeunit]&&level=2&&tahun=$tahun'><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 2 AND $level_risiko == 4){
                      $jumlah2x2++; }
  
                      $no++;
                    }   
                       $jumlah2x2;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=2&&kode_unit=$row_user[kodeunit]&&level=4&&tahun=$tahun'><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 3 AND $level_risiko == 6){
                      $jumlah3x2++; }
  
                      $no++;
                    }   
                       $jumlah3x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=2&&kode_unit=$row_user[kodeunit]&&level=6&&tahun=$tahun'><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 4 AND $level_risiko == 8){
                      $jumlah4x2++; }
  
                      $no++;
                    }   
                       $jumlah4x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=2&&kode_unit=$row_user[kodeunit]&&level=8&&tahun=$tahun'><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 5 AND $level_risiko == 10){
                      $jumlah5x2++; }
  
                      $no++;
                    }   
                       $jumlah5x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=2&&kode_unit=$row_user[kodeunit]&&level=10&&tahun=$tahun'><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 1 AND $level_risiko == 1){
                       $jumlah1x1++; }
  
                      $no++;
                    }   
                      $jumlah1x1;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=1&&kode_unit=$row_user[kodeunit]&&level=1&&tahun=$tahun'><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 2 AND $level_risiko == 2 ){
                  $jumlah2x1++; }
  
                      $no++;
                    }  
                  $jumlah2x1;
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=1&&kode_unit=$row_user[kodeunit]&&level=2&&tahun=$tahun'><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['konsekuensi']; 
               $nilai_ks=$r['likelihood'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 3 AND $level_risiko == 3 ){
                       $jumlah3x1++; }
  
                      $no++;
                    }   
                      $jumlah3x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=1&&kode_unit=$row_user[kodeunit]&&level=3&&tahun=$tahun'><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 1 AND $level_risiko == 4 ){
                       echo $jumlah4x1+1; }
  
                      $no++;
                    }   
                    $jumlah4x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=1&&kode_unit=$row_user[kodeunit]&&level=4&&tahun=$tahun'><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and kodeunit='$row_user[kodeunit]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 5 AND $level_risiko == 5 ){
                       echo $jumlah5x1+1; }
  
                      $no++;
                    }   
                      $jumlah5x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_corporate&&konsekuensi=5&&likelihood=1&&kode_unit=$row_user[kodeunit]&&level=5&&level=5&&tahun=$tahun'><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
  </tr>
  <tr>
  <td></td>
  <td>sangat Rendah</td>
  <td>Rendah</td>
  <td>Sedang</td>
  <td>Tinggi</td>
  <td>Sangat Tinggi</td>
  </tr>
  <tr>
  <td colspan="7" style="background:#f5f5f5;text-align:center;" height="60" >KONSEKUENSI</td>
  </tr>
</table>
<?php       $sql_user2=mysql_query("select * from user WHERE user='$namauser'");
            $row_user2=mysql_fetch_array($sql_user2); 

            $sql1=mysql_query("select * from sbu WHERE kode_sbu='$row_user2[sbu]'");
            $row2=mysql_fetch_array($sql1); 

            $sql2=mysql_query("select * from unitkerja WHERE kodeunit='$kodeunit'");
            $row3=mysql_fetch_array($sql2); 



            ?>
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekapitulasi Risiko <?php echo $row2['nama'];?> <?php echo $row3['nama'];?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Unit</th>
                  <th>Jabatan</th>
      <th>Nama Risiko</th>
      <th>Likelihood</th>
      <th>Konsekuensi</th>
      <th>Level Risiko</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
      
                </tr>
              </thead>
              <tbody>
                  <?php
                     
                    $sql = mysql_query("select * from risiko WHERE kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($q = mysql_fetch_array($sql)) {
                      
               $nilai_lh=$q["likelihood"];
               $nilai_ks=$q["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
            $sql_r=mysql_query("select * from risiko WHERE id='$q[id]'");
            $r=mysql_fetch_array($sql_user);
            

            $sql_user=mysql_query("select * from user WHERE user='$q[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$q[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);

                if(($q['kefektifan1'] !=0 ) or ($q['kefektifan2'] !=0) or ($q['kefektifan3'] != 0)){
                 $pembagi++;
               }
               if($q["kefektifan1"] != 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] != 0){
                 
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/3;
               } else if ($q["kefektifan1"] == 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] != 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               }else if ($q["kefektifan1"] != 0 and $q["kefektifan2"] == 0 and $q["kefektifan3"] != 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               }else if ($q["kefektifan1"] != 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] == 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               } else if ($q["kefektifan1"] == 0 and $q["kefektifan2"] == 0 and $q["kefektifan3"] != 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/1;
               }  else if ($q["kefektifan1"] != 0 and $q["kefektifan2"] == 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/1;
               }  else if ($q["kefektifan1"] == 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] == 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/1;
               } else {
                 $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               }                        

                      echo "<tr tr class='gradeX'>
                           
                   <td class='center'>$row_unit[nama]</td>
                    <td class='center'>$row_user[risk_owner]</td>
                 <td class='center'>$q[nama]</td>
                  <td class='center'>$q[likelihood]</td>
                  <td class='center'>$q[konsekuensi]</td>";
                   if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }
                   
                   if ($q['status']==0){
                 echo "<td align='center'>-</td>";
               }else if($q['status']==1){
                 echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($q['status2']==0){
                 echo "<td align='center'>-</td>";
               }else if($q['status2']==1){
                 echo "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
                  echo "<td class='center'>$q[kefektifan3]</td>
                        <td class='center'>$q[kefektifan1]</td>
                        <td class='center'>$q[kefektifan2]</td>
                        <td class='center'>$nlirt</td>
                  </tr>";
                   $sum=$nlirt;
              $jumlah_seluruh_sp+=$sum;
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
            <table align="right">
              <?php
             if (($jumlah_seluruh_sp==0) and ($pembagi==0)){
   $rata2seluruh=0;
 } else {
 $rata2seluruh= number_format($jumlah_seluruh_sp/$pembagi,3); 
 $update_rata= mysql_query("update rata_rata set rata_$tahun='$rata2seluruh' where kodeunit='$kodeunit'");
 } ?>
<td>Rata - Rata Seluruh Status Pengendalian</td>
<td align="center"><input type="text" value="<?php echo $rata2seluruh; ?>" readonly/></td>
</table>
          </div>
        </div>
<?php } else { ?>
<div class="container-fluid">

  <div class="row-fluid">
    <div class="span12">
    <table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 1 AND $level_risiko == 5){
                       $jumlah1x5++; }
  
                      $no++;
                    }   
                       $jumlah1x5;                  
                    ?>
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=5&&level=5&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 2 AND $level_risiko == 10){
                       $jumlah2x5++; }
  
                      $no++;
                    }   
                       $jumlah2x5;                  
                    ?>
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=5&&level=10&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 3 AND $level_risiko == 15){
                        $jumlah3x5++; }
  
                      $no++;
                    }   
                        $jumlah3x5;                  
                    ?>
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=5&&level=15&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 4 AND $level_risiko == 20){
                        $jumlah4x5++; }
  
                      $no++;
                    }   
                        $jumlah4x5;                  
                    ?>
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=5&&level=20&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 5 AND $level_risiko == 25){
                       $jumlah5x5++; }
  
                      $no++;
                    }   
                        $jumlah5x5;                  
                    ?>
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=5&&level=25&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah5x5</a>";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 1 AND $level_risiko == 4){
                       $jumlah1x4++; }
  
                      $no++;
                    }   
                       $jumlah1x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=4&&level=4&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah1x4</a>";?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 2 AND $level_risiko == 8){
                       $jumlah2x4++; }
  
                      $no++;
                    }   
                       $jumlah2x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=4&&level=8&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 3 AND $level_risiko == 12){
                       $jumlah3x4++; }
  
                      $no++;
                    }   
                       $jumlah3x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=4&&level=12&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 4 AND $level_risiko == 16){
                        $jumlah4x4++; }
  
                      $no++;
                    }   
                        $jumlah4x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=4&&level=16&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 5 AND $level_risiko == 20 ){
                        $jumlah5x4++; }
  
                      $no++;
                    }   
                       $jumlah5x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=4&&level=20&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 1 AND $level_risiko == 3){
                      $jumlah1x3++; }
  
                      $no++;
                    }   
                     $jumlah1x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=3&&level=3&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 2 AND $level_risiko == 6){
                      $jumlah2x3++; }
  
                      $no++;
                    }   
                      $jumlah2x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=3&&level=6&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 3 AND $level_risiko == 9){
                        $jumlah3x3++; }
  
                      $no++;
                    }   
                       $jumlah3x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=3&&level=9&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 4 AND $level_risiko == 12){
                       $jumlah4x3++; }
  
                      $no++;
                    }   
                       $jumlah4x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=3&&level=12&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah4x3";   ?></td>
    <?php
      $jumlah5x3=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 5 AND $level_risiko == 15){
                     $jumlah5x3++; }
  
                      $no++;
                    }   
                       $jumlah5x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=3&&level=15&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 1 AND $level_risiko == 2){
                       $jumlah1x2++; }
  
                      $no++;
                    }   
                       $jumlah1x2;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=2&&level=2&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 2 AND $level_risiko == 4){
                      $jumlah2x2++; }
  
                      $no++;
                    }   
                       $jumlah2x2;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=2&&level=4&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 3 AND $level_risiko == 6){
                      $jumlah3x2++; }
  
                      $no++;
                    }   
                       $jumlah3x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=2&&level=6&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 4 AND $level_risiko == 8){
                      $jumlah4x2++; }
  
                      $no++;
                    }   
                       $jumlah4x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=2&&level=8&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 5 AND $level_risiko == 10){
                      $jumlah5x2++; }
  
                      $no++;
                    }   
                       $jumlah5x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=2&&level=10&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 1 AND $level_risiko == 1){
                       $jumlah1x1++; }
  
                      $no++;
                    }   
                      $jumlah1x1;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=1&&likelihood=1&&level=1&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 2 AND $level_risiko == 2 ){
                  $jumlah2x1++; }
  
                      $no++;
                    }  
                  $jumlah2x1;
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=2&&likelihood=1&&level=2&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['konsekuensi']; 
               $nilai_ks=$r['likelihood'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 3 AND $level_risiko == 3 ){
                       $jumlah3x1++; }
  
                      $no++;
                    }   
                      $jumlah3x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=3&&likelihood=1&&level=3&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 1 AND $level_risiko == 4 ){
                       echo $jumlah4x1+1; }
  
                      $no++;
                    }   
                    $jumlah4x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=4&&likelihood=1&&level=4&&rayon=$row_user[rayon]&&tahun=$tahun'><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                    $sql = mysql_query("select * from risiko where YEAR(risiko.tgl_identifikasi)='$tahun' and rayon='$row_user[rayon]' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 5 AND $level_risiko == 5 ){
                       echo $jumlah5x1+1; }
  
                      $no++;
                    }   
                      $jumlah5x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_all&&konsekuensi=5&&likelihood=1&&level=5&&rayon=$row_user[rayon]&&level=5&&tahun=$tahun'><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
  </tr>
  <tr>
  <td></td>
  <td>sangat Rendah</td>
  <td>Rendah</td>
  <td>Sedang</td>
  <td>Tinggi</td>
  <td>Sangat Tinggi</td>
  </tr>
  <tr>
  <td colspan="7" style="background:#f5f5f5;text-align:center;" height="60" >KONSEKUENSI</td>
  </tr>
</table>

     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4>Register Risiko</h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Unit</th>
                  <th>Rayon</th>
                  <th>Jabatan</th>
      <th>Nama Risiko</th>
      <th>Likelihood</th>
      <th>Konsekuensi</th>
      <th>Level Risiko</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
      
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     
                    $sql = mysql_query("select * from risiko WHERE rayon='$row_user[rayon]' and YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($q = mysql_fetch_array($sql)) {
                      
               $nilai_lh=$q["likelihood"];
               $nilai_ks=$q["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
            $sql_r=mysql_query("select * from risiko WHERE id='$q[id]'");
            $r=mysql_fetch_array($sql_user);
            

            $sql_user=mysql_query("select * from user WHERE user='$q[nrk]'");
            $row_user=mysql_fetch_array($sql_user);

            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$q[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);

            $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$q[rayon]'");
            $row_rayon=mysql_fetch_array($sql_rayon);

                if(($q['kefektifan1'] !=0 ) or ($q['kefektifan2'] !=0) or ($q['kefektifan3'] != 0)){
                 $pembagi++;
               }
               if($q["kefektifan1"] != 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] != 0){
                 
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/3;
               } else if ($q["kefektifan1"] == 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] != 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               }else if ($q["kefektifan1"] != 0 and $q["kefektifan2"] == 0 and $q["kefektifan3"] != 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               }else if ($q["kefektifan1"] != 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] == 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               } else if ($q["kefektifan1"] == 0 and $q["kefektifan2"] == 0 and $q["kefektifan3"] != 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/1;
               }  else if ($q["kefektifan1"] != 0 and $q["kefektifan2"] == 0 and $q["kefektifan3"] == 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/1;
               }  else if ($q["kefektifan1"] == 0 and $q["kefektifan2"] != 0 and $q["kefektifan3"] == 0){
                  $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/1;
               } else {
                 $nlirt= ($q["kefektifan1"]+$q["kefektifan2"]+$q["kefektifan3"])/2;
               }                        

                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$row_unit[nama]</td>
                  <td class='center'>$row_rayon[nama]</td>
                    <td class='center'>$row_user[risk_owner]</td>
                 <td class='center'>$q[nama]</td>
                  <td class='center'>$q[likelihood]</td>
                  <td class='center'>$q[konsekuensi]</td>";
                   if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }
                   
                   if ($q['status']==0){
                 echo "<td align='center'>-</td>";
               }else if($q['status']==1){
                 echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($q['status2']==0){
                 echo "<td align='center'>-</td>";
               }else if($q['status2']==1){
                 echo "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
                  echo "<td class='center'>$q[kefektifan3]</td>
                        <td class='center'>$q[kefektifan1]</td>
                        <td class='center'>$q[kefektifan2]</td>
                        <td class='center'>$nlirt</td>
                  </tr>";
                   $sum=$nlirt;
              $jumlah_seluruh_sp+=$sum;
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
            <table align="right">
              <?php
             if (($jumlah_seluruh_sp==0) and ($pembagi==0)){
   $rata2seluruh=0;
 } else {
 $rata2seluruh= number_format($jumlah_seluruh_sp/$pembagi,3); 
  
 } ?>
<td>Rata - Rata Seluruh Status Pengendalian</td>
<td align="center"><input type="text" value="<?php echo $rata2seluruh; ?>" readonly/></td>
</table>
          </div>
        </div>  


<?php }?>

<?php } else if(isset($konsekuensi) AND isset($likelihood) AND isset($kode_unit) AND isset($level) AND isset($tahun)) {?>
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko_all&&tahun=$tahun&&aksi=aksi'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap Risiko <?php echo $row_unit['nama']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Unit</th>
                  <th>Jabatan</th>
      <th>Nama Risiko</th>
      <th>Likelihood</th>
      <th>Konsekuensi</th>
      <th>Level Risiko</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from risiko WHERE kodeunit='$kode_unit' and YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
             if ($nilai_lh == $likelihood AND $nilai_ks == $konsekuensi){
            $sql_user=mysql_query("select * from user WHERE user='$r[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);

                if(($r['kefektifan1'] !=0 ) or ($r['kefektifan2'] !=0) or ($r['kefektifan3'] != 0)){
                 $pembagi++;
               }
               if($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                 
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/3;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               } else {
                 $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }                        

                      echo "<tr tr class='gradeX'>
                           
                   <td class='center'>$row_unit[nama]</td>
                    <td class='center'>$row_user[risk_owner]</td>
                 <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</a></td>
                  <td class='center'>$r[likelihood]</td>
                  <td class='center'>$r[konsekuensi]</td>";
                  if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }
                   
                   if ($r['status']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
                  echo "<td class='center'>$r[kefektifan3]</td>
                        <td class='center'>$r[kefektifan1]</td>
                        <td class='center'>$r[kefektifan2]</td>
                        <td class='center'>$nlirt</td>
                  </tr>";
                      $no++;
                    }  }     
                   ?>
                                
              </tbody>
            </table>

          </div>
        </div>
  
<?php } else if(isset($konsekuensi) AND isset($likelihood)  AND isset($level) AND isset($rayon) AND isset($tahun)){?>
  
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko_all&&tahun=$tahun&&aksi=aksi'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap Risiko <?php echo $row_unit['nama']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Unit</th>
                  <th>Jabatan</th>
      <th>Nama Risiko</th>
      <th>Likelihood</th>
      <th>Konsekuensi</th>
      <th>Level Risiko</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from risiko WHERE rayon='$rayon' and YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
             if ($nilai_lh == $likelihood AND $nilai_ks == $konsekuensi){
            $sql_user=mysql_query("select * from user WHERE user='$r[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);

                if(($r['kefektifan1'] !=0 ) or ($r['kefektifan2'] !=0) or ($r['kefektifan3'] != 0)){
                 $pembagi++;
               }
               if($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                 
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/3;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               } else {
                 $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }                        

                      echo "<tr tr class='gradeX'>
                           
                   <td class='center'>$row_unit[nama]</td>
                    <td class='center'>$row_user[risk_owner]</td>
                 <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</a></td>
                  <td class='center'>$r[likelihood]</td>
                  <td class='center'>$r[konsekuensi]</td>";
                  if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }
                   
                   if ($r['status']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
                  echo "<td class='center'>$r[kefektifan3]</td>
                        <td class='center'>$r[kefektifan1]</td>
                        <td class='center'>$r[kefektifan2]</td>
                        <td class='center'>$nlirt</td>
                  </tr>";
                      $no++;
                    }  }     
                   ?>
                                
              </tbody>
            </table>
          </div>
        </div>

<?php }else { ?>
<h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=register_risiko_all" method="post">
<body>
<table>
  <tr>
    <td width="100">Pilih Tahun</td>
    <td width="100"><label for="select"></label>
     
     <select name="tahun">
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2015; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select>
  </tr>
  <input type="hidden" name="aksi" value="aja"/>
</table>
</br>
</br>
<p>
  <input type="submit" name="button" id="button" value="LANJUT" />
  
  </form>
   
</div>
</br>
<!--Footer-part-->
<div class="row-fluid">
  
</div>


<?php }?>