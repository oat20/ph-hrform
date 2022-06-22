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
	<div class="row">

		<div class="col-sm-12">
        
        	<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ตำแหน่งวิชาการ</a></h3>
                    <div class="pull-right"><a href="_form_jobacademic.php" class="btn btn-default"><strong><i class="fa fa-plus"></i> เพิ่มรายการ</strong></a></div>
                </div>
            	<div class="panel-body">
<table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
<td class="boldBlack_12">Action</td>
    <td class="boldBlack_12">ตำแหน่ง</td>
	<td class="boldBlack_12">Use</td>
	</tr>
    </thead>
    <tbody>
<?php
$sql_1= "select * from $db_eform.job_academic
where ja_id != '00'
order by ja_date desc";
$result_1=mysql_query($sql_1);
//echo"$result_1=mysql_query($sql_1);";
//$num_rows =mysql_num_rows($result_1);
while($rs=mysql_fetch_array($result_1)){
?>
  <tr>
  	<td class="regBlack_13">
    	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="_form_jobacademic.php?ja_id=<?php print $rs['ja_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
            <li><a href="_action_jobacademic.php?ja_id=<?php print $rs['ja_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
          </ul>
        </div>
    </td>
      	<td class="regBlack_13" align="center"><?php echo $rs["ja_name"];  ?></td>
    <td class="regBlack_13 <?php print $cf_yn_msg[$rs["ja_use"]]['color'];?>"><?php echo $cf_yn_msg[$rs["ja_use"]]['icon'].' '.$cf_yn_msg[$rs["ja_use"]]['label']; ?></td>
    </tr>
   <?php
}
?>
	</tbody>
</table>

				</div><!--body-->
			</div><!--panel-->

		</div><!--col-12-->

	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
</html>
