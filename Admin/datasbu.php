<?php if(isset($tambah)) {?>

<?php 

$sql_sbu=mysql_query("insert into sbu values('','$kode_sbu','$nama')");


if($sql_sbu)
{
  //echo"Data Berhasil Disimpan";
  header("location: modul.php?halaman=data_sbu&&i=berhasil");
}
else
{
  
    header("location: modul.php?halaman=data_sbu&&i=gagal");
} } 
if(isset($edit)) {

$dat = mysql_fetch_array(mysql_query("select * from sbu where id='$id'")); 
$kode_lm= $dat['kode_sbu'];


$edit1 = mysql_query("update sbu set kode_sbu='$kode',nama='$nama' where id='$id'");

$edit2 = mysql_query("update risiko set sbu='$kode' where sbu='$kode_lm'");



if($edit1 AND $edit2 AND $edit3 AND $edit4 AND $edit5 AND $edit6){

header("location: modul.php?halaman=data_sbu&&i=berhasil");}
else{
  header("location: modul.php?halaman=data_sbu&&i=gagal");
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
              Data Tidak Dapat Dihapus, memiliki data risiko/User </div>
     
      <?php }?>
  <?php
      $halaman = 'data_sbu';
      switch($mode){
         default:
?>

  <h1>Data Nama SBU</h1>
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
            <h5>Data SBU</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>kode SBU</th>
                  <th>Nama</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from sbu");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                     
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$no</td>
                   <td class='center'>$r[kode_sbu]</td>
                 <td class='center'>$r[nama]</td>
               
                  <td class='taskOptions'><a href='?halaman=data_sbu&&mode=edit&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=data_sbu&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                 
                 
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
          <h5>Input Data SBU</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=data_sbu" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
          <div class="control-group">
              <label class="control-label">Kode SBU :</label>
              <div class="controls">
                <input type="text" class="span5" name="kode_sbu" id="required"/>
                <span class="help-block blue span8">Tulis Kode SBU</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama SBU :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required"/>
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
            $data = mysql_fetch_array(mysql_query("select * from sbu where id='$id'")); 

         
            
                     
   ?>
 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data SBU</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=data_sbu" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
              <div class="control-group">
              <label class="control-label">Kode SBU :</label>
              <div class="controls">
                <input type="text" class="span5" name="kode" id="required" value="<?php echo $data['kode_sbu']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Nama SBU :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required" value="<?php echo $data['nama']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
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
      $dt = mysql_fetch_array(mysql_query("select * from sbu where id='$id'"));
      $kodesbu= $dt['kode_sbu'];
    
          

         $cek = mysql_num_rows(mysql_query("SELECT * FROM risiko WHERE sbu='$kodesbu'"));  
          $cek2 = mysql_num_rows(mysql_query("SELECT * FROM user WHERE sbu='$kodesbu'"));      
           
        if ($cek > 0 AND $cek2 > 0)
        {
           header("location: modul.php?halaman=data_sbu&&i=ada");
         break;
        } else {
            mysql_query("delete from sbu where id ='$id'"); 
            header("location: modul.php?halaman=data_sbu");
         break;
        }               
            
      }
   ?>



