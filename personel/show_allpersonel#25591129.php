<?php
session_start();

include('../admin/compcode/include/config.php');
//include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php 
include('../lib/css-inc.php');

include('../inc/navbar02-inc.php');
//include("../admin/inc/form_search.php");
?>
<div class="container-fluid">

	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<h3 class="panel-title pull-left"><a href="../profile/profile.php"><i class="fa fa-arrow-left"></i> ข้อมูลบุคลากร</a></h3>
            <div class="pull-right"><a href="form_insertnews.php" class="btn btn-link"><i class="fa fa-plus"></i> เพิ่มรายการ</a></div>
        </div>
    	<div class="panel-body">
        	<form method="post" action="<?php print $_SERVER['PHP_SELF'];?>">
            	<div class="form-group">
                    <div class="input-group">
                      <input type="text" name="keyWord" class="form-control" placeholder="ค้นหาข้อมูล" required>
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                      </span>
                    </div><!-- /input-group -->
                </div>
            </form>
            <hr>
            
			<div class="table-responsive">
<table width=100% align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table3 table-striped">
	<thead>
<tr   bgcolor="#E0E3CE" class="regBlack_14">
    <th>#</th>
    <th >ชื่อ - นามสกุล</th>
	<th >ส่วนงาน</th>
	<th>ตำแหน่งงาน</th>
    <th>ประเภท</th>
    <th>วันที่บรรจุ</th>
    <th>สถานภาพ</th>
    <th>Tools</th>
  </tr>
  </thead>
  <tbody>
<?php
 //echo"$pagetop"; 
$pagelen =20 ;
$page = $_REQUEST['page'];
if (empty($page)) { $page=1; }
$swap=1;

if($_SESSION["ses_du_status"]==1 or $_SESSION['ses_du_status']==2) //Super Administrator(1), งาน HR(2)
{
	$sql= "SELECT * from phper2.personel as a1
	inner join phper2.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)";
}
else if($_SESSION["ses_du_status"]==3) //ส่วนงาน(3)
{
	$sql="SELECT * from phper2.personel as a1
	inner join phper2.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
	where a1.per_dept='$_SESSION[ses_per_dept]'";
	/*$sql= "SELECT * from personel as a1
	left join tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
	left join job as a3 on (a1.job_id=a3.job_id)";*/
}
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);	


$totalpage = ceil($num_rows / $pagelen); 
$goto = ($page-1) * $pagelen;

if($_SESSION["ses_du_status"]==1 or $_SESSION["ses_du_status"]==2) //Super Administrator(1), งาน HR(2)
{	
	if(empty($_POST['keyWord'])){
		$sql_1= "SELECT *, a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id 
		from phper2.personel as a1
		inner join phper2.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join phper2.personel_status on (a1.per_status = personel_status.ps_id)
		left join phper2.personel_type on (a1.per_type=personel_type.pert_id)
		order by a1.per_modify desc   
		LIMIT $goto , $pagelen ";
	}else{
		$sql_1= "SELECT *, a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id 
		from phper2.personel as a1
		inner join phper2.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join phper2.personel_status on (a1.per_status = personel_status.ps_id)
		left join phper2.personel_type on (a1.per_type=personel_type.pert_id)
		where a1.per_fnamet like '%$_POST[keyWord]%'
		or a1.per_lnamet like '%$_POST[keyWord]%'
		order by convert (a1.per_fnamet using tis620) asc,
		convert (a1.per_lnamet using tis620) asc";
	}
}
else if($_SESSION["ses_du_status"]==3) //ส่วนงาน(3)
{
	if(empty($_POST['keyWord'])){
		$sql_1= "SELECT * from phper2.personel as a1
		inner join phper2.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join phper2.personel_status on (a1.per_status = personel_status.ps_id)
		left join phper2.personel_type on (a1.per_type=personel_type.pert_id)
		where a1.per_dept='$_SESSION[ses_per_dept]'
		order by a1.per_modify desc   
		LIMIT $goto , $pagelen ";
	}else{
		$sql_1= "SELECT * from phper2.personel as a1
		inner join phper2.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join phper2.personel_status on (a1.per_status = personel_status.ps_id)
		left join phper2.personel_type on (a1.per_type=personel_type.pert_id)
		where a1.per_dept='$_SESSION[ses_per_dept]'
		and (a1.per_fnamet like '%$_POST[keyWord]%'
		or a1.per_lnamet like '%$_POST[keyWord]%')
		order by convert (a1.per_fnamet using tis620) asc,
		convert (a1.per_lnamet using tis620) asc";
	}
}
$result_1=mysql_query($sql_1);
$num_rows =mysql_num_rows($result_1);

		For ($i=0; $i < $num_rows; $i++){
				$rs=mysql_fetch_array($result_1);
//กำหนดค่าสลับการสีแถว
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
			//กำหนดค่าสลับการสีแถว
			if($rs['job_name'] != "" and $rs['job_name'] != "ไม่มี"){
				$job=$rs['job_name'];
			}else{
				$job=$rs['job_id'];
			}
?>
  <tr>
    <!--<td><img src="<?php //echo $livesite;?>img/personel/thumbnail/<?php //echo $rs["../admin/per_img"];?>" class="img_thumbnail120x140"></td>-->
    <td><?php print ++$r;?>.</td>
    <td class="regBlack_13"><span class="boldBlack_10"><?php echo $rs["per_pname"]." ".$rs["per_fnamet"]." ".$rs["per_lnamet"];?></span>
    <br/><?php echo $rs["per_pname2"]." ".$rs["per_fnamee"]." ".$rs["per_lnamee"];?></td>
	<td class="regBlack_13"><?php echo $rs["dp_name"];  ?></td>
	<td class="regBlack_13" align="center"><?php echo $job;  ?></td>
    <td><?php echo $rs['pert_name'];?></td>
    <td><?php echo $rs['per_adddate'];?></td>
    <td><?php print $rs['ps_title'];?></td>
   <td><div class="btn-group" role="group"><a href="form_edit_personel.php?per_id=<?php print $rs['per_id'];?>" class="btn btn-link" data-toggle="tooltip" data-placement="left" title="แก้ไข"><i class="fa fa-pencil"></i></a><a href="load_insertpersonel.php?per_id=<?php print $rs['per_id'];?>&action=remove" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="ลบ"><i class="fa fa-trash"></i></a></div></td>
  </tr>
  <?php
}
?>
	</tbody>
</table>

<table width="100%" align="center" class="table">
	<tbody>
  <tr>
  	<td>
        หน้า
<?php
/*if ($page > 1) {
	$back = $page - 1;
	echo "<a href=$PHP_SELF?page=1>".
	"<font size =2 color=#ffffff>หน้าแรก</font></a>&nbsp;\n";
	echo "<a href=$PHP_SELF?page=".  $back .">
	<font size =2 color=#ffffff>ย้อนกลับ</font></a>&nbsp;";
}*/

For ($i=1 ; $i<=$totalpage ; $i++) {
	if ($i == $page ) {
		echo " |<b><font size =2 color=#990000>$i</font></b>|\n";
	} else  {
		echo " <a href=$PHP_SELF?page=$i><font size =2 color=#FFCC00>$i</font></a> \n";
	}
} 

/*if ($page < $totalpage) {
	$next = $page  +1;
	echo "<a href=$PHP_SELF?page=".$next.">
	<font size =2 color=#ffffff>หน้าต่อไป</font></a>";
	echo " <a href=$PHP_SELF?page=".$totalpage."><font size =2 color=#ffffff>หน้าสุดท้าย</font></a> &nbsp;&nbsp;</a> \n";
}*/ 

?>
</td><tr></tbody></table>
			</div>
		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
  $('[data-toggle="tooltip"]').tooltip('hide');
})
</script>
</body>
</html>
