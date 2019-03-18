<?php if(isset($edit)) {

$edit1 = mysql_query("update likekon set sangat_rendah='$sangat_rendah',rendah='$rendah',sedang='$sedang',tinggi='$tinggi',sangat_tinggi='$sangat_tinggi' where id='$id'");

if($edit1){

header("location: modul.php?halaman=data_likon&&i=berhasil");}
else{
  header("location: modul.php?halaman=data_likon&&i=gagal");
}

 }?>


<?php
      $halaman = 'data_likon';
      switch($mode){
         default:
?>
<div class="row-fluid">
    <div class="span6">
     <?php
                   
                    $sql = mysql_query("select * from likekon where id ='1' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) { ?>
    <div class="span12 btn-icon-pg">
       <ul>
    <li><a href="?halaman=data_likon&&mode=edit&&id=1"><i class="icon-edit"></i>edit</a></li>
       </ul>
      </div>
      <div class="widget-box">
      <?php
     if (isset($i)=="berhasil"){?>
      <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Success!</h4>
              Data Berhasil Disimpan </div>
     <?php }else if (isset($i)=="gagal"){ ?>
       <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>
              Data Gagal Disimpan </div>
     <?php } else { ?>  <?php }?>
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          
      
          <h5>Data Likelihood</h5>
        </div>
        <div class="widget-content nopadding">
        <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Sangat Rendah:</label>
              <div class="controls">
                <input type="text" class="span11" name="sangat_rendah" value="<?php echo $r['sangat_rendah']; ?>" disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Rendah:</label>
              <div class="controls">
                <input type="text" class="span11" name="rendah" value="<?php echo $r['rendah']; ?>" disabled="" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sedang:</label>
              <div class="controls">
                <input type="text" class="span11" name="sedang" value="<?php echo $r['sedang']; ?>" disabled="" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tinggi:</label>
              <div class="controls">
                <input type="text" class="span11" name="tinggi" value="<?php echo $r['tinggi']; ?>" disabled="" />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Sangat Tinggi:</label>
              <div class="controls">
                <input type="text" class="span11" name="sangat_tinggi" value="<?php echo $r['sangat_tinggi']; ?>" disabled="" />
              </div>
            </div>
            <?php $no++; } ?>
          </form>
        </div>
      </div>

<div class="row-fluid">
    <div class="span12">
     <?php
                   
                    $sql2 = mysql_query("select * from likekon where id ='2' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql2)) { ?>
    <div class="span12 btn-icon-pg">
       <ul>
    <li><a href="?halaman=data_likon&&mode=edit&&id=2"><i class="icon-edit"></i>edit</a></li>
       </ul>
      </div>
      <div class="widget-box">
    
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          
      
          <h5>Data Konsekuensi</h5>
        </div>
        <div class="widget-content nopadding">
        <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Sangat Rendah:</label>
              <div class="controls">
                <input type="text" class="span11" name="sangat_rendah" value="<?php echo $r['sangat_rendah']; ?>" disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Rendah:</label>
              <div class="controls">
                <input type="text" class="span11" name="rendah" value="<?php echo $r['rendah']; ?>" disabled="" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sedang:</label>
              <div class="controls">
                <input type="text" class="span11" name="sedang" value="<?php echo $r['sedang']; ?>" disabled="" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tinggi:</label>
              <div class="controls">
                <input type="text" class="span11" name="tinggi" value="<?php echo $r['tinggi']; ?>" disabled="" />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Sangat Tinggi:</label>
              <div class="controls">
                <input type="text" class="span11" name="sangat_tinggi" value="<?php echo $r['sangat_tinggi']; ?>" disabled="" />
              </div>
            </div>
            <?php $no++; } ?>
          </form>
        </div>
      </div>

      <?php
         break;
         case "edit":
            $data = mysql_fetch_array(mysql_query("select * from likekon where id='$id'")); 
                     
   ?>
<div class="row-fluid">
    <div class="span6">
  
      <div class="widget-box">
      <form action="?halaman=data_likon" method="post" class="form-horizontal">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
      
          <h5>Data Konsekuensi/Likelihood</h5>
        </div>
       <div class="control-group">
              <label class="control-label">Sangat Rendah:</label>
              <div class="controls">
                <input type="text" class="span11" name="sangat_rendah" value="<?php echo $data['sangat_rendah']; ?>"  />
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Rendah:</label>
              <div class="controls">
                <input type="text" class="span11" name="rendah" value="<?php echo $data['rendah']; ?>"  />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sedang:</label>
              <div class="controls">
                <input type="text" class="span11" name="sedang" value="<?php echo $data['sedang']; ?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tinggi:</label>
              <div class="controls">
                <input type="text" class="span11" name="tinggi" value="<?php echo $data['tinggi']; ?>"  />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Sangat Tinggi:</label>
              <div class="controls">
                <input type="text" class="span11" name="sangat_tinggi" value="<?php echo $data['sangat_tinggi']; ?>" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="edit" value="Validate" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>



   <?php } ?>