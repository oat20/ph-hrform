<?php
session_start();

include('../admin/compcode/include/config.php');
include('config-inc.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
<?php include('../lib/css-inc.php');?>
<title>บันทึกอนุมัติเดินทางต่างประเทศ</title>
<SCRIPT language='javascript' type='text/javascript'>
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes";win=window.open(mypage,myname,settings);
win.focus();}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<ol class="breadcrumb">
      <li><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> ประวัติการขออนุมัติแบบฟอร์มใบลาไปเพิ่มพูนความรู้และประสบการณ์</a></li>
    </ol>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-10">
        	<a href="form.php" class="btn btn-info btn-block"><i class="fa fa-plus fa-fw"></i> กรอกแบบฟอร์ม</a>
        </div>
    </div><!--row-->
	<hr>
    
    <div class="table-responesive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered" id="myTable-01">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">REF. ID</th>
    <th class="text">ประเภท</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">เรื่อง</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ความเห็นต้นสังกัด</th>
	<th class="text"></th>
    </tr>
  </thead>
  <tfoot>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">REF. ID</th>
    <th class="text">ประเภท</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">เรื่อง</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ความเห็นต้นสังกัด</th>
	<th class="text"></th>
    </tr>
  </tfoot>
  <tbody id="jetsContent">
 <?php
 //if(empty($_POST['action'])){
	 $sql="select * from $db_eform.develop_leave as t1
	 	left join $db_eform.develop_leave_type as t2 on (t1.dev_type=t2.la_id)
		where t1.dev_perid='$_SESSION[ses_per_id]'
		order by t1.dev_id desc";
 /*}else if(isset($_POST['action']) and $_POST['action']=='filter'){
	 $sql="select * from $db_eform.develop
				where dev_perid='$_SESSION[ses_per_id]'
				and dev_maintype='1'
				and dev_remove='no'
				and (dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
				or dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
				and (dev_onus like '%$_POST[keyDevonus]%' or dev_id='$_POST[keyDevonus]')
				order by dev_year desc,
				dev_stdate desc";
 }*/
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

			$tr_cancel_color = ($rs['dev_cancel'] == '1') ? "danger" : "";
?>
  <tr   bgcolor="<?php echo "$color"; ?>" class="text <?php echo $tr_cancel_color;?>">
  	<td><?php echo ++$r;?></td>
    <td class="text" align="center"><?php echo $rs['dev_id'].'<br><i class="fa fa-clock-o"></i> '.dateFormat($rs['dev_orddate']);?></td>
    <td><?php echo $rs['la_name'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
    <td><?php echo dateFormat($rs['dev_stdate']);?></td>
	<td class="text" align="center"><?php echo dateFormat($rs['dev_enddate']);?></td>
    <td><?php echo $cf_devleave_status[$rs['dev_formstatus']]['name'].'<br><em>'.$rs['dev_formstatus_comment'].'</em>';?></td>
    <td class="text">
    	<div class="btn-group btn-group-sm">
        	<a href="print-form-pdf.php?dev_id=<?php echo $rs['dev_id'];?>" title="แสดงรายละเอียด" data-toggle="tooltip" data-placement="bottom" target="_blank" class="btn btn-info"><i class="fa fa-print fa-fw"></i> พิมพ์</a>
        	<a href="form-edit.php?dev_id=<?php echo $rs['dev_id'];?>" title="แก้ไข" data-toggle="tooltip" data-placement="bottom" class="btn btn-info"><i class="fa fa-pencil fa-fw"></i> แก้ไข</a>
        	<!--<li><a href="?getDevid=<?php //echo $rs['dev_id'];?>" title="ยกเลิก" data-toggle="tooltip" data-placement="bottom" class="text-danger"><i class="fa fa-ban"></i> ยกเลิกแบบฟอร์ม</a></li>-->
        </div>
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

	$('#myTable-01').DataTable({
		columnDefs: [
			{ orderable: false, targets: 8 }
		]
	});
	
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
</script>
</body>
</html>