<?php
//proses delete user
    include "koneksi.php";
    
if(!empty($id)){
	$query="delete from user where id='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
	
	?>
    <script>alert("Data user Berhasil Dihapus !"); window.location="Datauser.php";</script>
	
    <?php
}else{ ?>
	<script>alert("Data user Gagal dihapus !");</script>
<?php
}

} else{
	die ("Access Denied");
}
?>