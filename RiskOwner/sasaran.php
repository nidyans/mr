<?php if(isset($tambah)) {
  $year=date('Y');
$unit="SELECT * from user where user='$_GET[uname]'";
            $jalankan=mysql_query($unit) or die(mysql_error());

             while($x=mysql_fetch_array($jalankan)){

//testlagi

$unit = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));
$tahun = substr($data['tahun_sasaran'], 0,  4);
$tahun_input = substr($tahun_sasaran, 0, 4);
?> 
<script type='text/javascript'>alert(<?php echo $_GET['uname']; ?>);</script> 
<?php
if ( $tahun_input == $tahun) {
  ?>
  <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Maaf!</h4>
              Anda Sudah Menginputkan Sasaran di Tahun ini </div> 

              <?php
  # code...
}
else{
  $sql_sasaran =mysql_query("insert into sasaran2 values('','$_GET[uname]', '$sasaran', '$user[sbu]','$user[kodeunit]','$user[rayon]','$tahun_sasaran')"); 

}

if($sql_sasaran){ ?>
  <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Success!</h4>
              Data Berhasil Disimpan </div> 

              <?php


}

else{
  ?>
  <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Warning!</h4>

              Data Gagal Disimpan  </div>
              <?php

}
}}

?>



<div class="row-fluid">

    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Sasaran</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="?halaman=sasaran&uname=<?php echo $_GET[uname]; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            
            <div class="control-group">
              <label class="control-label">Tahun :</label>
              <div class="controls">

    <!-- Edited by pry -->
                <!--input type="text" data-date-format="yyyy-mm-dd" name="tahun_sasaran"  class="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly-->
                <input type="text" data-date-format="yyyy-mm-dd" name="tahun_sasaran"  class="tanggal" value="2018-12-31">


                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran" id="required"></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            

             
            </div>
             
            <div class="form-actions">
              <button type="submit" name="tambah" value="Validate" class="btn btn-success">Save</button>
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