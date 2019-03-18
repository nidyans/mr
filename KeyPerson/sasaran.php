<?php 
if(isset($tahun)) { ?>
  <h1>Data Sasaran</h1>
</div>

<?php
      $user = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));

      ?>


  <div class="row-fluid">
    <div class="span12">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>User</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th width="110px">Tanggal</th>
                <th width="130px">User</th>
                <th>Sasaran 1</th>
                <th>Lihat Detail</th>
                   
                </tr>
              </thead>
              <tbody>
                  <?php

                  $user = mysql_fetch_array(mysql_query("select * from user where user='$namauser'"));

                  $sql = mysql_query("select * from sasaran inner join user on sasaran.user = user.user where  sasaran.unit='$kodeunit' and year(tahun_sasaran)='$year' and user.status='RISK_OWNER' and user.rayon = '$user[rayon]' order by sasaran.id DESC"); 

                  

                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                      echo "<tr tr class='gradeX'>
                       <td class='center'>$r[tahun_sasaran]</td> 
                       <td class='center'>$r[user]</td> 
                       <td class='center'>$r[sasaran1]</td>  
                       <td class='taskOptions'><a href='?halaman=detail_sasaran&&id=$r[id]' class='tip-top' ><i class='icon-ok'></i></a></td>
                         
                    ";
               
                  
                 
                 
                            echo "</tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>

      <?php } else {?>

<h1>Pilih Tahun Sasaran</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=sasaran" method="post">
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