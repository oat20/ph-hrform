<?php
session_start();

include('include/config.php');
include('check_login.php');
require_once '../../lib/mysqli.php';
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<?php 
print '<title>'.$titlebar['title'].'</title>';
include('../../lib/css-inc.php');
?>
</head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-12">
        
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ส่วนงาน</a></h3>
                </div>
            	<div class="panel-body">
                	<p class="text-right">
                    <a href="_form_org.php" class="btn btn-info btn-wide"><i class="fa fa-plus fa-fw"></i> เพิ่มรายการ</a>
                  </p>
                  <div class="table-responsive">
<table class="table table-striped">
	<thead>
<tr   bgcolor="#E0E3CE">
    <th>รหัสส่วนงาน</th>
    <th class="boldBlack_12">ส่วนงาน</th>
    <th>หัวหน้าส่วนงาน</th>
    <th class="boldBlack_12"></th>
</tr>
	</thead>
    <tfoot>
<tr   bgcolor="#E0E3CE">
    <th>รหัสส่วนงาน</th>
    <th class="boldBlack_12">ส่วนงาน</th>
    <th>หัวหน้าส่วนงาน</th>
    <th class="boldBlack_12"></th>
</tr>
	</tfoot>
    <tbody>
 <?php
$sql_hot = "SELECT *, b.dp_id as dp_id 
FROM $db_eform.tb_orgnew AS b 
left join $db_eform.department_type AS a ON ( a.typ_id = b.typ_id )
left join $db_eform.per_boss on (b.dp_id = per_boss.dp_id)
left join $db_eform.personel_muerp on (per_boss.per_id = personel_muerp.per_id) 
ORDER BY convert(a.typ_name using tis620) ASC , 
convert(b.dp_name using tis620) ASC";
$exec_hot=mysqli_query($condb, $sql_hot);
$swap=1;
while($rs=mysqli_fetch_array($exec_hot)){
?>
  <tr>
    <td><?php echo $rs['dp_code'];?></td>
    <td><?php echo $rs['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$rs["dp_name"];  ?></td>
   <td><?php print $rs['per_fnamet'].' '.$rs['per_lnamet'];?><br><?php echo $rs['per_email'];?></td>
   <td class="regBlack_13">
    	<!-- Single button -->
        <div class="btn-group btn-group-sm">
            <a href="_edit_org.php?dp_id=<?php print $rs['dp_id'];?>" class="btn btn-info"><i class="fa fa-pencil fa-fw"></i> แก้ไข</a>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModalDelete"
            data-dpid="<?php echo $rs['dp_id'];?>"
            data-dpname="<?php echo $rs['dp_name'];?>"
            data-action="remove"><i class="fa fa-trash fa-fw"></i> ลบ</a>
        </div>
    </td>
  </tr>					  		  
  <?
}
?>
	</tbody>
</table>
</div>
				</div><!--body-->
			</div><!--panel-->

		</div><!--col-->

	</div><!--row-->
</div><!--container-->

<div class="modal fade" tabindex="-1" role="dialog" id="myModalDelete" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ยืนยันลบข้อมูล</h4>
      </div>
      <form action="./_action_org.php" method="POST">
      <div class="modal-body">
        <h4 class="text-center" id="dp_name"></h4>
        <input type="hidden" name="dp_id">
        <input type="hidden" name="action">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-danger">ยืนยัน</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include('../../lib/js-inc.php');?>
<script>
  $(function(){
    $('#myModalDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var dp_name = button.data('dpname') // Extract info from data-* attributes
      var dp_id = button.data('dpid');
      var action = button.data('action');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body #dp_name').html(dp_name);
      modal.find('.modal-body input[name="dp_id"]').val(dp_id);
      modal.find('.modal-body input[name="action"]').val(action);
    });
  });
</script>
</body>
</html>
