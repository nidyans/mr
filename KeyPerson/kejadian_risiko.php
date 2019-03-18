<?php 
if(isset($tahun)) { ?>
  <h1>Data Laporan Kejadian Risiko</h1>
</div>


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
                <th>Tanggal Dilaporkan</th>
                  <th>Kejadian</th>
                  <th>Tanggal Kejadian</th>
                  <th>Status</th>
                   
                </tr>
              </thead>
              <tbody>
                  <?php
                   
                     $sql = mysql_query("select * from klb where unit='$kodeunit' and YEAR(tgl_laporan)='$tahun' order by id DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                      echo "<tr tr class='gradeX'>
                       <td class='center'>$r[tgl_laporan]</td> 
                       <td class='center'><a href='?halaman=detail_kejadian_risiko&&id=$r[id]'>$r[kejadian]<a></td>  
                         
                    <td class='center'>$r[tgl_kejadian]</td>";
                 if ($r[status]=="0"){   
	            echo "<td align='center'>-</td>"; } 
		        else if ($r[status]=="1"){
				echo  "<td align='center'><i class='fa fa-check' style='font-size:20px;color:black'></i></td>";
				}else{
				echo "<td align='center'><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
			    };
                  
                 
                 
                            echo "</tr>";
                      $no++;
                    }                    
                    ?>
                                
              </tbody>
            </table>

      <?php } else {?>

<h1>Pilih Tahun Risiko</h1>
  </div>
  <div class="container-fluid">
 <form action="?halaman=kejadian_risiko" method="post">
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