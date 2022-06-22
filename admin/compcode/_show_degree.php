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
    
    	<div class="col-sm-8">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ประเภทระดับการศึกษา</a></h3>
                </div>
            	<div class="panel-body">
                	<div class="table-responsive">
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
	<thead>
<tr>
	<th>#</th>
<th class="boldBlack_12"></th>
    <th class="boldBlack_12">Tools</th>
    </tr>
    </thead>
    <tfoot>
<tr>
	<th>#</th>
<th class="boldBlack_12"></th>
    <th class="boldBlack_12">Tools</th>
    </tr>
    </tfoot>
    <tbody>
<?php
$sql="select * from $db_eform.degree
		where dg_status='1'
		order by datestamp desc";
#$exec = show_data(person_most,id_person);
$exec=mysql_query($sql);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
?>
  <tr>
  	<td><?php echo ++$r;?></td>
    <td><?php print $rs['dg_name'];?></td>
  <td>
  	<a href="<?php print $_SERVER['PHP_SELF'].'?dg_id='.$rs['dg_id'];?>" class="btn btn-link" data-toggle="tooltip" data-placement="left" title="แก้ไข"><i class="fa fa-pencil"></i></a>
     <a href="_action_degree.php?dg_id=<?php print $rs['dg_id'];?>&action=remove" class="btn btn-link text-danger" data-toggle="tooltip" data-placement="right" title="ลบ"><i class="fa fa-trash"></i></a>
  </td> 
  </tr>  
  <?
}
//?>
	</tbody>
</table>
					</div><!--table-->
				</div><!--body-->
			</div><!--panel-->
		</div><!--col-->
        
        <div class="col-sm-4">
        	<div class="well">
            	<?php include('_form_degree.php');?>
            </div><!--well-->
        </div><!--col-->
        
	</div><!--row-->
</div><!--/*container*/-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 dg_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
		 }
	});
	
	 $('[data-toggle="tooltip"]').tooltip('hide');
});
</script>
</body>
</html>
