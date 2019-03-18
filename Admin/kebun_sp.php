<?php $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$sbu'");
  $row_sbu=mysql_fetch_array($sql_sbu);

  $sql_u=mysql_query("select * from unitkerja WHERE kodeunit='$kode_unit'");
  $row_u=mysql_fetch_array($sql_u);
   $year=date('Y');
   $pembagi=0;
    $tambah=0;
   ?>
<?php if(isset($tahun) AND isset($sbu) AND isset($kode_unit) AND isset($aksi)){ ?>
<h4>Rekap Status Pengendalian <?php echo $row_sbu['nama']; ?> & Unit <?php echo $row_u['nama']; ?> </h4>
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
                  <th>Jabatan</th>
                  <th>Nama Pejabat</th>
                   <th>Rata - Rata</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                    $sql = mysql_query("select jabatan,user,rata_$tahun  from rata_user WHERE sbu='$sbu' AND kodeunit='$kode_unit' group by user ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    
            $sql_unit=mysql_query("select * from user where user='$r[1]'");
            $row_unit=mysql_fetch_array($sql_unit);

                    if($r[2] !=0){
                        $pembagi++;

                      }
                      echo "<tr class='gradeX'>
                        
               <td>$r[0]</td>
               <td class='center'>$row_unit[nama_pejabat]</td>
                <td class='center'>$r[2]</td>
              
                 
                            </tr>";
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
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#sbu").change(function(){
    var sbu = $("#sbu").val();
    $.ajax({
        url: "ambilunit.php",
        data: "sbu="+sbu,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kode_unit").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
});

</script>

    <h1>Rekap Status Pengendalian Kebun</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=kebun_sp" method="post">

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
    <select name="sbu" id="sbu">
<option>--Pilih SBU--</option>
      <?php
  
  $perintah="SELECT * from sbu";
      
   
      $jalankan_perintah=mysql_query($perintah) or die(mysql_error());
    
while($x=mysql_fetch_array($jalankan_perintah)){
$option = $x[2];
$nilai = $x[1];
echo "<option value='$nilai'>$option</option>";
}
  
  ?></td>
  
  </tr>

  <tr>

<td>Pilih Unit</td>
<td width=""200""><label for="select"></label><select name="kode_unit" id="kode_unit">
<option>--Pilih Unit--</option>
</select>
</td></tr>

  <input type="hidden" name="aksi" value="aja" />
</table>
</br>
</br>
<p>
  <input type="submit" name="button" id="button" value="LANJUT" />
  
  </form>
   
</div>
<?php } ?>
