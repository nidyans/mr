<?php $year=date('Y'); ?>
<?php if(isset($tahun) && isset($user)) {?>

<?php 
$query_user=mysql_fetch_array(mysql_query("select * from user where user='$user'"));
$sbu = $query_user['sbu'];
$unit= $query_user['kodeunit'];
$row_u= $query_user['rayon'];
$jabatan = $query_user['risk_owner'];
$nama_pejabat = $query_user['nama_pejabat'];

$query=mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$unit'"));
$nm_unit = $query['nama'];

$query2=mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$sbu'"));
$sbu_nama = $query2['nama'];

?>
        <table width="455" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="173">SBU</td>
    <td width="276"><?php echo"$sbu_nama";    ?>&nbsp;</td>
  </tr>
  <tr>
  
    <td>Bagian/Unit</td>
    <td><?php echo"$nm_unit";?>&nbsp;</td>
  </tr>
  <tr>
  <?php 
$query4=mysql_fetch_array(mysql_query("select * from rayon where kode_rayon='$row_u'"));

?>
    <td>Rayon</td>
    <td><?php echo"$query4[nama]";?>&nbsp;</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td><?php echo"$jabatan";  ?>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama User</td>
    <td><?php echo"$nama_pejabat";  ?>&nbsp;</td>
  </tr>
</table>
<div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h4>Risiko Inheren </h4>
          </div>
          <div class="widget-content"> <table width="378" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
 
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=5&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=5&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=5&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=5&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=5&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x5";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=4&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=4&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=4&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=4&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=4&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=3&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=3&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=3&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=3&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=3&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=2&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=2&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=2&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=2&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=2&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=1&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=1&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=1&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=1&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$user' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=1&&nrk=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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
            <h4>Risiko Residual</h4>
          </div>
          <div class="widget-content"> <table width="378" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
  <td rowspan="6" style="background:#f5f5f5;text-align:center;">LIKELIHOOD</td>
  <td align="center">Sangat Tinggi<p>&nbsp;</p></td>
 
  <?php
      $jumlah1x5=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=5&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=5&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=5&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=5&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=5&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x5";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=4&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=4&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=4&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=4&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=4&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=3&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=3&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=3&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=3&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=3&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=2&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=2&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=2&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=2&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=2&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=1&&likelihood=1&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=2&&likelihood=1&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=3&&likelihood=1&&username=$user&&tahun=$tahun' ><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#3ECA27"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=4&&likelihood=1&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$user' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href='?halaman=register_risiko_personal&&konsekuensi=5&&likelihood=1&&username=$user&&tahun=$tahun'><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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

        <div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap Risiko <?php echo $nama_pejabat; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                  <th>Likelihood(I)</th>
                  <th>Konsekuensi(I)</th>
                  <th>Level Risiko(I)</th>
                  <th>Likelihood(R)</th>
                  <th>Konsekuensi(R)</th>
                  <th>Level Risiko(R)</th>
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
    $query=mysql_fetch_array(mysql_query("select * from unitkerja where nama='$unit'"));
    $unit2 = $query['kodeunit'];
                   
      $sql = mysql_query("select * from risiko where nrk ='$user' and YEAR(tgl_identifikasi)='$tahun' order by tgl_identifikasi DESC");
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
             $level_risiko_mit=$nilai_lh_mit*$nilai_ks_mit;

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
                 if ($level_risiko_mit >= 1 && $level_risiko_mit<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko_mit</td>"; }
                  else if ($level_risiko_mit > 4 && $level_risiko_mit<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko_mit</td>";}
                  else if ($level_risiko_mit > 9 && $level_risiko_mit<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko_mit</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko_mit</td>";
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
 $rata2seluruh= number_format($jumlah_seluruh_sp/$pembagi,3);
 $update_rata= mysql_query("update rata_user set rata_$tahun='$rata2seluruh' where user='$user'"); 
 
  } ?>
<td>Rata - Rata Seluruh Status Pengendalian</td>
<td align="center"><input type="text" value="<?php echo $rata2seluruh; ?>" readonly/></td>
</table>
          
          </div>
        </div>

<div class="row-fluid">

<?php } else if (isset($konsekuensi) AND isset($likelihood) AND isset($username) AND isset($tahun) AND isset($aksi)){ ?>
  <div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko_personal&&tahun=$tahun&&user=$username'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="container-fluid">

  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4>Register Risiko</h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Tgl</th>
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
                   
                     
                    $sql = mysql_query("select * from mitigasi WHERE username='$username' and YEAR(tgl)='$tahun'");
                    $no = 1;
                    while ($q = mysql_fetch_array($sql)) {
                      if ($q["likelihood"]==$likelihood AND $q["konsekuensi"]== $konsekuensi){
               $nilai_lh=$q["likelihood"];
               $nilai_ks=$q["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
            $sql_r=mysql_query("select * from risiko WHERE id='$q[id_risiko]'");
            $r=mysql_fetch_array($sql_r);
            

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
                           
                    <td class='center'>$r[tgl_identifikasi]</td>
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
                    } }                   
                    ?>
                                
              </tbody>
            </table>
          </div>
        </div>

<?php } else if (isset($konsekuensi) AND isset($likelihood) AND isset($nrk) AND isset($tahun)) { ?>
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko_personal&&tahun=$tahun&&user=$nrk'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="container-fluid">

  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4>Register Risiko</h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Tgl</th>
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
                   
                     
                    $sql = mysql_query("select * from risiko WHERE nrk='$nrk' and YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                      if ($r["likelihood"]==$likelihood AND $r["konsekuensi"]== $konsekuensi){
               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
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
                           
                    <td class='center'>$r[tgl_identifikasi]</td>
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
                    } }                   
                    ?>
                                
              </tbody>
            </table>
          </div>
        </div>


 <?php }else { ?>

<?php $sql_risk_owner=mysql_query("select * from user WHERE user='$namauser'");
  $row_risk_owner=mysql_fetch_array($sql_risk_owner);
  $rayon=$row_risk_owner['rayon']; ?>

<?php if ($row_risk_owner['rayon'] == "-"){ ?> 
<h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=register_risiko_personal" method="post">
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
    <td width="456">PILIH JABATAN</td>

    <td width="468"><label for="select" ></label>
      <strong><font size="2"><strong><font size="2">
 <?php          
 
 $perintah="SELECT * from user WHERE kodeunit='$row_risk_owner[5]' AND rayon='-' and status='RISK_OWNER'";
      
   
 $jalankan_perintah=mysql_query($perintah) or die(mysql_error());
    
echo"<select name='user'><option value=''>[JABATAN]</option>";

while($x=mysql_fetch_array($jalankan_perintah)){
$option = $x[risk_owner];
$nilai = $x[user];

echo "<option value='$nilai'>$option</option>";
}
?>
<?php $query=mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));
$unit2 = $query['kodeunit']; ?>

    <input type="hidden" name="unit3" id="unit3" value="<?php echo $unit2; ?>">

    </font></strong></font></strong></td>
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
<?php } else {?>
<h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=register_risiko_personal" method="post">
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
    <td width="80">PILIH JABATAN</td>

    <td width="80"><label for="select" ></label>
      <strong><font size="2"><strong><font size="2">
 <?php          
 
 $perintah="SELECT * from user WHERE kodeunit='$row_risk_owner[5]' and rayon='$row_risk_owner[rayon]' and status='RISK_OWNER'";
      
   
 $jalankan_perintah=mysql_query($perintah) or die(mysql_error());
    
echo"<select name='user'><option value=''>[JABATAN]</option>";

while($x=mysql_fetch_array($jalankan_perintah)){
$option = $x[risk_owner];
$nilai = $x[user];

echo "<option value='$nilai'>$option</option>";
}
?>
<?php $query=mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));
    $unit2 = $query['kodeunit']; ?>

    <input type="hidden" name="unit3" id="unit3" value="<?php echo $unit2; ?>">

    </font></strong></font></strong></td>
  </tr>  <input type="hidden" name="aksi" value="aja"/>
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


<?php }} ?>