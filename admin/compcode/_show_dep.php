<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<?php 
print '<title>'.$titlebar['title'].'</title>';
include('../../lib/css-inc.php');
?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-12">
        
        	<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<div class="pull-left"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ส่วนงาน</a></div>
                </div>
            	<div class="panel-body">
                	<p class="text-right"><a href="_form_org.php" class="btn btn-link"><i class="fa fa-plus"></i> เพิ่มรายการ</a></p>
<table class="table table-striped">
	<thead>
<tr   bgcolor="#E0E3CE">
	<th class="boldBlack_12"></th>
    <th>รหัสส่วนงาน</th>
    <th class="boldBlack_12">ส่วนงาน</th>
    <th>หัวหน้าส่วนงาน</th>
    <th>บริหารงานโดย</th>
</tr>
	</thead>
    <tfoot>
<tr   bgcolor="#E0E3CE">
	<th class="boldBlack_12"></th>
    <th>รหัสส่วนงาน</th>
    <th class="boldBlack_12">ส่วนงาน</th>
    <th>หัวหน้าส่วนงาน</th>
    <th>บริหารงานโดย</th>
</tr>
	</tfoot>
    <tbody>
 <?php
$sql_hot = "SELECT *, b.dp_id as dp_id 
FROM $db_eform.department_type AS a
INNER JOIN $db_eform.tb_orgnew AS b ON ( a.typ_id = b.typ_id )
left join $db_eform.per_boss on (b.dp_id = per_boss.dp_id)
left join $db_eform.personel_muerp on (per_boss.per_id = personel_muerp.per_id) 
WHERE a.typ_id =  'PH00001'
OR a.typ_id =  'PH00002'
ORDER BY convert(a.typ_name using tis620) ASC , 
convert(b.dp_name using tis620) ASC";
$exec_hot=mysql_query($sql_hot);
$swap=1;
while($rs=mysql_fetch_array($exec_hot)){
	/*$sql_02 = mysql_query("select * from $db_eform.tb_orgnew
					inner join $db_eform.personel_muerp on (tb_orgnew.dp_dean = personel_muerp.per_id)
					where tb_orgnew.dp_id = '$rs[dp_id]'");*/
	$sql_02=mysql_query("select * from $db_eform.per_dean as t1
		left join $db_eform.personel_muerp as t2 on (t1.per_id=t2.per_id)
		where t1.dp_id='$rs[dp_id]'");
	$ob_02 = mysql_fetch_assoc($sql_02);
?>
  <tr>
  	<td class="regBlack_13">
    	<!-- Single button -->
        <div class="btn-group btn-group-xs">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fui-gear"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="_edit_org.php?dp_id=<?php print $rs['dp_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
            <li><a href="_action_org.php?dp_id=<?php print $rs['dp_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
          </ul>
        </div>
    </td>
    <td><?php echo $rs['dp_code'];?></td>
    <td><?php echo $rs['typ_name'].' <i class="fa fa-angle-double-right"></i> '.$rs["dp_name"];  ?></td>
   <td><?php print $rs['per_fnamet'].' '.$rs['per_lnamet'];?></td>
    <td><?php echo $ob_02['per_fnamet'].' '.$ob_02['per_lnamet'];?></td>
  </tr>					  		  
  <?
}
?>
	</tbody>
</table>
				</div><!--body-->
			</div><!--panel-->

		</div><!--col-->

	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
</html>
