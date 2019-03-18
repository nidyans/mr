<?php session_start(); ?>
<?php  include "headerAdmin.php"; ?>
<?php  include "menuAdmin.php"; ?>
<?php  include"../koneksi.inc.php"; ?>
<?php if(empty($namauser) AND empty($passuser)) 
{header("location:../error.php"); 
session_destroy();
} else { ?>
<?php
  $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$sbu'");
  $row_sbu=mysql_fetch_array($sql_sbu); 
   ?>
<div id="content">
  <div id="content-header">
  
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="Rekap_corporate.php" class="current">Rekap <?php echo $row_sbu['nama']; ?></a> <a href="#" class="current">Detail Map Rekap  <?php echo $row_sbu['nama']; ?></a> </div>
    <h1>Rekap <?php echo $row_sbu['nama']; ?></h1>
  </div>
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Detail Map <?php echo $row_sbu['nama']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Risiko</th>
                     <th>Likelihood</th>
                     <th>Konsekuensi</th>
                     <th>Level Risiko</th>
                     <th>Risk Owner</th>
      
                </tr>
              </thead>
              <tbody>
                 <?php
                   
					               
					         $sql =mysql_query("select risiko.nama,CEILING(avg(risiko.likelihood)) as X,CEILING(avg(risiko.konsekuensi)) as Y,CEILING(avg(risiko.likelihood)*avg(risiko.konsekuensi)) as level_risiko,count(risiko.nrk),YEAR(risiko.tgl_identifikasi) as tahun from risiko WHERE risiko.sbu='$sbu' group by risiko.nama,risiko.sbu ");
					          $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
						   $nilai_lh=$r["X"];
						   $nilai_ks=$r["Y"];
               $tahun1 = $r['tahun'];
						   $level_risiko=$nilai_lh*$nilai_ks;
             if ($nilai_lh == $likelihood AND $nilai_ks == $konsekuensi  and $tahun1 == $tahun){
                      echo "<tr class='gradeX'>
                        
               <td>$r[0]</td>
               <td class='center'>$r[1]</td>
               <td class='center'>$r[2]</td>
               <td class='center'>$level_risiko</td>
                <td><a href='detail_risiko_corporate.php?nama=$r[0]&&judul=$row_sbu[nama]'>$r[4]</a></td>
              
                 
                            </tr>";}
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