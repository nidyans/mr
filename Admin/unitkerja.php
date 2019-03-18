<?php if(isset($tambah)) {?>

<?php 

$sql_unitkerja=mysql_query("insert into unitkerja values('','$kode','$nama','$sbu')");
$sql_rata=mysql_query("insert into rata_rata values('','$kode','$nama','$sbu',0,0,0,0,0,0,0,0,0,0,0)");


if($sql_unitkerja)
{
  //echo"Data Berhasil Disimpan";
  header("location: modul.php?halaman=unitkerja&&i=berhasil");
}
else
{
  
    header("location: modul.php?halaman=unitkerja&&i=gagal");
} } 
if(isset($edit)) {

$dat = mysql_fetch_array(mysql_query("select * from unitkerja where id='$id'")); 
$kodeu= $dat['kodeunit'];
$kel = $dat['kelompok'];

$edit1 = mysql_query("update unitkerja set kodeunit='$kode',nama='$nama',kelompok='$sbu' where id='$id'");

$edit2 = mysql_query("update risiko set sbu='$sbu',kodeunit='$kode' where kodeunit='$kodeu'");

$edit3 = mysql_query("update user set sbu='$sbu',kodeunit='$kode' where kodeunit='$kodeu'");

$edit4 = mysql_query("update rayon set sbu='$sbu',kodeunit='$kode' where kodeunit='$kodeu'");

$edit5 = mysql_query("update mitigasi set sbu='$sbu',kodeunit='$kode' where kodeunit='$kodeu'");

$edit6 = mysql_query("update klb set sbu='$sbu',unit='$kode' where unit='$kodeu'");

$edit7 = mysql_query("update rata_rata set kelompok='$sbu',kodeunit='$kode',nama='$nama' where kodeunit='$kodeu'");



if($edit1 AND $edit2 AND $edit3 AND $edit4 AND $edit5 AND $edit6){

header("location: modul.php?halaman=unitkerja&&i=berhasil");}
else{
  header("location: modul.php?halaman=unitkerja&&i=gagal");
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
              Data Tidak Dapat Dihapus, memiliki data risiko/user didalamnya </div>
     
      <?php }?>
  <?php
      $halaman = 'unitkerja';
      switch($mode){
         default:
?>

  <h1>Data Nama Unit Kerja</h1>
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
            <h5>Data Unit Kerja</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>SBU</th>
                  <th>Unit Kerja</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from unitkerja");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $kel = mysql_fetch_array(mysql_query("select * from sbu where kode_sbu='$r[kelompok]'"));
                     
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$no</td>
                   <td class='center'>$kel[nama]</td>
                 <td class='center'>$r[nama]</td>
               
                  <td class='taskOptions'><a href='?halaman=unitkerja&&mode=edit&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=unitkerja&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                 
                 
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

              <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Data Unit Kerja</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=unitkerja" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
          <div class="control-group">
              <label class="control-label">Kode Unit :</label>
              <div class="controls">
                <input type="text" class="span5" name="kode" id="required"/>
                <span class="help-block blue span8">Tulis 05.Singkatan unit kerja</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Unit Kerja :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required"/>
              </div>
            </div>
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
            $data = mysql_fetch_array(mysql_query("select * from unitkerja where id='$id'")); 

            $data2 = mysql_fetch_array(mysql_query("select * from sbu where id='$data[kelompok]'")); 
            
                     
   ?>
 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Nama Unit Kerja</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=unitkerja" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
              <div class="control-group">
              <label class="control-label">Kode Unit Kerja :</label>
              <div class="controls">
                <input type="text" class="span5" name="kode" id="required" value="<?php echo $data['kodeunit']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Unit Kerja :</label>
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
      $dt = mysql_fetch_array(mysql_query("select * from unitkerja where id='$id'"));
      $kelompok= $dt['kelompok'];
      $kode=$dt['kodeunit'];
          

         $cek = mysql_num_rows(mysql_query("SELECT * FROM risiko WHERE kodeunit='$kode'")); 
         
         $cek2 = mysql_num_rows(mysql_query("SELECT * FROM user WHERE kodeunit='$kode'"));  
           
        if ($cek > 0 AND $cek2 > 0)
        {
           header("location: modul.php?halaman=unitkerja&&i=ada");
         break;
        } else {
            mysql_query("delete from rata_rata where kodeunit ='$dt[kodeunit]'"); 
            mysql_query("delete from unitkerja where id ='$id'"); 

            header("location: modul.php?halaman=unitkerja");
         break;
        }               
            
      }
   ?>



