  <?php $year=date('Y');
  $pembagi=0;
  $tambah=0;
   ?>
<?php if(isset($tahun) AND isset($aksi)){?>

<div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Rekap Status Pengendalian Corporate</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nama SBU</th>
                   <th>Rata - Rata</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select rata_rata.kelompok,sum(rata_rata.rata_$tahun) as X from rata_rata group by rata_rata.kelompok ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
            
            $sql_sbu=mysql_query("select * from sbu where kode_sbu='$r[0]'");
            $row_sbu=mysql_fetch_array($sql_sbu);
            if($r['X'] != 0){
              $pembagi++;
            }
            
                      echo "<tr class='gradeX'>
                        
               <td>$row_sbu[2]</td>
               <td class='center'>$r[1]</td>
                 
                            </tr>";
                      $no++;
                      $tambah+= $r['X'];
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
<?php } else  {?>
    <h1>Rekap Status Pengendalian Corporate</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=sp_corporate" method="post">
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
<?php }  ?>