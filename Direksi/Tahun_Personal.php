  <?php $year=date('Y'); ?>
<?php if(isset($tahun) AND isset($sbu) AND isset($kode_unit) AND isset($jabatan) AND isset($aksi)) { ?>
<?php
  $sql_u=mysql_query("select * from user WHERE user='$jabatan'");
  $row_u=mysql_fetch_array($sql_u); 
   
  $jumlah_seluruh_sp=0;
  $sum=0;
  $pembagi=0;
   ?>

    <h1>Rekap Risiko <?php echo $row_u['nama_pejabat']; ?> </h1>
  </div>
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Risiko Inheren </h5>
          </div>
          <div class="widget-content"> <table width="378" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
 
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=5&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=5&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=5&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=5&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=5&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x5";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=4&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=4&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=4&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=4&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=4&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=3&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=3&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=3&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=3&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=3&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=2&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=2&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=2&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=2&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=2&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=1&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=1&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 3 AND $level_risiko == 3 ){
                       $jumlah3x1++; }
  
                      $no++;
                    }   
                      $jumlah3x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=1&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 4 AND $level_risiko == 4 ){
                       $jumlah4x1++; }
  
                      $no++;
                    }   
                    $jumlah4x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=1&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$jabatan' AND YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 5 AND $level_risiko == 5 ){
                       $jumlah5x1++; }
  
                      $no++;
                    }   
                      $jumlah5x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=1&&user=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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
</table> </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Risiko Residual</h5>
          </div>
          <div class="widget-content"> <table width="378" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
 
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=5&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=5&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=5&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=5&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=5&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x5";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=4&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=4&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=4&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=4&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=4&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=3&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=3&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=3&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=3&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=3&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=2&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=2&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=2&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=2&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=2&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=1&&likelihood=1&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=2&&likelihood=1&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 3 AND $level_risiko == 3 ){
                       $jumlah3x1++; }
  
                      $no++;
                    }   
                      $jumlah3x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=3&&likelihood=1&&username=$jabatan&&tahun=$tahun' ><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 4 AND $level_risiko == 4 ){
                       $jumlah4x1++; }
  
                      $no++;
                    }   
                    $jumlah4x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=4&&likelihood=1&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$jabatan' AND YEAR(tgl)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r['likelihood']; 
               $nilai_ks=$r['konsekuensi'];
               $level_risiko=$nilai_lh*$nilai_ks;
                  if ($nilai_lh == 1 AND $nilai_ks == 5 AND $level_risiko == 5 ){
                       $jumlah5x1++; }
  
                      $no++;
                    }   
                      $jumlah5x1;                 
                    ?>
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=rekap_personal&&konsekuensi=5&&likelihood=1&&username=$jabatan&&tahun=$tahun'><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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
</table> </div>
        </div>
      </div>
    </div>

        <?php 
$query=mysql_fetch_array(mysql_query("select kelompok from unitkerja where kelompok='$sbu'"));
$sbu = $query['kelompok'];

$query2=mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$sbu'"));
$sbu_nama = $query2['nama'];

?>
        <table width="455" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="173">SBU</td>
    <td width="276"><?php echo"$sbu_nama";    ?>&nbsp;</td>
  </tr>
  <tr>
  <?php 
$query3=mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$kode_unit'"));

?>
    <td>Bagian/Unit</td>
    <td><?php echo"$query3[2]";?>&nbsp;</td>
  </tr>
  <tr>
  <?php 
$query4=mysql_fetch_array(mysql_query("select * from rayon where kode_rayon='$row_u[rayon]'"));

?>
    <td>Rayon</td>
    <td><?php echo"$query4[nama]";?>&nbsp;</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td><?php echo"$row_u[risk_owner]";  ?>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama User</td>
    <td><?php echo"$row_u[nama_pejabat]";  ?>&nbsp;</td>
  </tr>
</table>


        <div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $row_u['nama_pejabat']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                  <th>Likelihood (I)</th>
                  <th>Konsekuensi (I)</th>
                  <th>Level Risiko (I)</th>
                  <th>Likelihood (R)</th>
                  <th>Konsekuensi (R)</th>
                  <th>Level Risiko (R)</th>
                  <th>Approve 1</th>
                  <th>Approve 1</th>
                   <th>SP I</th>
                  <th>SP II</th>
                  <th>SP III</th>
                   <th>Rata-Rata SP</th>
                </tr>
              </thead>
              <tbody>
                  <?php
    $query=mysql_fetch_array(mysql_query("select * from unitkerja where nama='$kode_unit'"));
    $unit2 = $query['kodeunit'];
                   
      $sql = mysql_query("select * from risiko where nrk ='$jabatan' and YEAR(tgl_identifikasi)='$tahun' order by tgl_identifikasi DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                   $query_mit=mysql_fetch_array(mysql_query("select * from mitigasi where id_risiko='$r[id]'"));
                   

               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
                 
                $nilai_lh_mit=$query_mit["likelihood"];
               $nilai_ks_mit=$query_mit["konsekuensi"];

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
             $level_risiko=$nilai_lh*$nilai_ks;
              $level_risiko_mi=$nilai_lh_mit*$nilai_ks_mit;

                      echo "<tr class='gradeX'>            
               <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</td>
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

               echo "<td class='center'>$query_mit[likelihood]</td>
                 <td class='center'>$query_mit[konsekuensi]</td>";
                  if ($level_risiko_mi >= 1 && $level_risiko_mi<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko_mi</td>"; }
                  else if ($level_risiko_mi > 4 && $level_risiko_mi<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko_mi</td>";}
                  else if ($level_risiko_mi > 9 && $level_risiko_mi<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko_mi</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko_mi</td>";
                  }
                 
                 if ($r['status']==0){
                 echo "<td align='center' class='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center' class='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center' class='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center' class='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center' class='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center' class='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               echo "<td align='center' class='center'>$r[kefektifan3]</td>";
               echo "<td align='center' class='center'>$r[kefektifan1]</td>";
                echo "<td align='center' class='center'>$r[kefektifan2]</td>";
               echo "<td align='center' class='center'>$nlirt</td>";
                          echo"</tr>";
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
 $rata2seluruh= $jumlah_seluruh_sp/$pembagi; 
 $rataaa = number_format($rata2seluruh,3);
$update_rata= mysql_query("update rata_user set rata_$tahun='$rataaa' where user='$jabatan'"); 

 } ?>
<td>Rata - Rata Seluruh Status Pengendalian</td>
<td align="center"><input type="text" value="<?php echo $rataaa; ?>" readonly/></td>
</table>
          
          </div>
        </div>
<?php } else if (isset($konsekuensi) AND isset($likelihood) AND isset($user) AND isset($tahun)) { ?>


<div class="row-fluid">
<?php
$sql_u=mysql_query("select * from user WHERE user='$user'");
$row_u=mysql_fetch_array($sql_u);
 ?>
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=rekap_personal&&tahun=$tahun&&sbu=$row_u[sbu]&&kode_unit=$row_u[kodeunit]&&jabatan=$user&&aksi=aja'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
  <div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $row_u['nama_pejabat']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                  <th>Likelihood (I)</th>
                  <th>Konsekuensi (I)</th>
                  <th>Level Risiko (I)</th>
                  <th>Likelihood (R)</th>
                  <th>Konsekuensi (R)</th>
                  <th>Level Risiko (R)</th>
                  <th>Approve 1</th>
                  <th>Approve 1</th>
                   <th>SP I</th>
                  <th>SP II</th>
                  <th>SP III</th>
                   <th>Rata-Rata SP</th>
                </tr>
              </thead>
              <tbody>

               <?php
                   
                  $sql = mysql_query("select * from risiko WHERE nrk='$user' and YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                      if ($r["likelihood"]==$likelihood AND $r["konsekuensi"]== $konsekuensi){
                
            $query_mit1=mysql_fetch_array(mysql_query("select * from mitigasi where id_risiko='$r[id]'"));
            $sql_user=mysql_query("select * from user WHERE user='$r[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);
              
               $nilai_lh_mit1=$query_mit1["likelihood"];
               $nilai_ks_mit1=$query_mit1["konsekuensi"];

               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
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
             $level_risiko=$nilai_lh*$nilai_ks;
             $level_risiko_mi=$nilai_lh_mit1*$nilai_ks_mit1;

                      echo "<tr class='gradeX'>            
               <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</td>
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

               echo "<td class='center'>$query_mit1[likelihood]</td>
                 <td class='center'>$query_mit1[konsekuensi]</td>";
                 if ($level_risiko_mi >= 1 && $level_risiko_mi<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko_mi</td>"; }
                  else if ($level_risiko_mi > 4 && $level_risiko_mi<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko_mi</td>";}
                  else if ($level_risiko_mi > 9 && $level_risiko_mi<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko_mi</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko_mi</td>";
                  }
                 
                 if ($r['status']==0){
                 echo "<td align='center' class='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center' class='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center' class='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center' class='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center' class='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center' class='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               echo "<td align='center' class='center'>$r[kefektifan3]</td>";
               echo "<td align='center' class='center'>$r[kefektifan1]</td>";
                echo "<td align='center' class='center'>$r[kefektifan2]</td>";
               echo "<td align='center' class='center'>$nlirt</td>";
                          echo"</tr>"; }
                
                      $no++;
                    }                   
                    ?>
                                
              </tbody>
            </table>
          
          </div>
        </div>

<?php } 
else if(isset($konsekuensi) AND isset($likelihood) AND isset($username) AND isset($tahun)){ ?>
 <div class="row-fluid">
<?php
$sql_u=mysql_query("select * from user WHERE user='$user'");
$row_u=mysql_fetch_array($sql_u);
 ?>
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=rekap_personal&&tahun=$tahun&&sbu=$row_u[sbu]&&kode_unit=$row_u[kodeunit]&&jabatan=$username&&aksi=aja'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
  <div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $row_u['nama_pejabat']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                  <th>Likelihood (I)</th>
                  <th>Konsekuensi (I)</th>
                  <th>Level Risiko (I)</th>
                  <th>Likelihood (R)</th>
                  <th>Konsekuensi (R)</th>
                  <th>Level Risiko (R)</th>
                  <th>Approve 1</th>
                  <th>Approve 1</th>
                   <th>SP I</th>
                  <th>SP II</th>
                  <th>SP III</th>
                   <th>Rata-Rata SP</th>
                </tr>
              </thead>
              <tbody>

               <?php
                   
                  $sql = mysql_query("select * from mitigasi WHERE username='$username' and YEAR(tgl)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                      if ($r["likelihood"]==$likelihood AND $r["konsekuensi"]== $konsekuensi){
                
            $query_risiko=mysql_fetch_array(mysql_query("select * from risiko where id='$r[id_risiko]'"));
            $sql_user=mysql_query("select * from user WHERE user='$r[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);
              
               $nilai_lh_risk=$query_risiko["likelihood"];
               $nilai_ks_risk=$query_risiko["konsekuensi"];

               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
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
             $level_risiko=$nilai_lh*$nilai_ks;
             $level_risiko_mi=$nilai_lh_risk*$nilai_ks_risk;

                      echo "<tr class='gradeX'>            
               <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$query_risiko[nama]</td>
                <td class='center'>$query_risiko[likelihood]</td>
                 <td class='center'>$query_risiko[konsekuensi]</td>";
                  if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }

               echo "<td class='center'>$r[likelihood]</td>
                 <td class='center'>$r[konsekuensi]</td>";
                 if ($level_risiko_mi >= 1 && $level_risiko_mi<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko_mi</td>"; }
                  else if ($level_risiko_mi > 4 && $level_risiko_mi<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko_mi</td>";}
                  else if ($level_risiko_mi > 9 && $level_risiko_mi<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko_mi</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko_mi</td>";
                  }
                 
                 if ($r['status']==0){
                 echo "<td align='center' class='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center' class='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center' class='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center' class='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center' class='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center' class='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               echo "<td align='center' class='center'>$r[kefektifan3]</td>";
               echo "<td align='center' class='center'>$r[kefektifan1]</td>";
                echo "<td align='center' class='center'>$r[kefektifan2]</td>";
               echo "<td align='center' class='center'>$nlirt</td>";
                          echo"</tr>"; }
                
                      $no++;
                    }                   
                    ?>
                                
              </tbody>
            </table>
          
          </div>
        </div>


<?php } else { ?>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#sbu").change(function(){
    var sbu = $("#sbu").val();
    $.ajax({
        url: "ambilunit.php",
        data: "sbu="+sbu,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kode_unit").html(msg);
        }
    });
  });
  $("#kode_unit").change(function(){
    var kode_unit = $("#kode_unit").val();
    $.ajax({
        url: "ambiljabatan.php",
        data: "kode_unit="+kode_unit,
        cache: false,
        success: function(msg){
            $("#jabatan").html(msg);
        }
    });
  });
});

</script>
<div id="content">
    <h1>Rekap Risiko Personal</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=rekap_personal" method="post">

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
     <select name="sbu" id="sbu">
<option>--Pilih SBU--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM sbu");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[kode_sbu]\">$p[nama]</option>\n";
}
?>
</select></tr>
  
  </tr>
  </br>
  </br>
<tr>

<td>Pilih Unit</td>
<td width=""200""><label for="select"></label><select name="kode_unit" id="kode_unit">
<option>--Pilih Unit--</option>
</select>
                </td></tr>
<tr>
<input type="hidden" name="aksi" value="aja"/>
<td>Pilih Jabatan</td>
<td width=""200""><label for="select"></label><select name="jabatan" id="jabatan">
<option>--Pilih Jabatan--</option>
</select>
                </td></tr>

 
</table>
</br>
</br>
<p>
  <input type="submit" name="button" id="button" value="LANJUT" />
  
  </form>
   
</div>

<?php } ?>





