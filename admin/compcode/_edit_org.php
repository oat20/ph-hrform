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
                	<h3 class="panel-title"><a href="_show_dep.php"><i class="fa fa-arrow-left"></i> แก้ไขส่วนงาน</a></h3>
                </div>
            	<div class="panel-body">
                     	<?php
						$rs2=mysqli_query($condb, "select *, tb_orgnew.dp_id as dp_id
					 	from $db_eform.tb_orgnew
                        left  join $db_eform.per_boss on (tb_orgnew.dp_id=per_boss.dp_id) 
                        left join $db_eform.personel_muerp as t2 on (per_boss.per_id = t2.per_id)
						where tb_orgnew.dp_id = '$_GET[dp_id]'");
						$ob2=mysqli_fetch_assoc($rs2);
						
						$qBoss=mysqli_query($condb, "select * from $db_eform.per_boss where dp_id='$ob2[dp_id]'");
						$rBoss=mysqli_fetch_assoc($qBoss);
												?>
                     	<!--<div class="row">
                        	<div class="col-sm-6">-->                              
                                <div class="form-group">
                                    <label class="control-label col-sm-3"><strong>ส่วนงาน:</strong></label>
                                    <div class="col-sm-9">
                                    <input type="text" size="60"  name="dp_name" class="form-control" value="<?php print $ob2['dp_name'];?>">
                                    </div>
                                </div>                             
                             <!--</div>-->
                             
                            <!-- <div class="col-sm-6">-->                                
                                <div class="form-group">
                                	<label class="control-label col-sm-3">MU-Email หัวหน้าส่วนงาน:</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="mumail" class="form-control" value="<?php print $ob2['per_email'];?>"
                                        data-bv-remote="true"
                                        data-bv-remote-url="../../lib/bootstrapvalidator/mu-emailformat.php"
                                        required>
                                    </div>
                                </div>
                                
                           <!-- </div>
                        </div>-->
                        <!--<div class="row">
                        	<div class="col-sm-6">
                            	
                            </div>
                        </div>-->                      
                </div><!--body-->
                <div class="panel-footer">
                    <input name="action" type="hidden" value="update">
                        <input name="dp_id" type="hidden" value="<?php print $ob2['dp_id'];?>">
                        <button class="btn btn-inverse btn-block text-uppercase" type="submit" value="Update">บันทึก</button>
                </div>
            </div><!--panel-->
             </form>
        
        </div><!--col-->


	</div><!--row-->
</div><!--container-->

<?php 
include('../../lib/js-inc.php');
?>
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
            }*/
		}
	});
});
</script>
</body>
</html>