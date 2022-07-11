<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
<title>แบบขออนุมัติปฎิบัติงานบริการวิชาการ</title>
<?php include('../lib/css-inc.php');?>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?php //include('../inc/navbar02-inc.php');
require_once './navbar-academicservice-inc.php'
?>

<div class="container-fluid">

<h4 lass="visible-md visible-lg" style="margin-top: 0px;">แบบขออนุมัติปฎิบัติงานบริการวิชาการ</h4>

	<div class="row">
        
        <div class="col-sm-12">

	<ol class="breadcrumb">
      <li><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ประวัติการขออนุมัติปฎิบัติงานบริการวิชาการ</a></li>
    </ol>
    
    <div class="table-responesive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered" id="tbMyhistory">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<!--<th>Status</th>-->
	<th>#</th>
    <th class="text">REF. ID</th>
	<th class="text-uppercase">Datestamp</th>
    <th class="text">ลักษณะงาน</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ระดับกิจกรรม</th>
    <th></th>
	<th class="text"></th>
    </tr>
  </thead>
  <tbody id="jetsContent">
 <?php
 if(empty($_GET['dev_approve'])){
	$sql="select * from $db_eform.develop as t1
		inner join $db_eform.develop_type as t4 on (t1.dev_type = t4.dvt_id)
		inner join $db_eform.personel_muerp as t5 on(t1.dev_perid=t5.per_id)
		inner join $db_eform.develop_level as t6 on(t1.le_id=t6.le_id)
		inner join $db_eform.develop_course_personel as t7 on(t1.dev_id=t7.dev_id)
				where (t1.dev_perid='$_SESSION[ses_per_id]'
				or t7.per_id='$_SESSION[ses_per_id]')
				and t1.dev_remove='no'
				and t1.dev_maintype='2'
				order by t1.dev_stdate desc,
				t1.dev_enddate desc";
 }else{
	 $sql="select * from $db_eform.develop as t1
		inner join $db_eform.develop_type as t4 on (t1.dev_type = t4.dvt_id)
		inner join $db_eform.personel_muerp as t5 on(t1.dev_perid=t5.per_id)
		inner join $db_eform.develop_level as t6 on(t1.le_id=t6.le_id)
				where t1.dev_perid='$_SESSION[ses_per_id]'
				and t1.dev_remove='no'
				and t1.dev_approve='$_GET[dev_approve]'
				and t1.dev_maintype='2'
				order by t1.dev_stdate desc,
				t1.dev_enddate desc";
 }
 $exec=mysqli_query($condb, $sql);
while($rs=mysqli_fetch_array($exec)){
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
			
			$sql03=mysqli_query($condb, "select * from $db_eform.develop_course_personel as t1
				inner join $db_eform.personel_muerp as t2 on(t1.per_id=t2.per_id)
				where t1.dev_id='$rs[dev_id]'");
			$rs03=mysqli_fetch_assoc($sql03);
?>
  <tr   bgcolor="<?php echo "$color"; ?>" class="text">
  	<!--<td>
		<?php //echo '<span class="label label-'.$cf_approve[$rs['dev_approve']]['color'].'">'.$cf_approve[$rs['dev_approve']]['icon'].'&nbsp;'.$cf_approve[$rs['dev_approve']]['name'].'</span>';?>
    </td>-->
	  <td>#<?php print ++$r;?></td>
    <td class="text" align="center"><?php echo $rs['dev_id'];?></td>
    <td><i class="glyphicon glyphicon-user"></i> <?php echo $rs['per_fnamet'].' '.$rs['per_lnamet'].'<br><i class="fa fa-clock-o"></i> '.dateFormat_02($rs['dev_create']);?></td>
	<td><?php echo $rs['dvt_name'].'&nbsp;&nbsp;'.$rs['dev_typeother'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
    <td><?php echo number_format(mysqli_num_rows($sql03));?></td>
	<td class="text" align="center"><?php echo dateformat_03($rs['dev_stdate']);?></td>
    <td><?php echo dateformat_03($rs['dev_enddate']);?></td>
    <td><?php echo $rs['le_title'];?></td>
    <td><?php echo $cf_devnopay[$rs['dev_nopay']];?></td>
    <td class="text">
    	<div class="btn-group">
          <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="formdetail.php?getDevid=<?php echo $rs['dev_id'];?>"><i class="glyphicon glyphicon-list"></i> รายละเอียดแบบฟอร์ม</a></li> 
            <?php
			if($rs['dev_approve']=='wait'){
				print '<li><a href="editform_1.php?getTrackid='.$rs['dev_trackid'].'" title="แก้ไข" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil fa-fw"></i> แก้ไขแบบฟอร์ม</a></li>
				<li><a href="form-cancel.php?dev_id='.$rs['dev_id'].'"><i class="fa fa-close fa-fw"></i> ยกเลิกแบบฟอร์ม</a></li>';
			}
			?>
        	</ul>
        </div>
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

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {

	$('.navbar-nav li:eq(2)').addClass('active');
	
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

		$('#tbMyhistory').DataTable({
			columnDefs: [
				{ 
					orderable: false, 
					targets: 11 
				}
			]
		});
		
});
</script>
</body>
</html>