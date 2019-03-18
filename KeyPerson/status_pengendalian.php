<?php $year=date('Y'); ?>
<?php
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user); 


$sql = "SELECT count(*) AS jumlah FROM risiko where nrk ='$namauser' and status2='1'";
$query = mysql_query($sql);
$telah_approve = mysql_fetch_array($query);



?>

<?php if (isset($tahun) and isset($aksi)) { ?>
<?php if ($row_user['rayon'] == '-'){ ?>
<div class="container-fluid">

  <div class="row-fluid">

    <div class="span12">

      <?php       $sql_user2=mysql_query("select * from user WHERE user='$namauser'");
      $row_user2=mysql_fetch_array($sql_user2); 

      $sql1=mysql_query("select * from sbu WHERE kode_sbu='$row_user2[sbu]'");
      $row2=mysql_fetch_array($sql1); 

      $sql2=mysql_query("select * from unitkerja WHERE kodeunit='$kodeunit'");
      $row3=mysql_fetch_array($sql2); 



      ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Rekapitulasi Risiko <?php echo $row2['nama'];?> <?php echo $row3['nama'];?></h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>

                <th>Jabatan</th>
                <th>Nama Rejabat</th>
                <th>Risiko yang telah diinput (Jumlah)</th>
                <th>Risiko yang telah diapprove (Jumlah)</th>
                <th>Risiko yang telah dinilai (Jumlah)</th>
                <th>Rata-Rata SP</th>

              </tr>
            </thead>
            <tbody>

              <?php

              $sql = mysql_query("select * from risiko WHERE kodeunit='$kodeunit' and YEAR(tgl_identifikasi)='$tahun' group by nrk");
              $no = 1;
              $pembagi=0;
              while ($q = mysql_fetch_array($sql)) {

               $nilai_lh=$q["likelihood"];
               $nilai_ks=$q["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;

               $sql_r=mysql_query("select * from risiko WHERE id='$q[id]'");
               $r=mysql_fetch_array($sql_user);


               $sql_user=mysql_query("select * from user WHERE user='$q[nrk]'");
               $row_user=mysql_fetch_array($sql_user);

              $sql_risiko=mysql_query("select count(id) as sudahInput,
                sum(status=1) as sudahApprove,
                count(nullif(kefektifan1+kefektifan2+kefektifan3,0)) as sudahDinilai,
                avg(nullif((kefektifan1+kefektifan2+kefektifan3)/((kefektifan1>0)+(kefektifan2>0)+(kefektifan3>0)),0)) as rataan
                FROM risiko 
                where nrk='$q[nrk]' 
                and YEAR(tgl_identifikasi)='$tahun';");
              $risikoo=mysql_fetch_array($sql_risiko);
            $rata2seluruhe= number_format($risikoo['rataan'],3);

            

            if ($risikoo['rataan'] > 0)  {
              $pembagi++;
            }

             


             echo "<tr tr class='gradeX'>


             <td class='center'>$row_user[risk_owner]</td>
             <td class='center'>$row_user[nama_pejabat]</td>
             <td class='center'>$risikoo[sudahInput]</td>
             <td class='center'>$risikoo[sudahApprove]</td>
             <td class='center'>$risikoo[sudahDinilai]</td>
             <td class='center'>$rata2seluruhe</td>
           </tr>";
           $sum=$risikoo['rataan'];
           $jumlah_seluruh_sp+=$sum;
           $no++;
         }   



         ?>

       </tbody>
     </table>
     <table align="right">
      <?php
      if (($jumlah_seluruh_sp==0) and ($pembagi==0)){
       $rata2seluruh=0;
     } else {
       $rata2seluruh= number_format($jumlah_seluruh_sp/$pembagi,3); 
       //$update_rata= mysql_query("update rata_rata set rata_$tahun='$rata2seluruh' where kodeunit='$kodeunit'");
     } ?>
     <td>Rata - Rata Seluruh Status Pengendalian</td>
     <td align="center"><input type="text" value="<?php echo $rata2seluruh; ?>" readonly/></td>
   </table>
 </div>
</div>
<?php } else { ?>
<div class="container-fluid">

  <div class="row-fluid">
    <div class="span12">

     <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h4>Register Risiko</h4>
      </div>
      <div class="widget-content nopadding">


      </div>
    </div>  


    <?php }?>

    <?php } else if(isset($konsekuensi) AND isset($likelihood) AND isset($kode_unit) AND isset($level) AND isset($tahun)) {?>


    <?php } else if(isset($konsekuensi) AND isset($likelihood)  AND isset($level) AND isset($rayon) AND isset($tahun)){?>


    <?php }else { ?>
    <h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
   <form action="?halaman=status_pengendalian" method="post">
    <body>
      <table>
        <tr>
          <td width="100">Pilih Tahun</td>
          <td width="100"><label for="select"></label>

           <select name="tahun">
            <?php
            $thn_skr = date('Y');
            for ($x = $thn_skr; $x >= 2015; $x--) {
              ?>
              <option value="<?php echo $x ?>"><?php echo $x ?></option>
              <?php
            }
            ?>
          </select>
        </tr>
        <input type="hidden" name="aksi" value="aja"/>
      </table>
    </br>
  </br>
  <p>
    <input type="submit" name="button" id="button" value="LANJUT" />

  </form>

</div>
</br>
<!--Footer-part-->
<div class="row-fluid">

</div>


<?php }?>