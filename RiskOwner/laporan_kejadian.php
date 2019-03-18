<?php if(isset($tambah)) {
  $year=date('Y');
$user = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));
$lokasi_file01 = $_FILES['file01']['tmp_name'];

if (empty($lokasi_file01 )){


$sql_klb =mysql_query("insert into klb values('','$namauser','$user[sbu]',
'$user[kodeunit]','$user[rayon]','$kejadian','$tgl_kejadian',now(),'$tindakan','$tindakan_rp','$akibat','$akibat_rp',
'$langkah','$action_rp',0,0,'-','-','-')"); 

if($sql_klb){
  header("location: modul.php?halaman=kejadian_risiko&&i=berhasil&&tahun=$year");

}else{
   header("location: modul.php?halaman=kejadian_risiko&&i=gagal&&tahun=$year");

}

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
$sql_klb =mysql_query("insert into klb values('','$namauser','$user[sbu]',
'$user[kodeunit]','$user[rayon]','$kejadian','$tgl_kejadian',now(),'$tindakan','$tindakan_rp','$akibat','$akibat_rp',
'$langkah','$action_rp',0,0,'-','-','$namaunik')"); 

if($sql_klb){
  header("location: modul.php?halaman=kejadian_risiko&&i=berhasil&&tahun=$year");

}else{
   header("location: modul.php?halaman=kejadian_risiko&&i=gagal&&tahun=$year");

}

}



}
?>
<div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Laporan Kejadian</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=laporan_kejadian" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">Kejadian :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="kejadian" id="required"></textarea>
                
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Kejadian :</label>
              <div class="controls">
                <input type="text" data-date-format="yyyy-mm-dd" name="tgl_kejadian"  class="tanggal" id="tanggal">
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tindakan :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="tindakan" id="required"></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Biaya Tidakan :</label>
              <div class="controls">
                Rp <input type="text"  class="span2" name="tindakan_rp"  />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Akibat Yang Ditimbulkan :</label>
              <div class="controls">
                <textarea type="text"  class="span4" name="akibat"  ></textarea>
              </div>
            </div>
             
             <div class="control-group">
              <label class="control-label">Biaya Akibat :</label>
              <div class="controls">
                Rp <input type="text"  class="span2" name="akibat_rp" />
              </div>
            </div>

           <div class="control-group">
              <label class="control-label">Langkah/Action di Masa Depan :</label>
              <div class="controls">
                <textarea type="text"  class="span4" name="langkah"  ></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Biaya Action Plan :</label>
              <div class="controls">
                Rp<input type="text"  class="span2" name="action_rp"  />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">File upload </label>
              <div class="controls">
                <input type="file"  name="file01" id="file01" />
              </div>
            </div>
            </div>
             
            <div class="form-actions">
              <button type="submit" name="tambah" value="Validate" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
         
       
            </div>

            <script type="text/javascript">
    $(function() {
        $( "#tanggal" ).datepicker();
       $( "#tanggal" ).change(function() {
             $( "#tanggal" ).datepicker( "option", "dateFormat","yyyy-mm-dd" );
         });
       });
</script>