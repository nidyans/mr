<?php session_start(); ?> 

<?php if(empty($namauser) AND empty($passuser)) 
{ ?>
<?php header("location:../error.php"); ?>
<?php session_destroy();
} else { 
  include "headerAdmin.php"; ?>
<?php  include "menuAdmin.php"; ?>
<?php  include"koneksi.php"; ?>
?>
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
<?
$query=mysqli_fetch_array(mysqli_query($conn,"select * from user where id=$id"));
$user= $query['user'];
$password = $query['password'];
$nrk = $query['nrk'];
$risk_owner= $query['risk_owner'];
$nama_pejabat = $query['nama_pejabat'];
$kode_unit = $query['kodeunit'];
$rayon = $query['rayon'];
?>

<div id="content">

<div id="content-header">

  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Data User</a> </div>
  <h1>Edit Data User</h1>
</div>

<div class="container-fluid">


  <div class="widget-content tab-content">
  
  <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data User</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="simpan_user.php" method="get" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
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
                  <option>--Pilih Rayon--</option>
                
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" value="Validate" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
         
       
            </div>
</div> 
    
                         
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part--> 

<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>

<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
<?php } ?>