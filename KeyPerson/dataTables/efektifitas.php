<?php session_start();  ?>
<?php include "koneksi.inc.php" ?>
<?php
  
    $modal=mysql_query("SELECT * FROM risiko WHERE id='$id'");
    $r=mysql_fetch_array($modal);
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">KEEFEKTIFAN</h4>
        </div>

        <div class="modal-body">
          <form action="proses_keefektifan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
            <div class="form-group" style="padding-bottom: 20px;">
            <label for="Modal Name">Keefektifan</label>
            <input type="hidden" name="id"  class="form-control" value="<?php echo $id ?>" />
            <td align="left"><select name="efektifan" id="status1">
                   <option <?php if( $r['kefektifan1']=="0"){echo "selected"; } ?> value="0">-</option>
                   <option <?php if( $r['kefektifan1']=="5"){echo "selected"; } ?> value="5">Sangat Baik</option>
                   <option  <?php if( $r['kefektifan1']=="4"){echo "selected"; } ?> value="4">Baik</option>
                   <option <?php if( $r['kefektifan1']=="3"){echo "selected"; } ?> value="3">Cukup</option>
                   <option <?php if( $r['kefektifan1']=="2"){echo "selected"; } ?> value="2">Kurang</option>
                   <option <?php if( $r['kefektifan1']=="1"){echo "selected"; } ?> value="1">Sangat Kurang</option>
                   </select></td>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Description">Catatan</label>
            <textarea name="ctt1"  class="form-control"></textarea>
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