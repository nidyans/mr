<?php $year=date('Y');
     $tgl=date('Y-m-d');
 ?>
<?php if(isset($simpan)) {

$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user);

$sql_like = mysql_query("select * from likekon WHERE id='1'");
$row_like = mysql_fetch_array($sql_like);

$sql_kon = mysql_query("select * from likekon WHERE id='2'");
$row_kons = mysql_fetch_array($sql_kon);
               
$tgl=date('d-m-Y');

//CEK PENGISIAN
$likelihood = 0;
$konsekuensi = 0;
$likelihood2 = 0;
$konsekuensi2 = 0;

$sql_risiko="";
$sql_mitigasi="";

if ($persen <= $row_like['sangat_rendah']){
  $likelihood = 1;
}else if($persen >$row_like['sangat_rendah'] && $persen <= $row_like['rendah']){
  $likelihood = 2;
}else if ($persen >$row_like['rendah'] && $persen <=$row_like['sedang'] ){
  $likelihood = 3;
}else if ($persen >$row_like['sedang'] && $persen <= $row_like['tinggi']){
  $likelihood =4;
}else {
  $likelihood = 5;
}

if ($persen2 <= $row_like['sangat_rendah']){
  $likelihood2 = 1;
}else if($persen2 >$row_like['sangat_rendah'] && $persen2 <=$row_like['rendah']){
  $likelihood2 = 2;
}else if ($persen2 >$row_like['rendah'] && $persen2 <= $row_like['sedang'] ){
  $likelihood2 = 3;
}else if ($persen2 >$row_like['sedang'] && $persen2 <= $row_like['tinggi']){
  $likelihood2 =4;
}else {
  $likelihood2 = 5;
}


if ($dampak_rp <= $row_kons['sangat_rendah'] ){
  $konsekuensi = 1;
}else if ($dampak_rp >  $row_kons['sangat_rendah'] && $dampak_rp <= $row_kons['rendah']){
  $konsekuensi = 2;
}else if ($dampak_rp >$row_kons['rendah'] && $dampak_rp <= $row_kons['sedang']){
  $konsekuensi = 3;
} else if ($dampak_rp > $row_kons['sedang'] && $dampak_rp <= $row_kons['tinggi']){
  $konsekuensi = 4;
}else {
  $konsekuensi = 5;
}

if ($dampak_rp2 <= $row_kons['sangat_rendah'] ){
  $konsekuensi2 = 1;
}else if ($dampak_rp2 > $row_kons['sangat_rendah']&& $dampak_rp2 <= $row_kons['rendah']){
  $konsekuensi2 = 2;
}else if ($dampak_rp2 > $row_kons['rendah'] && $dampak_rp2 <= $row_kons['sedang']){
  $konsekuensi2 = 3;
} else if ($dampak_rp2 > $row_kons['sedang'] && $dampak_rp2 <= $row_kons['tinggi']){
  $konsekuensi2 = 4;
}else {
  $konsekuensi2 = 5;
}

//UPLOAD FILE PENDUKUNG
//Mengupload FILE 1
$lokasi_file01 = $_FILES['file01']['tmp_name'];

if (empty($lokasi_file01 )){
$peristiwa_input=nl2br(strip_tags($peristiwa));
$sebab_input=nl2br(strip_tags($sebab));
$dampak_input=nl2br(strip_tags($dampak));
$pengendalian_input=nl2br(strip_tags($pengendalian));
$rencana_input=nl2br(strip_tags($rencana));

$data_kategori = mysql_fetch_array(mysql_query("select * from kategori where id='$kategori'"));
$data_faktor = mysql_fetch_array(mysql_query("select * from faktor where id='$faktor'"));
$data_kelompok = mysql_fetch_array(mysql_query("select * from kelompok where id='$kelompok'"));
$data_nama = mysql_fetch_array(mysql_query("select * from nama where id='$nama'"));

$sql_risiko =mysql_query("insert into risiko values('','$namauser','$tanggal',
'$kategori','$faktor','$kelompok','$nama','$peristiwa','$sebab','$uc_c','$dampak','$dampak_rp',
'$pengendalian','$pengendalian_rp',$likelihood,$persen,$konsekuensi,'$rencana','',now(),'$row_user[kodeunit]','$row_user[sbu]',0,0,0,0,0,'$row_user[rayon]')"); 

$data = mysql_fetch_array(mysql_query("select * from risiko where id IN (SELECT MAX(id) from risiko)"));

$sql_mitigasi =mysql_query("insert into mitigasi values('','$data[id]',now(),
'$namauser','$likelihood2','$persen2','$konsekuensi2','$dampak_rp2','$row_user[sbu]','$row_user[kodeunit]','$row_user[rayon]')");
}
else {
$ukuran_file01 = $_FILES['file01']['size'];
$nama_file01 = $_FILES['file01']['name'];

$nama_file_baru01=ereg_replace(" ","_",$nama_file01);
//Nama File  Yang Unik File 01
$acak01 = rand(0000,9999);
$namaunik = $acak01."_".$nama_file01;
//Nama Direktori 1 dan 2

$direktori01 = "../filescan/$namaunik";
$upload01=move_uploaded_file($lokasi_file01,"$direktori01");



//SIMPAN KE TABEL RISIKO
$peristiwa_input=nl2br(strip_tags($peristiwa));
$sebab_input=nl2br(strip_tags($sebab));
$dampak_input=nl2br(strip_tags($dampak));
$pengendalian_input=nl2br(strip_tags($pengendalian));
$rencana_input=nl2br(strip_tags($rencana));

$data_kategori = mysql_fetch_array(mysql_query("select * from kategori where id='$kategori'"));
$data_faktor = mysql_fetch_array(mysql_query("select * from faktor where id='$faktor'"));
$data_kelompok = mysql_fetch_array(mysql_query("select * from kelompok where id='$kelompok'"));
$data_nama = mysql_fetch_array(mysql_query("select * from nama where id='$nama'"));

$sql_risiko =mysql_query("insert into risiko values('','$namauser','$tanggal',
'$kategori','$faktor','$kelompok','$nama','$peristiwa','$sebab','$uc_c','$dampak','$dampak_rp',
'$pengendalian','$pengendalian_rp',$likelihood,$persen,$konsekuensi,'$rencana','$namaunik',now(),'$row_user[kodeunit]','$row_user[sbu]',0,0,0,0,0,'$row_user[rayon]')"); 

$data = mysql_fetch_array(mysql_query("select * from risiko where id IN (SELECT MAX(id) from risiko)"));

$sql_mitigasi =mysql_query("insert into mitigasi values('','$data[id]',now(),
'$namauser','$likelihood2','$persen2','$konsekuensi2','$dampak_rp2','$row_user[sbu]','$row_user[kodeunit]','$row_user[rayon]')"); 

}


if($kode=='1')
{
  $sql_id_kelompok=mysql_query("select id from kelompok where kelompok_risiko='$kelompok'");
  $row_id_kelompok=mysql_fetch_array($sql_id_kelompok);
    $sql_risiko_baru=mysql_query("insert into nama values('','$row_id_kelompok[0]','$nama')"); 
    
     
}

if($sql_risiko and $sql_mitigasi)
{ 
   header("location: modul.php?halaman=identifikasi_analisa&&i=berhasil");
 }
 else
{  
  header("location: modul.php?halaman=identifikasi_analisa&&i=gagal");
  
} }?>


<?php if (isset($tahun)) {?>


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

        

            $sql_mit=mysql_query("select * from mitigasi WHERE id_risiko='$r[id]'");
            $row_mit=mysql_fetch_array($sql_mit);
           
             $nilai_lh1=$row_mit["likelihood"];
               $nilai_ks1=$row_mit["konsekuensi"];
               $level_risiko_mi=$nilai_lh1*$nilai_ks1;


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
                 <td class='center'><a href='?halaman=pilih_risiko&&id=$r[id]'>$r[nama]</a></td>
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

                  echo "<td class='center'>$row_mit[likelihood]</td>
                  <td class='center'>$row_mit[konsekuensi]</td>";
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
                        <td class='center'>$nlirt</td>";
               

                  echo "</tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
          </div>
        </div>

   <?php } else if(isset($id)) {
      
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
 <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#kategori").change(function(){
    var kategori = $("#kategori").val();
    $.ajax({
        url: "ambilfaktor.php",
        data: "kategori="+kategori,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#faktor").html(msg);
        }
    });
  });
  $("#faktor").change(function(){
    var faktor = $("#faktor").val();
    $.ajax({
        url: "ambilkelompok.php",
        data: "faktor="+faktor,
        cache: false,
        success: function(msg){
            $("#kelompok").html(msg);
        }
    });
  });
  $("#kelompok").change(function(){
    var kelompok = $("#kelompok").val();
    $.ajax({
        url: "ambilnama.php",
        data: "kelompok="+kelompok,
        cache: false,
        success: function(msg){
            $("#nama").html(msg);
        }
    });
  });
});
</script>
<div class="row-fluid">
                
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span10">
        <div class="widget-box">
          
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" method="post" enctype="multipart/form-data" action="?halaman=pilih_risiko">
              <div id="form-wizard-1" class="step">
              <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Form Identifikasi Risiko </h5>
          </div>
                  <div class="control-group">
              <label class="control-label">Tanggal Identifikasi :</label>
              <div class="controls">
                <input type="text"  name="tanggal" class="tanggal" id="tanggal">
                <span class="help-block"></span> </div>
            </div>

                <div class="control-group">
              <label class="control-label">kategori Risiko</label>
              <div class="controls">
              <input type="text"  name="kategori" value="<?php echo $data['kategori']; ?>" readonly />
              </div>
            </div>
                <div class="control-group">
                
              <label class="control-label">Faktor Risiko</label>
              <div class="controls">
              <input type="text"  name="faktor" value="<?php echo $data['faktor']; ?>" readonly />
              </div>
            </div>
                <div class="control-group">
              <label class="control-label">Kelompok Risiko</label>
              <div class="controls">
              <input type="text"  name="kelompok" value="<?php echo $data['kelompok']; ?>" readonly />
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Nama Risiko</label>
              <div class="controls">
              <input type="text"  name="nama" value="<?php echo $data['nama']; ?>" readonly />
              </div>
            </div>
            <div class="control-group">
                  <label class="control-label">Peristiwa Risiko</label>
                  <div class="controls">
                    <textarea id="peristiwa" type="text" name="peristiwa" ><?php echo $data['peristiwa'] ?></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Sebab Risiko</label>
                  <div class="controls">
                    <textarea id="sebab" type="text" name="sebab" ><?php echo $data['sebab'] ?></textarea>
                  </div>
                </div>
                <div class="control-group">
              <label class="control-label">UC/C</label>
              <div class="controls">
                <select name="uc_c" id="uc_c" class="span3">
                  <option <?php if ($data['uc_c']=="UC") {echo "selected"; }?> value="UC">UC</option>
        <option <?php if ($data['uc_c']=="C") {echo "selected"; }?> value="C">C</option>
         <option <?php if ($data['uc_c']=="UC") {echo "selected"; }?> value="UC">UC</option>
                
                </select>
              </div>
            </div>

            <div class="control-group">
                  <label class="control-label">Dampak Risiko</label>
                  <div class="controls">
                    <textarea id="Dampak" type="text" name="dampak" ><?php echo $data['dampak'] ?></textarea>
                  </div>
                </div>
             
             <div class="control-group">
              <label class="control-label">File upload </label>
              <div class="controls">
                <input type="file"  name="file01" id="file01" />
              </div>
            </div>
            </div>
                <div id="form-wizard-2" class="step">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Form Analisa Risiko </h5>
          </div>
                <div class="control-group">
                  <label class="control-label">Likelihood Inheren</label>
                  <div class="controls">
                    <input id="val2" type="text" name="persen" style="width:50px;" onkeyup="kurang()" value="<?php echo $data['persen']; ?>" />%  <input type="text" id="hasil2" readonly />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Konsekuensi Inheren</label>
                  <div class="controls">
                   Rp <input name="dampak_rp"  id="val1" onkeyup="tambah()" value="<?php echo $data['rp_dampak'] ?>"/>    <input type="text" id="hasil" readonly>
                  </div>
                </div>
                

                </div>
                 <div id="form-wizard-3" class="step">
                  
                 <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Form Evaluasi Risiko </h5>
          </div>
                 <div class="control-group">
                  <label class="control-label">Rencana Perlakuan</label>
                  <div class="controls">
                    <textarea type="text" name="rencana" id="rencana"><?php echo $data['rencana']; ?></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pengendalian</label>
                  <div class="controls">
                    <input type="text" name="pengendalian" id="pengendalian" value="<?php echo $data['pengendalian']; ?>"/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pengendalian(Rp)</label>
                  <div class="controls">
                    <input type="text" name="pengendalian_rp" id="pengendalian_rp" value="<?php echo $data['rp_pengendalian'] ?>"/>
                  </div>
                </div>


                <div class="control-group">
                  <label class="control-label">Likelihood Residual</label>
                  <div class="controls">
                    <input id="val4" type="text" name="persen2" style="width:50px;" onkeyup="bagi()" value="<?php echo $data2['persen']; ?>"/>%  <input type="text" id="hasil3" readonly />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Konsekuensi Residual</label>
                  <div class="controls">
                   Rp <input name="dampak_rp2"  id="val3" onkeyup="kali()" value="<?php echo $data2['dampak_rp'] ?>"/>  <input type="text" id="hasil4" readonly>
                  </div>
                </div>
          

                  </div>
              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn btn-primary" type="submit" value="Next" name="simpan" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>

<script type="text/javascript">
    $(function() {
        $( "#tanggal" ).datepicker();
       $( "#tanggal" ).change(function() {
             $( "#tanggal" ).datepicker( "option", "dateFormat","yyyy-mm-dd" );
         });
       });
</script>
           
<?php } else { ?>

<h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=pilih_risiko" method="post">
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


