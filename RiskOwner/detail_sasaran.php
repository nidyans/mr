<?php
                   
                    $sql = mysql_query("select * from sasaran WHERE id='$id'");
                    $no = 1;
                    while ($data = mysql_fetch_array($sql)) {
              
            $sql_user=mysql_query("select * from user WHERE user='$r[user_app]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[unit]'");
            $row_unit=mysql_fetch_array($sql_unit);

             $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$r[rayon]'");
            $row_rayon=mysql_fetch_array($sql_rayon);
          
             $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$r[sbu]'");
             $row_sbu=mysql_fetch_array($sql_sbu);

             $sql_user2=mysql_query("select * from user WHERE user='$r[user]'");
            $row_user2=mysql_fetch_array($sql_user2);

            ?>
            
<div class="row-fluid">
                <div class="span12 btn-icon-pg">
                  <ul>
                  <?php 
                  echo "<li><a href='?halaman=sasaran_monitoring&&tahun=$tahun'><i class='icon-arrow-left'></i>Kembali</a></li>"; ?>
                  </ul>
                  </div></div>
<div class="row-fluid">

    <div class="span12">

      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info Laporan Sasaran</h5>
        </div>

        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tanggal Sasaran :</label>
              <div class="controls">
                <input type="text" data-date-format="yyyy-mm-dd" name="tahun_sasaran" value="<?php echo $data['tahun_sasaran'] ?>" class="tanggal" readonly>
                <span class="help-block"></span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sasaran 1 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran1" id="required" disabled=""><?php echo $data['sasaran1']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran 2 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran2" id="required" disabled=""><?php echo $data['sasaran2']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran 3 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran3" id="required" disabled=""><?php echo $data['sasaran3']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran 4 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran4" id="required" disabled=""><?php echo $data['sasaran4']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sasaran5 :</label>
              <div class="controls">
                <textarea type="text" class="span5" name="sasaran5" id="required" disabled=""><?php echo $data['sasaran5']; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
      


      <!--..............................................................................-->
      
  <!--.......................................................................................-->


<?php $no++; } ?>