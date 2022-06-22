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

	<div class="row">
    	<?php include('../admin/menu_user.php');?>
        
        <div class="col-lg-10">
        
        	<form id="formDefault" method="post" action="insertbudget-action.php">
        	<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><a href="index.php"><i class="fa fa-arrow-left"></i> บันทึกข้อมูลงบประมาณที่ได้รับ</a></h3>
                    <div class="pull-right"><button type="submit" class="btn btn-link btn-lg"><i class="fa fa-check"></i> Save</button></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                    	<?php print dropdown_budgetyear(budgetyear_02(date('Y-m-d')),'inverse','lg');?>
                    </div>
                    <div class="row">
                    	<div class="col-lg-6">
                        	<div class="table-responsive">
                            	<table class="table table-bordered table-striped">
                                	<thead>
                                        <tr>
                                            <th></th>
                                            <th>บุคลากร</th>
                                            <th>งบได้รับ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
										$sql = "SELECT tb_orgnew.dp_id, department_type.typ_name, tb_orgnew.dp_name, COUNT( personel_muerp.per_id ) AS countPerid, COUNT( personel_muerp.per_id )*$cf_budgetperstaff AS totalBudget
											FROM $db_eform.department_type
											INNER JOIN $db_eform.tb_orgnew ON ( department_type.typ_id = tb_orgnew.typ_id ) 
											INNER JOIN $db_eform.personel_muerp ON ( tb_orgnew.dp_id = personel_muerp.per_dept )
											inner join $db_eform.personel_status as t4 on(personel_muerp.per_status=t4.ps_id)
											inner join $db_eform.personel_group as t5 on (personel_muerp.per_group = t5.gr_id)
											inner join $db_eform.personel_type as t6 on (personel_muerp.per_type = t6.pert_id) 
											WHERE department_type.typ_id =  'PH00001'
											AND t4.ps_flag='1'
											GROUP BY department_type.typ_name, tb_orgnew.dp_name, tb_orgnew.dp_id
											ORDER BY tb_orgnew.dp_id ASC";
										//$countPerid2=0;
										//$totalBudget2 = 0;
										$rs = mysql_query($sql);
										while($ob = mysql_fetch_assoc($rs)){
											print '<tr>
														<td>'.$ob['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$ob['dp_name'].'<input type="hidden" name="dp_id[]" value="'.$ob['dp_id'].'"></td>
														<td>'.number_format($ob['countPerid']).' x '.$cf_budgetperstaff.'<input type="hidden" name="db_staff'.$ob['dp_id'].'" value="'.$ob['countPerid'].'"></td>
														<td><div class="form-group"><input type="number" name="db_budget'.$ob['dp_id'].'" value="'.$ob['totalBudget'].'" class="form-control input-sm"></div></td>
													</tr>';
											//$countPerid2+=$ob['countPerid'];
											//$totalBudget2 += $ob['totalBudget'];
										}
										?>
                                        <!--<tr>
                                        	<td class="text-right"><strong>รวม</strong></td>
                                            <td><strong><?php //print number_format($countPerid2);?></strong></td>
                                            <td><strong><?php //print number_format($totalBudget2,'2');?></strong></td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div><!--table-->
                        </div><!--col-->
                        
                        <div class="col-lg-6">
                        	<div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                	<thead>
                                        <tr>
                                            <th></th>
                                            <th>บุคลากร</th>
                                            <th>งบได้รับ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
										$sql = "SELECT tb_orgnew.dp_id, department_type.typ_name, tb_orgnew.dp_name, COUNT( personel_muerp.per_id ) AS countPerid, COUNT( personel_muerp.per_id )*$cf_budgetperstaff AS totalBudget
											FROM $db_eform.department_type
											INNER JOIN $db_eform.tb_orgnew ON ( department_type.typ_id = tb_orgnew.typ_id ) 
											INNER JOIN $db_eform.personel_muerp ON ( tb_orgnew.dp_id = personel_muerp.per_dept )
											inner join $db_eform.personel_status as t4 on(personel_muerp.per_status=t4.ps_id)
											inner join $db_eform.personel_group as t5 on (personel_muerp.per_group = t5.gr_id)
											inner join $db_eform.personel_type as t6 on (personel_muerp.per_type = t6.pert_id) 
											WHERE department_type.typ_id =  'PH00002'
											AND t4.ps_flag='1'
											GROUP BY department_type.typ_name, tb_orgnew.dp_name, tb_orgnew.dp_id
											ORDER BY tb_orgnew.dp_id ASC";
										//$countPerid2=0;
										//$totalBudget2 = 0;
										$rs = mysql_query($sql);
										while($ob = mysql_fetch_assoc($rs)){
											print '<tr>
														<td>'.$ob['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$ob['dp_name'].'<input type="hidden" name="dp_id2[]" value="'.$ob['dp_id'].'"></td>
														<td>'.number_format($ob['countPerid']).' x '.$cf_budgetperstaff.'<input type="hidden" name="db_staff02'.$ob['dp_id'].'" value="'.$ob['countPerid'].'"></td>
														<td><div class="form-group"><input type="number" name="db_budget02'.$ob['dp_id'].'" value="'.$ob['totalBudget'].'" class="form-control input-sm"></div></td>
													</tr>';
											//$countPerid2+=$ob['countPerid'];
											//$totalBudget2 += $ob['totalBudget'];
										}
										?>
                                        <!--<tr>
                                        	<td class="text-right"><strong>รวม</strong></td>
                                            <td><strong><?php //print number_format($countPerid2);?></strong></td>
                                            <td><strong><?php //print number_format($totalBudget2,'2');?></strong></td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div><!--table-->
                        </div><!--col-->
                    </div><!--row-->
                </div><!--body-->
                <div class="panel-footer"><button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-check"></i> Save</button></div><!--footer-->
            </div><!--panel-->
            </form>
            
        </div><!--col-->
        
    </div><!--row-->
    
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('[data-toggle="tooltip"]').tooltip('hide');
	
	$('#formDefault').bootstrapValidator({
		message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields:{
			budget_year: {
                //group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			db_budget<?php echo $ob['dp_id'];?>:{
				//group:'.col-lg-6',
				validators:{
					notEmpty:{
					}
				}
			},
			db_budget02<?php echo $ob['dp_id'];?>:{
				//group:'.col-lg-6',
				validators:{
					notEmpty:{
					}
				}
			}
		}
	});
});
</script>
</body>
</html>