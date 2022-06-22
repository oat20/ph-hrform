<?php
session_start();

include('include/config.php');
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
        	<h3 class="panel-title"><a href="_show_type.php"><i class="fa fa-arrow-left"></i> เพิ่ม / แก้ไขรายการ</a></h3>
        </div>
        <div class="panel-body">
        	<form  name="insert_type "action="_action_type.php" method="post" class="form-horizontal" id="defaultForm">
            	<?php
				$rs=mysql_query("select * from $db_eform.personel_type
				where pert_id='$_GET[pert_id]'");
				$ob=mysql_fetch_assoc($rs);
				?>
            	<div class="form-group">
                	<label class="control-label col-sm-3"><strong>ประเภท:</strong></label>
                    <div class="col-sm-9">
                    	<input name="pert_name" type="text "id="name_type" size="80" maxlength="200" class="form-control" value="<?php print $ob['pert_name'];?>">
                    </div>
                </div>
                <!--<div class="form-group">
                        	<label class="control-label col-sm-3"><strong>ใช้งาน:</strong></label>
                            <div class="col-sm-9">
                            	<?php
								/*foreach($cf_yn_msg02 as $k=>$v){
									if($k == $ob['pert_status']){
										print '<label class="radio"><input name="pert_status" type="radio" value="'.$k.'" data-toggle="radio" checked> '.$v['icon'].' '.$v['label'].'</label>';
									}else{
										print '<label class="radio"><input name="pert_status" type="radio" value="'.$k.'" data-toggle="radio"> '.$v['icon'].' '.$v['label'].'</label>';
									}
								}*/
								?>
                            </div>
                        </div>-->
                        
                        <div class="form-group">
                        	<div class="col-sm-9 col-sm-offset-3">
                            	<?php
								if(empty($_GET['pert_id'])){
									print '<input name="action" type="hidden" value="insert">';
									print '<button class="btn btn-primary btn-wide text-uppercase" type="submit">Insert</button>';
								}else{
									print '<input name="action" type="hidden" value="update">';
									print '<input name="pert_id" type="hidden" value="'.$ob['pert_id'].'">';
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
			 pert_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			pert_status: {
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
