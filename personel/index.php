<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-sm-12">
         	<?php
			$inc='<div class="row">';
			$sql=mysql_query("select * from $db_eform.department_type as t1
				inner join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id) 
				order by convert(t1.typ_name using tis620) asc,
				convert(t2.dp_name using tis620) asc");
			while($rs=mysql_fetch_assoc($sql)){
				$inc.='<div class="col-sm-4"><a href="show_allpersonel.php?getDpid='.$rs['dp_id'].'"><div class="well"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;'.$rs['dp_name'].'</div></a></div>';
			}
			$inc.='</div>';
			echo blockcontent_02('default','<a href="../profile/profile.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;ข้อมูลบุคลากร</a>',$inc);
			?>
        </div><!--col-->
    </div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>