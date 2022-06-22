<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
</head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar-inc.php');?>

<div class="container">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">เพิ่ม / แก้ไขตำแหน่งด้านบริหารงาน</h3>
        </div>
        <div class="panel-body">
        	<form  name="insert_type "action="_action_jobspecial.php" method="post" class="form-horizontal" id="defaultForm">
            	<?php
				$rs=mysql_query("select * from $db_eform.job_special
				where jobs_id='$_GET[jobs_id]'");
				$ob=mysql_fetch_assoc($rs);
				?>
            	<div class="form-group">
                	<label class="control-label col-sm-3"><strong>ตำแหน่ง:</strong></label>
                    <div class="col-sm-9">
                    	<input name="jobs_name" type="text "id="name_type" size="80" maxlength="200" class="form-control" value="<?php print $ob['jobs_name'];?>">
                    </div>
                </div>
                <!--<div class="form-group">
                        	<label class="control-label col-sm-3"><strong>ใช้งาน:</strong></label>
                            <div class="col-sm-9">
                            	<?php
								/*foreach($cf_yn_msg02 as $k=>$v){
									if($k == $ob['jobs_status']){
										print '<label class="radio"><input name="jobs_status" type="radio" value="'.$k.'" data-toggle="radio" checked> '.$v['icon'].' '.$v['label'].'</label>';
									}else{
										print '<label class="radio"><input name="jobs_status" type="radio" value="'.$k.'" data-toggle="radio"> '.$v['icon'].' '.$v['label'].'</label>';
									}
								}*/
								?>
                            </div>
                        </div>-->
                        
                        <div class="form-group">
                        	<div class="col-sm-9 col-sm-offset-3">
                            	<?php
								if(empty($_GET['jobs_id'])){
									print '<input name="action" type="hidden" value="insert">';
									print '<button class="btn btn-primary btn-wide text-uppercase" type="submit">Insert</button>';
								}else{
									print '<input name="action" type="hidden" value="update">';
									print '<input name="jobs_id" type="hidden" value="'.$ob['jobs_id'].'">';
									print '<button class="btn btn-primary btn-wide text-uppercase" type="submit">Update</button>';
								}
								?>
                            </div>
                        </div>
            </form>
        </div><!--body-->
    </div><!--panel-->
 
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 jobs_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			jobs_status: {
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
</body>
</html>
