<?php if(isset($id) and isset($aksi)){ 
  $data = mysql_fetch_array(mysql_query("select * from berita where id='$id'")); 
  $sql = mysql_query("UPDATE berita SET key_person = 'read' WHERE id = '$id'");
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
      $user = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));

      $all="";
      $all_user="";

      if($user['rayon'] == "-"){
        $sql = "select count(*) AS jumlah FROM risiko where kodeunit='$kodeunit'";
        $query = mysql_query($sql);
        $all = mysql_fetch_array($query);}
        else {
          $sql = "select count(*) AS jumlah FROM risiko where rayon='$user[rayon]'";
          $query = mysql_query($sql);
          $all = mysql_fetch_array($query);
        }

        if($user['rayon'] == "-"){
          $sql = "select count(*) AS jumlah FROM klb where unit='$kodeunit'";
          $query = mysql_query($sql);
          $all_user = mysql_fetch_array($query);
        } else {
          $sql = "select count(*) AS jumlah FROM klb where rayon='$user[rayon]'";
          $query = mysql_query($sql);
          $all_user = mysql_fetch_array($query);
        }



        $sql = "select count(*) AS jumlah FROM rayon";
        $query = mysql_query($sql);
        $all_rayon = mysql_fetch_array($query);



        $sbu = mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$user[sbu]'"));

        $unit = mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$user[kodeunit]'"));

        $rayon = mysql_fetch_array(mysql_query("select * from rayon where kode_rayon='$user[rayon]'"));

        $sql = "select count(*) AS jumlah FROM risiko where YEAR(tgl_identifikasi)='$year' and status='1'";
        $query = mysql_query($sql);
        $not_approve = mysql_fetch_array($query);

//TAHUN SEKARANG
//laporan input
        $sql = "select count(*) AS jumlah FROM klb inner join user on klb.user = user.user where unit='$kodeunit' and YEAR(tgl_kejadian)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]'";
        $query = mysql_query($sql);
        $laporankejadian_input = mysql_fetch_array($query);

//resiko input

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]'";
        $query = mysql_query($sql);
        $resiko_input = mysql_fetch_array($query);

//jumlah resiko input

        $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]'";
        $query = mysql_query($sql);
        $jumlah_risiko_input   = mysql_fetch_array($query);

//telah disetujui

        $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status = '1' ";
        $query = mysql_query($sql);
        $telah_approve   = mysql_fetch_array($query);

//jumlah telah disetujui

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status = '1' ";
        $query = mysql_query($sql);
        $jumlah_telah_diaprove   = mysql_fetch_array($query);


//TELAH DINILAI

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and kefektifan3 != '0'";
        $query = mysql_query($sql);
        $no_efektif   = mysql_fetch_array($query);

//SASARAN INPUT

$sql = "select count(*) AS jumlah FROM sasaran inner join user on sasaran.user = user.user where  sasaran.unit='$kodeunit' and YEAR(tahun_sasaran)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' ";
        $query = mysql_query($sql);
        $sasaran_input   = mysql_fetch_array($query);



//JUMLAH SASARAN SEHARUSNYA

      $sql = "select count(*) AS jumlah FROM user where kodeunit='$kodeunit' and status='RISK_OWNER' and rayon = '$user[rayon]'";
         $query = mysql_query($sql);
         $jumlah_sasaran_seharusnya = mysql_fetch_array($query);

      

        //telah ditolak
//ditolak 1

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='1' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $telah_ditolak_1   = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='1' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $jumlah_telah_ditolak_1   = mysql_fetch_array($query);

//ditolak 2

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='0' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $telah_ditolak_2   = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='0' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $jumlah_telah_ditolak_2   = mysql_fetch_array($query);


      $telah_ditolak = $telah_ditolak_1 + $telah_ditolak_2;
      $jumlah_telah_ditolak = $jumlah_telah_ditolak_1 + $jumlah_telah_ditolak_2;



//TAHUN SEBELUMNYA


       //laporan input
        $sql = "select count(*) AS jumlah FROM klb inner join user on klb.user = user.user where unit='$kodeunit' and YEAR(tgl_kejadian)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]'";
        $query = mysql_query($sql);
        $laporankejadian_input_before = mysql_fetch_array($query);

//resiko input

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]'";
        $query = mysql_query($sql);
        $resiko_input_before = mysql_fetch_array($query);

//jumlah resiko input

        $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]'";
        $query = mysql_query($sql);
        $jumlah_risiko_input_before   = mysql_fetch_array($query);

//telah disetujui

        $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status = '1' ";
        $query = mysql_query($sql);
        $telah_approve_before   = mysql_fetch_array($query);

//jumlah telah disetujui

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status = '1' ";
        $query = mysql_query($sql);
        $jumlah_telah_diaprove_before   = mysql_fetch_array($query);


//TELAH DINILAI

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and kefektifan3 != '0'";
        $query = mysql_query($sql);
        $no_efektif_before   = mysql_fetch_array($query);

//SASARAN INPUT

$sql = "select count(*) AS jumlah FROM sasaran inner join user on sasaran.user = user.user where  sasaran.unit='$kodeunit' and YEAR(tahun_sasaran)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' ";
        $query = mysql_query($sql);
        $sasaran_input_before   = mysql_fetch_array($query);



//JUMLAH SASARAN SEHARUSNYA

      $sql = "select count(*) AS jumlah FROM user where kodeunit='$kodeunit' and status='RISK_OWNER' and rayon = '$user[rayon]'";
         $query = mysql_query($sql);
         $jumlah_sasaran_seharusnya_before = mysql_fetch_array($query);

      

        //telah ditolak
//ditolak 1

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='1' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $telah_ditolak_1_before   = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='1' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $jumlah_telah_ditolak_1_before   = mysql_fetch_array($query);

//ditolak 2

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='0' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $telah_ditolak_2_before   = mysql_fetch_array($query);

      $sql = "select count(*) AS jumlah FROM risiko inner join user on risiko.nrk = user.user where  risiko.kodeunit='$kodeunit' and YEAR(tgl_identifikasi)=$year-1 and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' and risiko.status='0' and risiko.status2='0' ";
        $query = mysql_query($sql);
        $jumlah_telah_ditolak_2_before   = mysql_fetch_array($query);


      $telah_ditolak_before = $telah_ditolak_1_before + $telah_ditolak_2_before;
      $jumlah_telah_ditolak_before = $jumlah_telah_ditolak_1_before + $jumlah_telah_ditolak_2_before;




    ?>
    <div  class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="#"> <i class="icon-legal"></i><span class="label label-important"><?php echo $all['jumlah']; ?></span> Risiko  </a> </li>

        <li class="bg_ly"> <a href="#"> <i class=" icon-fire"></i> <span class="label label-success"><?php echo $all_user['jumlah']; ?></span>Kejadian Risiko </a> </li>

        <li class="bg_ly"> <a href="#"> <i class=" icon-fire"></i> <span class="label label-success"><?php echo $yes_efektif['jumlah']; ?></span>Risiko yang Di-approve </a> </li>

        <li class="bg_ly"> <a href="#"> <i class=" icon-fire"></i> <span class="label label-success"><?php echo $no_efektif['jumlah']; ?></span>Risiko yang telah Dinilai</a> </li>


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
                   if($r['key_person']=="unread"){
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
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Laporan Kejadian Risiko Yang Di-input <span class="pull-right strong"><?php echo $laporankejadian_input['jumlah'];?></span>
              <div class="progress progress-success progress-striped ">
                <div style="width: <?php echo $laporankejadian_input['jumlah'];?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Di-input <span class="pull-right strong"><?php echo $resiko_input['jumlah'];?></span>
              <div class="progress progress-striped ">
                <div style="width: <?php echo $resiko_input['jumlah'];?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Diapprove <span class="pull-right strong"><?php echo $telah_approve['jumlah'];?> / <?php echo $jumlah_risiko_input['jumlah'];?></span>
              <div class="progress progress-striped ">
                <div style="width: <?php echo $telah_approve['jumlah']*100 / $jumlah_risiko_input['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Ditolak <span class="pull-right strong"><?php echo $telah_ditolak['jumlah'];?> / <?php echo $jumlah_risiko_input['jumlah'];?></span>
              <div class="progress progress-danger progress-striped ">
                <div style="width: <?php echo $telah_ditolak['jumlah']*100 / $jumlah_risiko_input['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko yang Telah Dinilai <span class="pull-right strong"><?php echo $no_efektif['jumlah'];?> / <?php echo $jumlah_telah_diaprove['jumlah'];?></span>
              <div class="progress progress-success progress-striped ">
                <div style="width: <?php echo $no_efektif['jumlah']*100 / $jumlah_telah_diaprove['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Sasaran Risk Owner <span class="pull-right strong"><?php echo $sasaran_input['jumlah'];?> / <?php echo $jumlah_sasaran_seharusnya['jumlah'];?></span>
              <div class="progress progress-striped ">
                <div style="width: <?php echo $sasaran_input['jumlah']*100 / $jumlah_sasaran_seharusnya['jumlah'] ;?>%;" class="bar"></div>
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
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Laporan Kejadian Risiko Yang Di-input <span class="pull-right strong"><?php echo $laporankejadian_input_before['jumlah'];?></span>
              <div class="progress progress-success progress-striped ">
                <div style="width: <?php echo $laporankejadian_input_before['jumlah'];?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Di-input <span class="pull-right strong"><?php echo $resiko_input_before['jumlah'];?></span>
              <div class="progress progress-striped ">
                <div style="width: <?php echo $resiko_input_before['jumlah'];?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Telah Diapprove <span class="pull-right strong"><?php echo $telah_approve_before['jumlah'];?> / <?php echo $jumlah_risiko_input_before['jumlah'];?></span>
              <div class="progress progress-striped ">
                <div style="width: <?php echo $telah_approve_before['jumlah']*100 / $jumlah_risiko_input_before['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko Yang Ditolak <span class="pull-right strong"><?php echo $telah_ditolak_before['jumlah'];?> / <?php echo $jumlah_risiko_input_before['jumlah'];?></span>
              <div class="progress progress-danger progress-striped ">
                <div style="width: <?php echo $telah_ditolak_before['jumlah']*100 / $jumlah_risiko_input_before['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Risiko yang Telah Dinilai <span class="pull-right strong"><?php echo $no_efektif_before['jumlah'];?> / <?php echo $jumlah_telah_diaprove_before['jumlah'];?></span>
              <div class="progress progress-success progress-striped ">
                <div style="width: <?php echo $no_efektif_before['jumlah']*100 / $jumlah_telah_diaprove_before['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>
            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Sasaran Risk Owner <span class="pull-right strong"><?php echo $sasaran_input_before['jumlah'];?> / <?php echo $jumlah_sasaran_seharusnya_before['jumlah'];?></span>
              <div class="progress progress-striped ">
                <div style="width: <?php echo $sasaran_input_before['jumlah']*100 / $jumlah_sasaran_seharusnya_before['jumlah'] ;?>%;" class="bar"></div>
              </div>
            </li>

          </ul>
        </div>
      </div>   
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
          <h5>Daftar Risk Owner</h5>
        </div>
        <div class="widget-content">
          <div class="todo">
            <ul>
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">User</th> 
                    <th>Nama Pejabat</th> 
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if ($user['rayon'] == '-') {
                   $sql = mysql_query("select * from user where kodeunit='$kodeunit' and status='RISK_OWNER' and rayon = '-'");
                   $no = 1;
                   while ($r = mysql_fetch_array($sql)) {
                     echo "<tr tr class='gradeX'>
                     <td class='center'>$no</td> 
                     <td class='center'>$r[user]</td> 
                     <td class='center'>$r[nama_pejabat]</td>                      

                     ";                    
                     $no++;
                   }              
                 } else{
                   $sql = mysql_query("select * from user where kodeunit='$kodeunit' and status='RISK_OWNER' and rayon <> '-'");
                   $no = 1;
                   while ($r = mysql_fetch_array($sql)) {
                     echo "<tr tr class='gradeX'>
                     <td class='center'>$no</td> 
                     <td class='center'>$r[user]</td> 
                     <td class='center'>$r[nama_pejabat]</td>                       

                     ";                    
                     $no++;
                   } 
                 }                            
                 ?>

               </ul>
             </div>
           </div>
         </div>
       </div>




     </div>
   </div>
 </div>
</div>
<?php } ?>
