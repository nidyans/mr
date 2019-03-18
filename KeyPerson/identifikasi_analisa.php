<?php if(isset($simpan)) {

$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user);
$tgl=date('d-m-Y');

//CEK PENGISIAN
$likelihood = 0;
$konsekuensi = 0;
$likelihood2 = 0;
$konsekuensi2 = 0;

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

$sql_risiko =mysql_query("insert into risiko values('','$namauser',now(),
'$data_kategori[1]','$data_faktor[2]','$data_kelompok[2]','$data_nama[2]','$peristiwa','$sebab','$uc_c','$dampak','$dampak_rp',
'$pengendalian','$pengendalian_rp',$likelihood,$persen,$konsekuensi,'-','',now(),'$row_user[kodeunit]','$row_user[sbu]',0,0,0,0,0,'$row_user[rayon]')"); 

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

$sql_risiko =mysql_query("insert into risiko values('','$namauser',now(),
'$data_kategori[1]','$data_faktor[2]','$data_kelompok[2]','$data_nama[2]','$peristiwa','$sebab','$uc_c','$dampak','$dampak_rp',
'$pengendalian','$pengendalian_rp',$likelihood,$persen,$konsekuensi,'-','$namaunik',now(),'$row_user[kodeunit]','$row_user[sbu]',0,0,0,0,0,'$row_user[rayon]')"); 

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

if($sql_risiko)
{ ?>
   <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Success!</h4>
              Data Berhasil Disimpan </div>
<?php } else
{  ?>
  
  <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Data Gagal Disimpan </div>
<?php }


 } ?>

<script src="js/jquery.min.js"></script>
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
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span10">
        <div class="widget-box">
          
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" method="post" enctype="multipart/form-data" action="?halaman=identifikasi_analisa">
              <div id="form-wizard-1" class="step">
              <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Form Identifikasi Risiko </h5>
          </div>
                  <div class="control-group">
                  <label class="control-label">Tanggal Identifikasi</label>
                  <div class="controls">
                    <input type="text" value="<?php echo $tgl=date('d-m-Y');?>" readonly/>
                  </div>
                </div>

                <div class="control-group">
              <label class="control-label">kategori Risiko</label>
              <div class="controls">
              <?php
           $unit="SELECT * from kategori";
            $jalankan=mysql_query($unit) or die(mysql_error());?>
                <select name="kategori" id="kategori" class="span4" >
                <option value="-">-</option>
            <?php while($x=mysql_fetch_array($jalankan)){
             $option = $x[1];
             $nilai = $x[0];
              echo "<option value='$nilai'>$option</option>";}?>
                </select>
              </div>
            </div>
                <div class="control-group">
              <label class="control-label">Faktor Risiko</label>
              <div class="controls">
                <select name="faktor" id="faktor" class="span4">
                  <option value="3">--Pilih Faktor--</option>
                
                </select>
              </div>
            </div>
                <div class="control-group">
              <label class="control-label">Kelompok Risiko</label>
              <div class="controls">
                <select name="kelompok" id="kelompok" class="span4">
                  <option value="-">--Pilih Kelompok--</option>
                
                </select>
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Nama Risiko</label>
              <div class="controls">
                <select name="nama" id="nama" class="span4">
                  <option value="-">--Pilih Nama--</option>
                
                </select>
              </div>
            </div>
            <div class="control-group">
                  <label class="control-label">Peristiwa Risiko</label>
                  <div class="controls">
                    <textarea id="peristiwa" type="text" name="peristiwa" ></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Sebab Risiko</label>
                  <div class="controls">
                    <textarea id="sebab" type="text" name="sebab" ></textarea>
                  </div>
                </div>
                <div class="control-group">
              <label class="control-label">UC/C</label>
              <div class="controls">
                <select name="uc_c" id="uc_c" class="span3">
                  <option value="UC">UC</option>
                   <option value="C">C</option>
                
                </select>
              </div>
            </div>

            <div class="control-group">
                  <label class="control-label">Dampak Risiko</label>
                  <div class="controls">
                    <textarea id="Dampak" type="text" name="dampak" ></textarea>
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
                    <input id="val2" type="text" name="persen" style="width:50px;" onkeyup="kurang()" />%  <input type="text" id="hasil2" readonly />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Konsekuensi Inheren</label>
                  <div class="controls">
                   Rp <input name="dampak_rp"  id="val1" onkeyup="tambah()" />    <input type="text" id="hasil" readonly>
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
                    <textarea type="text" name="rencana" id="rencana"></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pengendalian</label>
                  <div class="controls">
                    <input type="text" name="pengendalian" id="pengendalian"/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pengendalian(Rp)</label>
                  <div class="controls">
                    <input type="text" name="pengendalian_rp" id="pengendalian_rp"/>
                  </div>
                </div>


                <div class="control-group">
                  <label class="control-label">Likelihood Residual</label>
                  <div class="controls">
                    <input id="val4" type="text" name="persen2" style="width:50px;" onkeyup="bagi()" />%  <input type="text" id="hasil3" readonly />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Konsekuensi Residual</label>
                  <div class="controls">
                   Rp <input name="dampak_rp2"  id="val3" onkeyup="kali()"/>  <input type="text" id="hasil4" readonly>
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
