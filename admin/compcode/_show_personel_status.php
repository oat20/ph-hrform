<?php
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
</head>

<body>
<?php include('../../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<div class="row">
    
    	<div class="col-sm-8">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ประเภทสถานะบุคลากร</a></h3>
                </div>
            	<div class="panel-body">
                	<div class="table-responsive">
                    	<table class="table table-striped regBlack_14">
                        	<thead>
                            	<tr>
                                	<th>Tools</th>
                                    <th></th>
                                    <th>การเป็นบุคลากรของคณะฯ</th>
                                    <!--<th>Use</th>-->
                                </tr>
                            </thead>
                            <tfoot>
                            	<tr>
                                	<th>Tools</th>
                                    <th></th>
                                    <th>การเป็นบุคลากรของคณะฯ</th>
                                    <!--<th>Use</th>-->
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php
								$rs = mysql_query("select * from $db_eform.personel_status where ps_id != '0' and ps_use = 'yes' order by ps_datestamp desc");
								while($ob = mysql_fetch_assoc($rs)){
									print '<tr>
												<td>
													<a href="'.$_SERVER['PHP_SELF'].'?ps_id='.$ob['ps_id'].'" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
													<a href="_action_personel_status.php?ps_id='.$ob['ps_id'].'&action=remove" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
												</td>
												<td>'.$ob['ps_title'].'</td>
												<td>'.$cf_yn_msg02[$ob['ps_flag']]['icon'].' '.$cf_yn_msg02[$ob['ps_flag']]['label'].'</td>';
												//print '<td class="'.$cf_yn_msg[$ob['ps_use']]['color'].'">'.$cf_yn_msg[$ob['ps_use']]['icon'].' '.$cf_yn_msg[$ob['ps_use']]['label'].'</td>';
										print '</tr>';
								}
								?>
                            </tbody>
                        </table>
                    </div><!--table-->
                </div><!--body-->
            </div><!--panel-->
        </div><!--col-->
        
        <div class="col-sm-4">
        	<div class="well">
            	<?php include('_form_personel_status.php');?>
            </div>
        </div><!--col-->
        
    </div><!--row-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 ps_title: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			ps_use: {
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