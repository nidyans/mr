<?php $year=date('Y'); ?>
<?php  if(isset($edit)){
$likelihood = 0;
$konsekuensi = 0;
$likelihood2 = 0;
$konsekuensi2 = 0;
$data="";
$queryMitigasi="";

$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user);

if ($persen <= 10){
  $likelihood = 1;
}else if($persen >10 && $persen <= 30){
  $likelihood = 2;
}else if ($persen >30 && $persen <=50 ){
  $likelihood = 3;
}else if ($persen >50 && $persen <= 70){
  $likelihood =4;
}else {
  $likelihood = 5;
}

if ($persen2 <= 10){
  $likelihood2 = 1;
}else if($persen2 >10 && $persen2 <= 30){
  $likelihood2 = 2;
}else if ($persen2 >30 && $persen2 <=50 ){
  $likelihood2 = 3;
}else if ($persen2 >50 && $persen2 <= 70){
  $likelihood2 =4;
}else {
  $likelihood2 = 5;
}


if ($dampak_rp <= 500000 ){
  $konsekuensi = 1;
}else if ($dampak_rp >500000 && $dampak_rp <= 1250000){
  $konsekuensi = 2;
}else if ($dampak_rp >1250000 && $dampak_rp <= 1750000){
  $konsekuensi = 3;
} else if ($dampak_rp > 1750000 && $dampak_rp <= 2500000){
  $konsekuensi = 4;
}else {
  $konsekuensi = 5;
}

if ($dampak_rp2 <= 500000 ){
  $konsekuensi2 = 1;
}else if ($dampak_rp2 >500000 && $dampak_rp2 <= 1250000){
  $konsekuensi2 = 2;
}else if ($dampak_rp2 >1250000 && $dampak_rp2 <= 1750000){
  $konsekuensi2 = 3;
} else if ($dampak_rp2 > 1750000 && $dampak_rp2 <= 2500000){
  $konsekuensi2 = 4;
}else {
  $konsekuensi2 = 5;
}

$queryRisiko = mysql_query("update risiko set peristiwa='$peristiwa',sebab='$sebab',uc_c='$uc_c',dampak='$dampak',rp_dampak='$dampak_rp',pengendalian='$pengendalian',rp_pengendalian='$pengendalian_rp',likelihood='$likelihood',persen='$persen',konsekuensi='$konsekuensi',rencana='$rencana',pengendalian='$pengendalian' where id='$id' ");

$cek = mysql_num_rows(mysql_query("SELECT * FROM mitigasi WHERE id_risiko='$id'"));
    if ($cek > 0){
       $queryMitigasi = mysql_query("update mitigasi set likelihood='$likelihood2',persen='$persen2',konsekuensi='$konsekuensi2',dampak_rp='$dampak_rp2' where id_risiko='$id'");
       
    } else{
      $queryMitigasi = mysql_query("insert into mitigasi values('','$id_risiko',now(),
'$namauser','$likelihood2','$persen2','$konsekuensi2','$dampak_rp2','$row_user[sbu]','$row_user[kodeunit]','$row_user[rayon]'");
   
    }

if($queryRisiko AND $queryMitigasi){
  header("location:?halaman=detail_risiko&&id=$id&&i=berhasil");
}else{
  header("location:?halaman=detail_risiko&&id=$id&&i=gagal");
}} 
?>
<?php if(isset($konsekuensi) AND isset($likelihood) AND isset($nrk) AND isset($tahun) AND isset($aksi)){ ?>
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko&&tahun=$year'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
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
                   
                     
                    $sql = mysql_query("select * from mitigasi WHERE username='$nrk' and YEAR(tgl)='$tahun'");
                    $no = 1;
                    while ($q = mysql_fetch_array($sql)) {
                      if ($q["likelihood"]==$likelihood AND $q["konsekuensi"]== $konsekuensi){
               $nilai_lh=$q["likelihood"];
               $nilai_ks=$q["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;
                
            $sql_r=mysql_query("select * from risiko WHERE id='$q[id_risiko]'");
            $r=mysql_fetch_array($sql_user);
            

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
<?php } ?>

<?php if(isset($konsekuensi) AND isset($likelihood) AND isset($nrk) AND isset($tahun)){ ?>
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko&&tahun=$year'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
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
                  <td class='center'>$r[konsekuensi]</td>
                  <td class='center'>$level_risiko</td>";
                   
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

<?php } ?>

<?php if (isset($tahun)) {?>
<?php
      $halaman = 'register_risiko';
      switch($mode){
         default:
?>
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
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=5&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=5&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=5&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=5&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=5&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah5x5";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=4&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=4&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=4&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=$register_risiko&&konsekuensi=4&&likelihood=4&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=4&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=3&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=3&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=3&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=3&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=3&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=2&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=2&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=2&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=2&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
    <?php
      $jumlah5x2=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=2&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=1&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=1&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=1&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=1&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                     $sql = mysql_query("select * from risiko where nrk='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=1&&nrk=$namauser&&tahun=$tahun><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td width="64" align="center" valign="middle" bgcolor="#FFCC33" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=5&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah1x5</a>";   ?></p>
    </td>
    <?php
      $jumlah2x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td width="60" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?register_risiko&&konsekuensi=2&&likelihood=5&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah2x5</a>";   ?></td>
    <?php
      $jumlah3x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td width="72" align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=5&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah3x5</a>";   ?></td>
    <?php
      $jumlah4x5=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td width="78" align="center" valign="middle" bgcolor="#FF3300"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=5&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah4x5</a>";   ?></td>
    <?php
      $jumlah5x5=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td width="70" align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=5&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah5x5";   ?></td>
  </tr>
  <tr>
  <td>Tinggi<p>&nbsp;</p></td>
  <?php
      $jumlah1x4=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=4&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah1x4</a>";   ?></p>
    </td>
    <?php
      $jumlah2x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=4&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah2x4</a>";   ?></td>
    <?php
      $jumlah3x4=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=4&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah3x4</a>";   ?></td>
     <?php
      $jumlah4x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=4&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah4x4</a>";   ?></td>
    <?php
      $jumlah5x4=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FF0000"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=4&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah5x4</a>";   ?></td>
  </tr>
  <tr>
  <td>Sedang<p>&nbsp;</p></td>
  <?php
      $jumlah1x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=3&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah1x3</a>";   ?></p>
    </td>
    <?php
      $jumlah2x3=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=3&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah2x3</a>";   ?></td>
    <?php
      $jumlah3x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=3&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah3x3</a>";   ?></td>
    <?php
      $jumlah4x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=3&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah4x3</a>";   ?></td>
    <?php
      $jumlah5x3=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=3&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah5x3</a>";   ?></td>
  </tr>
  <tr>
  <td>Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x2=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=2&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah1x2</a>";   ?></p>
    </td>
    <?php
      $jumlah2x2=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=2&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah2x2</a>";   ?></td>
   <?php
      $jumlah3x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=2&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah3x2</a>";   ?></td>
    <?php
      $jumlah4x2=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=2&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah4x2</a>";   ?></td>
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
    <td align="center" valign="middle" bgcolor="#FFFF00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=2&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah5x2</a>";   ?></td>
  </tr>
  <tr>
  <td>Sangat Rendah<p>&nbsp;</p></td>
  <?php
      $jumlah1x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><?php echo"<a href=?halaman=register_risiko&&konsekuensi=1&&likelihood=1&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah1x1</a>"; ?>&nbsp;</p>
    </td>
     <?php
      $jumlah2x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=2&&likelihood=1&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah2x1</a>";   ?></td>
    <?php
      $jumlah3x1=0;        
                    $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=3&&likelihood=1&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah3x1</a>"; ?></td>
    <?php
      $jumlah4x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#CCCCCC"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=4&&likelihood=1&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah4x1</a>";   ?></td>
    <?php
      $jumlah5x1=0;        
                     $sql = mysql_query("select * from mitigasi where username='$namauser' AND YEAR(tgl)='$tahun'");
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
    <td align="center" valign="middle" bgcolor="#FFCC00"><?php echo"<a href=?halaman=register_risiko&&konsekuensi=5&&likelihood=1&&nrk=$namauser&&tahun=$tahun&&aksi=mitigasi><div align=center><font size=3>$jumlah5x1</a>";   ?></td>
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
      <th>L(Inheren)</th>
      <th>K (Inheren)</th>
      <th>Level Risiko (I)</th>
      <th>L(Residual)</th>
      <th>K (Residual)</th>
      <th>Level Risiko (R)</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
      <th>Aksi</th>
      
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     
                    $sql = mysql_query("SELECT * FROM risiko WHERE nrk ='$namauser' AND YEAR(tgl_identifikasi)='$tahun'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;

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
                  <td class='center'>$r[konsekuensi]</td>
                  <td class='center'>$level_risiko</td>";
                   
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
                  <td class='taskOptions'><a href='?halaman=register_risiko&&mode=edit&&tahun=$tahun&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=register_risiko&&mode=hapus&&tahun=$tahun&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                  </tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
          </div>
        </div>
   <?php
         break;
         case "edit":
            $data = mysql_fetch_array(mysql_query("select * from risiko where id='$id'"));     
             $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$data[sbu]'");
             $row_sbu=mysql_fetch_array($sql_sbu); 
             
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$data[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);

            $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$data[rayon]'");
            $row_rayon=mysql_fetch_array($sql_rayon);

             $data2 = mysql_fetch_array(mysql_query("select * from mitigasi where id_risiko='$id'"));     
                 
   ?>
   <script type="text/javascript">
            function tambah(){
                //nilai pertamaa
                var nilai1=document.getElementById("val1").value;
                //nilai kedua
                if (nilai1 <= 500000){
                    nilai = "Sangat Rendah";
                } else if ((nilai1 > 500000) && (nilai1 <= 1250000)){
                    nilai = "Rendah";
                }else if ((nilai1 > 1250000) && (nilai1 <= 1750000)) {
                    nilai ="Sedang";
                }else if ((nilai1 > 1750000) && (nilai1 <= 2500000)){
                    nilai ="Tinggi";
                }else{
                  nilai ="Sangat Tinggi";
                }
                //operasi tambah
               
                //menampilkan hasil tambah
                document.getElementById("hasil").value=nilai;
            }
            function refresh(){
                //mengosongkan form
                document.getElementById("val1").value="";
                document.getElementById("val2").value="";
                document.getElementById("hasil").value="";
            }
        </script>
        <script type="text/javascript">
            function kurang(){
                //nilai pertamaa
                var nilai2=document.getElementById("val2").value;
                //nilai kedua
                if (nilai2 <= 10){
                    nilai = "Sangat Rendah";
                } else if ((nilai2 > 10) && (nilai2 <= 30)){
                    nilai = "Rendah";
                }else if ((nilai2 > 30) && (nilai2 <= 50)) {
                    nilai ="Sedang";
                }else if ((nilai2 > 50) && (nilai2 <= 70)){
                    nilai ="Tinggi";
                }else{
                  nilai ="Sangat Tinggi";
                }
                //operasi tambah
               
                //menampilkan hasil tambah
                document.getElementById("hasil2").value=nilai;
            }
            function refresh(){
                //mengosongkan form
                document.getElementById("val1").value="";
                document.getElementById("val2").value="";
                document.getElementById("hasil").value="";
            }
        </script>
        <script type="text/javascript">
            function kali(){
                //nilai pertamaa
                var nilai1=document.getElementById("val3").value;
                //nilai kedua
                if (nilai1 <= 500000){
                    nilai = "Sangat Rendah";
                } else if ((nilai1 > 500000) && (nilai1 <= 1250000)){
                    nilai = "Rendah";
                }else if ((nilai1 > 1250000) && (nilai1 <= 1750000)) {
                    nilai ="Sedang";
                }else if ((nilai1 > 1750000) && (nilai1 <= 2500000)){
                    nilai ="Tinggi";
                }else{
                  nilai ="Sangat Tinggi";
                }
                //operasi tambah
               
                //menampilkan hasil tambah
                document.getElementById("hasil4").value=nilai;
            }
            function refresh(){
                //mengosongkan form
                document.getElementById("val3").value="";
                document.getElementById("val4").value="";
                document.getElementById("hasil4").value="";
            }
        </script>
        <script type="text/javascript">
            function bagi(){
                //nilai pertamaa
                var nilai2=document.getElementById("val4").value;
                //nilai kedua
                if (nilai2 <= 10){
                    nilai = "Sangat Rendah";
                } else if ((nilai2 > 10) && (nilai2 <= 30)){
                    nilai = "Rendah";
                }else if ((nilai2 > 30) && (nilai2 <= 50)) {
                    nilai ="Sedang";
                }else if ((nilai2 > 50) && (nilai2 <= 70)){
                    nilai ="Tinggi";
                }else{
                  nilai ="Sangat Tinggi";
                }
                //operasi tambah
               
                //menampilkan hasil tambah
                document.getElementById("hasil3").value=nilai;
            }
            function refresh(){
                //mengosongkan form
                document.getElementById("val3").value="";
                document.getElementById("val4").value="";
                document.getElementById("hasil3").value="";
            }
        </script>
 <div class="container-fluid">
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=register_risiko&&tahun=$year'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
  <h1>Edit Risiko</h1>
</div>
<div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Identifikasi Risiko </a></li>
              <li><a data-toggle="tab" href="#tab2">Analisa Risiko</a></li>
                <li><a data-toggle="tab" href="#tab3">Evaluasi Risiko</a></li>
            </ul>
          </div>
  <form action="?halaman=register_risiko" method="post" class="form-horizontal">
  <div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">

  <div class="row-fluid">
    <div class="span6">
    
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info Risiko</h5>
        </div>

        <div class="widget-content nopadding">
         
            <div class="control-group">
              <label class="control-label">Tanggal Risiko:</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $data['tgl_identifikasi']; ?>" disabled="" />
                <input type="hidden" class="span11" name="id" value="<?php echo $data['id']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">User/Nama Pejabat :</label>
              <div class="controls">
                <input type="text" class="span11"  disabled="" value="<?php echo $row_user['user']."/".$row_user['nama_pejabat'] ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">SBU :</label>
              <div class="controls">
                <input type="text"  class="span11" disabled="" value="<?php echo $row_sbu['nama']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit/Rayon :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $row_unit['nama'].'/'.$row_rayon['nama']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">kategori Risiko :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $data['kategori']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Faktor Risiko :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $data['faktor']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kelompok Risiko :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $data['kelompok']; ?>"/>
              </div>
            </div>
          <div class="control-group">
              <label class="control-label">Nama Risiko :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $data['nama']; ?>"/>
              </div>
            </div>

          
        </div>
      </div>

    </div>
    
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Identifikasi Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          
            <div class="control-group">
              <label class="control-label">peristiwa Risiko</label>
              <div class="controls">
                 <textarea name="peristiwa" ><?php echo $data['peristiwa']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sebab Risiko</label>
              <div class="controls">
                 <textarea name="sebab"><?php echo $data['sebab']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">UC/C</label>
              <div class="controls"><select name="uc_c" id="uc_c" class="span1">
              <option <?php if( $data['uc_c']=="UC"){echo "selected"; } ?> value="UC">UC</option>
              <option <?php if( $data['uc_c']=="C"){echo "selected"; } ?> value="C">C</option>
                </select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Dampak</label>
              <div class="controls">
               <textarea name="dampak" ><?php echo $data['dampak']; ?></textarea>
              </div>
            </div>
            
            <div class="control-group">
           
              <div class="controls">
                
               
            </div>
            <div class="control-group">
             
              <div class="controls">
                <div class="input-append">
                 </div>
                
            </div>
         
        </div>
      </div>
      
  <div class="row-fluid">
    
  </div>
  <!---->
</div></div></div></div>
<div id="tab2" class="tab-pane">

            <div class="span10">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Analisis Risiko Inheren</h5>
        </div>
        <div class="widget-content nopadding">
        
            <div class="control-group">
              <label class="control-label">Likelihood (%) :</label>
              <div class="controls">
                
                <input type="text" class="span1 m-wrap"  value="<?php echo $data['persen']; ?>" id="val2" name="persen" onkeyup="kurang()" > %
                <input type="text" id="hasil2" readonly />
                

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Konsekuensi (Rp) :</label>
              <div class="controls">
               <input type="text" class="span2 m-wrap" id="val1" onkeyup="tambah()" name="dampak_rp" value="<?php echo $data['rp_dampak']; ?>" />
               <input type="text" id="hasil" readonly> 
              
              </div>
            </div>
            
            <div class="control-group">
          
              </div>
            </div>
       
        </div>
      </div></div>

            <div id="tab3" class="tab-pane"> 
         
        
      
           <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Evaluasi Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          
            <div class="control-group">
              <label class="control-label">Rencana Perlakuan</label>
              <div class="controls">
                 <textarea type="text" name="rencana" ><?php echo $data['rencana'];?> </textarea>
              </div></div>
           
            <div class="control-group">
              <label class="control-label">Pengendalian (Rp)</label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">Rp</span></div>
                  <input type="text"  class="span3" name="pengendalian_rp"  value="<?php echo $data['rp_pengendalian'];?>">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pengendalian</label>
              <div class="controls">
                <input type="text" class="span7" name="pengendalian" value="<?php echo $data['pengendalian']; ?>">
               </div>
            </div>
    
</div></div>
<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Risiko Residual</h5>
        </div>
        <div class="widget-content nopadding">
          
           
           <div class="control-group">
              <label class="control-label">Likelihood (%)</label>
              <div class="controls">
                
                  <input id="val4" type="text" name="persen2" style="width:50px;" onkeyup="bagi()" value="<?php echo $data2['persen'];?>"/> %  <input type="text" id="hasil3" readonly />
                   
              </div></div>
              
              <div class="control-group">
              <label class="control-label">Konsekuensi (Rp)</label>
              <div class="controls">
                
               <input name="dampak_rp2"  id="val3" onkeyup="kali()" value="<?php echo $data2['dampak_rp'];?>"/>
               <input type="text" id="hasil4" readonly>
                
              </div></div>

              
            </div></div> 
              
            </div>
            </div>
            <div class="form-actions">
            
</div>  <button type="submit" name="edit" value="Validate" class="btn btn-success">Save</button></div></form> 
            
<?php
         break;
         case "hapus":
     
        mysql_query("delete from risiko where id = '$id'");
                    
        header("location: modul.php?halaman=register_risiko&&nrk=$namauser");
       
            
      }
   ?>
<?php }else{?>

<h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=register_risiko" method="post">
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

<?php } ?>


