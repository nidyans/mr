<?php 
if(isset($edit)) {

$edit_klb = mysql_query("update sasaran set sasaran='$sasaran' where id_sasaran='$id'");



if($edit_klb){

header ("location: modul.php?halaman=sasaran_monitoring&&i=berhasil");
}
else{
  header ("location: modul.php?halaman=sasaran_monitoring&&i=gagal");
}

 }?>

<?php if (isset($tahun)) { ?>
<?php
      $halaman = 'datauser';
      switch($mode){
         default:
?>

<?php 
$a = $i;
if ($a == "berhasil"){?>
<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Success!</h4>
              Data Berhasil Disimpan </div>
<?php } else if ($a == "gagal") {?>
              <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Data Gagal Disimpan </div>
<?php } ?>
  <h1>Data Laporan Sasaran</h1>
</div>


  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>User</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>Tanggal</th>
                  <th>Sasaran1</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from sasaran2 where nrk='$namauser' and YEAR(tahun_sasaran)='$tahun' order by id DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                      echo "<tr tr class='gradeX'>
                       <td class='center'>$r[tahun_sasaran]</td> 
                       <td class='center'><a href='?halaman=detail_sasaran&&id=$r[id_sasaran]&&tahun=$tahun'>$r[sasaran]<a></td>  
                         
                    ";
                  
		         
                  echo "
                  <td class='taskOptions'><a href='?halaman=sasaran_monitoring&&mode=edit&&id=$r[id]&&tahun=$tahun' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=sasaran_monitoring&&mode=hapus&&id=$r[id]&&tahun=$tahun' ";?> onclick='return confirm("Yakin menghapus data ?")' <?php echo " data-original-title='Delete' class='delete'><i class='icon-remove'></i></a></td>
                 
                 
                            </tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
<div id="dialog" title="Konfirmasi" style="display:none;">
  <p>Anda yakin ingin menghapus data tersebut?</p>
</div>    
          </div>
        </div>
    </div>
 
<div class="span6">
      
      </div>
      </div></div>
<div id="tab2" class="tab-pane">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#unitkerja").change(function(){
    var unitkerja = $("#unitkerja").val();
    $.ajax({
        url: "ambilrayon.php",
        data: "unitkerja="+unitkerja,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#rayon").html(msg);
        }
    });
  });
  $("#kode_unit").change(function(){
    var kode_unit = $("#kode_unit").val();
    $.ajax({
        url: "ambiljabatan.php",
        data: "kode_unit="+kode_unit,
        cache: false,
        success: function(msg){
            $("#jabatan").html(msg);
        }
    });
  });
});
</script>

              
      </div>
         
  
            </div>
</div> 
    
 <?php
         break;
         case "edit":
            $data = mysql_fetch_array(mysql_query("select * from sasaran2 where id_sasaran='$id'"));          
   ?>



 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Laporan Sasaran</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=sasaran_monitoring" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">

            <div class="control-group">
              <label class="control-label">Tanggal Sasaran :</label>
              <div class="controls">
                <input type="text" data-date-format="yyyy-mm-dd" name="tahun_sasaran" value="<?php echo $data['tahun_sasaran'] ?>" class="tanggal" readonly>
                <span class="help-block"></span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sasaran 1 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran1" id="required"><?php echo $data['sasaran1']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran 2 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran2" id="required"><?php echo $data['sasaran2']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran 3 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran3" id="required"><?php echo $data['sasaran3']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran 4 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran4" id="required"><?php echo $data['sasaran4']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran5 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran5" id="required"><?php echo $data['sasaran5']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>

             
            <div class="form-actions">
              <button type="submit" name="edit" value="Validate" class="btn btn-success">Save</button>
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

<?php
         break;
         case "hapus":
      
      $qr=mysql_query("select * FROM sasaran2 WHERE id_sasaran='$id'");
      $q=mysql_fetch_array($qr);
      $tempat_foto = '../filescan/'.$q['nama_file'];
      unlink("$tempat_foto");
      mysql_query("delete from sasaran2 where id_sasaran = '$id'");  
     
                  
      header("location: modul.php?halaman=sasaran_monitoring&&tahun=$tahun");
       }
    
   ?>
<?php } else {?>
<h1>Rekap Laporan Sasaran</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=sasaran_monitoring" method="post">
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
                     