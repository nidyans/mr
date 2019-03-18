<?php $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$sbu'");
  $row_sbu=mysql_fetch_array($sql_sbu);
   $year=date('Y');
    $pembagi=0;
    $tambah=0;
   ?>
<?php if(isset($tahun) AND isset($sbu) AND isset($aksi)){ ?>
<h1>Rekap Status Pengendalian <?php echo $row_sbu['nama']; ?> </h1>
  </div>
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap <?php echo $row_sbu['nama']; ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama Unit</th>
                   <th>Rata - Rata Efektifitas</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  
                     $sql = mysql_query("select nama,kodeunit,rata_$tahun from rata_rata WHERE kelompok='$sbu'");
					          $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                      if($r[2] !=0){
                        $pembagi++;

                      }
						   
                      echo "<tr class='gradeX'>
    
               <td class='center'>$r[nama]</td>
               <td class='center'>$r[2]</td> </tr>";
                      $no++;

                      $tambah+=$r[2];
                    }       
                   ?>
                              
              </tbody>
            </table>
            <table align="right">
              <?php
             if (($tambah==0) and ($pembagi==0)){
   $rata2seluruh=0;
 } else {
  
 $rata2seluruh= $tambah/$pembagi;
  } ?>
<td>Rata - Rata Seluruh Status Pengendalian</td>
<td align="center"><input type="text" value="<?php echo $rata2seluruh; ?>" readonly/></td>

</table>
          </div>
        </div>
<?php } else { ?>
    <h1>Rekap Status Pengendalian SBU</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=SBU_sp" method="post">

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
  <tr>
    <td width="100">PILIH SBU</td>
    <td width="200"><label for="select"></label>
      <?php
  
  $perintah="SELECT * from sbu";
      
   
      $jalankan_perintah=mysql_query($perintah) or die(mysql_error());
    
echo"<select name='sbu' class='style12'>";

while($x=mysql_fetch_array($jalankan_perintah)){
$option = $x[2];
$nilai = $x[1];
echo "<option value='$nilai'>$option</option>";
}
  
  ?></td>
  
  </tr>
  <input type="hidden" name="aksi" value="aja" />
</table>
</br>
</br>
<p>
  <input type="submit" name="button" id="button" value="LANJUT" />
  
  </form>
   
</div>
<?php } ?>
