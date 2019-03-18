<?php
$year=date(Y);
$sql = mysql_query("SELECT * FROM risiko WHERE nrk ='$namauser' and year(tgl_identifikasi)=$year");
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

$sum=$nlirt;
$jumlah_seluruh_sp+=$sum;

$no++;
}                    
?>


<?php
if (($jumlah_seluruh_sp==0) and ($pembagi==0)){
 $rata2seluruh=0;
} else {
 $rata2seluruh= $jumlah_seluruh_sp/$pembagi; 
 $rataaa = number_format($rata2seluruh,3);
 //$update_rata= mysql_query("update rata_user set rata_$tahun='$rataaa' where user='$jabatan'"); 

} 
?>




<?php
$year=date(Y);
$sql_before = mysql_query("SELECT * FROM risiko WHERE nrk ='$namauser' and year(tgl_identifikasi)=$year-1");
$no_before = 1;
while ($r_before = mysql_fetch_array($sql_before)) {
 $nilai_lh_before=$r_before["likelihood"];
 $nilai_ks_before=$r_before["konsekuensi"];
 $level_risiko_before=$nilai_lh_before*$nilai_ks_before;



 if(($r_before['kefektifan1'] !=0 ) or ($r_before['kefektifan2'] !=0) or ($r_before['kefektifan3'] != 0)){
   $pembagi_before++;
 }
 if($r_before["kefektifan1"] != 0 and $r_before["kefektifan2"] != 0 and $r_before["kefektifan3"] != 0){

  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/3;
} else if ($r_before["kefektifan1"] == 0 and $r_before["kefektifan2"] != 0 and $r_before["kefektifan3"] != 0){
  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/2;
}else if ($r_before["kefektifan1"] != 0 and $r_before["kefektifan2"] == 0 and $r_before["kefektifan3"] != 0){
  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/2;
}else if ($r_before["kefektifan1"] != 0 and $r_before["kefektifan2"] != 0 and $r_before["kefektifan3"] == 0){
  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/2;
} else if ($r_before["kefektifan1"] == 0 and $r_before["kefektifan2"] == 0 and $r_before["kefektifan3"] != 0){
  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/1;
}  else if ($r_before["kefektifan1"] != 0 and $r_before["kefektifan2"] == 0 and $r_before["kefektifan3"] == 0){
  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/1;
}  else if ($r_before["kefektifan1"] == 0 and $r_before["kefektifan2"] != 0 and $r_before["kefektifan3"] == 0){
  $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/1;
} else {
 $nlirt_before= ($r_before["kefektifan1"]+$r_before["kefektifan2"]+$r_before["kefektifan3"])/2;
}

$sum_before=$nlirt_before;
$jumlah_seluruh_sp_before+=$sum_before;

$no_before++;
}                    
?>


<?php
if (($jumlah_seluruh_sp_before==0) and ($pembagi_before==0)){
 $rata2seluruh_before=0;
} else {
 $rata2seluruh_before= $jumlah_seluruh_sp_before/$pembagi_before; 
 $rataaa_before = number_format($rata2seluruh_before,3);
 //$update_rata= mysql_query("update rata_user set rata_$tahun='$rataaa' where user='$jabatan'"); 

} 
?>











<?php if(isset($id) and isset($aksi)){ 
  $data = mysql_fetch_array(mysql_query("select * from berita where id='$id'")); 
  $sql = mysql_query("UPDATE berita SET risk_owner = 'read' WHERE id = '$id'");
  ?>

  <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Berita</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=data_berita" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">Tanggal :</label>
              <div class="controls">
                <input type="text" class="span2" name="tanggal" id="required" value="<?php echo $data['tanggal']; ?>" disabled=""/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hal :</label>
              <div class="controls">
                <input type="text" class="span5" value="<?php echo $data['hal'] ?>" id="required" disabled=""/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Berita :</label>
              <div class="controls">
                <textarea type="text"  class="textarea_editor span5" rows="7" disabled=""><?php echo $data['berita'] ?></textarea>
              </div>
            </div>

          </form>
        </div>
      </div>


      <?php } else {?>

      <?php
      $year=date('Y');
      $sql = "select count(*) AS jumlah FROM risiko where nrk='$namauser' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $all = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM klb where user='$namauser' and YEAR(tgl_kejadian)='$year'";
      $query = mysql_query($sql);
      $all_user = mysql_fetch_array($query);



      $sql = "select count(*) AS jumlah FROM rayon";
      $query = mysql_query($sql);
      $all_rayon = mysql_fetch_array($query);

      $user = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));

      $sbu = mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$user[sbu]'"));

      $unit = mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$user[kodeunit]'"));

      $rayon = mysql_fetch_array(mysql_query("select * from rayon where kode_rayon='$user[rayon]'"));


//SASARAN
$sql = "select count(*) AS jumlah FROM sasaran where user ='$namauser' and YEAR(tahun_sasaran)=$year";
$query = mysql_query($sql);
$jumlah_sasaran = mysql_fetch_array($query);




//tahun sekarang
      $sql = "select count(*) AS jumlah FROM klb where user='$namauser' and YEAR(tgl_kejadian)='$year'";
      $query = mysql_query($sql);
      $yes_efektif = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko where  nrk ='$namauser' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $not_approve = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $jumlah_risiko_input = mysql_fetch_array($query);


      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status2='1' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $telah_approve = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status2='1' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $jumlah_telah_diaprove = mysql_fetch_array($query);

//telah ditolak
//ditolak 1
      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='1' and status2='0' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $telah_ditolak_1 = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='1' and status2='0' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $jumlah_telah_ditolak_1 = mysql_fetch_array($query);

//ditolak 2
      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='0' and status2='0' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $telah_ditolak_2 = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='0' and status2='0' and YEAR(tgl_identifikasi)='$year'";
      $query = mysql_query($sql);
      $jumlah_telah_ditolak_2 = mysql_fetch_array($query);

      $telah_ditolak = $telah_ditolak_1 + $telah_ditolak_2;
      $jumlah_telah_ditolak = $jumlah_telah_ditolak_1 + $jumlah_telah_ditolak_2;


      $sql = "select count(*) AS jumlah FROM risiko where  nrk ='$namauser' and status2=1 and YEAR(tgl_identifikasi)='$year' AND (
        kefektifan1 !=0
        OR kefektifan2 !=0
        OR kefektifan3 !=0
        )";
$query = mysql_query($sql);
$telah_dinilai = mysql_fetch_array($query);

//TAHUN SEBELUMNYA
$sql = "select count(*) AS jumlah FROM klb where user='$namauser' and YEAR(tgl_kejadian)=$year-1";
$query = mysql_query($sql);
$yes_efektif_before = mysql_fetch_array($query);

$sql = "select count(*) AS jumlah FROM risiko where  nrk ='$namauser' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$not_approve_before = mysql_fetch_array($query);

$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$jumlah_risiko_input_before = mysql_fetch_array($query);


$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status2='1' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$telah_approve_before = mysql_fetch_array($query);

$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status2='1' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$jumlah_telah_diaprove_before = mysql_fetch_array($query);

//ditolak
//ditolak 1
$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='1' and status2='0' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$telah_ditolak_1_before = mysql_fetch_array($query);

$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='1' and status2='0' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$jumlah_telah_ditolak_1_before = mysql_fetch_array($query);

//ditolak 2
$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='0' and status2='0' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$telah_ditolak_2_before = mysql_fetch_array($query);

$sql = "select count(*) AS jumlah FROM risiko where nrk ='$namauser' and status='0' and status2='0' and YEAR(tgl_identifikasi)=$year-1";
$query = mysql_query($sql);
$jumlah_telah_ditolak_2_before = mysql_fetch_array($query);

$telah_ditolak_before = $telah_ditolak_1_before + $telah_ditolak_2_before;
$jumlah_telah_ditolak_before = $jumlah_telah_ditolak_1_before + $jumlah_telah_ditolak_2_before;


$sql = "select count(*) AS jumlah FROM risiko where  nrk ='$namauser' and status2=1 and YEAR(tgl_identifikasi)=$year-1 AND (
  kefektifan1 !=0
  OR kefektifan2 !=0
  OR kefektifan3 !=0
  )";
$query = mysql_query($sql);
$telah_dinilai_before = mysql_fetch_array($query);

$max_rata2 = 5;


$sql = "select count(*) AS jumlah FROM risiko where kefektifan1 = '0' and kefektifan2 = '0' and kefektifan3 = '0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$no_efektif = mysql_fetch_array($query);






?>
<div  class="quick-actions_homepage">
  <ul class="quick-actions">

  <?php 
if ($jumlah_sasaran['jumlah'] == 1) { ?>
 <li class="bg_lg"> <a href="#"> <i class=" icon-check"></i> <span class="label label-success"></span><b>Sasaran Sudah Diinput</b></a> </li>
 <?php
}else{ ?>
  <li class="bg_lr"> <a href="?halaman=sasaran"> <i class=" icon-remove"></i> <span class="label label-success"></span><b>Sasaran Belum Diinput</b></a> </li>
  <?php
}
?>

    <li class="bg_lr"> <a href="?halaman=kejadian_risiko"> <i class=" icon-fire"></i> <span class="label label-success"><?php echo $all_user['jumlah']; ?></span>Kejadian Risiko </a> </li>

    <li class="bg_lb"> <a href="?halaman=register_risiko"> <i class="icon-legal"></i><span class="label label-important"><?php echo $all['jumlah']; ?></span> Risiko  </a> </li>


    <li class="bg_lg"> <a href="#"> <i class=" icon-fire"></i> <span class="label label-success"><?php echo $telah_approve['jumlah']; ?></span>Risiko Yang Di-approve </a> </li>

    <li class="bg_ly"> <a href="#"> <i class=" icon-fire"></i> <span class="label label-success"><?php echo $telah_dinilai['jumlah']; ?></span>Risiko yang telah Dinilai </a> </li>





  </ul>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
          <h5>Profil</h5>
        </div>
        <div class="widget-content nopadding collapse in" id="collapseG2">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11"  disabled="" value="<?php echo $user['user']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama User :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $user['nama_pejabat']; ?>"  disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jabatan :</label>
              <div class="controls">
                <input  class="span11"  value="<?php echo $user['risk_owner']; ?>" disabled=""  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">SBU :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $sbu['nama']; ?>"  disabled=""/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $unit['nama']; ?>" disabled=""/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Rayon :</label>
              <div class="controls">
                <input class="span11" type="text" value="<?php echo $rayon['nama']; ?>" disabled=""/>
              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
          <h5>Berita</h5>
        </div>
        <div class="widget-content">
          <div class="todo">
            <ul>
              <?php

              $sql = mysql_query("select * from berita");
              $no = 1;
              while ($r = mysql_fetch_array($sql)) {
               if($r['risk_owner']=="unread"){
                echo "<li class='clearfix'>
                <div class='txt'> <span class='by label'>$no</span> </div> 
                <div class='txt'><a href='?halaman=home&&id=$r[id]&&aksi=update'>$r[berita] </a><span class='date badge badge-important'>New</span> </div>
                <div class='pull-right'></div>
              </li>"; }else {
                echo "<li class='clearfix'>
                <div class='txt'> <span class='by label'>$no</span> </div> 
                <div class='txt'><a href='?halaman=home&&id=$r[id]&&aksi=update'>$r[berita]</a></div>
                <div class='pull-right'></div>
              </li>";

            }
            $no++;
          }                    
          ?>

        </ul>
      </div>
    </div>
  </div>
</div>
<div class="span3">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
      <h5>Progress Risiko <?php echo $year; ?></h5>
    </div>
    <div class="widget-content">
      <ul class="unstyled">
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Laporan Kejadian Risiko Yang Di-input <span class="pull-right strong"><?php echo $yes_efektif['jumlah'];?></span>
          <div class="progress progress-success progress-striped ">
            <div style="width: <?php echo $yes_efektif['jumlah'];?>%;" class="bar"></div>
          </div>
        </li>
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Di-input <span class="pull-right strong"><?php echo $not_approve['jumlah'];?></span>
          <div class="progress progress-striped ">
            <div style="width: <?php echo $not_approve['jumlah'];?>%;" class="bar"></div>
          </div>
        </li>              
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Di-approve <span class="pull-right strong"><?php echo $telah_approve['jumlah'];?> / <?php echo $jumlah_risiko_input['jumlah'];?></span>
          <div class="progress progress-success progress-striped ">
            <div style="width: <?php echo $telah_approve['jumlah']*100 / $jumlah_risiko_input['jumlah'] ;?>%;" class="bar"></div>
          </div>
        </li>
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Ditolak <span class="pull-right strong"><?php echo $telah_ditolak['jumlah'];?> / <?php echo $jumlah_risiko_input['jumlah'];?></span>
          <div class="progress progress-danger progress-striped ">
            <div style="width: <?php echo $telah_ditolak['jumlah']*100 / $jumlah_risiko_input['jumlah'] ;?>%;" class="bar"></div>
          </div>
        </li>
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Dinilai <span class="pull-right strong"><?php echo $telah_dinilai['jumlah'];?> / <?php echo $jumlah_telah_diaprove['jumlah'];?></span>
          <div class="progress progress-warning progress-striped ">
            <div style="width: <?php echo $telah_dinilai['jumlah']*100 / $jumlah_telah_diaprove['jumlah'] ;?>%;" class="bar"></div>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>
<div class="span3">


  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
      <h5>Progress Risiko <?php echo $year-1; ?></h5>
    </div>
    <div class="widget-content">
      <ul class="unstyled">
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Laporan Kejadian Risiko Yang Di-input <span class="pull-right strong"><?php echo $yes_efektif_before['jumlah'];?></span>
          <div class="progress progress-success progress-striped ">
            <div style="width: <?php echo $yes_efektif_before['jumlah'];?>%;" class="bar"></div>
          </div>
        </li>
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Di-input <span class="pull-right strong"><?php echo $not_approve_before['jumlah'];?></span>
          <div class="progress progress-striped ">
            <div style="width: <?php echo $not_approve_before['jumlah'];?>%;" class="bar"></div>
          </div>
        </li>              
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Di-approve <span class="pull-right strong"><?php echo $telah_approve_before['jumlah'];?> / <?php echo $jumlah_risiko_input_before['jumlah'];?></span>
          <div class="progress progress-success progress-striped ">
            <div style="width: <?php echo $telah_approve_before['jumlah']*100 / $jumlah_risiko_input_before['jumlah'] ;?>%;" class="bar"></div>
          </div>
        </li>
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Ditolak <span class="pull-right strong"><?php echo $telah_ditolak_before['jumlah'];?> / <?php echo $jumlah_risiko_input_before['jumlah'];?></span>
          <div class="progress progress-danger progress-striped ">
            <div style="width: <?php echo $telah_ditolak_before['jumlah']*100 / $jumlah_risiko_input['jumlah'] ;?>%;" class="bar"></div>
          </div>
        </li>
        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Dinilai <span class="pull-right strong"><?php echo $telah_dinilai_before['jumlah'];?> / <?php echo $jumlah_telah_diaprove_before['jumlah'];?></span>
          <div class="progress progress-warning progress-striped ">
            <div style="width: <?php echo $telah_dinilai_before['jumlah']*100 / $jumlah_telah_diaprove_before['jumlah'] ;?>%;" class="bar"></div>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>
<?php


if (($rataaa>=1)&&($rataaa<=1.5)) {
  $namarata2 =  "Sangat Kurang";
}
else if (($rataaa>=1.51)&&($rataaa<=2.5)) {
 $namarata2 = "Kurang";
}
else if (($rataaa>=2.51)&&($rataaa<=3.5)) {
 $namarata2 = "Cukup";
}
else if (($rataaa>=3.51)&&($rataaa<=4.5)) {
 $namarata2 = "Baik";
}
else if (($rataaa>=4.51)&&($rataaa<=5)) {
 $namarata2 = "Sangat Baik";
}
else{
  $namarata2 = "Belum Ada Rata-Rata";
}
?>

<div class="span3">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
      <h5>Rata-Rata Nilai <?php echo $year; ?></h5>
    </div>
    <div class="widget-content">
      <ul class="unstyled">
        <table width="100%">
          <tr>
            <td width="50%"><h2 align="right"><?php echo $rataaa; ?></h2></center></td>
            <td width="50%"><h4 align="center"><b>(<?php echo $namarata2; ?>)</b></h4></td>
          </tr>
        </table>           


        <div class="progress progress-detail progress-striped ">
          <div style="width: <?php echo $rataaa*100 / 5 ;?>%;" class="bar"></div>
        </div>


      </ul>
    </div>
  </div>
  </div>



  <?php


if (($rataaa_before>=1)&&($rataaa_before<=1.5)) {
  $namarata2_before =  "Sangat Kurang";
}
else if (($rataaa_before>=1.51)&&($rataaa_before<=2.5)) {
 $namarata2_before = "Kurang";
}
else if (($rataaa_before>=2.51)&&($rataaa_before<=3.5)) {
 $namarata2_before = "Cukup";
}
else if (($rataaa_before>=3.51)&&($rataaa_before<=4.5)) {
 $namarata2_before = "Baik";
}
else if (($rataaa_before>=4.51)&&($rataaa_before<=5)) {
 $namarata2_before = "Sangat Baik";
}
else{
  $namarata2_before = "Belum Ada Rata-Rata";
}
?>

<div class="span3">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
      <h5>Rata-Rata Nilai <?php echo $year-1; ?></h5>
    </div>
    <div class="widget-content">
      <ul class="unstyled">
        <table width="100%">
          <tr>
            <td width="50%"><h2 align="right"><?php echo $rataaa_before; ?></h2></center></td>
            <td width="50%"><h4 align="center"><b>(<?php echo $namarata2_before; ?>)</b></h4></td>
          </tr>
        </table>           


        <div class="progress progress-detail progress-striped ">
          <div style="width: <?php echo $rataaa_before*100 / 5 ;?>%;" class="bar"></div>
        </div>


      </ul>
    </div>
  </div>

</div>




<hr>

<div class="row-fluid">
  <div class="span12" >

  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
