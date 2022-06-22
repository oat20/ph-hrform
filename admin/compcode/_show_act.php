<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">
    
	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<h3 class="panel-title pull-left"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ประเภทกิจกรรม</a></h3>
        </div>
    	<div class="panel-body">
        	<p class="text-right"><a href="_form_act.php" class="btn btn-link"><i class="fa fa-plus"></i> เพิ่มรายการ</a></p>
        	<div class="table-responsive">
<table class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
		<th>#</th>
<td class="boldBlack_12">กิจกรรม</td>
    <td class="boldBlack_12">Use</td>
    <td class="boldBlack_12">Action</td>
	</tr>
    </thead>
    <tfoot>
<tr bgcolor="#E0E3CE">
		<th>#</th>
<td class="boldBlack_12">กิจกรรม</td>
    <td class="boldBlack_12">Use</td>
    <td class="boldBlack_12">Action</td>
	</tr>
    </tfoot>
    <tbody>
<?php
$sql_1= "SELECT * from $db_eform.activity
order by act_datestamp desc";
$result_1=mysql_query($sql_1);
$num_rows =mysql_num_rows($result_1);
		for($i=0; $i < $num_rows; $i++){
$rs=mysql_fetch_array($result_1);
?>
  <tr>
  	<td><?php echo $i+1;?></td>
  	<td class="regBlack_13"><?php print $rs['activity'];?></td>
    <td class="regBlack_13 <?php print $cf_yn_msg[$rs['act_use']]['color'];?>"><?php print $cf_yn_msg[$rs['act_use']]['icon'].' '.$cf_yn_msg[$rs['act_use']]['label'];?></td>
      	<td class="regBlack_13" align="center">
        	<!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="_edit_act.php?act_id=<?php print $rs['act_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
                <li><a href="_action_act.php?act_id=<?php print $rs['act_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
              </ul>
            </div>
        </td>
    </tr>  
  <?
}
?>
	</tbody>
</table>
			</div><!--table-->
		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
</html>
