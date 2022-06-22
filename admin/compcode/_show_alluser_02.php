<?php
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

include('../../lib/css-inc.php');

//include('../../inc/navbar02-inc.php');
?>
<div class="container-fluid">
	<div class="space1"></div>
    
	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<h3 class="panel-title pull-left"><a href="_show_alluser.php"><i class="fa fa-arrow-left"></i> Search Users</a></h3>
        </div>
    	<div class="panel-body">
        		<legend>ค้นหาด้วยชื่อ หรือ Email</legend>
            	<form method="post" action="<?php print $_SERVER['PHP_SELF'];?>">
                	<div class="row">
                    	<div class="col-sm-10">
                        	<div class="form-group">
                        		<input type="text" name="keyword" class="form-control" required>
                                <span class="help-block">ใช้ข้อมูลจากระบบนามานุกรมออนไลน์ (Phonebook)</span>
                            </div>
                        </div>
                        
                        <div class="col-sm-2">
                        	<button class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>
            	
                <?php
				if(isset($_POST['keyword'])){
					print '<hr>';
				?>
<table border="0" cellpadding="3" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" width="100%" class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
    <th>MU Email</th>
	<td bgcolor="#E0E3CE" class="boldBlack_12">ชื่อ</td>
    <td bgcolor="#E0E3CE" class="boldBlack_12">งาน</td>
    <th></th>
    </tr>
    </thead>
    <tfoot>
<tr bgcolor="#E0E3CE">
    <th>MU Email</th>
	<td bgcolor="#E0E3CE" class="boldBlack_12">ชื่อ</td>
    <td bgcolor="#E0E3CE" class="boldBlack_12">งาน</td>
    <th></th>
    </tr>
    </tfoot>
    <tbody>
<?php
	$sql = "select * from $db_eform.personel_muerp
	inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
	inner join $db_eform.personel_status as t3 on(personel_muerp.per_status=t3.ps_id)
	where (personel_muerp.per_fnamet like '%$_POST[keyword]%'
	or personel_muerp.per_fnamee like '%$_POST[keyword]%'
	or personel_muerp.per_email = '$_POST[keyword]')
	and t3.ps_flag='1'
	order by convert (personel_muerp.per_fnamet using tis620) asc,
	convert (personel_muerp.per_lnamet using tis620) asc";
#$exec = show_user();
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
        <td><?php print $rs['per_email'];?></td>
        <td class="regBlack_13"><? echo $rs['per_pname'].$rs["per_fnamet"]." ".$rs["per_lnamet"]; ?></td>
		<td class="regBlack_13"><? echo $rs["dp_name"]; ?></td>
        <td><a href="form_adduser.php?per_id=<?php print $rs['per_id'];?>" class="btn btn-default btn-sm btn-wide"><i class="fa fa-tasks"></i> กำหนดสิทธิ์</a></td>
       </tr>
  <?
}
?>
	</tbody>
</table>
			<?php
			}
			?>
            
		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>