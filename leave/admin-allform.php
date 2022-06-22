<?php
session_start();

include('../admin/compcode/include/config.php');
include('config-inc.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<ol class="breadcrumb font-18">
      <li><a href="../profile/profile.php"><i class="fa fa-arrow-left"></i> จัดการข้อมูลแบบฟอร์มใบลาไปเพิ่มพูนความรู้และประสบการณ์ทั้งหมด</a></li>
    </ol>
    
    <div class="row">
    	<div class="col-sm-8">
        	 <form>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3"><i class="fa fa-search"></i> ค้นหาแบบฟอร์ม</span>
                        <input type="search" id="jetsSearchform01" class="form-control">
                    </div>
                </div>
            </form>
        </div><!--col-->
        <div class="col-sm-4 text-right">
        	<div class="btn-group" role="group">
        		<a href="admin-form.php" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
                <!--<a href="" class="btn btn-default"><i class="fui-list-columned"></i> รายงาน</a>-->
                <!--<div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      รายงาน
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="#">Dropdown link</a></li>
                      <li><a href="#">Dropdown link</a></li>
                    </ul>
              </div>-->
            </div>
        </div><!--col-->
    </div><!--row-->
    
    <div class="table-responsive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">Form No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">ส่วนงาน</th>
        <th class="text">ประเภท</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th class="text">ผู้ขออนุมัติ</th>
    <th>ความเห็นต้นสังกัด</th>
    <th>ยกเลิก</th>    
	<th class="text"></th>
  </tr>
  </thead>
  <tfoot>
        <tr class="text">
           <th>#</th>
            <th class="text">Form No.</th>
            <th class="text">ปีงบประมาณ</th>
            <th class="text">ส่วนงาน</th>
                        <th class="text">ประเภท</th>
            <th class="text">หลักสูตร/โครงการ</th>
            <th class="text">วันที่เริ่ม</th>
            <th class="text">วันที่สิ้นสุด</th>
            <th class="text">ผู้ขออนุมัติ</th>
            <th>ความเห็นต้นสังกัด</th>
            <th>ยกเลิก</th>    
            <th class="text"></th>
          </tr>
  </tfoot>
  <tbody id="jetForm01">
 <?php
 //if(empty($_POST['keyDevstdate']) or empty($_POST['keyDevenddate'])){
	 /*$sql="select * from phper2.develop
	 			inner join phper2.develop_course_personel on (develop.dev_id = develop_course_personel.dev_id)
				inner join phper2.personel on (develop_course_personel.per_id = personel.per_id)
				inner join phper2.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				where develop.dev_maintype='1'
				and develop.dev_remove='no'
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc,
				convert (personel.per_fnamet using tis620) asc,
				convert (personel.per_lnamet using tis620) asc";*/
	$sql="select * from $db_eform.develop_leave as t1
	 	left join $db_eform.develop_leave_type as t2 on (t1.dev_type=t2.la_id)
		left join $db_eform.develop_leave_personel as t3 on (t1.dev_id=t3.dev_id)
		left join $db_eform.tb_orgnew as t4 on (t3.per_dept=t4.dp_id)
		left join $db_eform.personel_muerp as t5 on (t3.per_id=t5.per_id)
		order by t1.dev_id desc";
 /*}else{
	 $sql="select * from phper2.develop
				inner join phper2.personel on (develop.dev_perid = personel.per_id)
				inner join phper2.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				where develop.dev_maintype='1'
				and develop.dev_remove='no'
				and (develop.dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
				or develop.dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc";
 }*/
 $exec=mysql_query($sql);
while($rs=mysql_fetch_array($exec)){
	++$num;
	?>
  <tr class="text">
  	<td><?php echo $num;?></td>
    <td class="text"><?php echo $rs['dev_id'].'<br><i class="fui-calendar"></i> '.dateFormat($rs['dev_orddate']);?></td>
    <td class="text"><?php print $rs["dev_year"]; ?></td>
    <td><?php echo $rs['dp_name'];?></td>
    <td><?php echo $rs['la_name'];?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
	<td width=""    class="text"><?php echo dateformat_03($rs["dev_stdate"]);  ?></td>
    <td class="text"><?php echo dateformat_03($rs["dev_enddate"]);  ?></td>
    <td><?php echo $rs['per_fnamet'].' '.$rs['per_lnamet'];?></td>
    <td><?php echo $cf_devleave_status[$rs['dev_formstatus']]['name'].'<br><em>'.$rs['dev_formstatus_comment'].'</em>';?></td>
    <td class="<?php echo $cf_yn_msg02[$rs['dev_cancel']]['color'];?>"><?php echo $cf_yn_msg02[$rs['dev_cancel']]['icon'].' '.$cf_yn_msg02[$rs['dev_cancel']]['label'];?></td>   
    <td align="center" class="text">
        <a href="print-adminform-pdf.php?dev_id=<?php echo $rs['dev_id'];?>" title="แสดงรายละเอียด" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> พิมพ์แบบฟอร์มอนุมัติ</a>
        <a href="admin-formedit.php?dev_id=<?php echo $rs['dev_id'];?>" title="แก้ไขโครงการ" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</a>
        <!--<a href="../admin/2_removeform_action.php?getDevid=<?php //echo $rs['dev_id'];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล <?php //echo $rs['dev_onus'].' ('.$rs['dev_id'].')';?>');" class="text-danger"><i class="fa fa-trash"></i></a>-->
        </td>
  </tr>
					  		  
  <?
}
?>
	</tbody>
</table>
			</div><!--table-->
  
</div><!--container-->

<?php include('../lib/js-inc.php');?>
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
	
	 $('#filterForm').bootstrapValidator({
		  fields: {
			   /*keyDevstdate:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },*/
			   /*keyDevenddate:{
				  validators:{
					   notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
				  }
			  },*/
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
	 /*$('#keyDevstdate').datepicker()
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
        });*/
		
		//jets search
		var jets = new Jets({
		  searchTag: '#jetsSearchform01',
		  contentTag: '#jetForm01',
		  columns: [1,2,3,4,5,6,7,8] // optional, search by first column only
		});
		/*var jets = new Jets({
		  searchTag: '#jetsSearchform02',
		  contentTag: '#jetForm02',
		  columns: [0,1,2,3,4,5,6] // optional, search by first column only
		});*/
});
</script>
</body>
</html>