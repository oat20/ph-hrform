<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ทีมบริหาร</title>
    <?php require_once '../lib/css-inc.php';?>
</head>
<body>
    <?php require_once '../inc/navbar02-inc.php';?>

    <div class="container-fluid">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ทีมบริหาร</a></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-10">
                    <button type="button" class="btn btn-info btn-wide btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i> เพิ่มรายชื่อทีมบริหาร</button>
                </div><!--col-->
            </div><!--row-->
            <hr>
            <div class="table-responsive">
            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ตำแหน่ง</th>
                                    <th></th>
                                    <th>สิทธิ์อนุมัติหนังสือ</th>
                                    <th></th>
                                </tr>
                                    </thead>
                                    <tbody>
            <?php
            $sql = "SELECT * FROM
                $db_eform.per_dean as t1
                INNER JOIN $db_eform.personel_muerp as t2 on (t1.per_id = t2.per_id)
                INNER JOIN $db_eform.per_deanposition as t3 on (t1.do_id = t3.do_id)
                ORDER BY t1.de_datestamp desc
            ";
            $result = mysqli_query($condb, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>'.$row['do_title'].'</td>
                        <td>'.$row['per_fnamet'].' '.$row['per_lnamet'].'<br>'.$row['per_email'].'</td>
                        <td>
                            <span class="label label-'.$cf_yn_msg02[$row['do_active']]['color'].' text-uppercase">'.$cf_yn_msg02[$row['do_active']]['icon'].' '.$cf_yn_msg02[$row['do_active']]['label'].'</span>
                        </td>
                        <td>
                            <div class="btn-group btn-sm" role="group">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"
                                data-position="'.$row['do_title'].'"
                                data-muemail="'.$row['per_email'].'"
                                data-check="'.$row['do_active'].'"
                                data-deid="'.$row['de_id'].'"
                                data-doid="'.$row['do_id'].'"><i class="fa fa-pencil fa-fw"></i> แก้ไข</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalDelete"
                                data-position="'.$row['do_title'].'"
                                data-muemail="'.$row['per_email'].'"
                                data-id="'.$row['de_id'].'"><i class="fa fa-trash fa-fw"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>';
                }
            }
                                    ?>
                                    </tbody>
            </table>
            </div>
    </div>

    </div>
    <!--con-->

    <!--modal insert-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">เพิ่ม / แก้ไขข้อมูล</h4>
      </div>
      <form action="./administrative-action.php" method="POST" id="frmData">
      <div class="modal-body">
        <div class="form-group">
            <label>ตำแหน่งบริหาร</label>
            <input type="text" class="form-control" name="do_title" required>
        </div>
        <div class="form-group">
            <label>MU-Email</label>
            <input type="email" class="form-control" name="mumail" 
            data-bv-emailaddress="true"
							data-bv-remote="true"
							data-bv-remote-url="../lib/bootstrapvalidator/mu-emailformat.php"
              required>
        </div>
        <div class="form-group">
            <label>สิทธิ์อนุมัติหนังสือ</label>
            <label class="radio">
                <input type="radio" name="do_active" id="optionsRadios1" value="1" data-toggle="radio"
                data-bv-notempty="true">
                YES
            </label>
            <label class="radio">
                <input type="radio" name="do_active" id="optionsRadios2" value="0" data-toggle="radio">
                NO
            </label>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="de_id" value="">
        <input type="hidden" name="do_id" value="">
        <input type="hidden" name="action" value="insert">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--modal delete-->
<div class="modal fade" tabindex="-1" role="dialog" id="myModalDelete" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ยืนยันลบข้อมูล</h4>
      </div>
      <form action="./administrative-action.php" method="POST">
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" value="">
          <input type="hidden" name="action" value="delete">
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-danger">ยืนยัน</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
<?php require_once '../lib/js-inc.php';?>
<script>
    $(document).ready(function(){
      //update modal
      $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var postion = button.data('position') // Extract info from data-* attributes
        var muemail = button.data('muemail')
        var check = button.data('check')
        var deid = button.data('deid')
        var doid = button.data('doid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body input[name="do_title"]').val(postion);
        modal.find('.modal-body input[name="mumail"]').val(muemail);
        modal.find('.modal-footer input[name="de_id"]').val(deid)
        modal.find('.modal-footer input[name="do_id"]').val(doid)

        if(check == '1'){
          modal.find('.modal-body #optionsRadios1').prop('checked', true);
        }else if(check == '0'){
            modal.find('.modal-body #optionsRadios2').prop('checked', true);
        }

        $('#frmData').bootstrapValidator();
      });

      //delete modal
      $('#myModalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var position = button.data('position') // Extract info from data-* attributes
        var muemail = button.data('muemail') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var content = '<p class="text-center"><strong>'+position+'</strong></p>';
        content += '<p class="text-center">'+muemail+'</p>';
        
        var modal = $(this);
        modal.find('.modal-body').html(content)
        modal.find('.modal-footer input[name="id"]').val(id)
      });
    });
</script>
</body>
</html>