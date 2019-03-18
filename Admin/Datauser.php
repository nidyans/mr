<?php if(isset($tambah)) {?>

<?php 
$cek = mysql_num_rows(mysql_query("SELECT * FROM user WHERE user='$user'"));

if(empty($user) OR empty($password) OR empty($nrk) OR empty($nama_pejabat)){
 header("location: modul.php?halaman=datauser&&i=kosong"); 

} else {

if ($cek > 0){
  
header("location: modul.php?halaman=datauser&&i=sama"); 

}else{


$sql_risk_owner=mysql_query("select nama from jabatan WHERE kodejab='$risk_owner'");
$row_risk_owner=mysql_fetch_array($sql_risk_owner);


$sql_sbu=mysql_query("select kelompok from unitkerja WHERE kodeunit='$unitkerja'");
$row_sbu=mysql_fetch_array($sql_sbu);

$sql_risiko=mysql_query("insert into user values('','$nrk','$row_risk_owner[0]',
'$nama_pejabat','$row_sbu[0]','$unitkerja','-','$password','$hakakses','$risk_owner','$user','$rayon')");

$sql_rata=mysql_query("insert into rata_user values('','$row_risk_owner[0]','$user','$row_sbu[0]','$unitkerja',0,0,0,0,0,0,0,0,0)");


if($sql_risiko)
{
  //echo"Data Berhasil Disimpan";
  header("location: modul.php?halaman=datauser&&i=berhasil");
}
else
{
  
    header("location: modul.php?halaman=datauser&&i=gagal");
} } } }

else if(isset($edit)) {

$querynama=mysql_query("select * from user WHERE id='$id'");
$row_nama=mysql_fetch_array($querynama);
$nama2=$row_nama['user'];

$sql_risk=mysql_query("select nama from jabatan WHERE kodejab='$risk_owner'");
$row_risk=mysql_fetch_array($sql_risk);

$sql_s=mysql_query("select * from unitkerja WHERE kodeunit='$unitkerja'");
$row_s=mysql_fetch_array($sql_s);

$edit_user= mysql_query("update user set id='$id',user='$user',password='$password',nrk='$nrk',risk_owner='$row_risk[0]',kodejab='$risk_owner',
    nama_pejabat='$nama_pejabat',kodeunit='$unitkerja',sbu='$row_s[kelompok]',rayon='$rayon' where id='$id'");

 

$edit1 = mysql_query("update risiko set nrk='$user' where nrk='$nama2' ");

$edit2 = mysql_query("update risiko set kodeunit='$unitkerja',sbu='$row_s[kelompok]',rayon='$rayon' where nrk='$user'");

$edit3 = mysql_query("update mitigasi set kodeunit='$unitkerja',sbu='$row_s[kelompok]',rayon='$rayon',user='$user' where user='$nama2'");

$edit4 = mysql_query("update rata_user set user='$user',jabatan='$row_risk[0]',kodeunit='$unitkerja' where user='$nama2' ");

if($edit_user AND $edit1 AND $edit2){

header("location: modul.php?halaman=datauser&&i=berhasil");}
else{
  header("location: modul.php?halaman=datauser&&i=gagal");
}

 }?>
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
<?php } else if($a == "sama") {?>

<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
             Username Tidak Boleh Sama </div>
<?php } else if($a == "kosong"){?>
<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Form Tidak boleh Ada Yang Kosong </div>
<?php } else if($a == "isi"){ ?>

<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Tidak Dapat Di Hapus! User Memiliki Risiko </div>
<?php } else {?>

<?php } ?>
  <h1>Data User</h1>
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
            <h5>User</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>NRK</th>
                  <th>Username</th>
                  <th>Risk Owner</th>
                  <th>Nama Pejabat</th>
                  <th>SBU</th>
                   <th>Unit</th>
                   <th>Rayon</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from user order by id DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                      $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
                      $row_unit=mysql_fetch_array($sql_unit);
                       $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$r[rayon]'");
                      $row_rayon=mysql_fetch_array($sql_rayon);
                       
                       $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$r[sbu]'");
                      $row_sbu=mysql_fetch_array($sql_sbu);
                         
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$r[nrk]</td>
                 <td class='center'>$r[user]</td>
                  <td class='center'>$r[risk_owner]</td>
                  <td class='center'>$r[nama_pejabat]</td>
                   <td class='center'>$row_sbu[nama]</td>
                  <td class='center'>$row_unit[nama]</td>
                  <td class='center'>$row_rayon[nama]</td>
     
                  <td class='taskOptions'><a href='?halaman=datauser&&mode=edit&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=datauser&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                 
                 
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

              <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Data User</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=datauser" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span5" name="user" id="required"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password Standar :</label>
              <div class="controls">
                <input type="text" class="span3" name="password" id="password" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">NRK</label>
              <div class="controls">
                <input type="text"  class="span4" name="nrk"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Risk Owner</label>
              <div class="controls">
              <?php
           $perintah="SELECT * from jabatan";
            $jalankan_perintah=mysql_query($perintah) or die(mysql_error());?>
                <select name="risk_owner" >
                <option value="-">-</option>
            <?php while($x=mysql_fetch_array($jalankan_perintah)){
             $option = $x[2];
             $nilai = $x[1];
              echo "<option value='$nilai'>$option</option>";}?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hak Akses</label>
              <div class="controls">
                <select name="hakakses">
        <option value="ADMIN">ADMIN</option>        
        <option value="RISK_OWNER">Risk Owner</option>
        <option value="KEY_PERSON">Key Person</option>
        <option value="DIREKSI">Direksi</option>
        <option value="SPI">SPI</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Pejabat :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama_pejabat" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Unit Kerja</label>
              <div class="controls">
              <?php
           $unit="SELECT * from unitkerja";
            $jalankan=mysql_query($unit) or die(mysql_error());?>
                <select name="unitkerja" id="unitkerja" >
                <option value="-">-</option>
            <?php while($x=mysql_fetch_array($jalankan)){
             $option = $x[2];
             $nilai = $x[1];
              echo "<option value='$nilai'>$option</option>";}?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Rayon</label>
              <div class="controls">
                <select name="rayon" id="rayon">
                  <option value="-">--Pilih Rayon--</option>
                
                </select>
              </div>
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
            $data = mysql_fetch_array(mysql_query("select * from user where id='$id'"));          
   ?>



 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data User</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=datauser" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span5" name="user" id="required" value="<?php echo $data['user']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password Standar :</label>
              <div class="controls">
                <input type="text" class="span3" name="password" id="password" value="<?php echo $data['password']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">NRK</label>
              <div class="controls">
                <input type="text"  class="span4" name="nrk" value="<?php echo $data['nrk']; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Risk Owner</label>
              <div class="controls">
              <select name="risk_owner">
              <?php  
            $query1=mysql_query("select * from jabatan");
          while($row1=mysql_fetch_array($query1)){
           if ($data['kodejab'] == $row1['kodejab']){
          echo '<option  value="'.$row1['kodejab'].'" selected>'.$row1['nama'].'</option>'; }
           else {
            echo '<option  value="'.$row1['kodejab'].'">'.$row1['nama'].'</option>';   
          }}?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hak Akses</label>
              <div class="controls">
                <select name="hakakses">
        <option <?php if ($hakakses=="RISK_OWNER") {echo "selected"; }?> value="RISK_OWNER">Risk Owner</option>
        <option <?php if ($hakakses=="KEY_PERSON") {echo "selected"; }?> value="KEY_PERSON">Key Person</option>
        <option <?php if ($hakakses=="DIREKSI") {echo "selected"; }?> value="DIREKSI">Direksi</option>
        <option <?php if ($hakakses=="SPI") {echo "selected"; }?> value="SPI">SPI</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Pejabat :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama_pejabat" value="<?php echo $data['nama_pejabat']; ?>"/>
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
            <div class="control-group">
              <label class="control-label">Rayon</label>
              <div class="controls">
                <select name="rayon" id="rayon">
            <?php  
            $query2=mysql_query("select * from rayon");
          while($row2=mysql_fetch_array($query2)){
           if ($data['rayon'] == $row2['kode_rayon']){
          echo '<option  value="'.$row2['kode_rayon'].'" selected>'.$row2['nama'].'</option>'; }
           else {
            echo '<option  value="'.$row2['kode_rayon'].'">'.$row2['nama'].'</option>';   
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
      $dt = mysql_fetch_array(mysql_query("select * from user where id='$id'"));
      $usrnama=$dt['user'];
       
           
    $cek = mysql_num_rows(mysql_query("SELECT * FROM risiko WHERE nrk='$usrnama'"));
    if ($cek > 0){
        $data = "ada";
        
                    
        header("location: modul.php?halaman=datauser&&i=isi");
         break;
    } else{
       $data = "false"; 
      mysql_query("delete from user where id = '$id'");  
     mysql_query("delete from rata_user where user = '$dt[user]'");                    
      header("location: modul.php?halaman=datauser");
       break;
    }  
            
      }
   ?>


                     