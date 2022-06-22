<?php
session_start();
include('include/config.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">
	<div class="row">

		<div class="col-sm-12">
        
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> กลุ่มบุคลากร</a>
                </div>
            	<div class="panel-body">
<table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
<tr bgcolor="#E0E3CE">
<td class="boldBlack_12">Action</td>
    <td class="boldBlack_12">กลุ่ม</td>
	<!--<td class="boldBlack_12">Use</td>-->
	</tr>
<?php
$sql_1= "select * from $db_eform.personel_group
where gr_id!='0'
and gr_use = 'yes'
order by gr_datestamp desc";
$result_1=mysql_query($sql_1);
//echo"$result_1=mysql_query($sql_1);";
//$num_rows =mysql_num_rows($result_1);
while($rs=mysql_fetch_array($result_1)){
?>
  <tr   bgcolor="<? echo "$color"; ?>">
  	<td class="regBlack_13">
    	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="<?php print $_SERVER['PHP_SELF'];?>?gr_id=<?php print $rs['gr_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
            <li><a href="_action_group.php?gr_id=<?php print $rs['gr_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
          </ul>
        </div>
    </td>
      	<td class="regBlack_13" align="center"><?php echo $rs["gr_title"];  ?></td>
    <!--<td class="regBlack_13 <?php //print $cf_yn_msg[$rs["gr_use"]]['color'];?>"><?php //echo $cf_yn_msg[$rs["gr_use"]]['icon'].' '.$cf_yn_msg[$rs["gr_use"]]['label']; ?></td>-->
    </tr>
   <?php
}
?>
</table>
<hr>
					<legend>เพิ่ม/แก้ไขข้อมูล</legend>
                    <form class="form-horizontal" action="_action_group.php" method="post" id="defaultForm">
                    	<?php
						$rs=mysql_query("select * from $db_eform.personel_group
						where gr_id='$_GET[gr_id]'");
						$ob=mysql_fetch_assoc($rs);
						?>
                        
                    	<div class="form-group">
                        	<label class="control-label col-sm-3"><strong>กลุ่ม:</strong></label>
                            <div class="col-sm-9">
                            	<input type="text" name="gr_title" class="form-control" value="<?php print $ob['gr_title'];?>">
                            </div>
                        </div>
                        
                        <!--<div class="form-group">
                        	<label class="control-label col-sm-3"><strong>ใช้งาน:</strong></label>
                            <div class="col-sm-9">
                            	<?php
								/*foreach($cf_yn_msg as $k=>$v){
									if($k == $ob['gr_use']){
										print '<label class="radio"><input name="gr_use" type="radio" value="'.$k.'" data-toggle="radio" checked> '.$v['icon'].' '.$v['label'].'</label>';
									}else{
										print '<label class="radio"><input name="gr_use" type="radio" value="'.$k.'" data-toggle="radio"> '.$v['icon'].' '.$v['label'].'</label>';
									}
								}*/
								?>
                            </div>
                        </div>-->
                        
                        <div class="form-group">
                        	<div class="col-sm-9 col-sm-offset-3">
                            	<?php
								if(empty($_GET['gr_id'])){
									print '<input name="action" type="hidden" value="insert">';
									print '<button class="btn btn-primary btn-wide text-uppercase" type="submit">Insert</button>';
								}else{
									print '<input name="action" type="hidden" value="update">';
									print '<input name="gr_id" type="hidden" value="'.$ob['gr_id'].'">';
									print '<button class="btn btn-primary btn-wide text-uppercase" type="submit">Update</button>';
								}
								?>
                            </div>
                        </div>	
                    </form>

				</div><!--body-->
			</div><!--panel-->

		</div><!--col-12-->

	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 gr_title: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			gr_use: {
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
