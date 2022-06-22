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
                	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ประเภทแหล่งทุน</a></h3>
                </div>
            	<div class="panel-body">
                	<div class="table-responsive">
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
	<thead>
<tr>
<th class="boldBlack_12">Action</th>
    <th class="boldBlack_12"></th>
    <th class="boldBlack_12">Use</th>
    </tr>
    </thead>
    <tbody>
<?php
$sql="select * from $db_eform.develop_payfrom where pf_id != '0' order by pf_datestamp desc";
#$exec = show_data(person_most,id_person);
$exec=mysql_query($sql);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
?>
  <tr>
  <td class="regBlack_13">
  	<a href="<?php print $_SERVER['PHP_SELF'].'?pf_id='.$rs['pf_id'];?>" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
     <a href="_action_payfrom.php?pf_id=<?php print $rs['pf_id'];?>&action=remove" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
  </td> 
        <td class="regBlack_13"><?php print $rs['pf_title'];?></td>
        <td class="regBlack_13 <?php print $cf_yn_msg[$rs["pf_use"]]['color'];?>"><? echo $cf_yn_msg[$rs["pf_use"]]['icon'].' '.$cf_yn_msg[$rs["pf_use"]]['label'];?></td>
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
            	<?php include('_form_payfrom.php');?>
            </div><!--well-->
        </div><!--col-->
        
	</div><!--row-->
</div><!--/*container*/-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 pf_title: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			pf_use: {
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
