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
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<div class="container-fluid">
	<div class="space1"></div>
	<div class="row">
    	<div class="col-sm-12">
        	<?php
			$sql=mysql_query("select *, develop.dev_id as dev_id
			 from $db_eform.develop
			inner join $db_eform.tb_orgnew on (develop.dp_id = tb_orgnew.dp_id)
			inner join $db_eform.develop_level on (develop.le_id = develop_level.le_id)
			inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
			inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
			inner join $db_eform.personel_muerp on (develop.dev_perid = personel_muerp.per_id)
			left join $db_eform.develop_cancel as t11 on(develop.dev_id=t11.dev_id)
			left join $db_eform.develop_type as t13 on(develop.dev_type=t13.dvt_id)
			where develop.dev_id='$_GET[getDevid]'");
			$ob=mysql_fetch_assoc($sql);
			$dev_bookfrom=explode('+',$ob['dev_bookfrom']);

			$inc='<div class="btn-group" role="group" id="navi4">
					  <a href="'.$livesite.'/academicservice/_showmyacademicservice.php" class="btn btn-link"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
					  <a href="'.$livesite.'academicservice/editform_1.php?getTrackid='.$ob['dev_trackid'].'" class="btn btn-link"><i class="fui-new"></i> แก้ไขแบบฟอร์ม</a>
					  <a href="'.$livesite.'academicservice/print-form01-pdf.php?getTrackid='.$ob['dev_trackid'].'" class="btn btn-link" target="_blank"><i class="glyphicon glyphicon-print"></i> พิมพ์แบบฟอร์มอนุมัติ</a>
					</div>';
					
			if($ob['dev_cancel']=='yes'){$inc.=warning('danger','<i class="glyphicon glyphicon-alert"></i> ยกเลิก','<hr><span class="font-14">'.$ob['cc_comment'].'</span>'); $color='danger';}else{$color='default';}
			
			$inc.='<div class="row">
						<div class="col-sm-6">
							<dl class="font-14 dl-horizontal">
							  <dt>ลงวันที่</dt>
							  <dd>'.dateThai($ob['dev_orddate']).'</dd>
							  <dt>ส่วนงาน</dt>
							  <dd>'.$ob['dp_name'].'</dd>
							  <dt>ตามหนังสือ</dt>
							  <dd>'.$dev_bookfrom['0'].' <strong>ที่</strong> '.$dev_bookfrom['1'].' <strong>ลงวันที่</strong> '.dateThai($dev_bookfrom['2']).' <strong>เรื่อง</strong> '.$dev_bookfrom['3'].'</dd>
							  <dt>ได้เชิญข้าพเจ้าไปปฏิบัติงานเพื่อ</dt>
							  <dd>'.$ob['dvt_name'].' '.$ob['dev_typeother'].'</dd>
							  <dt>หลักสูตร/หัวข้อโครงการ</dt>
							  <dd>'.$ob['dev_onus'].' <strong>ระหว่างวันที่</strong> '.dateformat_03($ob['dev_stdate']).' ถึง '.dateformat_03($ob['dev_enddate']).' <strong>ตั้งแต่เวลา</strong> '.$ob['dev_timebegin'].' ถึง '.$ob['dev_timeend'].' <strong>ณ</strong> '.$ob['dev_place'].'</dd>
							  <dt>ระดะบกิจกรรม</dt>
							  <dd>'.$ob['le_title'].'</dd>						  
							  <dt>จำนวนชั่วโมงที่ใช้จริง</dt>
							  <dd>'.$ob['dev_training_hour'].' ชั่วโมง</dd>
							  <dt>ผู้บันทึกข้อมูล</dt>
							  <dd>'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</dd>
							  <dt>สถานะ</dt>
							  <dd>'.$cf_approve[$ob['dev_approve']]['name'].'</dd>
							  <dt>รายละเอียดการขออนุมัติค่าใช้จ่าย</dt>
							  <dd>'.$cf_devnopay[$ob['dev_nopay']].'</dd>
							</dl>';
							
							if($ob['dev_nopay']==0){
							$inc.='<table class="table table-bordered font-14">
										<thead>
											<tr class="active">
												<th colspan="4">จากแหล่งเงิน</th>
											</tr>
											<tr>
												<th></th>
												<th>หลักการ</th>
												<th>อนุมัติ</th>
												<th>จ่ายจริง</th>
											</tr>
										</thead>
										<tbody>';
										$sql03=mysql_query("select * from $db_eform.develop_form_budget
											inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
											where develop_form_budget.dev_id='$ob[dev_id]'
											order by budtype.bt_id asc");
										while($rs03=mysql_fetch_assoc($sql03)){
											$inc.='<tr>
														<td>'.$rs03['bt_name'].'</td>
														<td>'.$rs03['dev_pay01'].'</td>
														<td>'.$rs03['dev_pay02'].'</td>
														<td>'.$rs03['dev_pay03'].'</td>
													</tr>';
													$dev_pay01+=$rs03['dev_pay01']; $dev_pay02+=$rs03['dev_pay02']; $dev_pay03+=$rs03['dev_pay03'];
										}
										$inc.='<tr>
													<td><strong>รวม</strong></td>
													<td>'.number_format($dev_pay01,'2').'</td>
													<td>'.number_format($dev_pay02,'2').'</td>
													<td>'.number_format($dev_pay03,'2').'</td>
											</tr>
										</tbody>						
										</table>';
							
							$inc.='<table class="table table-bordered font-14">
										<thead>
											<tr class="active">
												<th colspan="4">โดยแบ่งเป็นค่าใช้จ่าย</th>
											</tr>
											<tr>
												<th></th>
												<th>หลักการ</th>
												<th>อนุมัติ</th>
												<th>จ่ายจริง</th>
											</tr>
										</thead>
										<tbody>';
										$sql04=mysql_query("select * from $db_eform.develop_form_cost
									inner join $db_eform.develop_cost_type on (develop_form_cost.ct_id=develop_cost_type.ct_id)
									where develop_form_cost.dev_id='$ob[dev_id]'
									order by develop_cost_type.ct_id asc");
									while($ob04=mysql_fetch_assoc($sql04)){
											$inc.='<tr>
														<td>'.$ob04['ct_title'].'</td>
														<td>'.$ob04['dev_pay01'].'</td>
														<td>'.$ob04['dev_pay02'].'</td>
														<td>'.$ob04['dev_pay03'].'</td>
													</tr>';
													$cost_pay01+=$ob04['dev_pay01']; $cost_pay02+=$ob04['dev_pay02']; $cost_pay03+=$ob04['dev_pay03'];
										}
										$inc.='<tr>
													<td><strong>รวม</strong></td>
													<td>'.number_format($cost_pay01,'2').'</td>
													<td>'.number_format($cost_pay02,'2').'</td>
													<td>'.number_format($cost_pay03,'2').'</td>
											</tr>
										</tbody>						
										</table>';
							}
							
						$inc.='</div>';
						
						$inc.='<div class="col-sm-6">
							<div class="blog-content font-14">
								<strong>รายชื่อผู้เข้าร่วม</strong>
								<ol>';
								
								$sql03=mysql_query("select * from $db_eform.develop_course_personel as t1
									inner join $db_eform.personel_muerp as t2 on(t1.per_id=t2.per_id)
									where t1.dev_id='$ob[dev_id]'
									order by convert(t2.per_fnamet using tis620) asc,
									convert(t2.per_lnamet using tis620) asc");
								while($ob03=mysql_fetch_assoc($sql03)){
								  $inc.='<li>'.$ob03['per_fnamet'].'&nbsp;&nbsp;'.$ob03['per_lnamet'].'</li>';
								}
								
								$inc.='</ol>
							</div>
						</div>
					</div>';
			
			$sql02=mysql_query("select * from $db_eform.develop as t1
				inner join $db_eform.personel_muerp as t2 on(t1.dev_createby=t2.per_id)
				where t1.dev_id='$ob[dev_id]'");
			$ob02=mysql_fetch_assoc($sql02);
			$footer='<div class="clearfix"><div class="pull-left">Form No. '.$ob['dev_id'].'</div><div class="pull-right">แก้ไขล่าสุดเมื่อ '.dateFormat_02($ob02['dev_modify']).' โดย '.$ob02['per_fnamet'].' '.$ob02['per_lnamet'].'</div></div>';
			
			echo blockcontent_withfooter($color,'รายละเอียดแบบฟอร์ม',$inc,$footer);
			?>
        </div><!--col-->
    </div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>