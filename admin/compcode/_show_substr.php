<?php
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
<body>
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">

	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<h3 class="panel-title pull-left"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ยุทธศาสตร์มหาวิทยาลัยฯ</a></h3>
        </div>
    	<div class="panel-body">
        	<p class="pull-right"><a href="_form_str.php" class="btn btn-link"><i class="fa fa-plus"></i> เพิ่มรายการ</a></p>
        	<table class="table table-striped">
	<thead>
<tr   bgcolor="#E0E3CE">
	<th class="boldBlack_12">ยุทธศาสตร์</th>
	<th class="boldBlack_12">Use</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
 <?php
$sql_hot = "select * from $db_eform.sub_strategic
order by modified desc";
$exec_hot=mysql_query($sql_hot);
while($rs=mysql_fetch_array($exec_hot))
			{
?>
  <tr>
	<td width=""    class="regBlack_13"><? echo $rs["nameth"];?></td>
	<td width=""   class="regBlack_13 <?php print $cf_yn_msg[$rs['ss_use']]['color'];?>"><?php print $cf_yn_msg[$rs['ss_use']]['icon'].' '.$cf_yn_msg[$rs['ss_use']]['label'];?></td>
    <td>
    	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="_edit_str.php?id=<?php print $rs['id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
            <li><a href="_action_str.php?id=<?php print $rs['id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
          </ul>
        </div>
    </td>
  </tr>
					  		  <?php
}
?>
	</tbody>
</table>
        </div><!--body-->
    </div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
</html>
