<?php
session_start();

include("compcode/include/config.php");
include("compcode/include/connect_db.php");
include("compcode/check_login.php");
include("compcode/include/function.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../lib/css-inc.php');?>
</head>

<body>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12">
        	<h4>
                รายชื่อผู้เข้าร่วม 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> ปิด</button>
            </h4>
            <div class="table-responsive">
            	<table class="table table-bordered table-striped">
                	<thead>
                    	<tr>
                        	<th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>งาน</th>
                        </tr>
                    </thead>
                  	<tfoot>
                    	<tr>
                        	<th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>งาน</th>
                        </tr>
                        <tbody>
                        	<?php
							$sql=mysql_query("select * from $db_eform.develop_course_personel as t1
								inner join $db_eform.personel_muerp as t2 on(t1.per_id=t2.per_id)
								inner join $db_eform.tb_orgnew as t3 on(t2.per_dept=t3.dp_id)
								where t1.dev_id='$_GET[dev_id]'
								order by convert(t3.dp_name using tis620) asc,
								convert(t2.per_fnamet using tis620) asc,
								convert(t2.per_lnamet using tis620) asc");
							while($ob=mysql_fetch_assoc($sql)){
								echo '<tr>
											<td>'.++$r.'</td>
											<td>'.$ob['per_fnamet'].'</td>
											<td>'.$ob['per_lnamet'].'</td>
											<td>'.$ob['dp_name'].'</td>
									</tr>';
							}
							?>
                        </tbody>
                    </tfoot>
                </table>
            </div><!--table-->
        </div><!--col-->
    </div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>