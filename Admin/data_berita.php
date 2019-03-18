<?php if(isset($tambah)) {?>

<?php 

$sql_sbu=mysql_query("insert into berita values('','$hal',now(),'$berita','unread','unread','unread','unread')");


if($sql_sbu)
{
  //echo"Data Berhasil Disimpan";
  header("location: modul.php?halaman=data_berita&&i=berhasil");
}
else
{
  
    header("location: modul.php?halaman=data_berita&&i=gagal");
} } 
if(isset($edit)) {

$edit1 = mysql_query("update berita set tanggal='$tanggal',hal='$hal',berita='$berita' where id='$id'");




if($edit1){

header("location: modul.php?halaman=data_berita&&i=berhasil");}
else{
  header("location: modul.php?halaman=data_berita&&i=gagal");
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
      $halaman = 'data_berita';
      switch($mode){
         default:
?>

  <h1>Data Berita</h1>
</div>

<div class="container-fluid">

<div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Lihat Data</a></li>
              <li><a data-toggle="tab" href="#tab2">Form Berita</a></li>
            </ul>
          </div>
  <div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Berita</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Hal</th>
                   <th>Berita</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from berita order by id desc");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                     
                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$no</td>
                   <td class='center'>$r[tanggal]</td>
                 <td class='center'>$r[hal]</td>
                  <td class='center'>$r[berita]</td>
               
                  <td class='taskOptions'><a href='?halaman=data_berita&&mode=edit&&id=$r[id]' class='tip-top' data-original-title='Update'><i class='icon-ok'></i></a> <a href='?halaman=data_berita&&mode=hapus&&id=$r[id]' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
                 
                 
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
<?php $tgl=date('Y-m-d');?>
<script type="text/javascript" src="jquery.js"></script>

              <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Berita</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=data_berita" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
          <div class="control-group">
              <label class="control-label">Tanggal :</label>
              <div class="controls">
                <input type="text" class="span2" name="tanggal" id="required" value="<?php echo $tgl; ?>" disabled=""/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hal :</label>
              <div class="controls">
                <input type="text" class="span5" name="hal" id="required"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Berita :</label>
              <div class="controls">
                <textarea type="text" name="berita" class="textarea_editor span5" rows="7" placeholder="Enter text ..."></textarea>
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
            $data = mysql_fetch_array(mysql_query("select * from berita where id='$id'")); 

         
            
                     
   ?>
 <div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Berita</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=data_berita" method="post" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
              <div class="control-group">
              <label class="control-label">Tanggal :</label>
              <div class="controls">
                <input type="text" data-date-format="yyyy-mm-dd" name="tanggal" value="<?php echo $data['tanggal']; ?>" class="tanggal" id="tanggal">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Hal :</label>
              <div class="controls">
                <input type="text" class="span5" name="hal" id="required" value="<?php echo $data['hal']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Berita :</label>
              <div class="controls">
                <textarea type="text" name="berita" class="textarea_editor span5" rows="7" placeholder="Enter text ..."><?php echo $data['berita']; ?></textarea>
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
     
            mysql_query("delete from berita where id ='$id'"); 
            header("location: modul.php?halaman=data_berita");
        
                   
            
      }
   ?>



