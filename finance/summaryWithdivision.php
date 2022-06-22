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
	
    <ol class="breadcrumb">
		<li><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> สรุปค่าใช้จ่ายตามส่วนงาน</a></li>
    </ol>
    
    <!--filter-->
    <div class="well well-sm">
    	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="filterForm">
        	<legend><i class="fa fa-filter"></i> Filter</legend>
            <div class="row">
            	<div class="col-sm-5">
                	<div class="form-group">
                        <select name="dev_year" class="form-control select select-inverse select-sm" data-toggle="select" data-placeholder="ปีงบประมาณ" required>
                            <?php
                            echo '<option value=""></option>';
                            $sql=mysql_query("select dev_year from $db_eform.develop group by dev_year order by dev_year desc");
                            while($ob=mysql_fetch_assoc($sql)){
                                echo '<option value="'.$ob['dev_year'].'">&raquo; '.$ob['dev_year'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div><!--col-->
                
                <div class="col-sm-5">
                	<div class="form-group">
                        <select name="dp_id" class="form-control select select-inverse select-sm" data-toggle="select" data-placeholder="ส่วนงาน" required>
                            <?php
                            echo '<option value=""></option>';
                            echo '<option value="all">&raquo; ทั้งหมด</option>';
                            $sql=mysql_query("select * from $db_eform.department_type as t1
                                inner join $db_eform.tb_orgnew as t2 on(t1.typ_id = t2.typ_id)
                                order by t1.typ_id asc,
                                t2.dp_id asc");
                            while($ob=mysql_fetch_assoc($sql)){
                                echo '<option value="'.$ob['dp_id'].'">&raquo; '.$ob['dp_name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div><!--col-->
                
                <div class="col-sm-2">
                	<button type="submit" class="btn btn-primary btn-block">แสดงผล</button>
                </div><!--col-->
            </div><!--row-->
        </form>
    </div>
    <!--filter-->
    
    <div class="row">
        
        <div class="col-lg-12">
        
            	<?php
				if(empty($_POST['dev_year']) and empty($_POST['dp_id'])){
					$dev_year=budgetyear_02(date('Y-m-d')); $dp_id='all';
				}else{
					$dev_year=$_POST['dev_year']; $dp_id=$_POST['dp_id'];
				}
				
				if($dp_id=='all'){
					$sql01=mysql_query("select * from $db_eform.department_type as a
							inner join $db_eform.tb_orgnew as b on (a.typ_id = b.typ_id)
							inner join $db_eform.department_budget as c on (b.dp_id = c.dp_id)
							where c.db_year='$dev_year'
							order by a.typ_id asc,
							b.dp_id asc");
				}else{
					$sql01=mysql_query("select * from $db_eform.department_type as a
							inner join $db_eform.tb_orgnew as b on (a.typ_id = b.typ_id)
							inner join $db_eform.department_budget as c on (b.dp_id = c.dp_id)
							where c.db_year='$dev_year'
							and b.dp_id = '$dp_id'
							order by a.typ_id asc,
							b.dp_id asc");
				}
				while($ob01=mysql_fetch_assoc($sql01)){
				?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title clearfix">
								<div class="pull-left"><?php echo $ob01['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$ob01['dp_name'];?></div>
                                <div class="pull-right">งบจัดสรร <?php echo number_format($ob01['db_budget'],'2');?></div>
                            </h3>
                        </div>
                        	<div class="table-responsive">
                            	<table class="table table-striped table-bordered regBlack_12">
                                	<thead>
                                    	<tr>
                                        	<th>#</th>
                                            <th>Form No.</th>
                                            <th>ปีงบฯ</th>
                                            <th>เรื่อง</th>
                                            <th>วันที่</th>
                                            <th>ถึง</th>
                                            <th>ผู้บันทึกแบบฟอร์ม</th>
                                            <th>พัฒนาบุคลากร</th>
                                            <th>บริการวิชาการ</th>
                                            <th>วัตถุประสงค์</th>
                                            <th>จำนวนผู้เข้าร่วม</th>
                                            <th>งบประมาณ</th>
                                            <th>หลักการ</th>
                                            <th>อนุมัติ</th>
                                            <th>จ่ายจริง</th>
                                            <th>หมายเหตุ</th>
                                            <!--<th>ดาวน์โหลดแบบฟอร์ม</th>-->
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                    	<?php
										$budget_pay01='0';
										$budget_pay02='0';
										$budget_pay03='0';
										$r=0;
										
										$sql02=mysql_query("select * from $db_eform.develop as a
													inner join $db_eform.personel_muerp as c on (a.dev_perid = c.per_id)
													inner join $db_eform.develop_type as t3 on(a.dev_type = t3.dvt_id)
													where a.dev_year = '$dev_year'
													and c.per_dept = '$ob01[dp_id]'
													and a.dev_cancel='no'
													and a.dev_remove = 'no'
													and a.dev_nopay = '0'
													order by a.dev_stdate desc,
													a.dev_enddate desc,
													convert (c.per_fnamet using tis620) asc,
													convert (c.per_lnamet using tis620) asc");
										while($ob02=mysql_fetch_assoc($sql02)){
											
											if($ob02['dev_maintype'] == '1'){
												$dev_maintype01 = '<i class="fa fa-check"></i>';
												$dev_maintype02 = '<i class="fa fa-minus"></i>';
											}else if($ob02['dev_maintype'] == '2'){
												$dev_maintype01 = '<i class="fa fa-minus"></i>';
												$dev_maintype02 = '<i class="fa fa-check"></i>';
											}
											
											//จำนวนผู้เข้าร่วม
											$qCountpersonel=mysql_query("select * from $db_eform.develop_course_personel where dev_id='$ob02[dev_id]'");
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
											
											echo '<tr>
														<td>'.++$r.'</td>
														<td>'.$ob02['dev_id'].'</td>
														<td><strong>'.$ob02['dev_year'].'</strong></td>
														<td>'.$ob02['dev_onus'].'</td>
														<td>'.dateFormat($ob02['dev_stdate']).'</td>
														<td>'.dateFormat($ob02['dev_enddate']).'</td>
														<td>'.$ob02['per_pname'].$ob02['per_fnamet'].' '.$ob02['per_lnamet'].'</td>
														<td class="text-center">'.$dev_maintype01.'</td>
														<td class="text-center">'.$dev_maintype02.'</td>
														<td>'.$ob02['dvt_name'].'&nbsp;&nbsp;'.$ob02['dev_typeother'].'</td>
														<td>'.number_format(mysql_num_rows($qCountpersonel)).'</td>
														<td>'.substr($budget,'0','-2').'</td>
														<td>'.number_format($rBudget02['sumDevpay01'],'2').'</td>
														<td><strong>'.number_format($rBudget02['sumDevpay02'],'2').'</strong></td>
														<td>'.number_format($rBudget02['sumDevpay03'],'2').'</td>
														<td>'.$ob02['dev_bill'].'</td>';
														//echo '<td class="text-center"><a href="'.$livesite.'form/print-form01-pdf.php?getTrackid='.$ob02['dev_trackid'].'" target="_blank"><i class="fa fa-download"></i></a></td>';
													echo '</tr>';
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
                                            <th><?php echo number_format($budget_pay01,'2');?></th>
                                            <th><?php echo number_format($budget_pay02,'2');?></th>
                                            <th><?php echo number_format($budget_pay03,'2');?></th>
                                            <th></th>
                                            <!--<th></th>-->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!--table-->
                    </div><!--panel-->
                <?php
				}
				?>
                        
        </div>
        
    </div><!--row-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	$('select').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	
	$('#filterForm').bootstrapValidator({
	});
});
</script>
</body>
</html>