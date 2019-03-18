<?php session_start();  ?>
<?php
    include "../koneksi.inc.php";

	$modal=mysql_query("SELECT * FROM risiko WHERE id='$id'");
	$r=mysql_fetch_array($modal);
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">SETUJU/TOLAK RISIKO</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_approve1.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Approve</label>
                    <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />

     				<td align="left"><select name="status1" id="status1">
                   <option <?php if( $r['status']=="0"){echo "selected"; } ?> value="0">-</option>
                   <option <?php if( $r['status']=="1"){echo "selected"; } ?> value="1">setuju</option>
                  <option <?php if( $r['status']=="2"){echo "selected"; } ?> value="2">tolak</option>
                   </select></td>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">Catatan</label>
     				<textarea name="ctt1" id="ctt1"  class="form-control"></textarea>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>


            </div>

           
        </div>
    </div>