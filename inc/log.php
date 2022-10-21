<?php
session_start();

include('../admin/compcode/include/config.php');
//include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include('../lib/css-inc.php');?>
    </head>
    <body>
        <?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="<?php print $livesite;?>profile/profile.php"><i class="fa fa-arrow-left"></i> Logfile</a></h3>
        </div>
    	<div class="panel-body">
        	<form>
            	<div class="form-group">
                	<div class="input-group">
                      <span class="input-group-addon" id="basic-addon3"><i class="fa fa-search"></i> ค้นหาข้อมูล</span>
                      <input type="search" class="form-control" aria-describedby="basic-addon3" id="jetsSearch">
                    </div>
                </div>
            </form>
        	<div class="table-responsive">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-striped">
	<thead>
<tr bgcolor="#59993f">
	<th>#</th>
	<th>วันที่</th>
    <th>IP</th>
    <th>Status</th>
    <th></th>
    <th>Permission</th>
</tr>
	</thead>
    <tfoot>
<tr bgcolor="#59993f">
	<th>#</th>
	<th>วันที่</th>
    <th>IP</th>
    <th>Status</th>
    <th></th>
    <th>Permission</th>
</tr>
	</tfoot>
    <tbody id="jetsContent">
<?php
/*$sql = "SELECT *,DATE_FORMAT(logfile.log_date,'%d/%m/%Y, %H:%i:%s') as logdate 
FROM phper2.logfile
INNER JOIN phper2.personel ON ( logfile.log_user = personel.per_id )
left join $db_eform.develop_user on (personel.per_id = develop_user.per_id) 
ORDER BY log_date DESC ";*/
$sql = "SELECT *,DATE_FORMAT(t1.log_datestamp,'%d/%m/%Y, %H:%i:%s') as logdate 
FROM $db_eform.personel_muerp_log as t1
INNER JOIN $db_eform.personel_muerp as t2 ON ( t1.per_id = t2.per_id )
left join $db_eform.develop_user as t3 on (t2.per_id = t3.per_id) 
ORDER BY t1.log_datestamp DESC";
$rs=mysqli_query($condb,$sql);
while($ob=mysqli_fetch_assoc($rs)){
	?>
    <tr>
    	<td><?php echo ++$r;?></td>
    	<td align="center"><?php print $ob['logdate']; ?></td>
        <td><?php print $ob['log_ipstamp'];?></td>
        <td><?php echo $ob['log_status'];?></td>
        <td align="center"><?php print $ob['per_pname'].$ob['per_fnamet']." ".$ob['per_lnamet']; ?></td>
        <td><?php echo '<span class="label label-'.$admin_status[$ob['du_status']]['color'].'">'.$admin_status[$ob["du_status"]]['label'].'</span>'; ?></td>
    </tr>
    <?php
}
?>
	</tbody>
</table>
			</div><!--table-->
		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
var jets = new Jets({
  searchTag: '#jetsSearch',
  contentTag: '#jetsContent',
  columns: [1,2,3,4,5] // optional, search by first column only
});
</script>
</body>
</html>