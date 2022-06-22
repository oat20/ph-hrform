<?php
session_start();

include('compcode/include/config.php');
include('compcode/check_login.php');
include('compcode/include/connect_db.php');
include('compcode/include/function.php');
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
			inner join $db_eform.activity on (develop.act_id = activity.act_id)
			inner join $db_eform.develop_location_type on (develop.lt_id = develop_location_type.lt_id)
			inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
			inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
			inner join $db_eform.personel_muerp on (develop.dev_perid = personel_muerp.per_id)
			inner join $db_eform.develop_type as t8 on(develop.dev_type=t8.dvt_id)
			where develop.dev_id='$_GET[getDevid]'");
	$ob=mysql_fetch_assoc($sql);
	$dev_bookfrom=explode('+',$ob['dev_bookfrom']);
	?>
                
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title clearfix">
            	<div class="pull-left"><a href="2_allform.php"><i class="fa fa-arrow-left"></i> ยืนยันข้อมูล</a></div>
                <div class="pull-right">
                    <a href="../form/editform_2.php?getTrackid=<?php echo $ob['dev_trackid'];?>" class="btn btn-link"><i class="fa fa-pencil"></i></a>
                    <a href="../form/print-form01-pdf.php?getTrackid=<?php echo $ob['dev_trackid'];?>" target="_blank" class="btn btn-link"><i class="fa fa-print"></i></a>
                </div>
            </h3>
        </div>
        <div class="panel-body">
        	<?php echo warning('success','<i class="fa fa-check"></i> Success','บันทึกข้อมูลเรียบร้อย');?>
            <div class="row">          	
            	<div class="col-sm-6">
                	<dl class="dl-horizontal">
                      <dt>ส่วนงาน</dt>
                      <dd><?php echo $ob['dp_name'];?></dd>
                      <dt>ตามหนังสือ</dt>
                      <dd><?php echo $dev_bookfrom['0'];?> <strong>ที่</strong> <?php echo $dev_bookfrom['1'];?> <strong>ลงวันที่</strong> <?php echo dateThai($dev_bookfrom['2']);?> <strong>เรื่อง</strong> <?php echo $dev_bookfrom['3'];?></dd>
                      <dt>หลักสูตร/โครงการ</dt>
                      <dd><?php echo $ob['dev_onus'];?></dd>
                      <dt>ระหว่างวันที่</dt>
                      <dd><?php echo dateformat_03($ob['dev_stdate']).' ถึง '.dateformat_03($ob['dev_enddate']);?></dd>
                      <dt>ลักษณะงาน</dt>
                      <dd>
                      	<?php echo $ob['dvt_name'].'&nbsp;&nbsp;'.$ob['dev_typeother'];?>
                      </dd>
                      <dt>เกี่ยวข้องกับกิจกรรม</dt>
                      <dd><?php echo $ob['activity'];?></dd>
                      <dt>สถานที่จัด</dt>
                      <dd><?php echo $ob['dev_place'];?></dd>
                      <dt>ประเภทสถานที่</dt>
                      <dd><?php echo $ob['lt_title'];?></dd>
                      <dt>หน่วยงานผู้จัด</dt>
                      <dd><?php echo $ob['dev_org'];?></dd>
                      <dt>จำนวนชั่วโมงที่ใช้จริง</dt>
                      <dd><?php echo $ob['dev_training_hour'];?></dd>
                      <dt>รายละเอียดการขออนุมัติค่าใช้จ่าย</dt>
                      <dd><?php echo $cf_devnopay[$ob['dev_nopay']];?></dd>
                      <?php
					  if($ob['dev_nopay']==0){
					  ?>
                      <dt>จากแหล่งเงิน</dt>
                      <dd>
                      	<ol>
                      	<?php
						$sql03=mysql_query("select * from $db_eform.develop_form_budget
									inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
									inner join $db_eform.develop_payfrom as t3 on(budtype.pf_id=t3.pf_id)
									where develop_form_budget.dev_id='$ob[dev_id]'
									order by budtype.bt_id asc");
						while($ob03=mysql_fetch_assoc($sql03)){
							echo '<li>'.$ob03['pf_title'].' <i class="fa fa-angle-double-right"></i> '.$ob03['bt_name'].' '.number_format($ob03['dev_pay01']).' บาท</li>';
						}
						?>
                        </ol>
                      </dd>
                      <dt>โดยแบ่งเป็นค่าใช้จ่าย</dt>
                      <dd>
                      	<ol>
                      	<?php
						$sql04=mysql_query("select * from $db_eform.develop_form_cost
									inner join $db_eform.develop_cost_type on (develop_form_cost.ct_id=develop_cost_type.ct_id)
									where develop_form_cost.dev_id='$ob[dev_id]'
									order by develop_cost_type.ct_id asc");
						while($ob04=mysql_fetch_assoc($sql04)){
							echo '<li>'.$ob04['ct_title'].' '.number_format($ob04['dev_pay01']).' บาท</li>';
						}
						?>
                        </ol>
                      </dd>
                      <?php
					  }
					  ?>
                      <dt>ยุทธศาสตร์มหาวิทยาลัยฯ</dt>
                      <dd><?php echo $ob['nameth'];?></dd>
                      <dt>ยุทธศาสตร์คณะฯ</dt>
                      <dd><?php echo $ob['sf_name'];?></dd>
                       <dt>ผู้บันทึข้อมูล</dt>
                      <dd><?php echo $ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'];?></dd>
                      <dt>สถานะ</dt>
                      <dd><?php echo $cf_approve[$ob['dev_approve']]['name'];?></dd>
                    </dl>
                </div><!--col-->
                
                <div class="col-sm-6">
                	
                    <h6>บุคลากรผู้เข้าร่วม</h6>
                    <div class="table-responsive">
                    	<table class="table table-bordered">
                        	<thead>
                                <tr class="regBlack_14">
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>ตำแหน่งงาน</th>
                                    <th>ส่วนงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                      	<?php
						$sql05=mysql_query("select * from $db_eform.develop_course_personel
									inner join $db_eform.personel_muerp on (develop_course_personel.per_id=personel_muerp.per_id)
									inner join $db_eform.tb_orgnew on (personel_muerp.per_dept=tb_orgnew.dp_id)
									where develop_course_personel.dev_id='$ob[dev_id]'
									order by convert(tb_orgnew.dp_name using tis620) asc,
									convert(personel_muerp.per_fnamet using tis620) asc,
									convert (personel_muerp.per_lnamet using tis620) asc");
						while($ob05=mysql_fetch_assoc($sql05)){
							echo '<tr>
										<td>'.++$r.'</td>
										<td>'.$ob05['per_pname'].' '.$ob05['per_fnamet'].' '.$ob05['per_lnamet'].'</td>
										<td>'.$ob05['job_id'].'</td>
										<td>'.$ob05['dp_name'].'</td>
									</tr>';
						}
						?>
                        	</tbody>
                        </table>
                    </div><!--table-->
                
                </div><!--col-->
            </div><!--row-->
        </div><!--body-->
        <div class="panel-footer">
        	<a href="../form/editform_2.php?getTrackid=<?php echo $ob['dev_trackid'];?>" class="btn btn-link btn-wide"><i class="fa fa-angle-double-left"></i> กลับไปแก้ไข</a>
            <a href="../form/print-form01-pdf.php?getTrackid=<?php echo $ob['dev_trackid'];?>" class="btn btn-link btn-wide" target="_blank"><i class="fa fa-print"></i> พิมพ์แบบฟอร์ม</a>
        </div>
    </div><!--panel-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>