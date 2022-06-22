<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<title><?php print $titlebar['shorttitle'];?></title>
<?php include('../../lib/css-inc.php');?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>
<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-8">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ยุทธศาสตร์คณะฯ</a></h3>
                </div>
            	<div class="panel-body">
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
	<thead>
<tr>
    <th class="boldBlack_12">Action</th>
    <th  class="boldBlack_12">ยุทธศาสตร์</th>
	<th class="boldBlack_12">Use</th>
  </tr>
  </thead>
  <tbody>
<?
$sql="select * from $db_eform.strategic_faculty
order by modified desc";
$exec=mysql_query($sql);
#$exec = show_data(position_news,id_position);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
			if ( $swap ==  "1" )
			{
					$color = "#99CEF9";
					$swap = "2";
			}
			else
			{
					$color = "#EEEEEE";
					$swap = "1";
			}
			//��˹������Ѻ�������
?>
  <tr   bgcolor="<? echo "$color"; ?>">
      <td class="regBlack_13">
      	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="<?php print $_SERVER['PHP_SELF'].'?sf_id='.$rs['sf_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
            <li><a href="_action_strfac.php?sf_id=<?php print $rs['sf_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
          </ul>
        </div>
      </td>
    <td class="regBlack_13"><?php print $rs['sf_name'];?></td>
    <td class="regBlack_13 <?php print $cf_yn_msg[$rs["sf_use"]]['color'];?>"><?php print $cf_yn_msg[$rs["sf_use"]]['icon'].' '.$cf_yn_msg[$rs["sf_use"]]['label']; ?></td>
  </tr>
  <?
}
//?>
	</tbody>
</table>
				</div><!--body-->
			</div><!--panel-->
		</div><!--col-->
        
        <div class="col-sm-4">
        	<div class="well">
            	<?php include('_form_str_fac.php');?>
            </div><!--well-->
        </div><!--col-->
        
	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 sf_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			sf_use: {
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
