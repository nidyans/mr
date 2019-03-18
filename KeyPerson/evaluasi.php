<?php $year =date('Y'); ?>

<?php if(isset($edit)) {

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

$sql_mitigasi =mysql_query("UPDATE  mitigasi SET likelihood ='$likelihood',persen ='$persen',konsekuensi='$konsekuensi',dampak_rp='$dampak_rp' WHERE id_risiko"); 

$sql = mysql_query("UPDATE risiko SET rp_pengendalian = '$pengendalian_rp', pengendalian='$pengendalian' ,rencana = '$rencana' WHERE id = '$id_risiko'");


if($sql_mitigasi AND $sql){
   //echo"Data Berhasil Dihapus";
  header("location:?halaman=evaluasi&&tahun=$year&&i=berhasil");

}else{ 

 header("location:?halaman=evaluasi&&tahun=$year&&i=gagal");
} 

} ?>

<?php if(isset($tambah)) {

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

$sql_mitigasi =mysql_query("insert into mitigasi values('','$id_risiko',now(),
'$namauser','$likelihood','$persen','$konsekuensi','$dampak_rp','$row_user[sbu]','$row_user[kodeunit]','$row_user[rayon]')"); 

$sql = mysql_query("UPDATE risiko SET rp_pengendalian = '$pengendalian_rp', pengendalian='$pengendalian' ,rencana = '$rencana' WHERE id = '$id_risiko'");


if($sql_mitigasi AND $sql){
   //echo"Data Berhasil Dihapus";
  header("location:?halaman=evaluasi&&tahun=$year&&i=berhasil");

}else{ 

 header("location:?halaman=evaluasi&&tahun=$year&&i=gagal");
} 

} ?>

<script src="js/jquery.min.js"></script>
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
<?php if(isset($simpan)){ 
$data = mysql_fetch_array(mysql_query("select * from risiko where id='$risk'"));  
   
$sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$data[sbu]'");
$row_sbu=mysql_fetch_array($sql_sbu); 

$sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$data[kodeunit]'");
$row_unit=mysql_fetch_array($sql_unit);

$sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$data[rayon]'");
$row_rayon=mysql_fetch_array($sql_rayon);
                 
?>
        
 <div class="container-fluid">

  <h1>Evaluasi Risiko</h1>
</div>

  <form action="?halaman=evaluasi" method="post" class="form-horizontal">

  <div class="row-fluid">
    <div class="span12">
    
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info Risiko</h5>
        </div>
     <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
         
          <div class="widget-content"> 
          <div class="control-group">
              <label class="control-label">Tanggal Risiko:</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $data['tgl_identifikasi']; ?>" disabled="" />
                <input type="hidden" class="span11" name="id_risiko" value="<?php echo $data['id']; ?>" />
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
          
          
           </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          
          <div class="widget-content"> 
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
    </div>
     
     <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Evaluasi</h5>
        </div>   
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          
          <div class="widget-content"> 
          <div class="control-group">
              <label class="control-label">Rencana Perlakuan</label>
              <div class="controls">
                 <textarea name="rencana" ></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pengendalian Risiko</label>
              <div class="controls">
                 <textarea name="pengendalian" value="<?php echo $data['pengendalian']; ?>"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pengendalian (Rp)</label>
              <div class="controls">
                <input type="text" name="pengendalian_rp" />
              </div>
            </div>
            <div class="control-group">
                  <label class="control-label">Likelihood Residual</label>
                  <div class="controls">
                    <input id="val2" type="text" name="persen" style="width:50px;" onkeyup="kurang()" />%  <input type="text" id="hasil2" readonly />
                  </div>
                </div>

                 <div class="control-group">
                  <label class="control-label">Konsekuensi Residual</label>
                  <div class="controls">
                   Rp <input name="dampak_rp"  id="val3" onkeyup="kali()"/>  <input type="text" id="hasil4" readonly>
                  </div>
                </div>
          
           </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          
          <div class="widget-content"> 
          <div class="control-group">
              <label class="control-label">Likelihood (%) Inheren:</label>
              <div class="controls">
                <input type="text" class="span2 m-wrap" disabled="" value="<?php echo $data['likelihood']; ?>" /> 
                <input type="text" class="span2 m-wrap" disabled="" value="<?php echo $data['persen']; ?>" /> 
              <?php if ($data['persen'] <= 10){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($data['persen'] > 10 and $data['persen'] <= 30){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($data['persen'] > 30 and $data['persen'] <= 50){ ?>
                  <input type="text" class="span5 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($data['persen'] > 50 and $data['persen'] <= 70){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($data['persen'] > 70) {?>
                 <input type="text" class="span5 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Konsekuensi (Rp) Inheren :</label>
              <div class="controls">
                <input type="text" class="span3 m-wrap"  disabled="" value="<?php echo $data['konsekuensi']; ?>"/>
               <input type="text" class="span3 m-wrap" disabled="" value="<?php echo $data['rp_dampak']; ?>" /> 
                
                <?php if ($data['rp_dampak'] <= 500000){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($data['rp_dampak'] > 500000 and $data['rp_dampak'] <= 1250000){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($data['rp_dampak'] > 1250000 and $data['rp_dampak'] <= 1750000){ ?>
                  <input type="text" class="span5 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($data['rp_dampak'] > 1750000 and $data['rp_dampak'] <= 2500000){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($data['rp_dampak'] > 2500000) {?>
                 <input type="text" class="span5 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
            </div>
          
          <div class="control-group">
                  <label class="control-label">Level Risiko</label>
                  <div class="controls">
                    <input type="text" id="hasil" value="<?php echo $data['likelihood']*$data['konsekuensi']; ?>"  readonly/>
                  </div>
                </div>


           </div>
        </div>
      </div>
    </div>  


      
    

            <div class="form-actions">
             <button type="submit" name="tambah" value="Validate" class="btn btn-success">Save</button></div></form> 

<?php break;  }  ?>



<?php
      $halaman = 'evaluasi';
      switch($mode){
         default:
?>
<?php
     if (isset($i)=="berhasil"){?>
      <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Success!</h4>
              Data Berhasil Disimpan </div>
     <?php }else if (isset($i)=="gagal"){ ?>
       <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Data Gagal Disimpan </div>
     <?php } else { ?>  <?php }?>
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span10">
        <div class="widget-box">
          
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="?halaman=evaluasi">
              
              <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Pilih risiko </h5>
          </div>
                  
            <?php 
            $option ="";
            $nilai="";
            ?>
                <div class="control-group">
              <label class="control-label">Risiko</label>
              <div class="controls">
              <?php
           $unit="SELECT * from risiko where nrk='$namauser' and YEAR(tgl_identifikasi)='$year'";
            $jalankan=mysql_query($unit) or die(mysql_error());
            
            ?>
                <select name="risk" id="risk" class="span4" >
                <option value="-">-</option>
            <?php while($x=mysql_fetch_array($jalankan)){
             $cek = mysql_num_rows(mysql_query("SELECT * FROM mitigasi WHERE id_risiko='$x[id]'"));
            if($cek == 0){
             $option = $x[6];
             $nilai = $x[0];
                
              echo "<option value='$nilai'>$option</option>";}}?> 
                </select>
              </div>
            </div>
                
                
              <div class="form-actions">
    
                <input id="next" class="btn btn-primary" type="submit" value="Pilih" name="simpan" />
              </div>
            </form>
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
      <th>Likelihood(Inheren)</th>
      <th>Konsekuensi(Inheren)</th>
       <th>Likelihood(Residual)</th>
      <th>Level Risiko(Inheren)</th>
      <th>Konsekuensi(Residual)</th>
      <th>Level Risiko(Residual)</th>
      <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                     
                    $sql = mysql_query("select * from mitigasi where username='$namauser' and YEAR(tgl)='$year'");
                    $no = 1;
              while ($r = mysql_fetch_array($sql)) {
              $id_risk=$r['id_risiko'];
          
            $sql_risiko=mysql_query("select * from risiko WHERE id='$id_risk'");
            $row_risk=mysql_fetch_array($sql_risiko);
             
               $level_risiko_in=$row_risk['likelihood']*$row_risk['konsekuensi'];
               $level_risiko_re=$r['likelihood']*$r['konsekuensi'];
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$r[tgl]</td>
                 <td class='center'><a href=?halaman=detail_risiko&&id=$r[id_risiko]>$row_risk[nama]</a></td>
                  <td class='center'>$row_risk[likelihood]</td>
                  <td class='center'>$row_risk[konsekuensi]</td>
                  <td class='center'>$level_risiko_in</td>";
                   
                  echo "<td class='center'>$r[likelihood]</td>
                        <td class='center'>$r[konsekuensi]</td>
                        <td class='center'>$level_risiko_re</td>
                        <td class='taskOptions'><a href='?halaman=evaluasi&&mode=edit&&id=$r[id_risiko]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=evaluasi&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
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
   
  <div class="container-fluid">

  <h1>Evaluasi Risiko</h1>
</div>

  <form action="?halaman=evaluasi" method="post" class="form-horizontal">

  <div class="row-fluid">
    <div class="span12">
    
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info Risiko</h5>
        </div>
     <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
         
          <div class="widget-content"> 
          <div class="control-group">
              <label class="control-label">Tanggal Risiko:</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $data['tgl_identifikasi']; ?>" disabled="" />
                <input type="hidden" class="span11" name="id_risiko" value="<?php echo $data['id']; ?>" />
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
          
          
           </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          
          <div class="widget-content"> 
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
    </div>
     
     <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Evaluasi</h5>
        </div>   
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          
          <div class="widget-content"> 
          <div class="control-group">
              <label class="control-label">Rencana Perlakuan</label>
              <div class="controls">
                 <textarea name="rencana"><?php echo $data['rencana']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pengendalian Risiko</label>
              <div class="controls">
                 <textarea name="pengendalian" ><?php echo $data['pengendalian']; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pengendalian (Rp)</label>
              <div class="controls">
                <input type="text" name="pengendalian_rp" value="<?php echo $data['rp_pengendalian']; ?>"/>
              </div>
            </div>
            <div class="control-group">
                  <label class="control-label">Likelihood Residual</label>
                  <div class="controls">
                    <input id="val2" type="text" name="persen" style="width:50px;" onkeyup="kurang()" value="<?php echo $data2['persen']; ?>"/>%  <input type="text" id="hasil2" readonly />
                  </div>
                </div>

                 <div class="control-group">
                  <label class="control-label">Konsekuensi Residual</label>
                  <div class="controls">
                   Rp <input name="dampak_rp"  id="val3" onkeyup="kali()" value="<?php echo $data2['dampak_rp']; ?>"/>  <input type="text" id="hasil4" readonly>
                  </div>
                </div>
          
           </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          
          <div class="widget-content"> 
          <div class="control-group">
              <label class="control-label">Likelihood (%) Inheren:</label>
              <div class="controls">
                <input type="text" class="span2 m-wrap" disabled="" value="<?php echo $data['likelihood']; ?>" /> 
                <input type="text" class="span2 m-wrap" disabled="" value="<?php echo $data['persen']; ?>" /> 
              <?php if ($data['persen'] <= 10){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($data['persen'] > 10 and $data['persen'] <= 30){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($data['persen'] > 30 and $data['persen'] <= 50){ ?>
                  <input type="text" class="span5 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($data['persen'] > 50 and $data['persen'] <= 70){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($data['persen'] > 70) {?>
                 <input type="text" class="span5 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Konsekuensi (Rp) Inheren :</label>
              <div class="controls">
                <input type="text" class="span3 m-wrap"  disabled="" value="<?php echo $data['konsekuensi']; ?>"/>
               <input type="text" class="span3 m-wrap" disabled="" value="<?php echo $data['rp_dampak']; ?>" /> 
                
                <?php if ($data['rp_dampak'] <= 500000){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Sangat Rendah"/>
                <?php } if ($data['rp_dampak'] > 500000 and $data['rp_dampak'] <= 1250000){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value=" Rendah"/>
                 <?php } if ($data['rp_dampak'] > 1250000 and $data['rp_dampak'] <= 1750000){ ?>
                  <input type="text" class="span5 m-wrap" disabled="" value="Sedang"/>
                <?php } if ($data['rp_dampak'] > 1750000 and $data['rp_dampak'] <= 2500000){ ?>
                <input type="text" class="span5 m-wrap" disabled="" value="Tinggi"/>
                <?php } else if ($data['rp_dampak'] > 2500000) {?>
                 <input type="text" class="span5 m-wrap" disabled="" value="Sangat Tinggi"/>
                <?php } ?>
              </div>
            </div>
          
          <div class="control-group">
                  <label class="control-label">Level Risiko</label>
                  <div class="controls">
                    <input type="text" id="hasil" value="<?php echo $data['likelihood']*$data['konsekuensi']; ?>"  readonly/>
                  </div>
                </div>


           </div>
        </div>
      </div>
    </div>  


      
    

            <div class="form-actions">
             <button type="submit" name="edit" value="Validate" class="btn btn-success">Save</button></div></form> 
            
<?php break;?>
<?php
         break;
         case "hapus":
     
        mysql_query("delete from mitigasi where id = '$id'");
                    
        header("location: modul.php?halaman=evaluasi&&tahun='$year'");
       
            
      }
   ?>

