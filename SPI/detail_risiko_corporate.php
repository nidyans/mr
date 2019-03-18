<?php session_start(); ?>
<?php  include "headerAdmin.php"; ?>
<?php  include "menuAdmin.php"; ?>
<?php  include"../koneksi.inc.php"; ?>
<?php if(empty($namauser) AND empty($passuser)) 
{header("location:../error.php"); 
session_destroy();
} else { ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Rekap <?php echo $judul; ?></a> <a href="#" class="current">Detail Rekap <?php echo $judul; ?></a> </div>
    <h1>Rekap <?php echo $judul; ?></h1>
  </div>
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $judul; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                    <th>Jabatan</th>
                    <th>Unit</th>
                     <th>Likelihood</th>
                     <th>Konsekuensi</th>
                     <th>Level Risiko</th>
      
                </tr>
              </thead>
              <tbody>
                 <?php
                   if(isset($sbu)){
                    $sql = mysql_query("SELECT * FROM risiko WHERE nama='$nama' and sbu='$sbu'");
                   }else if (isset($kode_unit)){
                    $sql = mysql_query("SELECT * FROM risiko WHERE nama='$nama' and kodeunit='$kode_unit'");
                   }else {
					          $sql = mysql_query("SELECT * FROM risiko WHERE nama='$nama'");}
					          $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
						    $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
             $level_risiko=$nilai_lh*$nilai_ks;
              $nlirt= ($r["kefektifan1"]+$r["kefektifan2"])/2;
                $sql_user2=mysql_query("select * from user WHERE user='$r[nrk]'");
                $row_user2=mysql_fetch_array($sql_user2);
                $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
                $row_unit=mysql_fetch_array($sql_unit);
                echo "<tr class='gradeX'>            
               <td><a href='detail_risiko_all.php?id=$r[id]'>$r[nama]</td>
               <td>$row_user2[risk_owner]</td>
               <td>$row_unit[nama]</td>
                <td class='center'>$r[likelihood]</td>
                 <td class='center'>$r[konsekuensi]</td>
                  <td class='center'>$level_risiko</td>";
                 
                
                          echo"</tr>";
                      $no++;
                    }                               
                    ?>
              </tbody>
            </table>
          </div>
        </div>
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
</body>
</html>
<?php } ?>