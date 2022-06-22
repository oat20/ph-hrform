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
		<li><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> สรุปค่าใช้จ่ายภาพรวม</a></li>
    </ol>
    
    <div class="row">
    	
        <div class="col-lg-2">
        	
            <!--filter-->
            <strong><i class="fa fa-filter"></i> Filter</strong><hr>
            <div class="list-group regBlack_14">
            	<?php
				/*$dev_year=budgetyear_02(date('Y-m-d'));
				$dev_year02=$dev_year-10;
				for($y=$dev_year;$y>=$dev_year02;$y--){
					if($_GET['dev_year'] == $y){
              			echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$y.'" class="list-group-item active"><i class="fa fa-angle-double-right fa-fw"></i> ปีงบประมาณ <strong>'.$y.'</strong></a>';
					}else{
						echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$y.'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ปีงบประมาณ <strong>'.$y.'</strong></a>';
					}
				}*/
				$sql=mysql_query("select dev_year from $db_eform.develop group by dev_year order by dev_year desc");
				while($ob=mysql_fetch_assoc($sql)){
					if($_GET['dev_year'] == $ob['dev_year']){
              			echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$ob['dev_year'].'" class="list-group-item active"><i class="fa fa-angle-double-right fa-fw"></i> ปีงบประมาณ <strong>'.$ob['dev_year'].'</strong></a>';
					}else{
						echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_year='.$ob['dev_year'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ปีงบประมาณ <strong>'.$ob['dev_year'].'</strong></a>';
					}
				}
			  ?>
            </div>
            <!--filter-->
        
        </div><!--col-->
        
        <div class="col-lg-10">
        
        	<div class="row">
        
            	<?php
				$sql01=mysql_query("select * from $db_eform.department_type as a
							where typ_id = 'PH00001'
							or typ_id = 'PH00002'
							order by a.typ_id asc");
				while($ob01=mysql_fetch_assoc($sql01)){
				?>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
								<div><?php echo $ob01['typ_name'];?></div>
                            </h3>
                        </div>
                        <div class="panel-body">
                        	<div class="table-responsive">
                            	<table class="table table-striped table-bordered regBlack_14">
                                	<thead>
                                    	<tr>
                                        	<th></th>
                                            <th>หลักการ</th>
                                            <th>อนุมัติ</th>
                                            <th>จ่ายจริง</th>
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                    	<?php
										$budget_pay01='0';
										$budget_pay02='0';
										$budget_pay03='0';
										
										/*$sql02=mysql_query("select d.dp_name,
													sum(b.budget_pay01) as budgetPay01,
													sum(b.budget_pay02) as budgetPay02,
													sum(b.budget_pay03) as budgetPay03 
													from $db_eform.develop as a
													inner join $db_eform.develop_course_personel as b on (a.dev_id = b.dev_id)
													inner join $db_eform.personel_muerp as c on (b.per_id = c.per_id)
													inner join $db_eform.tb_orgnew as d on (c.per_dept = d.dp_id)
													where d.typ_id = '$ob01[typ_id]'
													and a.dev_year = '$_GET[dev_year]'
													and a.dev_cancel='no'
													group by d.dp_name
													order by d.dp_id asc");*/
										$sql02=mysql_query("select d.dp_name,
													sum(t3.dev_pay01) as budgetPay01,
													sum(t3.dev_pay02) as budgetPay02,
													sum(t3.dev_pay03) as budgetPay03 
													from $db_eform.develop as a
													inner join $db_eform.tb_orgnew as d on (a.dp_id=d.dp_id)
													inner join $db_eform.develop_form_budget as t3 on(a.dev_id=t3.dev_id)
													inner join $db_eform.budtype as t4 on(t3.bt_id = t4.bt_id)
													where d.typ_id = '$ob01[typ_id]'
													and a.dev_year = '$_GET[dev_year]'
													and a.dev_cancel='no'
													and a.dev_remove = 'no'
													and a.dev_nopay = 0
													and t4.pf_id = 1
													group by d.dp_name
													order by d.dp_id asc");
										while($ob02=mysql_fetch_assoc($sql02)){
											
											//summary budget
											$budget_pay01+=$ob02['budgetPay01'];
											$budget_pay02+=$ob02['budgetPay02'];
											$budget_pay03+=$ob02['budgetPay03'];
											//summary budget
											
											echo '<tr>
														<td>'.$ob02['dp_name'].'</td>
														<td>'.number_format($ob02['budgetPay01'],'2').'</td>
														<td>'.number_format($ob02['budgetPay02'],'2').'</td>
														<td>'.number_format($ob02['budgetPay03'],'2').'</td>
													</tr>';
										}
										?>
                                    </tbody>
                                    <tfoot>
                                    	<tr>                                      	
                                            <th>รวม</th>
                                            <th><?php echo number_format($budget_pay01,'2');?></th>
                                            <th><?php echo number_format($budget_pay02,'2');?></th>
                                            <th><?php echo number_format($budget_pay03,'2');?></th>                                          
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!--table-->
                        </div>
                    </div><!--panel-->
                    </div><!--col-->
                <?php
				}
				?>
        
        	</div><!--row-->
                        
        </div><!--col-->
        
    </div><!--row-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>