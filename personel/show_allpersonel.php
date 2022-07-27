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
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>
<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">
	
    <div class="row">
        
        <div class="col-sm-12">
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ข้อมูลบุคลากร</a></h3>
        </div>
    	<div class="panel-body">
        	<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-10">
                	<a href="form_insertnews.php" class="btn btn-default btn-wide btn-block"><i class="fa fa-plus fa-fw"></i> เพิ่มรายชื่อบุคลากร</a>
                </div><!--col-->
           </div><!--row-->
		   <hr>
        
           		<?php
						echo '<table class="table table-striped table-bordered" id="tbPersonels">
							<thead>
								<tr>
									<th></th>
									<th>REF. ID</th>
									<th>MU-Email</th>
									<th >ชื่อ - นามสกุล</th>
									<th>ตำแหน่งงาน</th>
									<th>ตำแหน่งวิชาการ</th>
									 <th>ตำแหน่งด้านบริหารงาน</th>
									 <th>ส่วนงาน</th>
									<th>ประเภท</th>
									<th>กลุ่ม</th>
									<th>วันที่บรรจุ</th>
									<th>การศึกษาสูงสุด</th>
									<th>วุฒิการศึกษา</th>
									<th>สถานบัน</th>
									<th>สถานภาพ</th>
							  </tr>
						  </thead>
						  <tfoot>
							<tr>
								<th></th>
								<th>REF. ID</th>
								<th>MU-Email</th>
								<th >ชื่อ - นามสกุล</th>
								<th>ตำแหน่งงาน</th>
								<th>ตำแหน่งวิชาการ</th>
								 <th>ตำแหน่งด้านบริหารงาน</th>
								 <th>สังกัด</th>
								<th>ประเภท</th>
								<th>กลุ่ม</th>
								<th>วันที่บรรจุ</th>
								<th>การศึกษาสูงสุด</th>
								<th>วุฒิการศึกษา</th>
								<th>สถานบัน</th>
								<th>สถานภาพ</th>
							</tr>
						  </tfoot>
						  <tbody>';
						  		$sql_1= "SELECT *, a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id,
									ifnull(t9.count_devid, 0) as count_devid,
									ifnull(t10.count_cpid, 0) as count_cpid,
									ifnull(t11.count_devid2, 0) as count_devid2  
									from $db_eform.personel_muerp as a1
									inner join $db_eform.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
									inner join $db_eform.personel_status on (a1.per_status = personel_status.ps_id)
									inner join $db_eform.personel_type on (a1.per_type=personel_type.pert_id)
									inner join $db_eform.personel_group as t5 on (a1.per_group = t5.gr_id)
									inner join $db_eform.job_special as t6 on (a1.jobs_id = t6.jobs_id)
									inner join $db_eform.job as t7 on (a1.job_id = t7.job_id)
									inner join $db_eform.job_academic on (a1.ja_id = job_academic.ja_id)
									left join $db_eform.education on (a1.per_id = education.ed_perid)
									left join $db_eform.degree on (education.ed_dgid = degree.dg_id)
									left join $db_eform.country as t8 on (education.ed_country = t8.ct_id)
									left join (SELECT dev_perid, COUNT(dev_id) as count_devid from $db_eform.develop group by dev_perid) as t9 on (a1.per_id = t9.dev_perid)
									left join (SELECT per_id, count(cp_id) as count_cpid from $db_eform.develop_course_personel group by per_id) as t10 on (a1.per_id = t10.per_id)
									left join (SELECT dev_perid, count(dev_id) as count_devid2 from $db_eform.develop_leave GROUP by dev_perid) as t11 on (a1.per_id = t11.dev_perid)
									where a1.per_trash = '0'
									order by a1.per_modify desc";
								$result_1=mysqli_query($condb, $sql_1);
								while($rs=mysqli_fetch_array($result_1)){
									if($rs['per_adddate'] == ''){ $per_adddate = ''; }else{$per_adddate = dateFormat($rs['per_adddate']); }
									if($rs['ps_flag']=='0'){$tr_class='danger';}else{$tr_class='';}

									$link_delete_disable = ($rs['count_devid'] > 0 or $rs['count_cpid'] > 0 or $rs['count_devid2'] > 0) ? "disabled" : "";

									echo '<tr class="'.$tr_class.'">
										<td>
											<div class="btn-group">
												<button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
												<ul class="dropdown-menu">
										   			<li><a href="form_edit_personel.php?per_id='.$rs['per_id'].'&ed_id='.$rs['ed_id'].'" data-toggle="tooltip" data-placement="left" title="แก้ไข"><i class="fa fa-pencil fa-fw"></i> แก้ไข</a></li>
										   			<li class="'.$link_delete_disable.'"><a href="load_insertpersonel.php?per_id='.$rs['per_id'].'&action=remove&ed_id='.$rs['ed_id'].'" data-toggle="tooltip" data-placement="right" title="ลบ"><i class="fa fa-close fa-fw"></i> ลบ</a></li>
										   		</ul>
										   </div>
									   </td>
									   <td data-order="'.$rs['per_modify'].'">'.$rs['per_id'].'</td>
									   <td>'.$rs['per_email'].'</td>
										<td class="regBlack_13"><span class="boldBlack_10">'.$rs["per_pname"]." ".$rs["per_fnamet"]." ".$rs["per_lnamet"].'</span>
										<br/>'.$rs["per_pname2"]." ".$rs["per_fnamee"]." ".$rs["per_lnamee"].'</td>
										<td>'.$rs['job_name'].'</td>
										<td>'.$rs['ja_name'].'</td>
										<td>'.$rs['jobs_name'].'</td>
										<td>'.$rs['dp_name'].'</td>
										<td>'.$rs['pert_name'].'</td>
										<td>'.$rs['gr_title'].'</td>
										<td>'.$per_adddate.'</td>
										<td>'.$rs['dg_name'].'</td>
										<td>'.$rs['ed_edu'].'</td>
										<td>'.$rs['ed_institute'].' ('.$rs['ct_name'].')'.'</td>
										<td>'.$rs['ps_title'].'</td> 
									  </tr>';
								}
						  echo '</tbody>';
						echo '</table>';
				?>
           
		</div><!--body-->
	</div><!--panel-->
    	</div><!--col-->

	</div><!--row-->
    
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	$('#tbPersonels').DataTable({
		responsive: true,
		order: [
			[1, 'desc']
		],
		columnDefs: [
			{ orderable: false, targets: 0 }
		]
	});

	$('#defaultForm').bootstrapValidator({
	fields: {
		 keyWordsearch: {
			validators: {
				notEmpty: {
					message: 'โปรดระบุ ชื่อ-นามสกุล หรือ MU Email'
				},
			}
		},
	}
});
});
</script>
</body>
</html>