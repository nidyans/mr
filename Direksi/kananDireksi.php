<?php if(isset($id)){

$data = mysql_fetch_array(mysql_query("select * from berita where id='$id'")); 
$sql = mysql_query("UPDATE berita SET direksi = 'read' WHERE id = '$id'");
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
$sql = "SELECT count(*) AS jumlah FROM risiko";
$query = mysql_query($sql);
$all = mysql_fetch_array($query);

$sql = "SELECT count(*) AS jumlah FROM user";
$query = mysql_query($sql);
$all_user = mysql_fetch_array($query);

$sql = "SELECT count(*) AS jumlah FROM sbu";
$query = mysql_query($sql);
$all_sbu = mysql_fetch_array($query);

$sql = "SELECT count(*) AS jumlah FROM unitkerja";
$query = mysql_query($sql);
$all_unit = mysql_fetch_array($query);

$sql = "SELECT count(*) AS jumlah FROM rayon";
$query = mysql_query($sql);
$all_rayon = mysql_fetch_array($query);

$user = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));

$sbu = mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$user[sbu]'"));

$unit = mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$user[kodeunit]'"));

$rayon = mysql_fetch_array(mysql_query("select * from rayon where kode_rayon='$user[rayon]'"));

$sql = "SELECT count(*) AS jumlah FROM risiko where status = '1' and status2= '1' and YEAR(tgl_identifikasi)='$year' ";
$query = mysql_query($sql);
$not_approve = mysql_fetch_array($query);


$sql = "SELECT count(*) AS jumlah FROM risiko where status = '1' and status2= '1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_approve = mysql_fetch_array($query);

$sql = "SELECT count(*) AS jumlah FROM risiko where kefektifan1 != '0' and kefektifan2 != '0' and kefektifan3 != '0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$yes_efektif = mysql_fetch_array($query);


$sql = "SELECT count(*) AS jumlah FROM risiko where kefektifan1 = '0' and kefektifan2 = '0' and kefektifan3 = '0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year'";
$query = mysql_query($sql);
$no_efektif = mysql_fetch_array($query);

 ?>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="#"> <i class="icon-legal"></i><span class="label label-important"><?php echo $all['jumlah']; ?></span> Risiko  </a> </li>
      <li class="bg_lo"> <a href="#"> <i class="icon-group"></i><span class="label label-success"><?php echo $all_user['jumlah']; ?></span>  User </a> </li>
      <li class="bg_ly"> <a href="#"> <i class=" icon-globe"></i> <span class="label label-success"><?php echo $all_sbu['jumlah']; ?></span>SBU </a> </li>
      
      <li class="bg_ls"> <a href="#"> <i class="icon-sitemap"></i><span class="label label-success"><?php echo $all_unit['jumlah']; ?></span> Unit</a> </li>
      <li class="bg_ly"> <a href="#"> <i class="icon-map-marker"></i><span class="label label-success"><?php echo $all_rayon['jumlah']; ?></span> Rayon</a> </li>
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
            <h5>Data Berita</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php
                   
                     $sql = mysql_query("select * from berita");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                     
                      if($r['direksi']=="unread"){
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
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>Progress Risiko <?php echo $year; ?></h5>
          </div>
          <div class="widget-content">
            <ul class="unstyled">
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Telah Diapprove <span class="pull-right strong"><?php echo $yes_approve['jumlah'];?></span>
                <div class="progress progress-striped ">
                  <div style="width: <?php echo $yes_approve['jumlah'];?>%;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Belum Diapprove <span class="pull-right strong"><?php echo $not_approve['jumlah'];?></span>
                <div class="progress progress-success progress-striped ">
                  <div style="width: <?php echo $not_approve['jumlah'];?>%;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span> Risiko Dinilai <span class="pull-right strong"><?php echo $yes_efektif['jumlah'];?></span>
                <div class="progress progress-warning progress-striped ">
                  <div style="width: <?php echo $yes_efektif['jumlah'];?>%;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Belum Dinilai <span class="pull-right strong"><?php echo $no_efektif['jumlah'];?></span>
                <div class="progress progress-danger progress-striped ">
                  <div style="width: <?php echo $no_efektif['jumlah'];?>%;" class="bar"></div>
                </div>
              </li>
            </ul>
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