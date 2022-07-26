<?php
session_start();

include('include/config.php');
include('check_login.php');
require_once '../../lib/mysqli.php';
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<html lang="en">
    <head>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
</head> 
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">
	<div class="row">
    
    	<div class="col-sm-12">
        
             <form  name="insert_type" action="_action_org.php" method="POST" id="defaultForm" class="form-horizontal">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<a href="_show_dep.php"><i class="fa fa-arrow-left fa-fw"></i> เพิ่มส่วนงาน</a>
                </div>
            	<div class="panel-body">
                     	<!--<div class="row">
                        	<div class="col-sm-6">-->                              
                                <div class="form-group">
                                    <label class="control-label col-sm-3"><strong>ส่วนงาน:</strong></label>
                                    <div class="col-sm-9">
                                    	<input type="text" size="60"  maxlength="50" name="dp_name" class="form-control">
                                    </div>
                                </div>                             
                             <!--</div>-->
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-3">MU-Email หัวหน้าส่วนงาน:</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="mumail" class="form-control" 
                                        data-bv-remote="true"
                                        data-bv-remote-url="../../lib/bootstrapvalidator/mu-emailformat.php"
                                        required>
                                    </div>
                                </div>        
                           <!-- </div>
                        </div>-->
                        <!--<div class="row">
                        	<div class="col-sm-6">
                            	<div class="form-group">
                                	<label class="control-label">หัวหน้าส่วนงาน:</label>
                                    <select class="form-control select select-inverse mrs mbm" data-toggle="select" name="per_id" required>
                                    	<option value="">&raquo; เลือกรายการ</option>
                                    	<?php
										/*$sql_01 = mysql_query("select * from phper2.personel
														inner join phper2.tb_orgnew on (personel.per_dept = tb_orgnew.dp_id)
														order by CONVERT (per_fnamet using tis620) asc,
														convert (per_lnamet using tis620) asc");
										while($ob_01 = mysql_fetch_assoc($sql_01)){
											print '<option value="'.$ob_01['per_id'].'">'.$ob_01['per_pname'].$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</option>';
										}*/
										?>
                                    </select>
                                </div>
                            </div>
                        </div>-->                       
                </div><!--body-->
                <div class="panel-footer">
                    <input name="action" type="hidden" value="insert">
                    <button class="btn btn-inverse btn-block text-uppercase" type="submit" value="Insert">บันทึก</button>
                </div>
            </div><!--panel-->
             </form>
        
        </div><!--col-->


	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script type="text/javascript">
$(document).ready(function() {
	
	$('select[name="per_id"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	$('select[name="dean"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	
	$('#defaultForm').bootstrapValidator({
		fields: {
            dp_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			typ_id: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			/*per_id: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },*/
			/*dean: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },*/
		}
	});
});
</script>
</body>
</html>