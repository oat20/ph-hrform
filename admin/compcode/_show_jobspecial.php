<?php
session_start();
include('include/config.php');
include('check_login.php');
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
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left">ตำแหน่งด้านบริหารงาน</h3>
                    <div class="pull-right"><a href="_form_jobspecial.php" class="btn btn-default"><strong><i class="fa fa-plus"></i> เพิ่มรายการ</strong></a></div>
                </div>
            	<div class="panel-body">
                	<form>
                    	<div class="form-group">
                        	<div class="input-group">
                              <span class="input-group-addon" id="basic-addon3"><i class="fa fa-search"></i> ค้นหา</span>
                              <input type="search" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </form>
<table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
<th class="boldBlack_12">Action</th>
    <th class="boldBlack_12"></th>
	<!--<th class="boldBlack_12">Use</th>-->
	</tr>
    </thead>
    <tfoot>
<tr bgcolor="#E0E3CE">
<th class="boldBlack_12">Action</th>
    <th class="boldBlack_12"></th>
	<!--<th class="boldBlack_12">Use</th>-->
	</tr>
    </tfoot>
    <tbody id="jetsContent">
<?php
$sql_1= "select * from $db_eform.job_special
where jobs_id != '0'
and jobs_status = '1'
order by jobs_modify desc";
$result_1=mysql_query($sql_1);
//echo"$result_1=mysql_query($sql_1);";
//$num_rows =mysql_num_rows($result_1);
while($rs=mysql_fetch_array($result_1)){
?>
  <tr>
  	<td class="regBlack_13">
    	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="_form_jobspecial.php?jobs_id=<?php print $rs['jobs_id'];?>"><i class="fa fa-pencil"></i> แก้ไข</a></li>
            <li><a href="_action_jobspecial.php?jobs_id=<?php print $rs['jobs_id'];?>&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>
          </ul>
        </div>
    </td>
      	<td class="regBlack_13" align="center"><?php echo $rs["jobs_name"];  ?></td>
    <!--<td class="regBlack_13 <?php //print $cf_yn_msg02[$rs["jobs_status"]]['color'];?>"><?php //echo $cf_yn_msg02[$rs["jobs_status"]]['icon'].' '.$cf_yn_msg02[$rs["jobs_status"]]['label']; ?></td>-->
    </tr>
   <?php
}
?>
	</tbody>
</table>

				</div><!--body-->
			</div><!--panel-->

		</div><!--col-12-->

	</div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
var jets = new Jets({
  searchTag: '#basic-url',
  contentTag: '#jetsContent',
  columns: [1] // optional, search by first column only
});
</script>
</body>
</html>
