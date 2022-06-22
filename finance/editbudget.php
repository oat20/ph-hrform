<?php
session_start();

include('../admin/compcode/include/config.php');
//include('../admin/compcode/check_login.php');
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
        
        	<form id="formDefault" method="post" action="editbudget-action.php">
        	<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><a href="index.php"><i class="fa fa-arrow-left"></i> บันทึกข้อมูลงบประมาณที่ได้รับ</a></h3>
                    <div class="pull-right"><button type="submit" class="btn btn-link btn-lg"><i class="fa fa-check"></i> Save</button></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                    	<?php print dropdown_budgetyear($_GET['db_year'],'inverse','lg');?>
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
										$sql = "select * from $db_eform.department_budget
										inner join $db_eform.tb_orgnew on (department_budget.dp_id = tb_orgnew.dp_id)
										inner join $db_eform.department_type on (tb_orgnew.typ_id = department_type.typ_id)
										where department_budget.db_year = '$_GET[db_year]'
										and department_type.typ_id='PH00001'
										order by tb_orgnew.dp_id asc";
										//$countPerid2=0;
										//$totalBudget2 = 0;
										$rs = mysql_query($sql);
										while($ob = mysql_fetch_assoc($rs)){
											print '<tr>
														<td>'.$ob['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$ob['dp_name'].'</td>
														<td>'.number_format($ob['db_staff']).'</td>
														<td><div class="form-group"><input type="number" name="db_budget'.$ob['db_id'].'" value="'.$ob['db_budget'].'" class="form-control input-sm" required></div></td>
													</tr>';
											echo '<input type="hidden" name="db_id[]" value="'.$ob['db_id'].'">';
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
										$sql = "select * from $db_eform.department_budget
										inner join $db_eform.tb_orgnew on (department_budget.dp_id = tb_orgnew.dp_id)
										inner join $db_eform.department_type on (tb_orgnew.typ_id = department_type.typ_id)
										where department_budget.db_year = '$_GET[db_year]'
										and department_type.typ_id='PH00002'
										order by tb_orgnew.dp_id asc";
										//$countPerid2=0;
										//$totalBudget2 = 0;
										$rs = mysql_query($sql);
										while($ob = mysql_fetch_assoc($rs)){
											print '<tr>
														<td>'.$ob['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$ob['dp_name'].'</td>
														<td>'.number_format($ob['db_staff']).'</td>
														<td><div class="form-group"><input type="number" name="db_budget02'.$ob['db_id'].'" value="'.$ob['db_budget'].'" class="form-control input-sm" required></div></td>
													</tr>';
											echo '<input type="hidden" name="db_id02[]" value="'.$ob['db_id'].'">';
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
		}
	});
});
</script>
</body>
</html>