<?php
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php //include('../inc/navbar02-inc.php');?>
<div class="container-fluid">
	<div class="space1"></div>
    
	<div class="row">
        
        <div class="col-lg-12">
        	<div class="panel panel-info">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="#" onclick="javascript:self.close();"><i class="fa fa-arrow-left"></i> รายงานจำแนกรายบุคคล</a></h3>
                </div>
                <div class="panel-body">
                    <?php
					if(isset($_GET['keyDevstdate']) and isset($_GET['keyDevenddate'])){
						
								$sql=mysqli_query($condb, "select * from $db_eform.develop
												inner join $db_eform.develop_course_personel on (develop.dev_id = develop_course_personel.dev_id)
												inner join $db_eform.personel_muerp on (develop_course_personel.per_id = personel_muerp.per_id)
												inner join $db_eform.personel_group on (personel_muerp.per_group = personel_group.gr_id)
												inner join $db_eform.personel_type on (personel_muerp.per_type = personel_type.pert_id)
												inner join $db_eform.job on (personel_muerp.job_id = job.job_id)
												inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
												inner join $db_eform.activity on (develop.act_id = activity.act_id)
												inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
												inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
												inner join $db_eform.develop_location_type on (develop.lt_id = develop_location_type.lt_id)
												inner join $db_eform.develop_main_type on (develop.dev_maintype = develop_main_type.dm_id)
												inner join $db_eform.develop_type on (develop.dev_type = develop_type.dvt_id)
												where (develop.dev_stdate between '$_GET[keyDevstdate]' and '$_GET[keyDevenddate]'
												or develop.dev_enddate between '$_GET[keyDevstdate]' and '$_GET[keyDevenddate]')
												and personel_muerp.per_id='$_GET[per_id]'
												and develop.dev_maintype='$_GET[dm_id]'
												and develop.dev_cancel = 'no'
												and develop.dev_remove = 'no'
												order by develop.dev_stdate desc,
												develop.dev_enddate desc");
						
								$numRow=mysqli_num_rows($sql);
					?>
                	<div class="clearfix">
                    	<div class="pull-left"><strong>จำนวน <?php echo number_format($numRow);?> รายการ</strong></div>
                    	<div class="pull-right text-right"><a href="groupBypersonel02-xls.php?dev_stdate=<?php echo $_GET['keyDevstdate'];?>&dev_enddate=<?php echo $_GET['keyDevenddate'];?>&dm_id=<?php echo $_GET['dm_id'];?>&per_id=<?php echo $_GET['per_id'];?>" target="_blank" class="btn btn-warning btn-wide btn-sm"><i class="glyphicon glyphicon-print"></i> Print Excel</a></div>
                    </div><hr>
                    </div>
                    
                    <div class="table-responsive">
                    	<table class="table table-bordered table-striped regBlack_14">
                        	<thead>
                            	<tr>
                                	<th>ลำดับ</th>
                                    <th>Form No.</th>
                                    <th>ชื่อ</th>
                                    <th>กลุ่ม</th>
                                    <th>ประเภท</th>
                                    <th>ตำแหน่งงาน</th>
                                    <th>ส่วนงาน</th>
                                    <th>หลักสูตร / โครงการ</th>
                                    <th>สถานที่</th>
                                    <th>วันที่</th>
                                    <th>เวลา</th>
                                    <th>วัตถุประสงค์</th>
                                    <th>ชั่วโมง</th>
                                    <th>กิจกรรม</th>
                                    <th>ยุทธศาสตร์ ม.</th>
                                    <th>ยุทธศาสตร์คณะฯ</th>
                                    <th>ประเภทงบประมาณ</th>
                                    <th>หลักการ</th>
                                    <th>อนุมัติ</th>
                                    <th>จ่ายจริง</th>
                                    <th>หน่วยงานผู้จัด</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
								$sumDevtraininghour=0; $sumBudgetpay01=0; $sumBudgetpay02=0; $sumBudgetpay03=0;							
								while($ob=mysqli_fetch_assoc($sql)){
									
									/*if($ob['dev_maintype']=='1'){ 
										$devMaintype01='<i class="fa fa-check"></i>';
										$devMaintype02='<i class="fa fa-minus"></i>';
									}else if($ob['dev_maintype']=='2'){
										$devMaintype01='<i class="fa fa-minus"></i>'; 
										$devMaintype02='<i class="fa fa-check"></i>';
									}*/
									
									echo '<tr>
												<td>'.++$r.'</td>
												<td>'.$ob['dev_id'].'</td>
												<td>'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</td>
												<td>'.$ob['gr_title'].'</td>
												<td>'.$ob['pert_name'].'</td>
												<td>'.$ob['job_name'].'</td>
												<td>'.$ob['dp_name'].'</td>
												<td>'.$ob['dev_onus'].'</td>
												<td>'.$ob['dev_place'].' <em>('.$ob['lt_title'].', '.$cf_local[$ob['dev_local']]['name'].')</em></td>
												<td>'.dateFormat($ob['dev_stdate']).' - '.dateFormat($ob['dev_enddate']).'</td>
												<td>'.$ob['dev_timebegin'].' - '.$ob['dev_timeend'].'</td>
												<td class="text-center">'.$ob['dm_title'].' ('.$ob['dvt_name'].')</td>
												<td class="text-center">'.Showtraininghour($ob['dev_training_hour']).'</td>';
												
												/*$sql02=mysql_query("select * from $db_eform.develop_form_objective
															inner join $db_eform.develop_type on (develop_form_objective.dvt_id = develop_type.dvt_id)
															where develop_form_objective.dev_id='$ob[dev_id]'
															order by develop_type.dvt_id asc");
												echo '<td>';
												while($ob02=mysql_fetch_assoc($sql02)){
													echo '<p class="regBlack_14"><i class="fa fa-angle-double-right"></i> '.$ob02['dvt_name'].'</p>';
												}
												echo '</td>';*/
												echo '<td>'.$ob['activity'].'</td>';
												echo '
												<td>'.$ob['nameth'].'</td>
												<td>'.$ob['sf_name'].'</td>';
																	
																	//งบประมาณ
																	$budget='';
																	$qBudget=mysqli_query($condb, "select * from $db_eform.develop_form_budget
																					inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
																					where develop_form_budget.dev_id='$ob[dev_id]'
																					order by budtype.bt_id asc");
																	while($rBudget=mysqli_fetch_assoc($qBudget)){
																		$budget.=$rBudget['bt_name'].', ';
																	}
																	$qBudget02=mysqli_query($condb, "SELECT sum(dev_pay01) as sumDevpay01, sum(dev_pay02) as sumDevpay02, sum(dev_pay03) as sumDevpay03 FROM $db_eform.develop_form_budget WHERE dev_id='$ob[dev_id]'");
																	$rBudget02=mysqli_fetch_assoc($qBudget02);
									
												echo '<td>'.substr($budget,'0','-2').'</td>';												
												echo '<td>'.number_format($rBudget02['sumDevpay01']).'</td>
													<td>'.number_format($rBudget02['sumDevpay02']).'</td>
													<td>'.number_format($rBudget02['sumDevpay03']).'</td>';
												//งบประมาณ
												
												//ค่าใช้จ่าย
												/*$cost='';
																	$qBudget=mysql_query("select * from $db_eform.develop_form_cost
																					inner join $db_eform.develop_cost_type on (develop_form_cost.ct_id=develop_cost_type.ct_id)
																					where develop_form_cost.dev_id='$ob[dev_id]'
																					order by convert(develop_cost_type.ct_title using tis620) asc");
																	while($rBudget=mysql_fetch_assoc($qBudget)){
																		$cost.=$rBudget['ct_title'].', ';
																	}
												$qCost02=mysql_query("SELECT sum(dev_pay01) as sumDevpay01 FROM $db_eform.develop_form_cost WHERE dev_id='$ob[dev_id]'");
																	$rCost02=mysql_fetch_assoc($qCost02);
												echo '<td>'.substr($cost,'0','-2').'</td>
														<td>'.number_format($rCost02['sumDevpay01']).'</td>';*/
												//ค่าใช้จ่าย
												
														echo '<td>'.$ob['dev_org'].'</td>
											</tr>';
											$sumDevtraininghour+=$ob['dev_training_hour'];
											$sumBudgetpay01+=$rBudget02['sumDevpay01']; $sumBudgetpay02+=$rBudget02['sumDevpay02']; $sumBudgetpay03+=$rBudget02['sumDevpay03']; 
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>รวม</th>
                                    <th><?php echo number_format($sumDevtraininghour);?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo number_format($sumBudgetpay01);?></th>
                                    <th><?php echo number_format($sumBudgetpay02);?></th>
                                    <th><?php echo number_format($sumBudgetpay03);?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--table-->
                    <?php
					}
					?>
                    
            </div><!--panel-->
        </div><!--col-->
    </div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function() {
	
	//datepicker
	$('#keyDevstdate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#keyDevenddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	
	$('select[name="per_id"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	
	$('#filterForm').bootstrapValidator({
		  fields: {
			   keyDevstdate:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },
			   keyDevenddate:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },
			   /*per_id:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },*/
		  }
	 });	 
	 $('#keyDevstdate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#filterForm').data('bootstrapValidator').revalidateField('keyDevstdate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#keyDevenddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#filterForm').data('bootstrapValidator').revalidateField('keyDevenddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
});
</script>
</body>
</html>