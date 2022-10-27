<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php 
print  '<title>'.$titlebar["title"].'</title>';
include('../lib/css-inc.php');
?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">

	<div class="row">
    	<?php include('../admin/menu_user.php');?>
        
        <div class="col-sm-10">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title">
                    	<a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ข้อมูลงบประมาณที่ได้รับ</a>
                    </h3>
                </div>
                <div class="panel-body">
                	<a href="insertbudget.php" data-toggle="tooltip" data-placement="right" title="เพิ่มรายการ" class="btn btn-default btn-wide"><i class="fa fa-plus"></i> เพิ่มรายการ</a><hr>
                    
                	<div class="row">
                    	
                        <?php
						$sql=mysqli_query($condb,"select db_year from $db_eform.department_budget
								group by db_year
								order by db_year desc");
						while($ob=mysqli_fetch_assoc($sql)){
							
							if($ob['db_year']==budgetyear_02($date_create)){$class='alert alert-success';}else{$class='well';}
							
							print '<div class="col-sm-4">
								<div class="'.$class.'">
									<div class="row">
										<div class="col-sm-6 font-20">
											<strong>ปีงบประมาณ '.$ob['db_year'].'</strong>
										</div>
										<div class="col-sm-6 text-right font-20">';
											$sql_02=mysqli_query($condb,"select sum(db_budget) as sumBudget
															from $db_eform.department_budget
															where db_year='$ob[db_year]'");
											$ob_02=mysqli_fetch_assoc($sql_02);
											print number_format($ob_02['sumBudget'],'2').' บาท';
											print '<br><small><a href="editbudget.php?db_year='.$ob['db_year'].'" data-toggle="tooltip" data-placement="bottom" title="ดูทั้งหมด"><i class="fa fa-eye"></i></a> <a href="removebudget-action.php?db_year='.$ob['db_year'].'" data-toggle="tooltip" data-placement="bottom" title="ลบ" class="text-danger"><i class="fa fa-trash"></i></a></small>
										</div>
									</div>
								</div>
							</div>';
						}
						?>
                    
                    </div><!--row-->
                </div><!--body-->
            </div><!--panel-->
        </div><!--col-->
        
    </div><!--row-->
    
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('[data-toggle="tooltip"]').tooltip('hide');
});
</script>
</body>
</html>