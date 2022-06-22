<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<?php
	$sql=mysql_query("select * from $db_eform.develop
			inner join $db_eform.tb_orgnew on (develop.dp_id = tb_orgnew.dp_id)
			inner join $db_eform.develop_location_type on (develop.lt_id = develop_location_type.lt_id)
			inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
			inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
			inner join $db_eform.personel_muerp on (develop.dev_perid = personel_muerp.per_id)
			inner join $db_eform.develop_main_type as t7 on(develop.dev_maintype=t7.dm_id)
			inner join $db_eform.develop_type as t8 on(develop.dev_type=t8.dvt_id)
			where develop.dev_id='$_REQUEST[getDevid]'");
	$ob=mysql_fetch_assoc($sql);
	$dev_bookfrom=explode('+',$ob['dev_bookfrom']);
	?>
                
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">
            	<a href="show-editbudget-form.php?keyDpid=<?php echo $ob['dp_id'];?>"><i class="fa fa-arrow-left"></i> บันทึกค่าใช้จ่าย</a>
            </h3>
        </div>
        <div class="panel-body">
        	<?php echo warning($cf_approve[$ob['dev_approve']]['color'],$cf_approve[$ob['dev_approve']]['icon'],$cf_approve[$ob['dev_approve']]['name']);?>
            <div class="row">          	
            	<div class="col-sm-6">
                	<dl class="dl-horizontal">
                    	<dt>Form No.</dt>
                      <dd><?php echo $ob['dev_id'];?></dd>
                      <dt>ส่วนงาน</dt>
                      <dd><?php echo $ob['dp_name'];?></dd>
                      <dt>ตามหนังสือ</dt>
                      <dd><?php echo $dev_bookfrom['0'];?> <strong>ที่</strong> <?php echo $dev_bookfrom['1'];?> <strong>ลงวันที่</strong> <?php echo dateThai($dev_bookfrom['2']);?> <strong>เรื่อง</strong> <?php echo $dev_bookfrom['3'];?></dd>
                      <dt>หลักสูตร/โครงการ</dt>
                      <dd><?php echo $ob['dev_onus'];?></dd>
                      <dt>ระหว่างวันที่</dt>
                      <dd><?php echo dateformat_03($ob['dev_stdate']).' ถึง '.dateformat_03($ob['dev_enddate']);?></dd>
                      <dt>วัตถุประสงค์</dt>
                      <dd><?php echo $ob['dm_title'].' &raquo; '.$ob['dvt_name'];?></dd>
                      <dt>สถานที่จัด</dt>
                      <dd><?php echo $ob['dev_place'];?></dd>
                      <dt>ประเภทสถานที่</dt>
                      <dd><?php echo $ob['lt_title'];?></dd>
                      <dt>หน่วยงานผู้จัด</dt>
                      <dd><?php echo $ob['dev_org'];?></dd>
                      <dt>จำนวนชั่วโมงที่ใช้จริง</dt>
                      <dd><?php echo Showtraininghour($ob['dev_training_hour']);?></dd>
                      
                      <dt>ยุทธศาสตร์มหาวิทยาลัยฯ</dt>
                      <dd><?php echo $ob['nameth'];?></dd>
                      <dt>ยุทธศาสตร์คณะฯ</dt>
                      <dd><?php echo $ob['sf_name'];?></dd>
                      <dt>จำนวนผู้เข้าร่วม</dt>
                      <dd>
                      	<?php
						$sql05=mysql_query("select * from $db_eform.develop_course_personel									
									where develop_course_personel.dev_id='$ob[dev_id]'");
						$row05=mysql_num_rows($sql05);
						echo number_format($row05).' ท่าน';
						?>
                      </dd>
                      <!--<dt>จึงเรียนมาเพื่อ</dt>
                      <dd><?php //echo $cf_devformstatus[$ob['dev_formstatus']]['label'].'&nbsp;'.$ob['dev_formstatus_comment'];?></dd>-->
                      <dt>ผู้บันทึกข้อมูล</dt>
                      <dd><?php echo $ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'];?></dd>
                    </dl>
                </div><!--col-->
                
                <div class="col-sm-6">
                	
                    <form method="post" action="editbudget-form-action.php" id="defaultForm">
                    	<legend>บันทึกค่าใช้จ่าย</legend>
                    	<div class="form-group">
                        	<label class="control-label"><strong>จากแหล่งเงิน:</strong></label>
                            <?php
						$qBudget=mysql_query("select * from $db_eform.develop_form_budget where dev_id='$ob[dev_id]'");
						while($rBudget=mysql_fetch_assoc($qBudget)){
							$bt_id[]=$rBudget['bt_id'];
							$bt_dev_pay01[$rBudget['bt_id']]=$rBudget['dev_pay01'];
							$bt_dev_pay02[$rBudget['bt_id']]=$rBudget['dev_pay02'];
							$bt_dev_pay03[$rBudget['bt_id']]=$rBudget['dev_pay03'];
						}
						?>
                    	<table class="table">
                        	<thead>
                            	<tr class="regBlack_14">
                                	<th></th>
                                    <th>หลักการ</th>
                                    <th>อนุมัติ</th>
                                    <th>จ่ายจริง</th>
                                </tr>
                            </thead>
                        	<tbody>
								<?php
                                $qBudget2=mysql_query("select * from $db_eform.budtype
									inner join $db_eform.develop_payfrom as t2 on(budtype.pf_id=t2.pf_id)
                                        where budtype.bt_flag='1'
                                        order by t2.pf_id asc,
										budtype.bt_id asc");
								$rowBudget2=mysql_num_rows($qBudget2);
								for($r=0;$r<$rowBudget2;$r++){
									$obBudget2=mysql_fetch_assoc($qBudget2);
									if(@in_array($obBudget2['bt_id'], $bt_id)){
										print '<tr>
													<td><label class="checkbox"><input name="bt_id[]" type="checkbox" value="'.$obBudget2['bt_id'].'" data-toggle="checkbox" checked> '.$obBudget2['pf_title'].' &raquo; '.$obBudget2['bt_name'].'</label></td>
													<td><input name="bt_dev_pay01'.$obBudget2['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$bt_dev_pay01[$obBudget2['bt_id']].'"></td>
													<td><input name="bt_dev_pay02'.$obBudget2['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$bt_dev_pay02[$obBudget2['bt_id']].'"></td>
													<td><input name="bt_dev_pay03'.$obBudget2['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$bt_dev_pay03[$obBudget2['bt_id']].'"></td>
												</tr>';
									}else{
										print '<tr>
												<td><label class="checkbox"><input name="bt_id[]" type="checkbox" value="'.$obBudget2['bt_id'].'" data-toggle="checkbox"> '.$obBudget2['pf_title'].' &raquo; '.$obBudget2['bt_name'].'</label></td>
												<td><input name="bt_dev_pay01'.$obBudget2['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
												<td><input type="number" name="bt_dev_pay02'.$obBudget2['bt_id'].'" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
												<td><input type="number" name="bt_dev_pay03'.$obBudget2['bt_id'].'" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
											</tr>';
									}
                                }
                                ?>
                        	</tbody>
                        </table>
                        </div>
                        
                        <div class="form-group">
                        	<label class="control-label"><strong>แบ่งเป็นค่าใช้จ่าย:</strong></label>
                            <?php
                    	$qCost=mysql_query("select * from $db_eform.develop_form_cost where dev_id='$ob[dev_id]'");
						while($rCost=mysql_fetch_assoc($qCost)){
							$ct_id[]=$rCost['ct_id'];
							$ct_dev_pay01[$rCost['ct_id']]=$rCost['dev_pay01'];
							$ct_dev_pay02[$rCost['ct_id']]=$rCost['dev_pay02'];
							$ct_dev_pay03[$rCost['ct_id']]=$rCost['dev_pay03'];
						}
						?>
                        <table class="table">
                        	<thead>
                            	<tr class="regBlack_14">
                                	<th></th>
                                    <th>หลักการ</th>
                                    <th>อนุมัติ</th>
                                    <th>จ่ายจริง</th>
                                </tr>
                            </thead>
                        	<tbody>
                    	<?php
						$sqlCost2=mysql_query("select * from $db_eform.develop_cost_type
								where ct_use='yes'
								and ct_id<>'0'
								order by ct_id asc");
						while($obCost2=mysql_fetch_assoc($sqlCost2)){
							if(@in_array($obCost2['ct_id'],$ct_id)){
								print '<tr>
											<td><label class="checkbox"><input name="ct_id[]" type="checkbox" value="'.$obCost2['ct_id'].'" data-toggle="checkbox" checked> '.$obCost2['ct_title'].'</label></td>
											<td><input name="ct_dev_pay01'.$obCost2['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$ct_dev_pay01[$obCost2['ct_id']].'"></td>
											<td><input name="ct_dev_pay02'.$obCost2['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$ct_dev_pay02[$obCost2['ct_id']].'"></td>
											<td><input name="ct_dev_pay03'.$obCost2['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$ct_dev_pay03[$obCost2['ct_id']].'"></td>
										</tr>';
							}else{
								print '<tr>
											<td><label class="checkbox"><input name="ct_id[]" type="checkbox" value="'.$obCost2['ct_id'].'" data-toggle="checkbox"> '.$obCost2['ct_title'].'</label></td>
											<td><input name="ct_dev_pay01'.$obCost2['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
											<td><input type="number" name="ct_dev_pay02'.$obCost2['ct_id'].'" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
											<td><input type="number" name="ct_dev_pay03'.$obCost2['ct_id'].'" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
										</tr>';
							}
						}
						?>
                        		</tbody>
                            </table>
                        </div>
                        
                        <div class="form-group">
                        	<label class="control-label"><strong>หมายเหตุ:</strong></label>
                            <textarea class="form-control" rows="4" name="dev_bill"><?php echo $ob['dev_bill'];?></textarea>
                        </div>
                        <input type="hidden" name="dev_id" value="<?php echo $ob['dev_id'];?>">
                        <input type="hidden" name="dp_id" value="<?php echo $ob['dp_id'];?>">
                        <input type="hidden" name="dp_name" value="<?php echo $ob['dp_name'];?>">
                        <input type="hidden" name="action" value="save">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Save</button>	
                    </form>
                
                </div><!--col-->
            </div><!--row-->
        </div><!--body-->
    </div><!--panel-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>