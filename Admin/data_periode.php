<?php if(isset($edit)) {

$edit1 = mysql_query("update periode set tgl_mulai='$tgl_awal',tgl_akhir='$tgl_akhir' where id='$id'");

if($edit1){

header("location: modul.php?halaman=data_periode&&i=berhasil");}
else{
  header("location: modul.php?halaman=data_periode&&i=gagal");
}

 }?>


<?php
      $halaman = 'data_periode';
      switch($mode){
         default:
?>
<div class="row-fluid">
    <div class="span6">
     <?php
                   
					          $sql = mysql_query("select * from periode where id ='1' ");
					          $no = 1;
                    while ($r = mysql_fetch_array($sql)) { ?>
    <div class="span12 btn-icon-pg">
       <ul>
    <li><a href="?halaman=data_periode&&mode=edit&&id=<?php echo $r['0']; ?>"><i class="icon-edit"></i>edit</a></li>
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
          
      
          <h5>Data Periode Pengisian Data</h5>
        </div>
        <div class="widget-content nopadding">
        <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tanggal Awal :</label>
              <div class="controls">
                <input type="text" class="span11" name="tgl_awl" value="<?php echo $r['1']; ?>" disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Akhir :</label>
              <div class="controls">
                <input type="text" class="span11" name="tgl_akh" value="<?php echo $r['2']; ?>" disabled=""  />
              </div>
            </div>
            <?php $no++; } ?>
          </form>
        </div>
      </div>

<div class="row-fluid">
    <div class="span12">
     <?php
                   
                    $sql2 = mysql_query("select * from periode where id ='2' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql2)) { ?>
    <div class="span12 btn-icon-pg">
       <ul>
    <li><a href="?halaman=data_periode&&mode=edit&&id=<?php echo $r['0']; ?>"><i class="icon-edit"></i>edit</a></li>
       </ul>
      </div>
      <div class="widget-box">
    
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          
      
          <h5>Data Periode Efektifitas</h5>
        </div>
        <div class="widget-content nopadding">
        <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tanggal Awal :</label>
              <div class="controls">
                <input type="text" class="span11" name="tgl_awl" value="<?php echo $r['1']; ?>" disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Akhir :</label>
              <div class="controls">
                <input type="text" class="span11" name="tgl_akh" value="<?php echo $r['2']; ?>" disabled=""  />
              </div>
            </div>
            <?php $no++; } ?>
          </form>
        </div>
      </div>



<?php
                   
                    $sql = mysql_query("select * from periode where id= '$id' ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) { ?>
    <div class="span12 btn-icon-pg">
       <ul>
    <li><a href="?halaman=data_periode&&mode=edit&&id=<?php echo $r['0']; ?>"><i class="icon-edit"></i>edit</a></li>
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
          
      
          <h5>Data Periode</h5>
        </div>
        <div class="widget-content nopadding">
        <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tanggal Awal :</label>
              <div class="controls">
                <input type="text" class="span11" name="tgl_awl" value="<?php echo $r['1']; ?>" disabled="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Akhir :</label>
              <div class="controls">
                <input type="text" class="span11" name="tgl_akh" value="<?php echo $r['2']; ?>" disabled=""  />
              </div>
            </div>
            <?php $no++; } ?>
          </form>
        </div>
      </div>
      <?php
         break;
         case "edit":
            $data = mysql_fetch_array(mysql_query("select * from periode where id='$id'")); 
                     
   ?>
<div class="row-fluid">
    <div class="span6">
  
      <div class="widget-box">
      <form action="?halaman=data_periode" method="post" class="form-horizontal">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
      
          <h5>Data Periode</h5>
        </div>
       <div class="control-group">
              <label class="control-label">Tanggal Awal</label>
              <div class="controls">
                <input type="text" data-date-format="yyyy-mm-dd" name="tgl_awal" value="<?php echo $data['tgl_mulai']; ?>" class="tanggal" id="tanggal">
                <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Akhir</label>
              <div class="controls">
                
                  <input type="text" data-date-format="yyyy-mm-dd" name="tgl_akhir" value="<?php echo $data['tgl_akhir']; ?>" class="tanggal2" id="tanggal2">
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="edit" value="Validate" class="btn btn-success">Save</button>
            </div>
          </form>
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
<script type="text/javascript">
    $(function() {
        $( "#tanggal2" ).datepicker();
       $( "#tanggal2" ).change(function() {
             $( "#tanggal2" ).datepicker( "option", "dateFormat","yyyy-mm-dd" );
         });
       });
</script>

   <?php } ?>