<?php
session_start();

include('compcode/include/config.php');
include('compcode/check_login.php');
include('compcode/include/connect_db.php');
include('compcode/include/function.php');
?>
<!doctype html>
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<ol class="breadcrumb font-20">
      <li><a href="../profile/profile.php"><i class="fa fa-arrow-left"></i> จัดการข้อมูลแบบฟอร์มทั้งหมด</a></li>
    </ol>
	
    <div class="row">
    	    
    	<div class="col-sm-2">
        	<!--filter-->
        	<?php include('2_filterform_inc.php');?>
            <!--filter-->
        </div><!--col-->
        
    	<div class="col-sm-10">
        
	<div class="panel panel-default">
    	<div class="panel-heading clearfix">
        	<h3 class="panel-title pull-left">แบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลากร</h3>
            <div class="pull-right"><a href="<?php echo $livesite;?>form/form_2.php?dm_id=1&dm_title=พัฒนาบุคลากร"><i class="fa fa-plus"></i> เพิ่มรายการ</a></div>
        </div>
    	<div class="panel-body">
        	 <form>
                <div class="form-group">
                    <label>ค้นหาแบบฟอร์ม</label>
                    <input type="search" id="jetsSearchform01" class="form-control input-sm">
                </div>
            </form>
            <hr>
        	<div class="table-responsive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered">
	<thead>
<tr bgcolor="#E0E3CE">
    <th class="text">Ref No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">ส่วนงาน</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th class="text">ผู้ขออนุมัติ</th>    
	<th class="text">Tools</th>
  </tr>
  </thead>
  <tfoot>
        <tr>
            <th class="text">Ref No.</th>
            <th class="text">ปีงบประมาณ</th>
            <th class="text">ส่วนงาน</th>
            <th class="text">หลักสูตร/โครงการ</th>
            <th class="text">วันที่เริ่ม</th>
            <th class="text">วันที่สิ้นสุด</th>
            <th class="text">ผู้ขออนุมัติ</th>           
            <th class="text">Tools</th>
          </tr>
  </tfoot>
  <tbody id="jetForm01">
 <?php
 if(empty($_POST['keyDevstdate']) or empty($_POST['keyDevenddate'])){
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
	$sql="select * from phper2.develop
				inner join phper2.personel on (develop.dev_perid = personel.per_id)
				inner join phper2.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				where develop.dev_maintype='1'
				and develop.dev_remove='no'
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc,
				convert (personel.per_fnamet using tis620) asc,
				convert (personel.per_lnamet using tis620) asc";
 }else{
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
 }
 $exec=mysql_query($sql);
while($rs=mysql_fetch_array($exec)){
	++$num;
?>
  <tr>
    <td class="text"><?php echo $rs['dev_id'];?></td>
    <td class="text"><?php print $rs["dev_year"]; ?></td>
    <td><?php echo $rs['dp_name'];?></td>
    <td class="text"><?php echo $rs['dev_onus'];?>
        </td>
	<td width=""    class="text"><?php echo dateformat_03($rs["dev_stdate"]);  ?></td>
    <td class="text"><?php echo dateformat_03($rs["dev_enddate"]);  ?></td>
    <td><?php echo $rs['per_pname'].' '.$rs['per_fnamet'].' '.$rs['per_lnamet'];?></td>   
    <td align="center" class="text">
        <a href="../form/print-form01-pdf.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แสดงรายละเอียด" target="_blank"><i class="fa fa-print"></i></a>
        <a href="../form/editform_2.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แก้ไขโครงการ"><i class="fa fa-pencil"></i></a>
        <a href="2_removeform_action.php?getDevid=<?php echo $rs['dev_id'];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล <?php echo $rs['dev_onus'].' ('.$rs['dev_id'].')';?>');" class="text-danger"><i class="fa fa-trash"></i></a>
        </td>
  </tr>
					  		  
  <?
}
?>
	</tbody>
</table>
			</div><!--table-->
		</div><!--body-->
        <!--<div class="panel-footer text-right">
        	<small><a href="">Viewmore <i class="fa fa-angle-double-right"></i></a></small>
        </div>-->
	</div><!--panel-->
            
        <!--บริการวิชาการ-->
        	<div class="panel panel-info">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left">แบบฟอร์มขออนุมัติปฏิบัติงานบริการวิชาการ</h3>
                    <div class="pull-right"><a href="<?php echo $livesite;?>form/form_2.php?dm_id=2&dm_title=บริการวิชาการ"><i class="fa fa-plus"></i> เพิ่มรายการ</a></div>
                </div>
                <div class="panel-body">
                	<form>
                        <div class="form-group">
                            <label>ค้นหาแบบฟอร์ม</label>
                            <input type="search" id="jetsSearchform02" class="form-control input-sm">
                        </div>
                    </form>
                    <hr>
                	<div class="table-responsive">
                    	<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered">
	<thead>
<tr bgcolor="#E0E3CE">
    <th class="text">Ref No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">ส่วนงาน</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th class="text">ผู้ขออนุมัติ</th>    
	<th class="text">Tools</th>
  </tr>
  </thead>
  <tfoot>
<tr>
    <th class="text">Ref No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">ส่วนงาน</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th class="text">ผู้ขออนุมัติ</th>    
	<th class="text">Tools</th>
  </tr>
  </tfoot>
  <tbody id="jetForm02">
 <?php
 if(empty($_POST['keyDevstdate']) or empty($_POST['keyDevenddate'])){
	 /*$sql="select * from phper2.develop
				inner join phper2.develop_course_personel on (develop.dev_id = develop_course_personel.dev_id)
				inner join phper2.personel on (develop_course_personel.per_id = personel.per_id)
				inner join phper2.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				where develop.dev_maintype='2'
				and develop.dev_remove='no'
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc,
				convert (personel.per_fnamet using tis620) asc,
				convert (personel.per_lnamet using tis620) asc";*/
	$sql="select * from phper2.develop
				inner join phper2.personel on (develop.dev_perid = personel.per_id)
				inner join phper2.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				where develop.dev_maintype='2'
				and develop.dev_remove='no'
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc,
				convert (personel.per_fnamet using tis620) asc,
				convert (personel.per_lnamet using tis620) asc";
 }else{
	 $sql="select * from phper2.develop
				inner join phper2.personel on (develop.dev_perid = personel.per_id)
				inner join phper2.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				where develop.dev_maintype='2'
				and develop.dev_remove='no'
				and (develop.dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
				or develop.dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc";
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
?>
  <tr   bgcolor="<? echo "$color"; ?>">
    <td class="text"><?php echo $rs['dev_id'];?></td>
    <td class="text"><?php print $rs["dev_year"]; ?></td>
    <td><?php echo $rs['dp_name'];?></td>
    <td class="text"><?php echo $rs['dev_onus'];?>
        </td>
	<td width=""    class="text"><?php echo dateformat_03($rs["dev_stdate"]);  ?></td>
    <td class="text"><?php echo dateformat_03($rs["dev_enddate"]);  ?></td>
    <td><?php echo $rs['per_pname'].' '.$rs['per_fnamet'].' '.$rs['per_lnamet'];?></td>    
    <td align="center" class="text">
        <a href="../form/print-form01-pdf.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แสดงรายละเอียด" target="_blank"><i class="fa fa-print"></i></a> 
        <a href="../form/editform_2.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แก้ไขโครงการ"><i class="fa fa-pencil"></i></a>
        <a href="2_removeform_action.php?getDevid=<?php echo $rs['dev_id'];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล <?php echo $rs['dev_onus'].' ('.$rs['dev_id'].')';?>');" class="text-danger"><i class="fa fa-trash"></i></a>
        </td>
  </tr>
					  		  
  <?
}
?>
	</tbody>
</table>
                    </div><!--table-->
                </div><!--body-->
                <!--<div class="panel-footer text-right">
                    <small><a href="">Viewmore <i class="fa fa-angle-double-right"></i></a></small>
                </div>-->
             </div>
        <!--บริการวิชาการ-->
            
        <!--ลาต่างประเทศ-->
        	<!--<div class="panel panel-success">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left">แบบฟอร์มขออนุมัติลา (ต่างประเทศ)</h3>
                    <div class="pull-right"><a href="2_form_03.php"><i class="fa fa-plus"></i> เพิ่มรายการ</a></div>
                </div>
                <div class="panel-body">
                </div>
                <div class="panel-footer text-right">
                    <small><a href="">Viewmore <i class="fa fa-angle-double-right"></i></a></small>
                </div>            
        	</div>-->
        <!--ลาต่างประเทศ-->
        
    </div><!--row-->

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
		  columns: [0,1,2,3,4,5,6] // optional, search by first column only
		});
		var jets = new Jets({
		  searchTag: '#jetsSearchform02',
		  contentTag: '#jetForm02',
		  columns: [0,1,2,3,4,5,6] // optional, search by first column only
		});
});
</script>
</body>
</html>