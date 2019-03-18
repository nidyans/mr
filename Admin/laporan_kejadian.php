<?php 
$year= date('Y');

 ?>
<?php if (isset($tahun)) {?>
<h1>Laporan Kejadian Risiko</h1>
  </div>
  <div class="container-fluid">

    
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Laporan Kejadian Risiko</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                   <th>No</th>
                   <th>Tanggal Kejadian</th>
                   <th>Kejadian</th>
                   <th>Jabatan</th>
                   <th>Status</th>
      
                </tr>
              </thead>
              <tbody>
                 <?php
                    $sql = mysql_query("select * from klb where YEAR(tgl_laporan)=$tahun order by tgl_laporan DESC");
					          $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                         
                     $query=mysql_fetch_array(mysql_query("select * from user where user='$r[user]'"));
            
                echo "<tr class='gradeX'> 
               <td class='center'>$no</td>  
               <td>$r[tgl_kejadian]</td>         
               <td><a href='?halaman=laporan_kejadian&&id=$r[id]'>$r[kejadian]</td>
               <td>$query[risk_owner]</td>";
               if ($r['status']=="0"){   
	               echo "<td align='center'>-</td>"; } 
			else if ($r['status']=="1"){
			echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
							   }else{
							   	echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
							   };
							   echo "</tr>";
                    
                      $no++;
                    }                               
                    ?>
              </tbody>
            </table>
          </div>
        </div>


<?php }else if(isset($id)) { ?>

<?php
                   
                    $sql = mysql_query("select * from klb WHERE id='$id'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
              
            $sql_user=mysql_query("select * from user WHERE user='$r[user_app]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[unit]'");
            $row_unit=mysql_fetch_array($sql_unit);

             $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$r[rayon]'");
            $row_rayon=mysql_fetch_array($sql_rayon);
          
             $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$r[sbu]'");
             $row_sbu=mysql_fetch_array($sql_sbu);

             $sql_user2=mysql_query("select * from user WHERE user='$r[user]'");
            $row_user2=mysql_fetch_array($sql_user2);

            ?>
            
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=laporan_kejadian&&tahun=$year'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="row-fluid">

    <div class="span6">

      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info Laporan Kejadian</h5>
        </div>

        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tanggal Kejadian:</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $r['tgl_kejadian']; ?>" disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal dilaporkan :</label>
              <div class="controls">
                <input type="text" class="span11"  disabled="" value="<?php echo  $r['tgl_laporan']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jabatan :</label>
              <div class="controls">
                <input type="text"  class="span11" disabled="" value="<?php echo $row_user2['risk_owner']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Pejabat :</label>
              <div class="controls">
                <input type="text"  class="span11" disabled="" value="<?php echo $row_user2['nama_pejabat']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">SBU :</label>
              <div class="controls">
                <input type="text"  class="span11" disabled="" value="<?php echo $row_sbu['nama']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $row_unit['nama']; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Rayon :</label>
              <div class="controls">
                <input type="text" class="span11" disabled=""  value="<?php echo $row_rayon['nama']; ?>"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Laporan Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Biaya Tindakan :</label>
              <div class="controls">
                Rp <input type="text" class="span4 m-wrap" disabled="" value="<?php echo $r['tindakan_rp']; ?>" /> 
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Biaya Akibat :</label>
              <div class="controls">
               Rp <input type="text"  class="span3 m-wrap" disabled=""  value="<?php echo $r['akibat_rp']; ?>" />
                </br>
                </br>
              </div>
            </div>
            <div class="control-group">
             <label class="control-label">Langkah/action :</label>
              <div class="controls">
               Rp <input type="text"  class="span3 m-wrap" disabled=""  value="<?php echo $r['akibat_rp']; ?>" />
                </br>
                </br>
              </div>
              
            </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Identifikasi Laporan Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Kejadian</label>
              <div class="controls">
                 <textarea disabled=""><?php echo $r['kejadian']; ?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tindakan</label>
              <div class="controls">
                 <textarea disabled=""><?php echo $r['tindakan']; ?></textarea>
              </div>
            </div>

            <div class="control-group">	 
              <label class="control-label">Akibat</label>
              <div class="controls">
                <textarea type="text"  class="span2 m-wrap" disabled="" value="<?php echo $r['akibat']; ?>"></textarea>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Langkah/Action</label>
              <div class="controls">
               <textarea disabled=""><?php echo $r['langkah_action']; ?></textarea>
              </div>
            </div>
      
          </form>
        </div>
      </div></div>


      <!--..............................................................................-->
      <div class="widget-box">
        
            <ul class="quick-actions">
             
              <li class="bg_lb"> <a href="../filescan/<?php echo $r['nama_file'];?>"> <i class="icon-download"></i>Download File </a> </li>
            </ul>
            
         
  </div>
  <!--.......................................................................................-->
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
                  <td class="taskDesc"><center><?php echo $row_user['nama_pejabat']; ?></center></span></td>
                  <td class="taskDesc"><center><?php echo $r['tgl_approve']; ?></center></td>
             <?php if ($r['status'] == 0){ ?>
             <td class="taskDesc" ><center>-</center></td>
            <?php } else if($r['status'] == 1) {?>
            <td class="taskDesc"><center><i class='fa fa-check' style='font-size:20px;color:black'></i></center></td>
            <?php } else if($r['status'] == 2) {?>
           <td class="taskDesc"><i class='fa fa-close' style='font-size:20px;color:red'></i></td>
           <?php } ?>
           <?php if($hak_akses == "KEY_PERSON") {?>
        <?php if($r['status'] == 0) {?>
        <td align="center"><a class="open_modal" href="#" id="<?php echo $r['id']; ?>"><center>aksi</center></a></td>
        <?php } else if ($r['status']==2){ ?>
         <td align="center"><a class="open_modal" href="#" id="<?php echo $r['id']; ?>"><center>aksi</center></a></td>
        <?php } else {?>
         <td  align="center"><center>-</center></td>
       <?php }} else {?>
          <td  align="center"><center>-</center></td>
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
                  <span class="user-info"> By: <?php echo $row_user['nama_pejabat'];?> / Date: <?php echo $r['tgl_approve']; ?> / Approve 1 </span>
                  <p><a href="#"><?php echo $r['ctt_klb']; ?></a> </p>
                </div>
              </li>
              
                
                
            </ul>
          </div>
        </div>

<?php $no++; } ?>
<?php } else { ?>
 <h1>Rekap Laporan Kejadian Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=laporan_kejadian" method="post">
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