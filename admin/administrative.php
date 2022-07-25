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
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil fa-fw"></i> แก้ไข</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash fa-fw"></i> ลบ</button>
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
      <form action="" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label>ตำแหน่งบริหาร</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>MU-Email</label>
            <input type="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>สิทธิ์อนุมัติหนังสือ</label>
            <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" data-toggle="radio">
                YES
            </label>
            <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="0" data-toggle="radio">
                NO
            </label>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id1" value="">
        <input type="hidden" name="id2" value="">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
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
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
<?php require_once '../lib/js-inc.php';?>
<script>
    $(document).ready(function(){
    });
</script>
</body>
</html>