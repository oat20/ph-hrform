<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<title><?php echo $titlebar['title'];?></title>
<body>
<?php 
include('../lib/css-inc.php');

include('../inc/navbar02-inc.php');
//include("../admin/inc/form_search.php");
?>
<div class="container-fluid">
	
    <div class="row">
        
        <div class="col-sm-12">
	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<a href="../profile/profile.php"><i class="fa fa-arrow-left"></i> ข้อมูลบุคลากร</a>
        </div>
    	<div class="panel-body">
        	<div class="row">
            	<div class="col-sm-8">
                	<form action="result_search.php" method="post" id="defaultForm">
                        <div class="form-group">
                        	<div class="input-group">
                              <input type="text" name="keyWordsearch" class="form-control" placeholder="ค้นหาบุคลากร" required>
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> ค้นหา</button>
                              </span>
                            </div>
                        </div>
                    </form>
                </div><!--col-->
                
                <div class="col-sm-4">
                	<div class="text-right"><a href="form_insertnews.php" class="btn btn-link"><i class="fa fa-plus"></i> เพิ่มรายการ</a></div>
                </div><!--col-->
           </div><!--row-->
           
           
           <div class="panel-group" id="accordionDivision">
           		<?php
				$sql=mysql_query("select * from $db_eform.department_type as t1
					inner join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id)
					order by convert(t1.typ_name using tis620) asc,
					convert(t2.dp_name using tis620) asc");
				while($ob=mysql_fetch_assoc($sql)){
           		echo '<div class="panel panel-info">
                	<div class="panel-heading">
                    	<h4 class="panel-title">
                        	<a role="button" data-toggle="collapse" data-parent="#accordionDivision" href="#'.$ob['dp_id'].'" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-plus fa-fw"></i> '.$ob['dp_name'].'</a>
        				</h4>
                    </div>
                    <div id="'.$ob['dp_id'].'" class="panel-collapse collapse">
						<table class="table table-striped regBlack_12 table-bordered">
							<thead>
								<tr>
									<th></th>
									<th>Rec No.</th>
									<th >ชื่อ - นามสกุล</th>
									<th>ตำแหน่งงาน</th>
									 <th>ตำแหน่งบริหาร</th>
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
								<th>Rec No.</th>
								<th >ชื่อ - นามสกุล</th>
								<th>ตำแหน่งงาน</th>
								 <th>ตำแหน่งบริหาร</th>
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
						  		$sql_1= "SELECT *, a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id 
									from $db_eform.personel_muerp as a1
									inner join $db_eform.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
									inner join $db_eform.personel_status on (a1.per_status = personel_status.ps_id)
									inner join $db_eform.personel_type on (a1.per_type=personel_type.pert_id)
									inner join $db_eform.education on (a1.per_id = education.ed_perid)
									inner join $db_eform.degree on (education.ed_dgid = degree.dg_id)
									inner join $db_eform.personel_group as t5 on (a1.per_group = t5.gr_id)
									inner join $db_eform.job_special as t6 on (a1.jobs_id = t6.jobs_id)
									inner join $db_eform.job as t7 on (a1.job_id = t7.job_id)
									inner join $db_eform.country as t8 on (education.ed_country = t8.ct_id)
									where a1.per_trash = '0'
									and a1.per_dept='$ob[dp_id]'
									order by a1.per_modify desc";
								$result_1=mysql_query($sql_1);
								while($rs=mysql_fetch_array($result_1)){
									if($rs['per_adddate'] == ''){ $per_adddate = ''; }else{$per_adddate = dateFormat($rs['per_adddate']); }
									if($rs['ps_flag']=='0'){$tr_class='danger';}
									echo '<tr class="'.$tr_class.'">
										<td>
											<div class="btn-group">
												<button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></button>
												<ul class="dropdown-menu">
										   			<li><a href="form_edit_personel.php?per_id='.$rs['per_id'].'&ed_id='.$rs['ed_id'].'" data-toggle="tooltip" data-placement="left" title="แก้ไข"><i class="fa fa-pencil"></i> แก้ไข</a></li>
										   			<li><a href="load_insertpersonel.php?per_id='.$rs['per_id'].'&action=remove&ed_id='.$rs['ed_id'].'" data-toggle="tooltip" data-placement="right" title="ลบ"><i class="fa fa-close"></i> ลบ</a></li>
										   		</ul>
										   </div>
									   </td>
									   <td>'.$rs['per_id'].'</td>
										<td class="regBlack_13"><span class="boldBlack_10">'.$rs["per_pname"]." ".$rs["per_fnamet"]." ".$rs["per_lnamet"].'</span>
										<br/>'.$rs["per_pname2"]." ".$rs["per_fnamee"]." ".$rs["per_lnamee"].'</td>
										<td>'.$rs['job_name'].'</td>
										<td>'.$rs['jobs_name'].'</td>
										<td>'.$rs['pert_name'].'</td>
										<td>'.$rs['gr_title'].'</td>
										<td>'.$per_adddate.'</td>
										<td>'.$rs['dg_name'].'</td>
										<td>'.$rs['ed_edu'].'</td>
										<td>'.$rs['ed_institute'].' ('.$rs['ct_name'].')'.'</td>
										<td>'.$rs['ps_title'].'</td> 
									  </tr>';
								}
						  echo '</tbody>
						</table>
                    </div>
                </div><!--panel-->';
				}
				?>
           </div><!--panel-group-->
           
		</div><!--body-->
	</div><!--panel-->
    	</div><!--col-->

	</div><!--row-->
    
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
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
</script>
<script>
$(document).ready(function(e) {
	//tooltip
  $('[data-toggle="tooltip"]').tooltip('hide');
  
  //jets search
  /*var jets = new Jets({
	  searchTag: '#jetsSearch',
	  contentTag: '#jetsContent',
	  columns:[1,2,3,4,5,6,7,8,9,10,11],
	});*/

});
</script>
</body>
</html>