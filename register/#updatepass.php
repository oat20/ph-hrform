<?php
include('../admin/compcode/include/config.php');
include('../admin/compcode/include/connect_db.php');

$sql1=mysql_query("select * from $db_eform.develop_user as t1
	inner join $db_eform.personel_muerp as t2 on(t1.per_id=t2.per_id)
	where t1.per_id!='10000'");
while($ob1=mysql_fetch_assoc($sql1)){
	mysql_query("update $db_eform.personel_muerp set
		per_password='".base64_encode('123456')."'
		where per_id='$ob1[per_id]'");
}
?>