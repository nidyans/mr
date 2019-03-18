<?php 
if(isset($edit)) {

$edit_klb = mysql_query("update klb set kejadian='$kejadian',tgl_kejadian='$tgl_kejadian',tindakan='$tindakan',tindakan_rp='$tindakan_rp',akibat='$akibat',akibat_rp='$akibat_rp',langkah_action='$langkah',action_rp='$action_rp' where id='$id'");



if($edit_klb){

header ("location: modul.php?halaman=kejadian_risiko&&i=berhasil");
}
else{
  header ("location: modul.php?halaman=kejadian_risiko&&i=gagal");
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
  <h1>Data Laporan Kejadian Risiko</h1>
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
                <th>Tanggal Dilaporkan</th>
                  <th>Kejadian</th>
                  <th>Tanggal Kejadian</th>
                  <th>Status</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from klb where user='$namauser' and YEAR(tgl_laporan)='$tahun' order by id DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                      echo "<tr tr class='gradeX'>
                       <td class='center'>$r[tgl_laporan]</td> 
                       <td class='center'><a href='?halaman=detail_kejadian_risiko&&id=$r[id]&&tahun=$tahun'>$r[kejadian]<a></td>  
                         
                    <td class='center'>$r[tgl_kejadian]</td>";
                 if ($r[status]=="0"){   
	            echo "<td align='center'>-</td>"; } 
		        else if ($r[status]=="1"){
				echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
				}else{
				echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
			    };
                  echo "
                  <td class='taskOptions'><a href='?halaman=kejadian_risiko&&mode=edit&&id=$r[id]&&tahun=$tahun' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=kejadian_risiko&&mode=hapus&&id=$r[id]&&tahun=$tahun' data-original-title='Delete' class='delete'><i class='icon-remove'></i></a></td>
                 
                 
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
            $data = mysql_fetch_array(mysql_query("select * from klb where id='$id'"));          
   ?>



 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Laporan Kejadian</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=kejadian_risiko" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">Kejadian :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="kejadian" id="required"><?php echo $data['kejadian']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Kejadian :</label>
              <div class="controls">
                <input type="text" data-date-format="yyyy-mm-dd" name="tgl_kejadian" value="<?php echo $data['tgl_kejadian']; ?>" class="tanggal" id="tanggal">
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tindakan :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="tindakan" id="required"><?php echo $data['tindakan']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Biaya Tidakan :</label>
              <div class="controls">
                Rp <input type="text"  class="span2" name="tindakan_rp" value="<?php echo $data['tindakan_rp'];?>"  />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Akibat Yang Ditimbulkan :</label>
              <div class="controls">
                <textarea type="text"  class="span4" name="akibat"  ><?php echo $data['akibat']; ?></textarea>
              </div>
            </div>
             
             <div class="control-group">
              <label class="control-label">Biaya Akibat :</label>
              <div class="controls">
                Rp <input type="text"  class="span2" name="akibat_rp" value="<?php echo $data['akibat_rp']; ?>"/>
              </div>
            </div>

           <div class="control-group">
              <label class="control-label">Langkah/Action di Masa Depan :</label>
              <div class="controls">
                <textarea type="text"  class="span4" name="langkah"  ><?php echo $data['langkah_action']; ?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Biaya Action Plan :</label>
              <div class="controls">
                Rp<input type="text"  class="span2" name="action_rp" value="<?php echo $data['action_rp']; ?>" />
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
      
      $qr=mysql_query("select * FROM klb WHERE id='$id'");
      $q=mysql_fetch_array($qr);
      $tempat_foto = '../filescan/'.$q['nama_file'];
      unlink("$tempat_foto");
      mysql_query("delete from klb where id = '$id'");  
     
                  
      header("location: modul.php?halaman=kejadian_risiko&&tahun=$tahun");
       }
    
   ?>
<?php } else {?>
<h1>Rekap Laporan Kejadian Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=kejadian_risiko" method="post">
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
                     