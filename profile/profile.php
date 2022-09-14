<?php
session_start();

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php';
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/check_login.php");
include("../admin/compcode/include/function.php");
?>
<!doctype html>
<html>
<head>
<title><?php print $titlebar['title'];?></title>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
</head>
<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<div class="row">  
    	
        <!--sidebar-->
		<?php include('../admin/menu_user.php');?>
		
        <div class="col-sm-10">
        
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><i class="fa fa-bars fa-fw"></i> สำหรับบุคลากรคณะฯ</h3>
                    <!--<div class="pull-right"><a href="" class="close"><span aria-hidden="true">&times;</span> ปิด</a></div>-->
                </div>
                <div class="panel-body">
                	<div class="row">
                    
                    	<div class="col-lg-4">
                        	<div class="well">
                            	<?php print '<strong><i class="fa fa-user fa-fw"></i>&nbsp;'.$_SESSION['ses_createname'].'</strong>';?>
								<hr>
                                <div class="btn-group btn-group-justified" role="group">
                                    <a href="<?php print $livesite;?>profile/form_changepw.php" class="btn btn-default"><i class="fa fa-info fa-fw"></i> ข้อมูลส่วนบุคคล</a>
                                    <a href="<?php print $livesite;?>admin/compcode/logout_admin.php" class="btn btn-default"><i class="fa fa-power-off fa-fw"></i>  ออกจากระบบ</a>
                                </div>
                            </div><!--well-->
                        </div><!--col-->
                    	
                        <div class="col-sm-4">
                        	<div class="panel panel-primary">
                            	<div class="panel-heading">
                                	<h3 class="panel-title">ประวัติการขออนุมัติ</h3>
                                </div>
                            	<div class="list-group regBlack_14">
                                  <a href="_showmyproject.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> อนุมัติปฏิบัติงานพัฒนาบุคลากร / บริการวิชาการ</a>
                                  <a href="../academicservice/_showmyacademicservice.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> อนุมัติปฏิบัติงานบริการวิชาการ</a>
                                  <a href="../leave/_showmyproject.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> อนุมัติเดินทางต่างประเทศ</a>
                                </div>
                            </div><!--panel-->
                        </div><!--col-->
                        
                        <?php
						//for boss
						$sqlIsboss=mysqli_query($condb, "select per_isboss from $db_eform.personel_muerp where per_id='$_SESSION[ses_per_id]'");
						$obIsboss=mysqli_fetch_assoc($sqlIsboss);
						if($obIsboss['per_isboss']==1){
						?>
                         <div class="col-sm-4">
                        	<?php
							$qBudgetdep=mysqli_query($condb, "select * from $db_eform.department_budget where dp_id='$_SESSION[ses_per_dept]' and db_year='".budgetyear_02($date_create)."'"); 
							$rBudgetdep=mysqli_fetch_assoc($qBudgetdep);//งบที่ได่รับ
							//$db_budget3=$rBudgetdep['db_budget']-$rBudgetdep['db_budget2'];
							
							//งบที่ใช้ไป
							/*$qBudgetUse=mysql_query("SELECT sum(t2.budget_pay03) as b3, sum(t2.cost_pay03) c3 
								FROM $db_eform.develop as t1 
								inner join $db_eform.develop_course_personel as t2 on(t1.dev_id=t2.dev_id)
								WHERE t1.dev_year='".budgetyear_02($date_create)."' 
								and t1.dev_cancel='no' 
								and t1.dp_id='$_SESSION[ses_per_dept]'");*/
							$qBudgetUse=mysqli_query($condb, "SELECT sum(t2.dev_pay01) as c1 
								FROM $db_eform.develop as t1
								inner join $db_eform.develop_form_budget as t2 on(t1.dev_id=t2.dev_id)
								INNER join $db_eform.budtype as t3 on(t2.bt_id=t3.bt_id)
								where t1.dev_year='".budgetyear_02($date_create)."' 
								and t1.dev_cancel='no'
								and t1.dev_nopay='0'
								and t3.bt_pay='1'
								and t1.dev_remove='no'
								and t1.dp_id='$_SESSION[ses_per_dept]'");
								$rBudgetUse=mysqli_fetch_assoc($qBudgetUse);
								//$db_budget2=$rBudgetUse['b3']+$rBudgetUse['c3'];
							//งบที่ใช้ไป
							
							$db_budget3=$rBudgetdep['db_budget']-$rBudgetUse['c1'];//งบคงเหลือ
							
							$msg='<span class="font-16">งบประมาณพัฒนาบุคลากร / บริการวิชาการของส่วนงานที่ได้รับปีงบประมาณ '.$rBudgetdep['db_year'].' = '.number_format($rBudgetdep['db_budget']).' บาท';
							$msg.='<hr>ใช้ไป '.number_format($rBudgetUse['c1']).' บาท&nbsp;&nbsp;';
							$msg.='<strong>คงเหลือ '.number_format($db_budget3).' บาท</strong></span>';
							echo warning('danger','',$msg);
							?>
                        </div><!--col-->
                        
                        <!--<div class="col-sm-4">
								<div class="alert alert-warning">
									<a href="reportBudgetdivision.php?dev_year=<?php //echo budgetyear_02(date('Y-m-d'));?>" class="alert-link">
									<div class="row">
										<div class="col-xs-3"><i class="fa fa-money fa-3x"></i></div>
										<div class="col-xs-9 text-right"><strong>สรุปค่าใช้จ่ายพัฒนาบุคลากร / บริการวิชาการ 	ของส่วนงานปีงบประมาณ <?php //echo $rBudgetdep['db_year'];?></strong></div>
									</div>
									</a>
								</div>
							</div>--><!--col-->
                            
                            <div class="col-sm-4">
                            
                            	<div class="panel panel-warning">
                                	<div class="panel-heading">
                                    	<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> สรุปงบประมาณของส่วนงานปีงบประมาณ <?php echo $rBudgetdep['db_year'];?></h3>
                                    </div>
                                    <div class="list-group">
                                        <a href="reportBudgetdivision.php?dev_maintype=1&dev_year=<?php echo budgetyear_02(date('Y-m-d'));?>" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ปฏิบัติงานพัฒนาบุคลากร</a>
                                        <a href="reportBudgetdivision.php?dev_maintype=2&dev_year=<?php echo budgetyear_02(date('Y-m-d'));?>" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ปฏิบัติงานบริการวิชาการ</a>
                                    </div>
                                </div>
                            
                            </div><!--col-->
                            <?php
						}
						//for boss
						
						//for finance
						if($_SESSION['ses_du_status']=='5'){
							print '<div class="col-sm-4">
										<div class="panel panel-warning">
											<div class="panel-heading">
												<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> งานการเงินฯ</h3>
											</div>
											<div class="list-group">
											  <a href="'.$livesite.'finance/show-editbudget-form01.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> บันทึกค่าใช้จ่าย</a>           
											  <a href="'.$livesite.'finance/summaryWithdivision.php?dev_year='.budgetyear_02(date('Y-m-d')).'" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> สรุปค่าใช้จ่ายตามส่วนงาน</a>
											  <a href="'.$livesite.'finance/summaryBudget.php?dev_year='.budgetyear_02(date('Y-m-d')).'" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> สรุปค่าใช้จ่ายภาพรวม</a>
											</div>
										</div>
									</div>';
						}
						//for finance
							?>
                    
                    </div><!--row-->
                
                </div><!--body-->
            </div><!--panel-->
            		
        </div><!--col-->

	</div><!--row-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
	$(function(){
		$('.navbar-nav li:eq(0)').addClass('active');
	});
</script>
</body>
</html>