<?php
session_start();

include('admin/compcode/include/config.php');
include('admin/compcode/check_login.php');
include('admin/compcode/include/connect_db.php');
include('admin/compcode/include/function.php');
?>
<!doctype html>
<title><?php echo $titlebar['title'];?></title>
<?php include('lib/css-inc.php');?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('inc/navbar02-inc.php');?>

<div class="container-fluid">

	<div class="row">
    	<!--<div class="col-sm-2">
        	<?php //include('sub-nav.php');?>
        </div>--><!--col-->
        
        <div class="col-sm-12">

	<ol class="breadcrumb">
      <li><a href="profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ประวัติการการเข้าร่วมปฏิบัติงานพัฒนาบุคลากร</a></li>
    </ol>
    
    <div class="row">
    	<div class="col-sm-6">
        	<div class="btn-group">
            	<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-default"><i class="fa fa-list fa-fw" aria-hidden="true"></i> แสดงทั้งหมด</a>
                  <?php
				  foreach($cf_approve as $k=>$v){
					  echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_approve='.$k.'" class="btn btn-primary">'.$v['icon'].' '.$v['name'].'</a>';
				  }
				  ?>
            </div>
        </div><!--col-->
    	<div class="col-sm-6">
            <form>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i> ค้นหาแบบฟอร์ม</span>
                      <input type="search" class="form-control" aria-describedby="basic-addon1" id="jetsSearch">
                    </div>
                </div>
            </form>
    	</div><!--col-->
    </div><!--row-->
    
    <div class="table-responesive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<th>Status</th>
    <th class="text">Ref No.</th>
    <th class="text">ลักษณะงาน</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th></th>
	<th class="text">Tools</th>
    </tr>
  </thead>
  <tfoot>
<tr bgcolor="#E0E3CE" class="text">
	<th>Status</th>
    <th class="text">Ref No.</th>
    <th class="text">ลักษณะงาน</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th></th>
	<th class="text">Tools</th>
    </tr>
  </tfoot>
  <tbody id="jetsContent">
 <?php
 if(empty($_GET['dev_approve'])){
	$sql="select * from $db_eform.develop as t1
	 	inner join $db_eform.develop_main_type as t2 on (t1.dev_maintype = t2.dm_id)
		inner join $db_eform.develop_type as t4 on (t1.dev_type = t4.dvt_id)
		inner join $db_eform.develop_course_personel as t5 on(t1.dev_id = t5.dev_id)
				where t5.per_id='$_SESSION[ses_per_id]'
				and t1.dev_remove='no'
				and t1.dev_maintype='1'
				order by t1.dev_create desc";
 }else{
	 $sql="select * from $db_eform.develop as t1
	 	inner join $db_eform.develop_main_type as t2 on (t1.dev_maintype = t2.dm_id)
		inner join $db_eform.develop_type as t4 on (t1.dev_type = t4.dvt_id)
		inner join $db_eform.develop_course_personel as t5 on(t1.dev_id = t5.dev_id)
				where t5.per_id='$_SESSION[ses_per_id]'
				and t1.dev_remove='no'
				and t1.dev_maintype='1'
				and t1.dev_approve='$_GET[dev_approve]'
				order by t1.dev_create desc";
 }
 $exec=mysql_query($sql);
while($rs=mysql_fetch_array($exec)){
	++$num;
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
			$sql02=mysql_query("SELECT *
			FROM  $db_eform.develop_course_personel 
			WHERE dev_id =  '$rs[dev_id]'");
			
			$sql03=mysql_query("select * from $db_eform.develop as t1
				inner join $db_eform.personel_muerp as t2 on(t1.dev_perid=t2.per_id)
				where t1.dev_id='$rs[dev_id]'");
			$rs03=mysql_fetch_assoc($sql03);
?>
  <tr   bgcolor="<?php echo "$color"; ?>" class="text">
  	<td>
		<?php echo '<span class="label label-'.$cf_approve[$rs['dev_approve']]['color'].'">'.$cf_approve[$rs['dev_approve']]['icon'].'&nbsp;'.$cf_approve[$rs['dev_approve']]['name'].'</span>';?>
    </td>
    <td class="text" align="center"><?php echo $rs['dev_id'].'<br><i class="glyphicon glyphicon-user"></i> '.$rs03['per_fnamet'].' '.$rs03['per_lnamet'].'<br><i class="fa fa-clock-o"></i> '.dateFormat_02($rs['dev_create']);?></td>
    <td><?php echo $rs['dvt_name'].'&nbsp;&nbsp;'.$rs['dev_typeother'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
    <!--<td><?php //echo $rs['per_fnamet'].' '.$rs['per_lnamet'];?></td>-->
    <td><?php echo number_format(mysql_num_rows($sql02));?></td>
	<td class="text" align="center"><?php echo dateformat_03($rs['dev_stdate']);?></td>
    <td><?php echo dateformat_03($rs['dev_enddate']);?></td>
    <td><?php echo $cf_devnopay[$rs['dev_nopay']];?></td>
    <td class="text">
    	<a href="form/print-form01-pdf.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แสดงรายละเอียด" data-toggle="tooltip" data-placement="bottom" target="_blank" class="btn btn-default btn-xs">รายละเอียดโครงการ</a>
    </td>
  </tr>
					  		  
  <?
}
?>
	</tbody>
</table>
			</div><!--table-->
        
        </div><!--col-->    
	</div><!--row-->
	
</div><!--container-->

<?php include('lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	//datepicker
	$('#keyDevstdate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#keyDevenddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	
    $('[data-toggle="tooltip"]').tooltip('hide');
	
	 $('#filterForm').bootstrapValidator({
		  fields: {
			   keyDevstdate:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },
			   keyDevenddate:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },
			  keyDevonus:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },
			  /*keyDevid:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },*/
		  }
	 });	 
	 $('#keyDevstdate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#filterForm').data('bootstrapValidator').revalidateField('keyDevstdate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#keyDevenddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#filterForm').data('bootstrapValidator').revalidateField('keyDevenddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		
});

var jets = new Jets({
  searchTag: '#jetsSearch',
  contentTag: '#jetsContent',
  columns: [0,1,2,3,4,5,6,7] // optional, search by first column only
});
</script>
</body>
</html>