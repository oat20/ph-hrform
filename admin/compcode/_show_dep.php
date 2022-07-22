<?php
session_start();

include('include/config.php');
include('check_login.php');
require_once '../../lib/mysqli.php';
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<?php 
print '<title>'.$titlebar['title'].'</title>';
include('../../lib/css-inc.php');
?>
</head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-12">
        
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ส่วนงาน</a></h3>
                </div>
            	<div class="panel-body">
                	<p class="text-right">
                    <a href="_form_org.php" class="btn btn-default btn-wide"><i class="fa fa-plus fa-fw"></i> เพิ่มรายการ</a>
                  </p>
                  <div class="table-responsive">
<table class="table table-striped">
	<thead>
<tr   bgcolor="#E0E3CE">
	<th class="boldBlack_12"></th>
    <th>รหัสส่วนงาน</th>
    <th class="boldBlack_12">ส่วนงาน</th>
    <th>หัวหน้าส่วนงาน</th>
</tr>
	</thead>
    <tfoot>
<tr   bgcolor="#E0E3CE">
	<th class="boldBlack_12"></th>
    <th>รหัสส่วนงาน</th>
    <th class="boldBlack_12">ส่วนงาน</th>
    <th>หัวหน้าส่วนงาน</th>
</tr>
	</tfoot>
    <tbody>
 <?php
$sql_hot = "SELECT *, b.dp_id as dp_id 
FROM $db_eform.department_type AS a
left JOIN $db_eform.tb_orgnew AS b ON ( a.typ_id = b.typ_id )
left join $db_eform.per_boss on (b.dp_id = per_boss.dp_id)
left join $db_eform.personel_muerp on (per_boss.per_id = personel_muerp.per_id) 
WHERE a.typ_id =  'PH00001'
OR a.typ_id =  'PH00002'
ORDER BY convert(a.typ_name using tis620) ASC , 
convert(b.dp_name using tis620) ASC";
$exec_hot=mysqli_query($condb, $sql_hot);
$swap=1;
while($rs=mysqli_fetch_array($exec_hot)){
?>
  <tr>
  	<td class="regBlack_13">
    	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="_edit_org.php?dp_id=<?php print $rs['dp_id'];?>"><i class="fa fa-pencil fa-fw"></i> แก้ไข</a></li>
            <li><a href="_action_org.php?dp_id=<?php print $rs['dp_id'];?>&action=remove"><i class="fa fa-trash fa-fw"></i> ลบ</a></li>
          </ul>
        </div>
    </td>
    <td><?php echo $rs['dp_code'];?></td>
    <td><?php echo $rs['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$rs["dp_name"];  ?></td>
   <td><?php print $rs['per_fnamet'].' '.$rs['per_lnamet'];?><br><?php echo $rs['per_email'];?></td>
  </tr>					  		  
  <?
}
?>
	</tbody>
</table>
</div>
				</div><!--body-->
			</div><!--panel-->

		</div><!--col-->

	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
</html>
