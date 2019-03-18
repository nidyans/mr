<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>        
<link rel="stylesheet" href="css/style.css" type="text/css" />     
<meta content="Aguzrybudy" name="author"/>
<link rel="stylesheet" href="../font-awesome-4.6.3/css/font-awesome.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <style type="text/css">
.AJI {
  text-align:center;
}
.AJI2 {
  text-align:center;
}
.bold {
  font-weight: bold;
  text-align: center;
}
.tengah {
  text-align: center;
}
</style>
<div id="content">
<?php 
$sql_periode=mysql_query("select * from periode WHERE id='2'");
  $row_per=mysql_fetch_array($sql_periode); 

$tgl=date('Y-m-d'); 

?>
<?php
                   
       $sql = mysql_query("select * from risiko WHERE id='$id'");
       $no = 1;
       while ($r = mysql_fetch_array($sql)) {
         $nilai_lh=$r["likelihood"];
         $nilai_ks=$r["konsekuensi"];
         $level_risiko=$nilai_lh*$nilai_ks;
         $sbu2=$r["sbu"];
           
            $sql_user=mysql_query("select * from user WHERE user='$r[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);
             
            $sql_tgl=mysql_query("select * from approve WHERE id_risiko='$r[id]'");
            $row_tgl=mysql_fetch_array($sql_tgl);
            
            $sql_e=mysql_query("select * from table_keefektifan WHERE id_risiko='$r[id]'");
            $row_e=mysql_fetch_array($sql_e);

             $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$sbu2'");
             $row_sbu=mysql_fetch_array($sql_sbu);

             $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$r[rayon]'");
             $row_rayon=mysql_fetch_array($sql_rayon);

             $sql_like = mysql_query("select * from likekon WHERE id='1'");
             $row_like = mysql_fetch_array($sql_like);

             $sql_kon = mysql_query("select * from likekon WHERE id='2'");
             $row_kons = mysql_fetch_array($sql_kon);
               

             $sql_mitigasi=mysql_query("select * from mitigasi WHERE id_risiko='$r[id]'");
             $row_mitigasi=mysql_fetch_array($sql_mitigasi);

             $skor= (($r["persen"]/100)*$r["rp_dampak"]);
            $skorlevel = $r['likelihood']*$r['konsekuensi'];

            $lvllaah = $row_mitigasi['likelihood']*$row_mitigasi['konsekuensi'];

            $skrlevel= $row_mitigasi['likelihood']*$row_mitigasi['konsekuensi'];
            $uang = ($row_mitigasi['dampak_rp']*($row_mitigasi['persen']/100)); 

            $selisih= $skor-$uang; 
            ?>
  <h1>Detail Risiko</h1>
</div>

<div class="container-fluid">

<div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Identifikasi Risiko dan Analisa Risiko</a></li>
              <li><a data-toggle="tab" href="#tab3">Evaluasi Risiko</a></li>
                <li><a data-toggle="tab" href="#tab2">Monitoring dan Review Risiko</a></li>
            </ul>
          </div>
  <div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
  <div class="span12 btn-icon-pg">
                  <ul><a href="cetak.php?id=<?php echo $id ?>"><li><i class="icon-print"></i>print</li></a></ul>
                  </div>
  <div class="row-fluid">
    <div class="span6">
    
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info Risiko</h5>
        </div>

        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tanggal Risiko:</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $r['tgl_identifikasi']; ?>" disabled="" />
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
                <input type="text" class="span11" disabled=""  value="<?php echo $r['kategori']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Faktor Risiko :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $r['faktor']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kelompok Risiko :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $r['kelompok']; ?>"/>
              </div>
            </div>
          </form>
        </div>
      </div>
      
     
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Analisis Risiko Inheren</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
           
           <div class="control-group">
              <label class="control-label">Pengendalian yang ada saat ini</label>
              <div class="controls">
                <textarea cols="20" rows="8" class="span10" disabled=""><?php echo $r['pengendalian']; ?></textarea>
               </div>
            </div>

            <div class="control-group">
              <label class="control-label">Likelihood (%) :</label>
              <div class="controls">
                <input type="text" class="span2 m-wrap" disabled="" value="<?php echo $r['likelihood']; ?>" /> 
                <input type="text" class="span2 m-wrap" disabled="" value="<?php echo $r['persen']; ?>" /> 
              <?php if ($r['persen'] <= $row_like['sangat_rendah']){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($r['persen'] > $row_like['sangat_rendah'] and $r['persen'] <= $row_like['rendah']){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($r['persen'] > $row_like['rendah'] and $r['persen'] <= $row_like['sedang']){ ?>
                  <input type="text" class="span5 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($r['persen'] > $row_like['sedang'] and $r['persen'] <= $row_like['tinggi']){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($r['persen'] > $row_like['tinggi']) {?>
                 <input type="text" class="span5 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Konsekuensi (Rp) :</label>
              <div class="controls">
                <input type="text" class="span3 m-wrap"  disabled="" value="<?php echo $r['konsekuensi']; ?>"/>
               <input type="text" class="span3 m-wrap" disabled="" value="<?php echo $r['rp_dampak']; ?>" /> 
                
                <?php if ($r['rp_dampak'] <= $row_kons['sangat_rendah']){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($r['rp_dampak'] > $row_kons['sangat_rendah'] and $r['rp_dampak'] <=$row_kons['rendah']){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($r['rp_dampak'] > $row_kons['rendah'] and $r['rp_dampak'] <= $row_kons['sedang']){ ?>
                  <input type="text" class="span5 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($r['rp_dampak'] > $row_kons['sedang'] and $r['rp_dampak'] <= $row_kons['tinggi']){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($r['rp_dampak'] > $row_kons['tinggi']) {?>
                 <input type="text" class="span5 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Level Risiko :</label>
              <div class="controls">
                <input type="text"  class="span3 m-wrap" disabled=""  value="<?php echo $level_risiko; ?>" />
                </br>
                </br>
                <table height="50" width="250" align="left">
                <td>Tingkat Level Risiko</td>
                 <?php if ($level_risiko == 0){?>
        <td   align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><font size="3">-</font></p>
    </td>
      <?php } else {
       if ($level_risiko >= 1 && $level_risiko <=4 ){ ?>
      <td  align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p><font size="3">RENDAH</font></p>
    </td>
      <?php } else if ($level_risiko >4 && $level_risiko<=9){ ?>
       <td  align="center" valign="middle" bgcolor="#FFCC00" class="tengah"><p><font size="3">SEDANG</font></p></td>
      <?php } else if ($level_risiko >9 && $level_risiko <=16){ ?>
        <td  align="center" valign="middle" bgcolor="#FFFF00" class="tengah"><p><font size="3"></font>TINGGI</font></p></td>
      <?php } else { ?>
      <td align="center" valign="middle" bgcolor="#FF0000" class="tengah"><p><font size="3"></font>EKSTRIM</font></p></td>
      <?php }} ?></table>
              </div>
            </div>
            <div class="control-group">
          
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Identifikasi Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
          <div class="control-group">
              <label class="control-label">Nama Risiko</label>
              <div class="controls">
                 <textarea cols="20" rows="8" class="span5" disabled=""><?php echo $r['nama']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">peristiwa Risiko</label>
              <div class="controls">
                 <textarea cols="20" rows="8" class="span5" disabled=""><?php echo $r['peristiwa']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sebab Risiko</label>
              <div class="controls">
                 <textarea cols="20" rows="8" class="span5" disabled=""><?php echo $r['sebab']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">UC/C</label>
              <div class="controls">
                <input type="text"  class="span1 m-wrap" disabled="" value="<?php echo $r['uc_c']; ?>">
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Dampak</label>
              <div class="controls">
               <textarea cols="20" rows="8" class="span5" disabled=""><?php echo $r['dampak']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Dampak (Rp)</label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">Rp</span></div>
                  <input type="text"  class="span3" disabled="" value="<?php echo $r['rp_dampak'] ?>" />
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
          </form>
        </div>
      </div>
      <!--..............................................................................-->
      <div class="widget-box">
        
            <ul class="quick-actions">
             
              <li class="bg_lb"> <a href="../filescan/<?php echo $r['file'];?>"> <i class="icon-download"></i>Download File </a> </li>
            </ul>
            
         
  </div>
  <!--.......................................................................................-->
  <div class="row-fluid">
    
  </div>
  <!---->
</div></div></div></div>
<div id="tab2" class="tab-pane">
            <div class="widget-box">
          
        </div>
         <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Status Efektifitas</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Assesment</th>
                  <th>Nama Pejabat</th>
                  <th>Tanggal</th>
                  <th>status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="taskDesc"><i class="icon-plus-sign"></i>KEY PERSON</td>
                  <td class="taskDesc"><center><?php echo $row_e['user3'] ?></center></td>
                  <td class="taskDesc"><center><?php echo $row_e['tgl3'] ?></center></td>
                <?php if ($r['kefektifan3']=="0"){
                 echo "<td align='center'><center>-</center></td>";
               }else {
                 if ($r['kefektifan3'] == "5"){
                 echo "<td class='taskDesc' align='center'><center>Sangat Baik</center></td>"; } 
                else if ($r['kefektifan3'] == "4"){
                    echo "<td class='taskDesc' align='center'><center>Baik</center></td>";
                } else if($r['kefektifan3'] == "3"){
                    echo "<td class='taskDesc' align='center'><center>Cukup</center></td>";
                } else if($r['kefektifan3'] == "2"){
                    echo "<td class='taskDesc' align='center'><center>Kurang</center></td>"; 
                } else {
                   echo "<td class='taskDesc' align='center'><center>Sangat Kurang</center></td>"; 
                }
                 } ?>
                 <?php if($tgl == $row_per['tgl_mulai'] or $tgl < $row_per['tgl_akhir']) {?>
                  <?php if ($hak_akses == "KEY_PERSON" AND $row_tgl['status_approve1']== 1 AND $row_tgl['status_approve2'] == 1) {  ?> 
                  <td align="center"><a class="open_modal2" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td> <?php } else {?>
                  <td align="center"><center>-</center></td> <?php }} else if ($tgl > $row_per['tgl_akhir'] ) { ?>
                  <td align="center"><center>-</center></td>
                  <?php } ?>
                <tr>
                  <td class="taskDesc"><i class="icon-plus-sign"></i> SPI</td>
                  <td class="taskDesc"><center><?php echo $row_e['user1']; ?></center></td>
                  <td class="taskDesc"><center><?php echo $row_e['tgl_1']; ?></center></td>
                  <?php if ($r['kefektifan1']=="0"){
                 echo "<td class='taskDesc' align='center'><center>-</center></td>";
               }else {
                 if ($r['kefektifan1'] == "5"){
                 echo "<td class='taskDesc' align='center'><center>Sangat Baik</center></td>"; } 
                else if ($r['kefektifan1'] == "4"){
                    echo "<td class='taskDesc' align='center'><center>Baik</center></td>";
                } else if($r['kefektifan1'] == "3"){
                    echo "<td class='taskDesc' align='center'><center>Cukup</center></td>";
                } else if($r['kefektifan1'] == "2"){
                    echo "<td class='taskDesc' align='center'><center>Kurang</center></td>"; 
                } else {
                   echo "<td class='taskDesc' align='center'><center>Sangat Kurang</center></td>"; 
                }
                 } ?>

                  <?php if($tgl == $row_per['tgl_mulai'] or $tgl < $row_per['tgl_akhir']) {?>
            <?php if ($hak_akses == "SPI" AND $row_tgl['status_approve1'] == 1 AND $row_tgl['status_approve2'] == 1 ){ ?>
            <?php if ($hak_akses == "SPI" AND empty($row_e['user1'])) {  ?> 
            <td align="center"><a class="open_modal2" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td> 
        <?php }else if ($hak_akses == "SPI" AND $row_user2['nama_pejabat'] == $row_e['user1']){
           ?><td align="center"><a class="open_modal2" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td> <?php }
          else { ?><td align="center"><a class="open_modal2" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td> <?php }} else { ?>
          <td><center>-</center></td>
          <?php } } else if ($tgl > $row_per['tgl_akhir'] ) { ?>
          <td><center>-</center></td>
          <?php } ?>
                </tr>

                <tr>
                  <td class="taskDesc"><i class="icon-plus-sign"></i> ADMIN</td>
                  <td class="taskDesc"><center><?php echo $row_e['user2'] ?></center></td>
                  <td class="taskDesc"><center><?php echo $row_e['tgl_2'] ?></center></td>
                  <?php if ($r['kefektifan2']=="0"){
                 echo "<td align='center'><center>-</center></td>";
               }else {
                 if ($r['kefektifan2'] == "5"){
                 echo "<td class='taskDesc' align='center'><center>Sangat Baik</center></td>"; } 
                else if ($r['kefektifan2'] == "4"){
                    echo "<td class='taskDesc' align='center'><center>Baik</center></td>";
                } else if($r['kefektifan2'] == "3"){
                    echo "<td class='taskDesc' align='center'><center>Cukup</center></td>";
                } else if($r['kefektifan2'] == "2"){
                    echo "<td class='taskDesc' align='center'><center>Kurang</center></td>"; 
                } else {
                   echo "<td class='taskDesc' align='center'><center>Sangat Kurang</center></td>"; 
                }
                 } ?>
                 <?php if($tgl == $row_per['tgl_mulai'] or $tgl < $row_per['tgl_akhir']) {?>
                  <?php if ($hak_akses == "ADMIN" AND $row_tgl['status_approve1']== 1 AND $row_tgl['status_approve2'] == 1) {  ?> 
        <td align="center"><a class="open_modal2" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td> <?php } else { ?>
             <td align="center"><center>-</center></td> <?php }} else if ($tgl > $row_per['tgl_akhir'] ) { ?>
              <td align="center"><center>-</center></td>
             <?php } ?>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>Catatan</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
              <li>
                
              
                <div class="article-post">
                 
                  <span class="user-info"> By: <?php echo $row_e['user3']; ?> / Date: <?php echo $row_e['tgl3']; ?> / Efektifitas 1 </span>
                  <p><a href="#"><?php echo $row_e['ctt5']; ?></a> </p>
                </div></li>
                <li>
                
                <div class="article-post">
                 
                  <span class="user-info"> By: <?php echo $row_e['user1']; ?> / Date: <?php echo $row_e['tgl_1']; ?> / Efektifitas 2 </span>
                  <p><a href="#"><?php echo $row_e['ctt3']; ?></a> </p>
                </div></li>
                <li>
                
                <div class="article-post">
                 
                  <span class="user-info"> By: <?php echo $row_e['user2']; ?>/ Date: <?php echo $row_e['tgl_2']; ?> / Efektifitas 3 </span>
                  <p><a href="#"><?php echo $row_e['ctt4']; ?></a> </p>
                </div></li>
            </ul>
          </div>
        </div>
            </div>
            <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
          
            </div>

            <div id="tab3" class="tab-pane"> 
        <?php    
        
     $data = "";
    $cek = mysql_num_rows(mysql_query("SELECT * FROM mitigasi WHERE id_risiko='$id'"));
    if ($cek > 0){
        $data = "ada";
    } else{
       $data = "false"; 
    }?>
      
           <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Rencana Perlakuan</h5>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Rencana Perlakuan</label>
              <div class="controls">
                 <textarea type="text"  class="span7 m-wrap" disabled=""><?php echo $r['rencana'];?> </textarea>
              </div>
	    </div>

            <div class="control-group">
              <label class="control-label">Rencana Perlakuan (Rp)</label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">Rp</span></div>
                  <input type="text"  class="span3" disabled="" value="<?php echo $r['rp_pengendalian'];?>">
              </div>
            </div>
           
          </form>
    
</div></div>
<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Risiko Residual</h5>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
           
           <div class="control-group">
              <label class="control-label">Likelihood (%)</label>
              <div class="controls">
                
                  <input type="text"  class="span1" disabled="" value="<?php echo $row_mitigasi['likelihood'];?>"/>
                  <input type="text"  class="span2" disabled="" value="<?php echo $row_mitigasi['persen'];?>"/>
                   <?php if ($row_mitigasi['persen'] <= $row_like['sangat_rendah']){ ?>
                <input type="text" class="span2 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($row_mitigasi['persen'] > $row_like['sangat_rendah'] and $row_mitigasi['persen'] <= $row_like['rendah']){ ?>
                <input type="text" class="span2 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($row_mitigasi['persen'] > $row_like['rendah'] and $row_mitigasi['persen'] <= $row_like['sedang']){ ?>
                  <input type="text" class="span2 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($row_mitigasi['persen'] > $row_like['sedang'] and $row_mitigasi['persen'] <= $row_like['tinggi']){ ?>
                <input type="text" class="span2 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($row_mitigasi['persen'] > $row_like['tinggi']) {?>
                 <input type="text" class="span2 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
	    </div>
              
              <div class="control-group">
              <label class="control-label">Konsekuensi (Rp)</label>
              <div class="controls">
               <input type="text"  class="span1" disabled="" value="<?php echo $row_mitigasi['konsekuensi'];?>"/> 
               <input type="text"  class="span2" disabled="" value="<?php echo $row_mitigasi['dampak_rp'];?>"/>
                <?php if ($row_mitigasi['dampak_rp'] <= $row_kons['sangat_rendah']){ ?>
                <input type="text" class="span3 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($row_mitigasi['dampak_rp'] > $row_kons['sangat_rendah'] and $row_mitigasi['dampak_rp'] <= $row_kons['rendah']){ ?>
                <input type="text" class="span3 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($row_mitigasi['dampak_rp'] >  $row_kons['rendah'] and $row_mitigasi['dampak_rp'] <=  $row_kons['sedang']){ ?>
                  <input type="text" class="span3 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($row_mitigasi['dampak_rp'] > $row_kons['sedang'] and $row_mitigasi['dampak_rp'] <= $row_kons['tinggi']){ ?>
                <input type="text" class="span3 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($row_mitigasi['dampak_rp'] > $row_kons['tinggi']) {?>
                 <input type="text" class="span3 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div></div>

              <div class="control-group">
              <label class="control-label">Level Risiko</label>
              <div class="controls">
               <input type="text"  class="span2" disabled="" value="<?php echo $lvllaah ?>">
               </br>
               </br>
               <table height="50" width="250" align="left">
                <td>Tingkat Level Risiko</td>
                 <?php if ($lvllaah == 0){?>
        <td   align="center" valign="middle" bgcolor="#CCCCCC" class="tengah" width="100"><p><font size="3">-</font></p>
    </td>
      <?php } else {
       if ($lvllaah >= 1 && $lvllaah <=4 ){ ?>
      <td  align="center" valign="middle" bgcolor="#3ECA27" class="tengah" width="100"><p><font size="3">RENDAH</font></p>
    </td>
      <?php } else if ($lvllaah >4 && $lvllaah<=9){ ?>
       <td  align="center" valign="middle" bgcolor="#FFCC00" class="tengah" width="100"><p><font size="3">SEDANG</font></p></td>
      <?php } else if ($lvllaah >9 && $lvllaah <=16){ ?>
        <td  align="center" valign="middle" bgcolor="#FFFF00" class="tengah" width="100"><p><font size="3"></font>TINGGI</font></p></td>
      <?php } else { ?>
      <td align="center" valign="middle" bgcolor="#FF0000" class="tengah" width="100"><p><font size="3"></font>EKSTRIM</font></p></td>
      <?php }} ?></table>
             </div></div>
             </form></div></div>

<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Analisa Biaya dan Manfaat</h5>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label">EBC</label>
              <div class="controls">
                 <input type="text"  class="span7 m-wrap" disabled=""  value="<?php echo $skor; ?>"/>
              </div></div>
           
            <div class="control-group">
              <label class="control-label">ERC</label>
              <div class="controls">
              
              <input type="text"  class="span3" disabled="" value="<?php echo $uang;?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Benefit(EBC-ERC)</label>
              <div class="controls">
                <input type="text" class="span7" disabled="" value="<?php echo $selisih; ?>" />
               
            </div>
            </div>
           <div class="control-group">
              <label class="control-label">Rencana Biaya(cost)</label>
              <div class="controls">
             
                  <input type="text"  class="span1" disabled="" value="<?php echo $r['rp_pengendalian']; ?>" />
              </div></div>
              
              <div class="control-group">
              <label class="control-label">Ratio Cost dan Benefit</label>
              <?php if($r['rp_pengendalian']==0){
                  $bagi = 0;  }else{
                  $bagi=($selisih/$r['rp_pengendalian'])*100;} ?>
              <div class="controls">
              
               <input type="text"  class="span2" disabled="" value="<?php echo $bagi; ?>" />
              </div></div>
</form></div></div> 
    <?php   
      $no++;
             }                    
                    ?>  
                    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Status Approve</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Assesment</th>
                  <th>Nama Pejabat</th>
                  <th>Tanggal</th>
                  <th>status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> KEY PERSON</td>
              <?php  $sql=mysql_query("select * from user WHERE id='$row_tgl[id_user]'");
              $row=mysql_fetch_array($sql); ?>
                  <td class="taskDesc"><center><?php echo $row['nama_pejabat']; ?></center></span></td>
                  <td class="taskDesc"><center><?php echo $row_tgl['tgl1']; ?></center></td>
             <?php if ($row_tgl['status_approve1'] == 0){ ?>
             <td class="taskDesc" ><center>-</center></td>
            <?php } else if($row_tgl['status_approve1'] == 1) {?>
            <td class="taskDesc"><center><i class='fa fa-check' style='font-size:20px;color:black'></i></center></td>
            <?php } else if($row_tgl['status_approve1'] == 2) {?>
           <td class="taskDesc"><i class='fa fa-close' style='font-size:20px;color:red'></i></td>
           <?php } ?>
           <?php if($hak_akses == "KEY_PERSON") {?>
        <?php if($row_tgl['status_approve1'] == 0) {?>
        <td align="center"><a class="open_modal" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td>
        <?php } else if ($row_tgl['status_approve1'] ==2){ ?>
         <td align="center"><a class="open_modal" href="#" id="<?php echo $id ?>"><center>aksi</center></a></td>
        <?php } else {?>
         <td  align="center"><center>-</center></td>
       <?php }} else {?>
          <td  align="center"><center>-</center></td>
       <?php }?>    
                  
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> ADMIN</td>
                  <?php  $sql=mysql_query("select * from user WHERE id='$row_tgl[id_user2]'");
              $row2=mysql_fetch_array($sql); ?>
                  <td class="taskDesc"><center><?php echo $row2['nama_pejabat']; ?></center></span></td>
                  <td class="taskDesc"><center><?php echo $row_tgl['tgl2']; ?></center></td>
            <?php if ($row_tgl['status_approve2'] == 0){ ?>
             <td class="taskDesc" ><center>-</center></td>
            <?php } else if($row_tgl['status_approve2'] == 1) {?>
            <td class="taskDesc"><center><i class='fa fa-check' style='font-size:20px;color:black'></i></center></td>
            <?php } else if($row_tgl['status_approve2']== 2) {?>
           <td class="taskDesc"><i class='fa fa-close' style='font-size:20px;color:red'></i></td>
           <?php } ?>
                
        <?php if ($hak_akses == "ADMIN") {?>
        <?php if ($row_tgl['status_approve1'] == 2 and $row_tgl['status_approve2'] == 1){?>
        <td rowspan="3" align="center"><a class="open_modal" href="#" id="<?php echo $id; ?>"><center>aksi</center></a></td>
        <?php } else if ($row_tgl['status_approve1'] ==2 and $row_tgl['status_approve2'] ==0) { ?>
        <td rowspan="3" align="center"><a class="open_modal" href="#" id="<?php echo $id; ?>"><center>aksi</center></a></td>
        <?php } else if ($row_tgl['status_approve1']==1 and $row_tgl['status_approve2']==2) { ?>
        <td rowspan="3" align="center"><a class="open_modal" href="#" id="<?php echo $id; ?>"><center>aksi</center></a></td>
        <?php } else if ($row_tgl['status_approve1']==1 and $row_tgl['status_approve2']==0) { ?>
        <td rowspan="3" align="center"><a class="open_modal" href="#" id="<?php echo $id; ?>"><center>aksi</center></a></td>
        <?php } else if ($row_tgl['status_approve1']==0 and $row_tgl['status_approve2']==0) { ?>
        <td rowspan="3" align="center"><center>-</center></a></td>
        <?php } else { ?>
       <td rowspan="3" align="center"><center>-</center></td> <?php } ?>
       <?php } else if ($hak_akses != "ADMIN") {?>
          <td rowspan="3" align="center"><center>-</center></td>
       <?php }?>
                </tr>

              </tbody>
            </table>
          </div></div>
           <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>Catatan</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
              <li>
                
                <div class="article-post">
                <?php  $sql=mysql_query("select * from user WHERE id='$row_tgl[id_user]'");
                 $row4=mysql_fetch_array($sql); ?>
                  <span class="user-info"> By: <?php echo $row4['nama_pejabat'];?> / Date: <?php echo $row_tgl['tgl1']; ?> / Approve 1 </span>
                  <p><a href="#"><?php echo $row_tgl['ctt1']; ?></a> </p>
                </div>
              </li>
              <li>
                
                <div class="article-post">
                 <?php  $sql=mysql_query("select * from user WHERE id='$row_tgl[id_user2]'");
              $row5=mysql_fetch_array($sql); ?>
                  <span class="user-info"> By: <?php echo $row5['nama_pejabat'];?>  / Date: <?php echo $row_tgl['tgl2']; ?> / Approve 2 </span>
                  <p><a href="#"><?php echo $row_tgl['ctt2']; ?> </p>
                </div>
              </li>
              <li>
                
            </ul>
          </div>
        </div>

                         


<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "approve1.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal2").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "efektifitas.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>
<!--         -!>
