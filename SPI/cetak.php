<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='DETAIL RISIKO'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();

include"../koneksi.inc.php";
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <style type="text/css">
.AJI {
  text-align:center;
}
.AJI2 {
  text-align:center;
}
.bold {
  font-weight: bold;
  text-align: center;
}
.tengah {
  text-align: center;
}
</style>
<style type="text/css">
   .satu {
   font-size: 20px;
   }
   .dua {
   font-size: 20px;
   }
   .tiga {
   font-size: 8px;
   }
</style>
       <title>DETAIL RISIKO</title>
    <body>
<font color="#0000FF" size="3px"><strong><center>PROFIL RISK REGISTER</center> </strong></font><strong>

</strong><strong>
 <?php
                   
       $sql = mysql_query("select * from risiko WHERE id='$id'");
       $no = 1;
       while ($r = mysql_fetch_array($sql)) {
         $nilai_lh=$r["likelihood"];
         $nilai_ks=$r["konsekuensi"];
         $level_risiko=$nilai_lh*$nilai_ks;
         $sbu2=$r["sbu"];
           
            $sql_user=mysql_query("select * from user WHERE user='$r[nrk]'");
            $row_user=mysql_fetch_array($sql_user);
            
            $sql_unit=mysql_query("select * from unitkerja WHERE kodeunit='$r[kodeunit]'");
            $row_unit=mysql_fetch_array($sql_unit);
             
            $sql_tgl=mysql_query("select * from approve WHERE id_risiko='$r[id]'");
            $row_tgl=mysql_fetch_array($sql_tgl);
            
            $sql_e=mysql_query("select * from table_keefektifan WHERE id_risiko='$r[id]'");
            $row_e=mysql_fetch_array($sql_e);

             $sql_sbu=mysql_query("select * from sbu WHERE kode_sbu='$sbu2'");
             $row_sbu=mysql_fetch_array($sql_sbu);

             $sql_rayon=mysql_query("select * from rayon WHERE kode_rayon='$r[rayon]'");
             $row_rayon=mysql_fetch_array($sql_rayon);
               
             $sql_mitigasi=mysql_query("select * from mitigasi WHERE id_risiko='$r[id]'");
             $row_mitigasi=mysql_fetch_array($sql_mitigasi);

             $skor= (($r["persen"]/100)*$r["rp_dampak"]);
            $skorlevel = $r['likelihood']*$r['konsekuensi'];

            $lvllaah = $row_mitigasi['likelihood']*$row_mitigasi['konsekuensi'];

            $skrlevel= $row_mitigasi['likelihood']*$row_mitigasi['konsekuensi'];
            $uang = ($row_mitigasi['dampak_rp']*($row_mitigasi['persen']/100)); 

            $selisih= $skor-$uang; 
            ?>

</strong> 

<table border="1">
  <tbody>
    <tr> 
      <th  bgcolor="silver" width="200px" ><p class="satu">Tgl</p></th>
      
       <td align="center"><p class="satu"><?php echo $r['tgl_identifikasi']; ?></p></td>
       <th  bgcolor="silver" width="200px" colspan="6"><p class="satu">Approve</p></th> 
         

       
      </tr>
      <tr>
       <th  bgcolor="silver"><p class="satu">User</p></th>
       <td align="center" width="500px"><p class="satu"><?php echo $row_user['risk_owner']."/".$row_user['nama_pejabat']; ?></p></td> 
      <th  bgcolor="silver" width="200px" ><p class="satu">Assesment</p></th>
         <th  bgcolor="silver" width="200px" ><p class="satu">Tanggal</p></th>
          <th  bgcolor="silver" width="200px" ><p class="satu">Nama Pejabat</p></th>
          <th  bgcolor="silver" width="200px" ><p class="satu">Status</p></th>
          <th  bgcolor="silver" width="200px" colspan="2" ><p class="satu">TTD</p></th>

          
      
      
      
       </tr>
       <tr>
       <th  bgcolor="silver"><p class="satu">SBU</p></th>
      
       <td align="center"><p class="satu"><?php echo $row_sbu['nama']; ?></p></td>
        <td rowspan="3" align="center"><p class="satu">Key Person</p></td>
        <td rowspan="3" align="center"><p class="satu"><?php echo $row_tgl['tgl1']; ?></p></td>
        <?php  $sql=mysql_query("select * from user WHERE id='$row_tgl[id_user]'");
              $row=mysql_fetch_array($sql); ?>
       <td rowspan="3" align="center"><p class="satu"><?php echo $row['nama_pejabat']; ?></p></td>
       <?php if ($r['status'] == 0){ ?>
        <td rowspan="3" align="center">-</td>
       <?php } else if($r['status'] == 1) {?>
        <td rowspan="3" align="center"><p class="satu">V</p></td>
       <?php } else {?>
        <td rowspan="3" align="center"><p class="satu">X</p></td>
       <?php } ?> 
       <td rowspan="3" align="center" colspan="2"></td>
       
       </tr>
       <tr>
       <th  bgcolor="silver"><p class="satu">Unit</p></th>
       
       <td align="center"><p class="satu"><?php echo $row_unit['nama']; ?></p></td>
        
       
       
     
       </tr>

       <tr>
       <th  bgcolor="silver"><p class="satu">Rayon</p></th>
       <td align="center"><p class="satu"><?php echo $row_rayon['nama']; ?></p></td> 
       
       </tr>
       <tr>
      <th  bgcolor="silver"><p class="satu">Kategori Risiko</p></th>
      
      <td align="center"><p class="satu"><?php echo $r['kategori']; ?></p></td>
       <td rowspan="3" align="center"><p class="satu">Admin</p></td>
        <td rowspan="3" align="center"><p class="satu"><?php echo $row_tgl['tgl2']; ?></p></td>
        <?php $sql2=mysql_query("select * from user WHERE id='$row_tgl[id_user2]'");
              $row2=mysql_fetch_array($sql2); ?>
       <td rowspan="3" align="center"><p class="satu"><?php echo $row2['nama_pejabat']; ?></p></td>
        <?php if ($r['status2'] == 0){ ?>
        <td rowspan="3" align="center">-</td>
       <?php } else if($r['status2'] == 1) {?>
        <td rowspan="3" align="center"><p class="satu">V</p></td>
       <?php } else {?>
        <td rowspan="3" align="center"><p class="satu">X</p></td>
       <?php } ?>
       <td rowspan="3" colspan="2" align="center"></td>
    </tr>
    <tr>
      <th bgcolor="silver"><p class="satu">Faktor Risiko</p></th>
      
      <td align="center"><p class="satu"><?php echo $r['faktor']; ?></p></td>
       
      </tr>
      <tr>
      <th bgcolor="silver"><p class="satu">Kelompok Risiko</p></th>
     
      <td align="center"><p class="satu"><?php echo $r['kelompok']; ?></p></td>
      
      </tr>
      <tr>
      <th bgcolor="silver"><p class="satu">Nama Risiko</p></th>
     
      <td align="center"><p class="satu"><?php echo $r['nama']; ?></p></td>
      <td bgcolor="silver" colspan="6" align="center"></td>
      </tr>
      <tr>
       <th bgcolor="silver" colspan="4"><center><p class="satu">Identifikasi Risiko</p></center></th>
       <th bgcolor="silver" colspan="4"><center><p class="satu">Analisa Risiko</p></center></th>
      </tr>
      <tr>
      <th bgcolor="silver"><center><p class="satu">Peristiwa Risiko</p></center></th>
      <th bgcolor="silver"><center><p class="satu">Sebab Risiko</p></center></th>
       <th bgcolor="silver"><center><p class="satu">Dampak</p></center></th>
       <th bgcolor="silver" width="200px"><center><p class="satu">Dampak (Rp)</p></center></th>
       <th bgcolor="silver"><center><p class="satu">Pengendalian</p></center></th>
       <th bgcolor="silver" colspan="3"><p class="satu"><center>Risiko Inheren</p></center></th>
       
      </tr>
      <tr>
      <td align="center" rowspan="4" ><p class="satu"><?php echo $r['peristiwa']; ?></p></td>
      <td align="center" rowspan="4"><p class="satu"><?php echo $r['sebab']; ?></p></td>
      <td align="center" rowspan="4"><p class="satu"><?php echo $r['dampak']; ?></p></td> 
      <td align="center" rowspan="4"><p class="satu"><?php echo $r['rp_dampak']; ?></p></td>
      <td align="center" rowspan="4"><p class="satu"><?php echo $r['pengendalian']; ?></p></td>
       <th bgcolor="silver" ><center><p class="satu">Likelihood</p></center></th>
       <td width="50px" align="center" width="50"><p class="satu"><?php echo $r['likelihood']; ?></p></td>
       <td width="50px" align="center" width="50"><p class="satu"><?php echo $r["persen"]; ?>%</p></td> 
        
      </tr>
      <tr>
       <th bgcolor="silver" width="100" ><center><p class="satu">Konsekuensi</p></center></th>
      <td width="100px" align="center"><p class="satu"><?php echo $r['konsekuensi'];   ?></p></td>
       <td width="300px" align="center"><p class="satu">Rp<?php echo $r["rp_dampak"]; ?></p></td> 
      </tr>

      <tr>
      <th bgcolor="silver" ><center><p class="satu">Skor(LxK)</p></center></th>
      <td width="100" align="center"><p class="satu"><?php echo $skorlevel;   ?></p></td>
       <td width="300px" align="center"><p class="satu">Rp<?php echo $skor; ?></p></td> 
      </tr>
      <tr>
       <th bgcolor="silver"   ><center><p class="satu">Level</p></center></th>
      <?php
      
      if ($level_risiko == 0){?>
        <td  colspan="" align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p><font size="3">-</font></p>
    </td>
      <?php } else {
       if ($level_risiko >= 1 && $level_risiko <=4 ){ ?>
      <td colspan="2" align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p class="satu">RENDAH</p></font>
    </td>
      <?php } else if ($level_risiko >4 && $level_risiko<=9){ ?>
       <td  colspan="2" align="center" valign="middle" bgcolor="#FFCC00" class="tengah"><p class="satu">SEDANG</p></font></td>
      <?php } else if ($level_risiko >9 && $level_risiko <=16){ ?>
        <td  colspan="2" align="center" valign="middle" bgcolor="#FFFF00" class="tengah"><p class="satu">TINGGI</p></td>
      <?php } else { ?>
      <td  colspan="2" align="center" valign="middle" bgcolor="#FF0000" class="tengah"><p class="satu">EKSTRIM</p></td>
      <?php }} ?>
      </tr>
      <tr>
      <th colspan="8" bgcolor="silver"><center><p class="satu">Rencana Perlakuan</p></center></th>
      </tr>
       
       <tr>
        <th bgcolor="silver" ><center><p class="satu">Pengendalian(Rp)</p></center></th>
        <th bgcolor="silver" colspan="3"><center><p class="satu">Risiko Residual</p></center></th>
        <th  bgcolor="silver"><center><p class="satu">Mitigasi</p></center></th>
      <th  bgcolor="silver" colspan="3"><center><p class="satu">Analisa Biaya dan Manfaat</p></center></th>
       </tr>   
       <tr>
       <td rowspan="4" align="center"><p class="satu"><?php echo $r['rp_pengendalian'];?></p></td>
       <th bgcolor="silver" ><center><p class="satu">Likelihood</p></center></th>
         <td align="center"><p class="satu"><?php echo $row_mitigasi['likelihood'];?></p></td>
      <td align="center"><p class="satu"><?php echo $row_mitigasi['persen'];?>%</p></td>
      <td align="center"  rowspan="4"><p class="satu"><?php echo $r['rencana'];?></p></td>
      <th  bgcolor="silver"><center><p class="satu">EBC</p></center></th>
      <td align="center" colspan="2"><p class="satu"><?php echo $skor; ?></p></td>
       </tr>  
       <tr>
       <th bgcolor="silver" ><center><p class="satu">Konsekuensi</p></center></th>
        <td align="center"><p class="satu"><?php echo $row_mitigasi['konsekuensi'];?></p></td>
      <td align="center"><p class="satu">Rp<?php echo $row_mitigasi['dampak_rp'];?></p></td>
      <th  bgcolor="silver"><center><p class="satu">ERC</p></center></th>
     <td align="center" colspan="2"><p class="satu"><?php echo $uang;?></p></td>
       </tr>
     <tr>
     <th bgcolor="silver" ><center><p class="satu">Skor(LxK)</p></center></th>
        <td align="center"><p class="satu"><?php echo $skrlevel;?></p></td>
         <td align="center"><p class="satu">Rp<?php echo $uang; ?></p></td>
         <th  bgcolor="silver"><center><p class="satu">Benefit (EBC-ERC)</p></center></th>
     <td align="center" colspan="2" ><p class="satu"><?php echo $selisih; ?></p></td>
     </tr>
     <tr>
     <th bgcolor="silver"  ><center><p class="satu">Level</p></center></th>
      <?php if($lvllaah == 0){ ?>
         <td  colspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="tengah"><p class="satu">-</p></td>
     <?php }else{
       if ($lvllaah >= 1 && $lvllaah <=4 ){ ?>
      <td  colspan="2" align="center" valign="middle" bgcolor="#3ECA27" class="tengah"><p class="satu">RENDAH</p></td>
      <?php } else if ($lvllaah >4 && $lvllaah<=9){ ?>
       <td  colspan="2"  align="center" valign="middle" bgcolor="#FFCC00" class="tengah"><p class="satu">SEDANG</p></td>
      <?php } else if ($lvllaah >9 && $lvllaah <=16){ ?>
        <td  colspan="2" align="center" valign="middle" bgcolor="#FFFF00" class="tengah"><p class="satu">TINGGI</p></td>
      <?php } else { ?>
      <td colspan="2"  align="center" valign="middle" bgcolor="#FF0000" class="tengah"><p class="satu">EKSTRIM</p></td>
      <?php } } ?>
      <th  bgcolor="silver"><center><p class="satu">Rencana Biaya (Cost)</p></center></th>
     <td align="center" colspan="2"><p class="satu"><?php echo $r['rp_pengendalian']; ?></p></td>
      </tr>
     <tr>
     <th  bgcolor="silver" width="200px" colspan="8"><p class="satu">Efektifitas Pengendalian</p></th> 
     </tr>
     <tr>
     <th  bgcolor="silver" width="200px" ><p class="satu">Assesment</p></th>
         <th  bgcolor="silver" width="200px"  ><p class="satu">Tanggal</p></th>
          <th  bgcolor="silver" width="200px" colspan="2"><p class="satu">Nama Pejabat</p></th>
          <th  bgcolor="silver" width="200px" colspan="2"><p class="satu">Status</p></th>
          <th  bgcolor="silver" width="200px" colspan="2"><p class="satu">TTD</p></th>
     </tr>
     <tr>
     <td  align="center"><p class="satu">Key Person</p></td>
        <td align="center" ><p class="satu"><?php echo $row_e['tgl3'];?></p></td>
        <td align="center" colspan="2"><p class="satu"><?php echo $row_e['user3'];?></p></td>
        <?php if ($r['kefektifan3']=="0"){
                 echo "<td align='center' colspan='2' >-</td>";
               }else {
                 if ($r['kefektifan3'] == "5"){
                 echo "<td align='center' colspan='2' ><p class='satu'>Sangat Baik</p></td>"; } 
                else if ($r['kefektifan3'] == "4"){
                    echo "<td align='center' colspan='2' ><p class='satu'>Baik</p></td>";
                } else if($r['kefektifan3'] == "3"){
                    echo "<td align='center' colspan='2'><p class='satu'>Cukup</p></td>";
                } else if($r['kefektifan3'] == "2"){
                    echo "<td align='center' colspan='2' ><p class='satu'>Kurang</p></td>"; 
                } else {
                   echo "<td align='center' colspan='2' ><p class='satu'>Sangat Kurang</p></td>"; 
                }
                 } ?>
              <td colspan="2" align="center"></td>   
     </tr>
      <tr>
      <td  align="center"><p class="satu">SPI</p></td>
      <td align="center" ><p class="satu"><?php echo $row_e['tgl_1'];?></p></td>
       <td align="center" colspan="2"><p class="satu"><?php echo $row_e['user1'];?></p></td>
     <?php if ($r['kefektifan1']==0){
                 echo "<td align='center' colspan='2'>-</td>";
               }else if($r['kefektifan1']==1){
                 echo "<td align='center' colspan='2'><p class='satu'>Sangat Kurang</p></td>";
               }else if ($r['kefektifan1']==2){
                  echo "<td align='center' colspan='2'><p class='satu'>kurang</p></td>";
               }else if ($r['kefektifan1']==3){
                 echo "<td align='center' colspan='2'><p class='satu'>cukup</p></td>";
               }else if ($r['kefektifan1']==4){
                 echo "<td align='center' colspan='2'><p class='satu'>Baik</p></td>";
               }else{
                 echo "<td align='center' colspan='2'><p class='satu'>Sangat Baik</p></td>";
               }; ?>

             <td colspan="2" align="center"></td>
      </tr>
      <tr>
      <td  align="center"><p class="satu">Admin</p></td>
       <td align="center" ><p class="satu"><?php echo $row_e['tgl_2'];?></p></td>  
        <td align="center" colspan="2"><p class="satu"><?php echo $row_e['user2'];?></p></td>  
        <?php if ($r['kefektifan2']=="0"){
                 echo "<td align='center' colspan='2'>-</td>";
               }else {
                 if ($r['kefektifan2'] == "5"){
                 echo "<td align='center' colspan='2'><p class='satu'>Sangat Baik</p></td>"; } 
                else if ($r['kefektifan2'] == "4"){
                    echo "<td align='center' colspan='2'><p class='satu'>Baik</p></td>";
                } else if($r['kefektifan2'] == "3"){
                    echo "<td align='center' colspan='2'><p class='satu'>Cukup</p></td>";
                } else if($r['kefektifan2'] == "2"){
                    echo "<td align='center' colspan='2'><p class='satu'>Kurang</p></td>"; 
                } else {
                   echo "<td align='center' colspan='2'><p class='satu'>Sangat Kurang</p></td>"; 
                }
                 } ?>
                  <td colspan="2" align="center"></td>
      </tr>
      <tr>
      <th  bgcolor="silver" width="200px" colspan="8"><p class="satu">Catatan</p></th> 
      </tr>
      <tr>
      <th  bgcolor="silver" colspan="2"><center><p class="satu">Catatan Key Person (Approve 1)</p></center></th>
      <td width="500px" colspan="6" align="center"><p class="satu"><?php echo $row_tgl['ctt1']; ?></p></td>
      </tr>
      <tr>
      <th  bgcolor="silver" colspan="2"><center><p class="satu">Catatan Admin (Approve 2)</p></center></th>
     <td width="500px" colspan="6" align="center"><p class="satu"><?php echo $row_tgl['ctt2']; ?></p></td>
      </tr>
      <tr>
       <th  bgcolor="silver" colspan="2"><center><p class="satu">Catatan Key Person (Efektifitas 1)</p></center></th>
     <td width="500px" colspan="6" align="center"><p class="satu"><?php echo $row_e['ctt5']; ?></p></td>
      </tr>
      <tr>
      <th  bgcolor="silver" colspan="2"><center><p class="satu">Catatan SPI (Efektifitas 2)</p></center></th>
     <td width="500px" colspan="6" align="center"><p class="satu"><?php echo $row_e['ctt3']; ?></p></td>
      </tr>
      <tr>
      <th  bgcolor="silver" colspan="2"><center><p class="satu">Catatan Admin (Efektifitas 3)</p></center></th>
         <td width="500px" colspan="6" align="center"><p class="satu"><?php echo $row_e['ctt4']; ?></p></td>
      </tr>

      
    <?php   
      $no++;
                    }                    
                    ?>                           
  </tbody>
    
</table>
<p class="tiga">Printed by: Rimos-Risk Management Online System</p>

 </body>  
</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);


$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>