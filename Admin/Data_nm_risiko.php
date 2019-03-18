<?php if(isset($tambah)) {?>

<?php 

$sql_nama_risiko=mysql_query("insert into nama values('','$kelompok','$nama')");


if($sql_nama_risiko)
{
  //echo"Data Berhasil Disimpan";
  header("location: modul.php?halaman=dt_nama_risiko&&kelompok=$kelompok&&aksi=aja&&i=berhasil");
}
else
{
  
    header("location: modul.php?halaman=dt_nama_risiko&&kelompok=$kelompok&&aksi=aja&&i=gagal");
} } 
if(isset($edit)) {

$dat = mysql_fetch_array(mysql_query("select * from nama where id='$id'")); 
$nm_lm= $dat['nama_risiko'];
$kel = $dat['id_kelompok'];
$edit1 = mysql_query("update nama set nama_risiko='$nama' where id='$id'");

$edit2 = mysql_query("update risiko set nama='$nama' where nama='$nm_lm'");

if($edit1 AND $edit2){

header("location: modul.php?halaman=dt_nama_risiko&&kelompok=$kel&&aksi=aja&&i=berhasil");}
else{
  header("location: modul.php?halaman=dt_nama_risiko&&kelompok=$kel&&aksi=aja&&i=gagal");
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
      $halaman = 'data_nm_risiko';
      switch($mode){
         default:
?>

  <h1>Data Nama Risiko</h1>
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
            <h5>Data Nama Risiko</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kelompok</th>
                  <th>Nama Risiko</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from nama");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $kel = mysql_fetch_array(mysql_query("select * from kelompok where id='$r[id_kelompok]'"));
                     
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$no</td>
                   <td class='center'>$kel[kelompok_risiko]</td>
                 <td class='center'>$r[nama_risiko]</td>
               
                  <td class='taskOptions'><a href='?halaman=dt_nama_risiko&&mode=edit&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=dt_nama_risiko&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                 
                 
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
          <h5>Input Data Nama Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=dt_nama_risiko" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">Nama Risiko :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required"/>
                <input type="hidden" name="kelompok" value="<?php echo $kelompok;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kelompok</label>
              <div class="span4">
              <?php
           $unit="SELECT * from kelompok";
            $jalankan=mysql_query($unit) or die(mysql_error());?>
                <select name="kelompok" id="kelompok" >
                <option value="-">-</option>
            <?php while($x=mysql_fetch_array($jalankan)){
             $option = $x[2];
             $nilai = $x[0];
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
            $data = mysql_fetch_array(mysql_query("select * from nama where id='$id'")); 

            $data2 = mysql_fetch_array(mysql_query("select * from kelompok where id='$data[id_kelompok]'")); 
            
                     
   ?>
 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Nama Risiko</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=dt_nama_risiko" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">Nama Risiko :</label>
              <div class="controls">
                <input type="text" class="span5" name="nama" id="required" value="<?php echo $data['nama_risiko']; ?>"/>
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

<?php
         break;
         case "hapus":
      $dt = mysql_fetch_array(mysql_query("select * from nama where id='$id'"));
      $kelompok= $dt['id_kelompok'];
      $nama=$dt['nama_risiko'];
          

         $cek = mysql_num_rows(mysql_query("SELECT * FROM risiko WHERE nama='$nama'"));      
           
        if ($cek > 0)
        {
           header("location: modul.php?halaman=dt_nama_risiko&&kelompok=$kelompok&&aksi=aja&&i=ada");
         break;
        } else {
            mysql_query("delete from nama where id ='$id'"); 
            header("location: modul.php?halaman=dt_nama_risiko&&kelompok=$kelompok&&aksi=aja");
         break;
        }               
            
      }
   ?>



