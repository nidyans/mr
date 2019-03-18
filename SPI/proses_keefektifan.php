<?php session_start();  ?>
<?php
	include "../koneksi.inc.php";
    
    $sql_risk_owner=mysql_query("select * from user WHERE user='$namauser'");
    $row_risk_owner=mysql_fetch_array($sql_risk_owner); 
    $user1 = $row_risk_owner['3'];
    $data = "";
    $cek = mysql_num_rows(mysql_query("SELECT * FROM table_keefektifan WHERE id_risiko='$id'"));
    if ($cek > 0){
        $data = "ada";
    } else{
       $data = "false"; 
    }
   $tgl=date('Y-m-d');
    if ($hak_akses=="SPI"){
    $sql_risk=mysql_query("select * from risiko WHERE id='$id'");
    $row_risk=mysql_fetch_array($sql_risk); 
    $sql_risk2=mysql_query("select * from table_keefektifan WHERE id_risiko='$id'");
    $row_risk2=mysql_fetch_array($sql_risk2); 


    if ($row_risk['21'] == "0" and $row_risk['22'] == "0" and $row_risk['23'] == "0" ){
        if ($data == "false"){
	
	
	$modal=mysql_query("UPDATE risiko SET kefektifan1 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("insert into table_keefektifan values('','$id','$efektifan','$user1',now(),'0','-','-','0','-','-','$ctt1','-','-')");

	header("location:modul.php?halaman=detail_risiko&&id=$id"); } else {
     
    $modal=mysql_query("UPDATE risiko SET kefektifan1 = '$efektifan' WHERE id ='$id'");
    $sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan1= '$efektifan', user1='$user1',tgl_1='$tgl',ctt3='$ctt1' WHERE id_risiko='$id'");
    header("location:modul.php?halaman=detail_risiko&&id=$id");
        
    }

    }

	else if($row_risk['21'] != "0" or $row_risk['22'] !== "0" or $row_risk['23'] !== "0"){

    if ($data == "ada"){
    $modal=mysql_query("UPDATE risiko SET kefektifan1 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan1= '$efektifan', user1='$user1',tgl_1='$tgl',ctt3='$ctt1' WHERE id_risiko='$id'");
	header("location:modul.php?halaman=detail_risiko&&id=$id");} 
    else {
    $modal=mysql_query("UPDATE risiko SET kefektifan1 = '$efektifan' WHERE id ='$id'");
    $sql_efektifitas=mysql_query("insert into table_keefektifan values('','$id','$efektifan','$user1',now(),'0','-','-','0','-','-','$ctt1','-','-')");

    header("location:modul.php?halaman=detail_risiko&&id=$id");

    }
    } 
    
 else{
    $tgl=date('Y-m-d');
	
     $id=$_POST['id'];
	$modal=mysql_query("UPDATE risiko SET kefektifan1 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan1= '$efektifan', user1='$user1',tgl_1='$tgl',ctt3='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id");
    }
	} 
	
     else if ($hak_akses == ADMIN) {
    $tgl=date('Y-m-d');
    $sql_risk=mysql_query("select * from risiko WHERE id='$id'");
    $row_risk=mysql_fetch_array($sql_risk ); 
    $sql_risk2=mysql_query("select * from table_keefektifan WHERE id_risiko='$id'");
    $row_risk2=mysql_fetch_array($sql_risk2); 

    if ($row_risk['21'] == "0" and $row_risk['22'] == "0" and $row_risk['23'] == "0"){
        if ($data == "false"){

    $id=$_POST['id'];
	
	
 
	$modal=mysql_query("UPDATE risiko SET kefektifan2 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("insert into table_keefektifan values('','$id','0','-','-','$efektifan','$user1','$tgl','0','-','-','-','$ctt1','-')");

	header("location:modul.php?halaman=detail_risiko&&id=$id");}
    else {
      $tgl=date('Y-m-d');

    $id=$_POST['id'];
    $modal=mysql_query("UPDATE risiko SET kefektifan2 = '$efektifan' WHERE id ='$id'");
    $sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan2= '$efektifan', user2='$user1',tgl_2='$tgl',ctt4='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id");  

    }
    
     }
	

	else if ($row_risk['21'] != "0" or $row_risk['22'] !== "0" or $row_risk['23'] !== "0"){
	$tgl=date('Y-m-d');
    if($data == "ada"){
    $id=$_POST['id'];
	$modal=mysql_query("UPDATE risiko SET kefektifan2 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan2= '$efektifan', user2='$user1',tgl_2='$tgl',ctt4='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id"); }		

else {
     $id=$_POST['id'];
    $tgl=date('Y-m-d');
    
 
    $modal=mysql_query("UPDATE risiko SET kefektifan2 = '$efektifan' WHERE id ='$id'");
    $sql_efektifitas=mysql_query("insert into table_keefektifan values('','$id','0','-','-','$efektifan','$user1','$tgl','0','-','-','-','$ctt1','-')");

    header("location:modul.php?halaman=detail_risiko&&id=$id");

}

}

    else{
    	
    $tgl=date('Y-m-d');
	
   
	$modal=mysql_query("UPDATE risiko SET kefektifan2 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan2= '$efektifan', user2='$user1',tgl_2='$tgl',ctt4='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id");
    }
	} 
	else{
		
   
    $sql_risk=mysql_query("select * from risiko WHERE id='$id'");
    $row_risk=mysql_fetch_array($sql_risk ); 
    $sql_risk2=mysql_query("select * from table_keefektifan WHERE id_risiko='$id'");
    $row_risk2=mysql_fetch_array($sql_risk2);

    if ($row_risk['21'] == "0" and $row_risk['22'] == "0" and $row_risk['23'] == "0"){
    
    if($data == "false"){
	$tgl=date('Y-m-d');
	
    
	$modal=mysql_query("UPDATE risiko SET kefektifan3 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("insert into table_keefektifan values('','$id','0','-','-','0','-','-','$efektifan','$user1','$tgl','-','-','$ctt1')");



	header("location:modul.php?halaman=detail_risiko&&id=$id"); } 
   else {
    $tgl=date('Y-m-d');

    
    $modal=mysql_query("UPDATE risiko SET kefektifan3 = '$efektifan' WHERE id ='$id'");
    $sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan3= '$efektifan', user3='$user1',tgl3='$tgl',ctt5='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id");

   }

    }
    

	else if($row_risk['21'] != "0" or $row_risk['22'] !== "0" or $row_risk['23'] !== "0"){

	$tgl=date('Y-m-d');
    if($data == "ada"){
    
	$modal=mysql_query("UPDATE risiko SET kefektifan3 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan3= '$efektifan', user3='$user1',tgl3='$tgl',ctt5='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id"); }		
   else {
       $tgl=date('Y-m-d');
    
    
    $modal=mysql_query("UPDATE risiko SET kefektifan3 = '$efektifan' WHERE id ='$id'");
    $sql_efektifitas=mysql_query("insert into table_keefektifan values('','$id','0','-','-','0','-','-','$efektifan','$user1','$tgl','-','-','$ctt1')");



    header("location:modul.php?halaman=detail_risiko&&id=$id");

   }


      }
    else{
		$tgl=date('Y-m-d');

    
	$modal=mysql_query("UPDATE risiko SET kefektifan3 = '$efektifan' WHERE id ='$id'");
	$sql_efektifitas=mysql_query("UPDATE table_keefektifan SET kefektifan3= '$efektifan', user3='$user1',tgl3='$tgl',ctt5='$ctt1' WHERE id_risiko='$id'");
    
    header("location:modul.php?halaman=detail_risiko&&id=$id"); 
	}    
   }
	
	
?>