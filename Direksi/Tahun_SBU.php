<?php $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$sbu'");
  $row_sbu=mysql_fetch_array($sql_sbu);
   $year=date('Y');
   ?>
<?php if(isset($tahun) AND isset($sbu) AND isset($aksi)){ ?>
<h1>Rekap <?php echo $row_sbu['nama']; ?> </h1>
  </div>
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 1 AND $level_risiko == 5){
                       $jumlah1x5++; }
  
                      $no++;
                    }   
                       $jumlah1x5;                  
                    ?>
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=1&&likelihood=5&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah1x5</a>";   ?><p></p>
    </td>
    <?php
      $jumlah2x5=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 2 AND $level_risiko == 10){
                       $jumlah2x5++; }
  
                      $no++;
                    }   
                       $jumlah2x5;                  
                    ?>
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=2&&likelihood=5&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 3 AND $level_risiko == 15){
                        $jumlah3x5++; }
  
                      $no++;
                    }   
                        $jumlah3x5;                  
                    ?>
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=3&&likelihood=5&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 4 AND $level_risiko == 20){
                        $jumlah4x5++; }
  
                      $no++;
                    }   
                        $jumlah4x5;                  
                    ?>
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=4&&likelihood=5&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 5 AND $nilai_ks == 5 AND $level_risiko == 25){
                       $jumlah5x5++; }
  
                      $no++;
                    }   
                        $jumlah5x5;                  
                    ?>
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=5&&likelihood=5&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah5x5</a>";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 1 AND $level_risiko == 4){
                       $jumlah1x4++; }
  
                      $no++;
                    }   
                       $jumlah1x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=1&&likelihood=4&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 2 AND $level_risiko == 8){
                       $jumlah2x4++; }
  
                      $no++;
                    }   
                       $jumlah2x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=2&&likelihood=4&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 3 AND $level_risiko == 12){
                       $jumlah3x4++; }
  
                      $no++;
                    }   
                       $jumlah3x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=3&&likelihood=4&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 4 AND $level_risiko == 16){
                        $jumlah4x4++; }
  
                      $no++;
                    }   
                        $jumlah4x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=4&&likelihood=4&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 4 AND $nilai_ks == 5 AND $level_risiko == 20 ){
                        $jumlah5x4++; }
  
                      $no++;
                    }   
                       $jumlah5x4;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=5&&likelihood=4&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 1 AND $level_risiko == 3){
                      $jumlah1x3++; }
  
                      $no++;
                    }   
                     $jumlah1x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=1&&likelihood=3&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 2 AND $level_risiko == 6){
                      $jumlah2x3++; }
  
                      $no++;
                    }   
                      $jumlah2x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=2&&likelihood=3&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 3 AND $level_risiko == 9){
                        $jumlah3x3++; }
  
                      $no++;
                    }   
                       $jumlah3x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=3&&likelihood=3&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 4 AND $level_risiko == 12){
                       $jumlah4x3++; }
  
                      $no++;
                    }   
                       $jumlah4x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=4&&likelihood=3&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 3 AND $nilai_ks == 5 AND $level_risiko == 15){
                     $jumlah5x3++; }
  
                      $no++;
                    }   
                       $jumlah5x3;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=5&&likelihood=3&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 1 AND $level_risiko == 2){
                       $jumlah1x2++; }
  
                      $no++;
                    }   
                       $jumlah1x2;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=1&&likelihood=2&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 2 AND $level_risiko == 4){
                      $jumlah2x2++; }
  
                      $no++;
                    }   
                       $jumlah2x2;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=2&&likelihood=2&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 3 AND $level_risiko == 6){
                      $jumlah3x2++; }
  
                      $no++;
                    }   
                       $jumlah3x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=3&&likelihood=2&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 4 AND $level_risiko == 8){
                      $jumlah4x2++; }
  
                      $no++;
                    }   
                       $jumlah4x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=4&&likelihood=2&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 2 AND $nilai_ks == 5 AND $level_risiko == 10){
                      $jumlah5x2++; }
  
                      $no++;
                    }   
                       $jumlah5x2;                  
                    ?> 
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=5&&likelihood=2&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 1 AND $level_risiko == 1){
                       $jumlah1x1++; }
  
                      $no++;
                    }   
                      $jumlah1x1;                  
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=1&&likelihood=1&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 2 AND $level_risiko == 2 ){
                  $jumlah2x1++; }
  
                      $no++;
                    }  
                  $jumlah2x1;
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=2&&likelihood=1&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 3 AND $level_risiko == 3 ){
                       $jumlah3x1++; }
  
                      $no++;
                    }   
                      $jumlah3x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=3&&likelihood=1&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                    $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 4 AND $level_risiko == 4 ){
                       $jumlah4x1++; }
  
                      $no++;
                    }   
                    $jumlah4x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=4&&likelihood=1&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                    $sql =mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
                CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X']; 
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 5 AND $level_risiko == 5 ){
                       $jumlah5x1++; }
  
                      $no++;
                    }   
                      $jumlah5x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=rekap_sbu&&konsekuensi=5&&likelihood=1&&sbu=$sbu&&tahun=$tahun><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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
            <h5>Rekap <?php echo $row_sbu['nama']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                  <th>Likelihood</th>
                  <th>Konsekuensi</th>
                  <th>Level Risiko</th>
                   <th>Risk Owner</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                      $sql = mysql_query("select risiko.nama,ROUND(avg(risiko.likelihood),1) as X,ROUND(avg(risiko.konsekuensi),1) as Y,
                ROUND(avg(risiko.likelihood)*avg(risiko.konsekuensi),1) as level_risiko,count(risiko.nrk) from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun' group by risiko.nama,risiko.sbu ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['X'];
               $nilai_ks=$r['Y'];
               $level_risiko=$nilai_lh*$nilai_ks;
                      echo "<tr class='gradeX'>
                        
               <td>$r[0]</td>
               <td class='center'>$r[1]</td>
               <td class='center'>$r[2]</td>
               <td class='center'>$level_risiko</td>
                <td><a href='?halaman=rekap_sbu&&nama=$r[0]&&sbu=$sbu&&judul=$row_sbu[nama]&&tahun=$tahun'>$r[4]</a></td>
              
                 
                            </tr>";
                      $no++;
                    }       
                   ?>
                                
              </tbody>
            </table>
          </div>
        </div>
<?php } else if(isset($nama) AND isset($sbu) AND isset($judul)){?>
 <div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=rekap_sbu&&tahun=$tahun&&sbu=$row_sbu[kode_sbu]&&aksi=aja'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<h1>Rekap <?php echo $judul; ?></h1>
  </div>
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $judul; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                    <th>Jabatan</th>
                    <th>Unit</th>
                     <th>Likelihood</th>
                     <th>Konsekuensi</th>
                     <th>Level Risiko</th>
      
                </tr>
              </thead>
              <tbody>
                 <?php
                   if(isset($sbu)){
                    $sql = mysql_query("SELECT * FROM risiko WHERE nama='$nama' and sbu='$sbu' and YEAR(tgl_identifikasi)='$tahun'");
                   }else if (isset($kode_unit)){
                    $sql = mysql_query("SELECT * FROM risiko WHERE nama='$nama' and kodeunit='$kode_unit' and YEAR(tgl_identifikasi)='$tahun'");
                   }else {
                    $sql = mysql_query("SELECT * FROM risiko WHERE nama='$nama' and YEAR(tgl_identifikasi)='$tahun'");}
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
             $level_risiko=$nilai_lh*$nilai_ks;
              $nlirt= ($r["kefektifan1"]+$r["kefektifan2"])/2;
                $sql_user2=mysql_query("select * from user WHERE user='$r[nrk]'");
                $row_user2=mysql_fetch_array($sql_user2);
                $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
                $row_unit=mysql_fetch_array($sql_unit);
                echo "<tr class='gradeX'>            
               <td><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</td>
               <td>$row_user2[risk_owner]</td>
               <td>$row_unit[nama]</td>
                <td class='center'>$r[likelihood]</td>
                 <td class='center'>$r[konsekuensi]</td>
                  <td class='center'>$level_risiko</td>";
                 
                
                          echo"</tr>";
                      $no++;
                    }                               
                    ?>
              </tbody>
            </table>
          </div>
        </div>
<?php } else if(isset($konsekuensi) AND isset($likelihood) AND isset($sbu) AND isset($tahun)){?>
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=rekap_sbu&&tahun=$tahun&&sbu=$row_sbu[kode_sbu]&&aksi=aja'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $row_sbu['nama']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                  <th>Likelihood</th>
                  <th>Konsekuensi</th>
                  <th>Level Risiko</th>
                   <th>Risk Owner</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,
              CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk), YEAR(risiko.tgl_identifikasi) as tahun from risiko WHERE risiko.sbu='$sbu' and YEAR(risiko.tgl_identifikasi)='$tahun'  group by risiko.nama ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r["X"];
               $nilai_ks=$r["Y"];
               $level_risiko=$nilai_lh*$nilai_ks;
              $tahun1 = $r['tahun'];
             if ($nilai_lh == $likelihood AND $nilai_ks == $konsekuensi AND $tahun1 == $tahun)
                      echo "<tr class='gradeX'>
                        
               <td>$r[0]</td>
               <td class='center'>$r[1]</td>
               <td class='center'>$r[2]</td>
               <td class='center'>$level_risiko</td>
                <td><a href='?halaman=rekap_sbu&&nama=$r[0]&&sbu=$sbu&&judul=$row_sbu[nama]'>$r[4]</a></td>
              
                 
                            </tr>";
                      $no++;
                    }       
                   ?>
                                
              </tbody>
            </table>
          </div>
        </div>

<?php } else { ?>
    <h1>Rekap SBU</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=rekap_sbu" method="post">

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
  <tr>
    <td width="100">PILIH SBU</td>
    <td width="200"><label for="select"></label>
      <?php
  
  $perintah="SELECT * from sbu";
      
   
      $jalankan_perintah=mysql_query($perintah) or die(mysql_error());
    
echo"<select name='sbu' class='style12'>";

while($x=mysql_fetch_array($jalankan_perintah)){
$option = $x[2];
$nilai = $x[1];
echo "<option value='$nilai'>$option</option>";
}
  
  ?></td>
  
  </tr>
  <input type="hidden" name="aksi" value="aja" />
</table>
</br>
</br>
<p>
  <input type="submit" name="button" id="button" value="LANJUT" />
  
  </form>
   
</div>
<?php } ?>
