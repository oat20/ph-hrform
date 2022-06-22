<?php
session_start();

include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/check_login.php");
include("../admin/compcode/include/function.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

<!--	<h6><a href="profile.php"><i class="fa fa-arrow-left"></i> สรุปค่าใช้จ่ายพัฒนาบุคลากร / บริการวิชาการของส่วนงาน</a></h6>
-->    
    <div class="row">
    	
        <!--<div class="col-lg-2">-->
        	
            <!--filter-->
            <!--<strong><i class="fa fa-filter"></i> Filter</strong><hr>
            <div class="list-group">
            	<?php
				/*$dev_year=budgetyear_02(date('Y-m-d'));
				$dev_year02=$dev_year-5;
				for($y=$dev_year;$y>=$dev_year02;$y--){
					if($_GET['dev_year'] == $y){
              			echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$y.'" class="list-group-item active"><i class="fa fa-angle-double-right fa-fw"></i> ปีงบประมาณ <strong>'.$y.'</strong></a>';
					}else{
						echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$y.'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ปีงบประมาณ <strong>'.$y.'</strong></a>';
					}
				}*/
			  ?>
            </div>-->
            <!--filter-->
        
        <!--</div>--><!--col-->
        
        <div class="col-lg-12">
        
            	<?php
				//$sql01=mysql_query("select * from phper2.develop_main_type where dm_use='yes' order by dm_id asc");
				//while($ob01=mysql_fetch_assoc($sql01)){
				?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a href="profile.php"><i class="fa fa-arrow-left"></i> สรุปค่าใช้จ่ายพัฒนาบุคลากร / บริการวิชาการของส่วนงานปีงบประมาณ <?php echo $_GET['dev_year'];?></a></h3>
                        </div>
                        	<!--<ul class="nav nav-pills regBlack_14">
                            	<li role="presentation"><a href="#"><strong>ปีงบประมาณ</strong></a></li>
                                <?php
							  /*$dev_year=budgetyear_02(date('Y-m-d'));
								$dev_year02=$dev_year-5;
								for($y=$dev_year;$y>=$dev_year02;$y--){
									if($_GET['dev_year'] == $y){
										echo '<li class="active"><a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$y.'"><i class="fa fa-angle-double-right"></i> '.$y.'</a></li>';
									}else{
										echo '<li><a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$y.'"><i class="fa fa-angle-double-right"></i> '.$y.'</a></li>';
									}
								}*/
								?>
                            </ul><hr>-->
                        	<div class="table-responsive">
                            	<table class="table table-striped table-bordered regBlack_12">
                                	<thead>
                                    	<tr>
                                        	<th>#</th>
                                            <th>Form No.</th>
                                            <th>เรื่อง</th>
                                            <th>วันที่</th>
                                            <th>ถึง</th>
                                            <th>จำนวนผู้เข้าร่วม</th>
                                            <th>วัตถุประสงค์</th>
                                            <th>งบประมาณ</th>
                                            <th>หลักการ</th>
                                            <th>อนุมัติ</th>
                                            <th>จ่ายจริง</th>
                                            <th>ค่าใช้จ่าย</th>
                                            <th>หลักการ</th>
                                            <th>อนุมัติ</th>
                                            <th>จ่ายจริง</th>
                                            <!--<th>ดาวน์โหลดแบบฟอร์ม</th> -->
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                    	<?php
										$budget_pay01='0';
										$budget_pay02='0';
										$budget_pay03='0';
										
										/*$sql02=mysql_query("select * from $db_eform.develop as a
													inner join $db_eform.develop_course_personel as b on (a.dev_id = b.dev_id)
													inner join $db_eform.personel_muerp as c on (b.per_id = c.per_id)
													where a.dev_year = '$_GET[dev_year]'
													and c.per_dept = '$_SESSION[ses_per_dept]'
													order by a.dev_stdate desc,
													a.dev_enddate desc,
													convert (c.per_fnamet using tis620) asc,
													convert (c.per_lnamet using tis620) asc");*/
										$sql02=mysql_query("select * from $db_eform.develop as a
													inner join $db_eform.develop_main_type as t4 on(a.dev_maintype=t4.dm_id)
													inner join $db_eform.develop_type as t5 on(a.dev_type=t5.dvt_id)
													inner join $db_eform.personel_muerp as t6 on(a.dev_perid=t6.per_id)
													where a.dp_id = '$_SESSION[ses_per_dept]'
													and a.dev_year='$_GET[dev_year]'
													and a.dev_cancel='no'
													order by a.dev_stdate desc,
													a.dev_enddate desc");
										while($ob02=mysql_fetch_assoc($sql02)){
											
											//จำนวนผู้เข้าร่วม
											$sql=mysql_query("select count(per_id) as countPerid from $db_eform.develop_course_personel where dev_id='$ob02[dev_id]'");
											$rs=mysql_fetch_assoc($sql);
											//จำนวนผู้เข้าร่วม
											
											//งบประมาณ
											$budget='';
											$qBudget=mysql_query("select * from $db_eform.develop_form_budget
															inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
															where develop_form_budget.dev_id='$ob02[dev_id]'
															order by budtype.bt_id asc");
											while($rBudget=mysql_fetch_assoc($qBudget)){
												$budget.=$rBudget['bt_name'].' <strong>('.number_format($rBudget['dev_pay01']).')</strong>, ';
											}
											$qBudget02=mysql_query("select sum(dev_pay01) as sumDevpay01,
												sum(dev_pay02) as sumDevpay02,
												sum(dev_pay03) as sumDevpay03
												from $db_eform.develop_form_budget
												where dev_id='$ob02[dev_id]'");
											$rBudget02=mysql_fetch_assoc($qBudget02);
											//งบประมาณ										
											//summary budget
											$budget_pay01+=$rBudget02['sumDevpay01'];
											$budget_pay02+=$rBudget02['sumDevpay02'];
											$budget_pay03+=$rBudget02['sumDevpay03'];
											//summary budget
											
											//ค่าใช้จ่าย
											$cost='';
											$qCost=mysql_query("select * from $db_eform.develop_cost_type
															inner join $db_eform.develop_form_cost on (develop_cost_type.ct_id = develop_form_cost.ct_id)
															where develop_form_cost.dev_id = '$ob02[dev_id]'
															order by develop_cost_type.ct_id asc");
											while($rCost=mysql_fetch_assoc($qCost)){
												$cost.=$rCost['ct_title'].' <strong>('.number_format($rCost['dev_pay01']).')</strong>, ';
											}
											$qCost02=mysql_query("select sum(dev_pay01) as sumDevpay01,
												sum(dev_pay02) as sumDevpay02,
												sum(dev_pay03) as sumDevpay03
												from $db_eform.develop_form_cost
												where dev_id='$ob02[dev_id]'");
											$rCost02=mysql_fetch_assoc($qCost02);
											//งบประมาณ										
											//summary budget
											$cost_pay01+=$rCost02['sumDevpay01'];
											$cost_pay02+=$rCost02['sumDevpay02'];
											$cost_pay03+=$rCost02['sumDevpay03'];
											//summary budget
											
											echo '<tr>
														<td>'.++$r.'</td>
														<td>'.$ob02['dev_id'].'<br><i class="glyphicon glyphicon-user"></i> '.$ob02['per_fnamet'].' '.$ob02['per_lnamet'].'</td>
														<td>'.$ob02['dev_onus'].'</td>
														<td>'.dateFormat($ob02['dev_stdate']).'</td>
														<td>'.dateFormat($ob02['dev_enddate']).'</td>
														<td class="text-center">
															<a data-toggle="modal" href="personeljoin-inc.php?dev_id='.$ob02['dev_id'].'" data-target="#modal'.$ob02['dev_id'].'">'.number_format($rs['countPerid']).'</a>
														</td>
														<td>'.$ob02['dm_title'].' <i class="fui-arrow-right"></i> '.$ob02['dvt_name'].'</td>
														<td>'.substr($budget,'0','-2').'</td>
														<td>'.number_format($rBudget02['sumDevpay01'],'2').'</td>
														<td><strong>'.number_format($rBudget02['sumDevpay02'],'2').'</strong></td>
														<td>'.number_format($rBudget02['sumDevpay02'],'2').'</td>
														<td>'.substr($cost,'0','-2').'</td>
														<td>'.number_format($rCost02['sumDevpay01'],'2').'</td>
														<td><strong>'.number_format($rCost02['sumDevpay02'],'2').'</strong></td>
														<td>'.number_format($rCost02['sumDevpay03'],'2').'</td>';
														//echo '<td class="text-center"><a href="'.$livesite.'form/print-form01-pdf.php?getTrackid='.$ob02['dev_trackid'].'" target="_blank"><i class="fa fa-download"></i></a></td>';
													echo '</tr>';
													
													//modal รายชื่อผู้เข้าร่วม
													echo '<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal'.$ob02['dev_id'].'">
															  <div class="modal-dialog modal-lg" role="document">
																<div class="modal-content">
																  ...
																</div>
															  </div>
															</div>';
													//modal รายชื่อผู้เข้าร่วม
										}
										?>
                                    </tbody>
                                    <tfoot>
                                    	<tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>รวม</th>
                                            <th><?php echo number_format($budget_pay01,'2');?></th>
                                            <th><?php echo number_format($budget_pay02,'2');?></th>
                                            <th><?php echo number_format($budget_pay03,'2');?></th>
                                            <th>รวม</th>
                                            <th><?php echo number_format($cost_pay01,'2');?></th>
                                            <th><?php echo number_format($cost_pay02,'2');?></th>
                                            <th><?php echo number_format($cost_pay03,'2');?></th>
                                            <!--<th></th> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!--table-->
                    </div><!--panel-->
                <?php
				//}
				?>
                        
        </div>
        
    </div><!--row-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>