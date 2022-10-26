<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">
	<div class="row">
    	<div class="col-sm-12">
			<?php
			/*$inc='<form action="show-editbudget-form.php" method="post">
					<div class="form-group">
						<div class="input-group">
						  <select name="keyword" class="form-group select select-default" data-togglr="select" onchange="this.form.submit()">
						  </select>
						  <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fui-search"></i> ค้นหา</button></span>
						</div>
					  </div>
				</form>';*/
			$inc='<form action="editbudget-form.php" method="post" id="formDefault">
					<div class="form-group">
						  <select name="getDevid" class="form-group select select-primary" data-toggle="select" onchange="this.form.submit()" required data-placeholder="ค้นหาแบบฟอร์ม">
						  	<option value=""></option>';
						  	$sql=mysqli_query($condb,"select * from $db_eform.develop as t1
								inner join $db_eform.tb_orgnew as t2 on(t1.dp_id=t2.dp_id)
								where t1.dev_nopay='0'
								and t1.dev_remove='no'
								and t1.dev_cancel='no'
								and t1.dev_approve='approve'
								order by dev_create desc");
							while($ob=mysqli_fetch_assoc($sql)){
								$inc.='<option value="'.$ob['dev_id'].'">Form No. '.$ob['dev_id'].'&nbsp;&nbsp;หลักสูตร/โครงการ '.$ob['dev_onus'].', '.$ob['dp_name'].'</option>';
							}
						  $inc.='</select>
					  </div>
				</form>';
							
			$inc.='<div class="row">';
			$sql=mysqli_query($condb,"select * from $db_eform.department_type as t1
				right join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id) 
				order by convert(t1.typ_name using tis620) asc,
				convert(t2.dp_name using tis620) asc");
			while($rs=mysqli_fetch_assoc($sql)){
				$inc.='<div class="col-sm-4"><a href="'.$livesite.'finance/show-editbudget-form.php?keyDpid='.$rs['dp_id'].'&keyDpname='.$rs['dp_name'].'"><div class="well"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;'.$rs['dp_name'].'</div></a></div>';
			}
			$inc.='</div>';
            
			echo blockcontent_02('default','<a href="'.$livesite.'profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> บันทึกค่าใช้จ่าย / งบประมาณได้รับในแต่ละโครงการ</a>',$inc);
            ?>
		</div><!--col-->
	</div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	$('select').select2({
		dropdownCssClass: 'select-inverse-dropdown show-select-search',
	});
	
	$('#formDefault').bootstrapValidator({
			fields: {
			  	keyword:{
				  validators: {
                    notEmpty: {
                    }
                }
			  },
			}
		});
});
</script>
</body>
</html>