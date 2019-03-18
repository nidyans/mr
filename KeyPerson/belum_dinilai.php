<?php $year = date('Y'); 
$sql_user=mysql_query("select * from user WHERE user='$namauser'");
$row_user=mysql_fetch_array($sql_user);
?>
<?php if ($row_user['rayon'] == "-"){ ?>
<div class="container-fluid">

  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Daftar Risiko Belum Dinilai</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Tgl</th>
      <th>Nama Risiko</th>
      <th>L(Inheren)</th>
      <th>K (Inheren)</th>
      <th>Level Risiko (I)</th>
      <th>L(Residual)</th>
      <th>K (Residual)</th>
      <th>Level Risiko (R)</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
      
      
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     
                    $sql = mysql_query("SELECT * FROM risiko WHERE kefektifan3 = '0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year' and kodeunit ='$row_user[kodeunit]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;

        

            $sql_mit=mysql_query("select * from mitigasi WHERE id_risiko='$r[id]'");
            $row_mit=mysql_fetch_array($sql_mit);
           
             $nilai_lh1=$row_mit["likelihood"];
               $nilai_ks1=$row_mit["konsekuensi"];
               $level_risiko_mi=$nilai_lh1*$nilai_ks1;


                if(($r['kefektifan1'] !=0 ) or ($r['kefektifan2'] !=0) or ($r['kefektifan3'] != 0)){
                 $pembagi++;
               }
               if($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                 
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/3;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               } else {
                 $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }                        

                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$r[tgl_identifikasi]</td>
                 <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</a></td>
                  <td class='center'>$r[likelihood]</td>
                  <td class='center'>$r[konsekuensi]</td>";
                  if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }

                  echo "<td class='center'>$row_mit[likelihood]</td>
                  <td class='center'>$row_mit[konsekuensi]</td>";
                  if ($level_risiko_mi >= 1 && $level_risiko_mi<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko_mi</td>"; }
                  else if ($level_risiko_mi > 4 && $level_risiko_mi<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko_mi</td>";}
                  else if ($level_risiko_mi > 9 && $level_risiko_mi<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko_mi</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko_mi</td>";
                  }
                   
                   if ($r['status']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
                  echo "<td class='center'>$r[kefektifan3]</td>
                        <td class='center'>$r[kefektifan1]</td>
                        <td class='center'>$r[kefektifan2]</td>
                        <td class='center'>$nlirt</td>";

                  echo "</tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
          </div>
        </div>
        <?php } else {?>
         <div class="container-fluid">

  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Register Risiko</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Tgl</th>
      <th>Nama Risiko</th>
      <th>L(Inheren)</th>
      <th>K (Inheren)</th>
      <th>Level Risiko (I)</th>
      <th>L(Residual)</th>
      <th>K (Residual)</th>
      <th>Level Risiko (R)</th>
      <th>Approve I</th>
      <th>Approve II</th>
      <th>SP I</th>
      <th>SP II</th>
      <th>SP III</th>
      <th>Rata-Rata SP</th>
      
      
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     
                    $sql = mysql_query("SELECT * FROM risiko WHERE kefektifan3 ='0' and status='1' and status2='1' and YEAR(tgl_identifikasi)='$year' and kodeunit ='$row_user[rayon]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
               $nilai_lh=$r["likelihood"];
               $nilai_ks=$r["konsekuensi"];
               $level_risiko=$nilai_lh*$nilai_ks;

        

            $sql_mit=mysql_query("select * from mitigasi WHERE id_risiko='$r[id]'");
            $row_mit=mysql_fetch_array($sql_mit);
           
             $nilai_lh1=$row_mit["likelihood"];
               $nilai_ks1=$row_mit["konsekuensi"];
               $level_risiko_mi=$nilai_lh1*$nilai_ks1;


                if(($r['kefektifan1'] !=0 ) or ($r['kefektifan2'] !=0) or ($r['kefektifan3'] != 0)){
                 $pembagi++;
               }
               if($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                 
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/3;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               } else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] != 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] != 0 and $r["kefektifan2"] == 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               }  else if ($r["kefektifan1"] == 0 and $r["kefektifan2"] != 0 and $r["kefektifan3"] == 0){
                  $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/1;
               } else {
                 $nlirt= ($r["kefektifan1"]+$r["kefektifan2"]+$r["kefektifan3"])/2;
               }                        

                      echo "<tr tr class='gradeX'>
                           
                    <td class='center'>$r[tgl_identifikasi]</td>
                 <td class='center'><a href='?halaman=detail_risiko&&id=$r[id]'>$r[nama]</a></td>
                  <td class='center'>$r[likelihood]</td>
                  <td class='center'>$r[konsekuensi]</td>";
                  if ($level_risiko >= 1 && $level_risiko<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko</td>"; }
                  else if ($level_risiko > 4 && $level_risiko<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko</td>";}
                  else if ($level_risiko > 9 && $level_risiko<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko</td>";
                  }

                  echo "<td class='center'>$row_mit[likelihood]</td>
                  <td class='center'>$row_mit[konsekuensi]</td>";
                  if ($level_risiko_mi >= 1 && $level_risiko_mi<= 4){
                  echo "<td bgcolor='#00FF00' class='center'>$level_risiko_mi</td>"; }
                  else if ($level_risiko_mi > 4 && $level_risiko_mi<= 9){
                  echo "<td bgcolor='#FFCC00' class='center'>$level_risiko_mi</td>";}
                  else if ($level_risiko_mi > 9 && $level_risiko_mi<= 16){
                  echo "<td bgcolor='#FFFF00' class='center'>$level_risiko_mi</td>";
                  }else {
                    echo "<td bgcolor='#FF0000' class='center'>$level_risiko_mi</td>";
                  }
                   
                   if ($r['status']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status']==1){
                 echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
               if ($r['status2']==0){
                 echo "<td align='center'>-</td>";
               }else if($r['status2']==1){
                 echo "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
               }else{
                  echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
               };
                  echo "<td class='center'>$r[kefektifan3]</td>
                        <td class='center'>$r[kefektifan1]</td>
                        <td class='center'>$r[kefektifan2]</td>
                        <td class='center'>$nlirt</td>";

                  echo "</tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>
          </div>
        </div>

        <?php } ?>