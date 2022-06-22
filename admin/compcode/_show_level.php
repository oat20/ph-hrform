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
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<div class="row">
    	<div class="col-lg-6">
    
	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<h3 class="panel-title pull-left"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ระดับกิจกรรม</a></h3>
        </div>
    	<div class="panel-body">
<table class="table">
	<thead>
<tr bgcolor="#E0E3CE">
<th class="boldBlack_12"></th>
    <th class="boldBlack_12">Use</th>
    <th class="boldBlack_12">Action</th>
	</tr>
    </thead>
    <tbody>
<?php
$sql_1= "SELECT * from $db_eform.develop_level
where le_id != '0'
order by le_datestamp desc";
$result_1=mysql_query($sql_1);
$num_rows =mysql_num_rows($result_1);
		for($i=0; $i < $num_rows; $i++){
$rs=mysql_fetch_array($result_1);
?>
  <tr>
  	<td class="regBlack_13"><?php print $rs['le_title'];?></td>
    <td class="regBlack_13 <?php print $cf_yn_msg[$rs['le_use']]['color'];?>"><?php print $cf_yn_msg[$rs['le_use']]['icon'].' '.$cf_yn_msg[$rs['le_use']]['label'];?></td>
      	<td class="regBlack_13" align="center">
        	<!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="<?php print $_SERVER['PHP_SELF'].'?le_id='.$rs['le_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
                <li><a href="_action_level.php?le_id=<?php print $rs['le_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
              </ul>
            </div>
        </td>
    </tr>  
  <?
}
?>
	</tbody>
</table>
		</div><!--body-->
	</div><!--panel-->

		</div><!--col-->
        
        <div class="col-lg-6">
        	<div class="well">
            	<?php 
				if(empty($_GET['le_id'])){
					include('_form_level.php');
				}else{
					include('_edit_level.php');
				}
				?>
            </div>
        </div><!--col-->
	</div><!--row-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 le_title: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			le_use: {
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
