<?php
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
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
<?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">
	<!--<ol class="breadcrumb">
      <li><a href="<?php //print $livesite;?>report/index.php"><i class="fa fa-arrow-left"></i> Report</a></li>
    </ol>-->
    
	<div class="row">
    	<!--<div class="col-lg-2">
        	<strong><i class="fa fa-filter"></i> Filter</strong><hr>
                <form method="post" action="<?php //echo $_SERVER['PHP_SELF'];?>" id="filterForm">
                    <div class="form-group">
                        <label class="control-label">ระหว่างวันที่</label>
                        <input type="text" class="form-control input-sm" name="keyDevstdate" id="keyDevstdate">
                    </div>
                    <div class="form-group">
                        <label class="control-label">ถึงวันที่</label>
                        <input type="text" class="form-control input-sm" name="keyDevenddate" id="keyDevenddate">
                    </div>
                    <div class="form-group">
                        <label class="control-label">ชื่อบุคลากร</label>
                        <select name="per_id" class="form-control select select-primary select-sm" data-toggle="select">
                        	<option value="">ทั้งหมด</option>
                        	<?php
							/*$sql=mysql_query("select personel.per_id,
									personel.per_pname,
									personel.per_fnamet,
									personel.per_lnamet
									from phper2.personel
									inner join phper2.tb_orgnew on (personel.per_dept=tb_orgnew.dp_id)
									where personel.per_flag='1'
									order by convert(personel.per_fnamet using tis620) asc,
									convert(personel.per_lnamet using tis620) asc");
							while($ob=mysql_fetch_assoc($sql)){
								echo '<option value="'.$ob['per_id'].'">'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</option>';
							}*/
							?>
                        </select>
                    </div>
                    <input name="dev_maintype" type="hidden" value="<?php echo $_GET['dev_maintype'];?>">
                    <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
                </form>
        </div>--><!--col-->
        
        <div class="col-lg-12">
        	<div class="panel panel-info">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="<?php print $livesite;?>report/index.php"><i class="fa fa-arrow-left"></i> รายงานจำแนกรายบุคคล</a></h3>
                </div>
                <div class="panel-body">
                	<!--filter-->
                	<div class="well">
                    	<strong><i class="fa fa-filter"></i> Filter</strong>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="filterForm">
                        	<div class="row">
                            	<div class="col-lg-4">
                                    <div class="form-group">
                                    	<label class="control-label">ระหว่างวันที่</label>
                                        <input type="text" class="form-control input-sm" name="keyDevstdate" id="keyDevstdate" placeholder="ระหว่างวันที่" value="<?php echo $_POST['keyDevstdate'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                	<div class="form-group">
                                    	<label class="control-label">ถึงวันที่</label>
                                        <input type="text" class="form-control input-sm" name="keyDevenddate" id="keyDevenddate" placeholder="ถึงวันที่" value="<?php echo $_POST['keyDevenddate'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                	<div class="form-group">
                                    	<label class="control-label">ชื่อบุคลากร</label>
                                        <select name="per_id" class="form-control select select-primary select-sm" data-toggle="select">
                                            <option value="">&raquo; ทั้งหมด</option>
                                            <?php
                                            $sql=mysql_query("select personel_muerp.per_id,
                                                    personel_muerp.per_pname,
                                                    personel_muerp.per_fnamet,
                                                    personel_muerp.per_lnamet
                                                    from $db_eform.personel_muerp
                                                    inner join $db_eform.tb_orgnew on (personel_muerp.per_dept=tb_orgnew.dp_id)
													inner join $db_eform.personel_status as t3 on(personel_muerp.per_status=t3.ps_id)
                                                    where t3.ps_use='yes'
                                                    order by convert(personel_muerp.per_fnamet using tis620) asc,
                                                    convert(personel_muerp.per_lnamet using tis620) asc");
                                            while($ob=mysql_fetch_assoc($sql)){
												if($ob['per_id']==$_POST['per_id']){
                                                	echo '<option value="'.$ob['per_id'].'" selected>'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</option>';
												}else{
													echo '<option value="'.$ob['per_id'].'">'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</option>';
												}
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <input name="dev_maintype" type="hidden" value="<?php echo $_GET['dev_maintype'];?>">
                            <button type="submit" class="btn btn-primary btn-wide btn-sm"><i class="fa fa-search"></i> Search</button>
                        </form>
                    </div>
                    <!--filter-->
                    
                    <?php
					if(isset($_POST['keyDevstdate']) and isset($_POST['keyDevenddate'])){
						
						if(empty($_POST['per_id'])){
						$sql=mysql_query("select * from $db_eform.develop
												inner join $db_eform.develop_course_personel on (develop.dev_id = develop_course_personel.dev_id)
												inner join $db_eform.personel_muerp on (develop_course_personel.per_id = personel_muerp.per_id)
												inner join $db_eform.personel_group on (personel_muerp.per_group = personel_group.gr_id)
												inner join $db_eform.personel_type on (personel_muerp.per_type = personel_type.pert_id)
												inner join $db_eform.job_academic on (personel_muerp.ja_id = job_academic.ja_id)
												inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
												inner join $db_eform.activity on (develop.act_id = activity.act_id)
												inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
												inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
												inner join $db_eform.develop_location_type on (develop.lt_id = develop_location_type.lt_id)
												where (develop.dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
												or develop.dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
												order by develop.dev_stdate desc,
												develop.dev_enddate desc");
						}else{
								$sql=mysql_query("select * from $db_eform.develop
												inner join $db_eform.develop_course_personel on (develop.dev_id = develop_course_personel.dev_id)
												inner join $db_eform.personel_muerp on (develop_course_personel.per_id = personel_muerp.per_id)
												inner join $db_eform.personel_group on (personel_muerp.per_group = personel_group.gr_id)
												inner join $db_eform.personel_type on (personel_muerp.per_type = personel_type.pert_id)
												inner join $db_eform.job_academic on (personel_muerp.ja_id = job_academic.ja_id)
												inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
												inner join $db_eform.activity on (develop.act_id = activity.act_id)
												inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
												inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
												inner join $db_eform.develop_location_type on (develop.lt_id = develop_location_type.lt_id)
												where (develop.dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
												or develop.dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
												and personel_muerp.per_id='$_POST[per_id]'
												order by develop.dev_stdate desc,
												develop.dev_enddate desc");
						}
								$numRow=mysql_num_rows($sql);
					?>
                	<div class="clearfix">
                    	<div class="pull-left"><strong>พบ <?php echo number_format($numRow);?> รายการ</strong></div>
                    	<div class="pull-right text-right"><a href="groupBypersonel-xls.php?dev_stdate=<?php echo $_POST['keyDevstdate'];?>&dev_enddate=<?php echo $_POST['keyDevenddate'];?>&per_id=<?php echo $_POST['per_id'];?>" target="_blank" class="btn btn-warning btn-wide"><i class="fa fa-file-excel-o"></i> Download Excel</a></div>
                    </div><hr>
                    <div class="table-responsive">
                    	<table class="table table-bordered table-striped regBlack_14">
                        	<thead>
                            	<tr>
                                	<th>ลำดับ</th>
                                    <th>Form No.</th>
                                    <th>ชื่อ</th>
                                    <th>กลุ่ม</th>
                                    <th>ประเภท</th>
                                    <th>ตำแหน่ง</th>
                                    <th>ตวช.</th>
                                    <th>ส่วนงาน</th>
                                    <th>หลักสูตร</th>
                                    <th>สถานที่</th>
                                    <th>วันที่เริ่ม</th>
                                    <th>ถึงวันที่</th>
                                    <th>พัฒนาบุคลากร</th>
                                    <th>บริการวิชาการ</th>
                                    <th>วัตถุประสงค์</th>
                                    <th>ชั่วโมง</th>
                                    <th>กิจกรรม</th>
                                    <th>ยุทธศาสตร์ ม.</th>
                                    <th>ยุทธศาสตร์คณะฯ</th>
                                    <th>งบประมาณ</th>
                                    <th>หลักการ</th>
                                    <th>อนุมัติ</th>
                                    <th>จ่ายจริง</th>
                                    <th>หน่วยงานผู้จัด</th>
                                </tr>
                            </thead>
                            <tfoot>
                            	<tr>
                                	<th>ลำดับ</th>
                                    <th>Form No.</th>
                                    <th>ชื่อ</th>
                                    <th>กลุ่ม</th>
                                    <th>ประเภท</th>
                                    <th>ตำแหน่ง</th>
                                    <th>ตวช.</th>
                                    <th>ส่วนงาน</th>
                                    <th>หลักสูตร</th>
                                    <th>สถานที่</th>
                                    <th>วันที่เริ่ม</th>
                                    <th>ถึงวันที่</th>
                                    <th>พัฒนาบุคลากร</th>
                                    <th>บริการวิชาการ</th>
                                    <th>วัตถุประสงค์</th>
                                    <th>ชั่วโมง</th>
                                    <th>กิจกรรม</th>
                                    <th>ยุทธศาสตร์ ม.</th>
                                    <th>ยุทธศาสตร์คณะฯ</th>
                                    <th>งบประมาณ</th>
                                    <th>หลักการ</th>
                                    <th>อนุมัติ</th>
                                    <th>จ่ายจริง</th>
                                    <th>หน่วยงานผู้จัด</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php							
								while($ob=mysql_fetch_assoc($sql)){
									
									if($ob['dev_maintype']=='1'){ 
										$devMaintype01='<i class="fa fa-check"></i>';
										$devMaintype02='<i class="fa fa-minus"></i>';
									}else if($ob['dev_maintype']=='2'){
										$devMaintype01='<i class="fa fa-minus"></i>'; 
										$devMaintype02='<i class="fa fa-check"></i>';
									}
									
									echo '<tr>
												<td>'.++$r.'</td>
												<td>'.$ob['dev_id'].'</td>
												<td>'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</td>
												<td>'.$ob['gr_title'].'</td>
												<td>'.$ob['pert_name'].'</td>
												<td>'.$ob['job_id'].'</td>
												<td>'.$ob['ja_name'].'</td>
												<td>'.$ob['dp_name'].'</td>
												<td>'.$ob['dev_onus'].'</td>
												<td>'.$ob['dev_place'].' <em>('.$ob['lt_title'].', '.$cf_local[$ob['dev_local']]['name'].')</em></td>
												<td>'.dateFormat($ob['dev_stdate']).'</td>
												<td>'.dateFormat($ob['dev_enddate']).'</td>
												<td class="text-center">'.$devMaintype01.'</td>
												<td class="text-center">'.$devMaintype02.'</td>';
												
												$sql02=mysql_query("select * from $db_eform.develop_form_objective
															inner join $db_eform.develop_type on (develop_form_objective.dvt_id = develop_type.dvt_id)
															where develop_form_objective.dev_id='$ob[dev_id]'
															order by develop_type.dvt_id asc");
												echo '<td>';
												while($ob02=mysql_fetch_assoc($sql02)){
													echo '<p class="regBlack_14"><i class="fa fa-angle-double-right"></i> '.$ob02['dvt_name'].'</p>';
												}
												echo '</td>';
												
												echo '<td>'.$ob['dev_training_hour'].'</td>
												<td>'.$ob['activity'].'</td>
												<td>'.$ob['nameth'].'</td>
												<td>'.$ob['sf_name'].'</td>';
																	
																	$budget='';
																	$qBudget=mysql_query("select * from $db_eform.develop_form_budget
																					inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
																					where develop_form_budget.dev_id='$ob[dev_id]'
																					order by budtype.bt_id asc");
																	while($rBudget=mysql_fetch_assoc($qBudget)){
																		$budget.=$rBudget['bt_name'].', ';
																	}
																
												echo '<td>'.substr($budget,'0','-2').'</td>';
												
												echo '<td>'.number_format($ob['budget_pay01']).'</td>
														<td>'.number_format($ob['budget_pay02']).'</td>
														<td>'.number_format($ob['budget_pay03']).'</td>
														<td>'.$ob['dev_org'].'</td>
											</tr>';
								}
								?>
                            </tbody>
                        </table>
                    </div><!--table-->
                    <?php
					}
					?>
                    
                </div>
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