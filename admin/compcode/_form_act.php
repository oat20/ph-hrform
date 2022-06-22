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
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="_show_act.php"><i class="fa fa-arrow-left"></i> เพิ่มกิจกรรม</a></h3>
        </div>
    	<div class="panel-body">
        	<form action="_action_act.php" method="post" id="defaultForm">
            	<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">กิจกรรม:</label>
                        	<input name="activity" type="text "id="name_type" size="80" maxlength="200" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ใช้งาน:</label>
                            <select class="form-control select select-default" data-toggle="select" name="act_use">
                        	<?php
							foreach($cf_yn_msg as $k=>$v){
								print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
							}
							?>
                            </select>
                        </div>
                    </div>
                </div>
                <input name="action" type="hidden" value="insert">
                <input class="button btn btn-block text-uppercase" type="submit" value="Insert">
            </form>
        </div><!--body-->
    </div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 activity: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			act_use: {
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
