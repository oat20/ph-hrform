<?php
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../../lib/css-inc.php');?>
<body bgcolor="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
include('../../inc/navbar02-inc.php');

 $sql="select * from $db_eform.develop_user
 inner join $db_eform.personel_muerp on (develop_user.per_id = personel_muerp.per_id)
 inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
 where develop_user.per_id = '$_GET[per_id]'";			
 $exec=mysql_query($sql);
//echo"	$exec1=mysql_query($sql);";
			$rs_user= mysql_fetch_assoc($exec);
		 		 ?>
                 
<div class="container">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="_show_alluser.php"><i class="fa fa-arrow-left"></i> Edit User</a></h3>
        </div>
		<div class="panel-body">
        
			<form id="adduser" action="_action_user.php" method="post">
				<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">MU Email:</label>
                            <p class="form-control-static"><?php print $rs_user['per_email'];?></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ชื่อ:</label>
                            <p class="form-control-static"><?php print $rs_user['per_pname'].$rs_user['per_fnamet'].' '.$rs_user['per_lnamet'];?></p>
                        </div>
                    </div>
                </div>
                                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ส่วนงาน:</label>
                            <p class="form-control-static"><?php print $rs_user['dp_name'];?></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">เบอร์ภายใน:</label>
                            <p class="form-control-static"><?php print $rs_user['per_telin'];?></p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                    	<label class="control-label">Permission:</label>
                            <select class="form-control select select-primary" data-toggle="select" name="du_status">
                                <option value="">&raquo; เลือกรายการ</option>
                                <?php
                                foreach($admin_status as $k=>$v){
									if($rs_user['du_status'] == $k){
                                    	print '<option value="'.$k.'" selected>&raquo; '.$v['label'].'</option>';
									}else{
										print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
									}
                                }
                                ?>
                            </select>
                     	</div>
                    </div>
                </div>
                
                <input name="action" type="hidden" value="update">
                <input name="per_id" type="hidden" value="<?php print $rs_user['per_id'];?>">
                <input class="button text-uppercase" type="submit" value="Update">
			</form>
            
		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#adduser').bootstrapValidator({
		 fields: {
			du_status: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            }
		 }
	});
});
</script>