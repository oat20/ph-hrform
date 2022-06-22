<?php 
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
</head>
<body>
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="_show_substr.php"><i class="fa fa-arrow-left"></i> แก้ไขยุทธศาสตร์มหาวิทยาลัยฯ</a></h3>
        </div>
    	<div class="panel-body">
      		<form action="_action_str.php" method="post" id="defaultForm">
            	<?php
				$rs=mysql_query("select * from $db_eform.sub_strategic
				where id = '$_GET[id]'");
				$ob=mysql_fetch_assoc($rs);
				?>
        		<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ยุทธศาสตร์:</label>
                            <input name="nameth" type="text" id="name_type" size="50" maxlength="100" class="form-control" value="<?php print $ob['nameth'];?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ใช้งาน:</label>
                            <select class="form-control select select-default" data-toggle="select" name="ss_use">
                            	<?php
								foreach($cf_yn_msg as $k=>$v){
									if($ob['ss_use'] == $k){
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
                <input name="id" type="hidden" value="<?php print $ob['id'];?>">
                <input class="button btn btn-block text-uppercase" type="submit" value="Update">
    		</form>
        </div><!--body-->
    </div><!--panel-->

</div>

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 nameth: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			ss_use: {
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
