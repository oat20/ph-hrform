<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

include('../../lib/css-inc.php');

include('../../inc/navbar02-inc.php');
?>
<div class="container-fluid">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ข้อมูลผู้ใช้งานระบบ</a></h3>
        </div>
    	<div class="panel-body">
        
        	<div class="row">
            	<div class="col-sm-6">
                	<a href="_show_alluser_02.php" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มผู้ใช้งานระบบ</a>
                </div><!--col-->
                <div class="col-sm-6">
                	<form>
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i> ค้นหา</span>
                              <input type="search" class="form-control" aria-describedby="basic-addon1" id="jetsSearch">
                            </div>
                        </div>
                    </form>
                </div><!--col-->
            </div><!--row-->
            
<table class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
	<th>Action</th>
    <!--<td bgcolor="#E0E3CE" class="boldBlack_12">Account Name</td>-->
    <th>MU Email</th>
	<td bgcolor="#E0E3CE" class="boldBlack_12">ชื่อ</td>
    <td bgcolor="#E0E3CE" class="boldBlack_12">งาน</td>
    <td bgcolor="#E0E3CE" class="boldBlack_12">Permission</td>
    <!--<th bgcolor="#E0E3CE" class="boldBlack_12">เข้าระบะล่าสุด</th>-->
    </tr>
    </thead>
    <tfoot>
<tr bgcolor="#E0E3CE">
	<th>Action</th>
    <!--<td bgcolor="#E0E3CE" class="boldBlack_12">Account Name</td>-->
    <th>MU Email</th>
	<td bgcolor="#E0E3CE" class="boldBlack_12">ชื่อ</td>
    <td bgcolor="#E0E3CE" class="boldBlack_12">งาน</td>
    <td bgcolor="#E0E3CE" class="boldBlack_12">Permission</td>
    <!--<th bgcolor="#E0E3CE" class="boldBlack_12">เข้าระบะล่าสุด</th>-->
    </tr>
    </tfoot>
    <tbody id="jetsContent">
<?php
	$sql = "select * from $db_eform.develop_user as a
	inner join $db_eform.personel_muerp as c on (a.per_id = c.per_id)
	inner join $db_eform.tb_orgnew as d on (c.per_dept = d.dp_id)
	order by a.du_datestamp desc";
$exec=mysql_query($sql);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
			//��˹������Ѻ�������
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
<tr   bgcolor=<? echo "$color"; ?>>
	<td>
    	<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="form_editadmin.php?per_id=<?php print $rs['per_id'];?>"><i class="fa fa-pencil"></i> กำหนดสิทธิ์</a></li>
			<li><a href="reset-password.php?per_id=<?php print $rs['per_id'];?>"><i class="fa fa-retweet"></i> รีเชตรหัสผ่านใหม่</a></li>          
            <?php
            if($rs['du_status'] != 1){ print '<li><a href="_action_user.php?du_id='.$rs['du_id'].'&action=remove"><i class="fa fa-trash"></i> ลบ</a></li>'; }
			?>
          </ul>
        </div>
    </td>
        <!--<td class="regBlack_13"><?php //print $rs["username"];?></td>-->
        <td><?php print $rs['per_email'];?></td>
        <td class="regBlack_13"><?php echo $rs['per_pname'].$rs["per_fnamet"]." ".$rs["per_lnamet"]; ?></td>
		<td class="regBlack_13"><?php echo $rs["dp_name"]; ?></td>
        <td class="regBlack_13"><?php echo '<span class="label label-'.$admin_status[$rs['du_status']]['color'].'">'.$admin_status[$rs["du_status"]]['label'].'</span>'; ?></td>
        <!--<td class="regBlack_13"><?php //print dateFormat_02($rs['lastvisitdate']);?></td>--> 
       </tr>
  <?
}
?>
	</tbody>
</table>
		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
var jets = new Jets({
  searchTag: '#jetsSearch',
  contentTag: '#jetsContent',
  columns: [1,2,3,4] // optional, search by first column only
});
</script>