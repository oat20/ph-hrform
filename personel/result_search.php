<?php
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

include('../lib/css-inc.php');

include('../inc/navbar02-inc.php');
?>
<div class="container-fluid">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="show_allpersonel.php"><i class="fa fa-arrow-left fa-fw"></i> ข้อมูลบุคลากร / ผลการค้นหา</a></h3>
        </div>
        <div class="panel-body">
        	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="defaultForm">
                <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="keyWordsearch" class="form-control" placeholder="ค้นหาบุคลากร" required value="<?php echo $_POST['keyWordsearch'];?>">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> ค้นหา</button>
                      </span>
                    </div>
                </div>
            </form>
        </div><!--body-->
        <table class="table table-bordered table-striped regBlack_14">
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
          <tbody>
          	<?php
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
				and (a1.per_fnamet like '%$_POST[keyWordsearch]%' 
				or a1.per_lnamet like '%$_POST[keyWordsearch]%'
				or a1.per_fnamee like '%$_POST[keyWordsearch]%'
				or a1.per_fnamee like '%$_POST[keyWordsearch]%'
				or a1.per_email like '%$_POST[keyWordsearch]%')
				order by convert(a1.per_fnamet using tis620) asc,
				convert(a1.per_lnamet using tis620) asc";
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
			?>
          </tbody>
        </table>
    </div><!--panel-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>