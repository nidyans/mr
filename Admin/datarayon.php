<?php if(isset($tambah)) {?>

<?php 

$sql_sbu=mysql_query("insert into rayon values('','$sbu','$kode_unit','$kode','$nama')");


if($sql_sbu)
{
  //echo"Data Berhasil Disimpan";
  header("location: modul.php?halaman=rayon&&i=berhasil");
}
else
{
  
    header("location: modul.php?halaman=rayon&&i=gagal");
} } 
if(isset($edit)) {

$dat = mysql_fetch_array(mysql_query("select * from rayon where id='$id'")); 
$kode_lm= $dat['kode_rayon'];



$edit1 = mysql_query("update rayon set kelompok='$sbu',kodeunit='$unitkerja',kode_rayon='$kode',nama='$nama' where id='$id'");

$edit2 = mysql_query("update risiko set rayon='$kode' where rayon='$kode_lm'");

$edit2 = mysql_query("update user set rayon='$kode' where rayon='$kode_lm'");




if($edit1 AND $edit2 ){

header("location: modul.php?halaman=rayon&&i=berhasil");}
else{
  header("location: modul.php?halaman=rayon&&i=gagal");
}

 }?>

 <?php
     if (isset($i)=="berhasil"){?>
      <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Success!</h4>
              Data Berhasil Disimpan </div>
     <?php }else if (isset($i)=="gagal"){ ?>
       <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Data Gagal Disimpan </div>
     <?php } else if(isset($i)=="ada") { ?> 
       <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Data Tidak Dapat Dihapus, memiliki risiko </div>
     
      <?php }?>
  <?php
      $halaman = 'data_sbu';
      switch($mode){
         default:
?>

  <h1>Data Nama Rayon</h1>
</div>

<div class="container-fluid">

<div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Lihat Data</a></li>
              <li><a data-toggle="tab" href="#tab2">Form Data</a></li>
            </ul>
          </div>
  <div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Rayon</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>SBU</th>
                  <th>Unit Kerja</th>
                  <th>Nama Rayon</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from rayon");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    
                    $kel = mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$r[kelompok]'")); 
                       
                    $uk = mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$r[kodeunit]'"));
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$no</td>
                   <td class='center'>$kel[nama]</td>
                 <td class='center'>$uk[nama]</td>
                  <td class='center'>$r[nama]</td>               
                  <td class='taskOptions'><a href='?halaman=rayon&&mode=edit&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=rayon&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                 
                 
                            </tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
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
  $("#sbu").change(function(){
    var sbu = $("#sbu").val();
    $.ajax({
        url: "ambilunit.php",
        data: "sbu="+sbu,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kode_unit").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
});

</script>

              <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Data Rayon</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=rayon" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
          <div class="control-group">
              <label class="control-label">SBU</label>
              <div class="span4">
              <?php
           $unit="SELECT * from sbu";
            $jalankan=mysql_query($unit) or die(mysql_error());?>
                <select name="sbu" id="sbu" >
                <option value="-">-</option>
            <?php while($x=mysql_fetch_array($jalankan)){
             $option = $x[2];
             $nilai = $x[1];
              echo "<option value='$nilai'>$option</option>";}?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Unit Kerja</label>
              <div class="span4">
                <select name="kode_unit" id="kode_unit">
                  <option value="-">--Pilih Unit Kerja--</option>
                
                </select>
              </div></div>

               <div class="control-group">
              <label class="control-label">Kode Rayon :</label>
              <div class="controls">
                <input type="text" class="span5" name="kode" id="required" />
               
              </div>
               
              <div class="control-group">
              <label class="control-label">Nama Rayon :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required" />
               
              </div>
            
            <div class="form-actions">
              <button type="submit" name="tambah" value="Validate" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
         
       
            </div>
</div> 
<?php
         break;
         case "edit":
            $data = mysql_fetch_array(mysql_query("select * from rayon where id='$id'")); 
            $kel = mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$data[kelompok]'"));
            $unit = mysql_fetch_array(mysql_query("select * from unitkerja where kodeunit='$data[kodeunit]'")); 

         
            
                     
   ?>
 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Rayon</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=rayon" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
              <div class="control-group">
              <label class="control-label">Kode Rayon :</label>
              <div class="controls">
                <input type="text" class="span5" name="kode" id="required" value="<?php echo $data['kode_rayon']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Rayon :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required" value="<?php echo $data['nama']; ?>"/>   
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">SBU</label>
              <div class="controls">
              <select name="sbu">
              <?php  
            $query1=mysql_query("select * from sbu");
          while($row1=mysql_fetch_array($query1)){
           if ($data['kelompok'] == $row1['kode_sbu']){
          echo '<option  value="'.$row1['kode_sbu'].'" selected>'.$row1['nama'].'</option>'; }
           else {
            echo '<option  value="'.$row1['kode_sbu'].'">'.$row1['nama'].'</option>';   
          }}?>
                </select>
              </div>
            </div>

            
            <div class="control-group">
              <label class="control-label">Unit Kerja</label>
              <div class="controls">
              <select name="unitkerja">
              <?php  
            $query3=mysql_query("select * from unitkerja");
          while($row3=mysql_fetch_array($query3)){
           if ($data['kodeunit'] == $row3['kodeunit']){
          echo '<option  value="'.$row3['kodeunit'].'" selected>'.$row3['nama'].'</option>'; }
           else {
            echo '<option  value="'.$row3['kodeunit'].'">'.$row3['nama'].'</option>';   
          }}?>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="edit" value="Validate" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
         
       
            </div>

<?php
         break;
         case "hapus":
      $dt = mysql_fetch_array(mysql_query("select * from rayon where id='$id'"));
      $kode_rayon= $dt['kode_rayon'];
    
          

         $cek = mysql_num_rows(mysql_query("SELECT * FROM risiko WHERE rayon='$kode_rayon'"));      
           
        if ($cek > 0)
        {
           header("location: modul.php?halaman=rayon&&i=ada");
         break;
        } else {
            mysql_query("delete from rayon where id ='$id'"); 
            header("location: modul.php?halaman=rayon");
         break;
        }               
            
      }
   ?>



