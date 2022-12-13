<?php
session_start();

include('compcode/include/config.php');
include('compcode/check_login.php');
require_once '../lib/mysqli.php';
include('compcode/include/connect_db.php');
include('compcode/include/function.php');

$y = mysqli_real_escape_string($condb, $_GET['y']);
$dev_create = ($y == '') ? "" : " and year(develop.dev_create)='".$y."'";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
  </head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<ol class="breadcrumb">
      <li class="active">จัดการข้อมูลแบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลากร / บริการวิชาการ</li>
    </ol>
    
    <div class="clearfix">
    	<div class="pull-left">
        	<a href="<?php echo $livesite;?>form/form_2.php?dm_id=1&dm_title=พัฒนาบุคลากร" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i> เพิ่มแบบฟอร์ม</a>
        </div>
    	<!--<div class="pull-right">
        	<div class="btn-group">
            	<a href="<?php //echo $_SERVER['PHP_SELF'];?>" class="btn btn-default"><i class="fa fa-list fa-fw" aria-hidden="true"></i> แสดงทั้งหมด</a>
                  <?php
				  /*foreach($cf_approve as $k=>$v){
					  echo '<a href="'.$_SERVER['PHP_SELF'].'?dev_approve='.$k.'" class="btn btn-primary">'.$v['icon'].' '.$v['name'].'</a>';
				  }*/
				  ?>
            </div>
        </div>--><!--col-->
    </div><!--row-->
    <p></p>
    
    <div class="table-responsive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered display nowrap" id="tbFrm01">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <!--<th>Status</th>-->
    <th class="text">Ref. ID1</th>
    <th>Ref. ID2</th>
            <th>Datestamp</th>
            <th>หมวดหมู่</th>
            <th class="text">ปีงบประมาณ</th>
    <th class="text">ส่วนงาน</th>
        <th class="text">เรื่อง</th>
    <!--<th>จำนวนผู้เข้าร่วม</th>-->
	<th class="text">วันที่</th>
    <th class="text">ถึงวันที่</th>
    <th>จำนวน ชม.</th>
    <th>ผู้เข้าร่วม</th>
    <th></th>
    <th>หมายเหตุ</th>
	<th class="text"></th>
  </tr>
  </thead>
  <!--
  <tfoot>
        <tr class="text">
           <th>#</th>
           <th>Status</th>
            <th class="text">Ref. ID</th>
            <th>Datestamp</th>
            <th>หมวดหมู่</th>
            <th class="text">ปีงบประมาณ</th>
            <th class="text">ส่วนงาน</th>
                        <th class="text">เรื่อง</th>
            <th>จำนวนผู้เข้าร่วม</th>
            <th class="text">วัน</th>
    		<th class="text">เวลา</th>
            <th>จำนวน ชม.</th>
            <th>ผู้เข้าร่วม</th>
            <th></th>
            <th class="text"></th>
          </tr>
  </tfoot>
        -->
  <tbody id="jetForm01">
 <?php
 if(empty($_GET['dev_approve'])){
		$sql="select *,
      case
      when develop.dev_maintype = '1' then 'พัฒนาบุคลากร'
      when develop.dev_maintype = '2' then 'บริการวิชาการ'
      else '! Error'
      end as category_display,
      case
      when develop.dev_cancel = 'no' then ''
      when develop.dev_cancel = 'yes' then 'ยกเลิกรายการ'
      else '! Error'
      end as cancel_display 
      from $db_eform.develop
				inner join $db_eform.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				inner join $db_eform.develop_main_type as t4 on (develop.dev_maintype = t4.dm_id)
				inner join $db_eform.develop_type as t5 on (develop.dev_type = t5.dvt_id)
				inner join $db_eform.develop_course_personel as dcp on (develop.dev_id = dcp.dev_id)
				inner join $db_eform.personel_muerp as t6 on(dcp.per_id = t6.per_id)
				where develop.dev_remove='no'
        ".$dev_create."
				order by develop.dev_create desc";
 }else{
	 $sql="select * from $db_eform.develop
				inner join $db_eform.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				inner join $db_eform.develop_main_type as t4 on (develop.dev_maintype = t4.dm_id)
				inner join $db_eform.develop_type as t5 on (develop.dev_type = t5.dvt_id)
        inner join $db_eform.develop_course_personel as dcp on (develop.dev_id = dcp.dev_id)
				inner join $db_eform.personel_muerp as t6 on(dcp.per_id = t6.per_id)
				where develop.dev_remove='no'
				and develop.dev_approve='$_GET[dev_approve]'
				order by develop.dev_create desc";
 }
 $exec=mysqli_query($condb, $sql);
while($rs=mysqli_fetch_array($exec)){
	++$num;

  $tr_danger=($rs['dev_cancel']=='yes')?"danger":"";
	
	$sql02=mysqli_query($condb, "SELECT COUNT( per_id ) as c1
		FROM  $db_eform.develop_course_personel 
		WHERE dev_id =  '$rs[dev_id]'");
	$rs02=mysqli_fetch_assoc($sql02);
?>
  <tr class="text <?php echo $tr_danger;?>">
  	<td><?php echo $num;?></td>
    <!--<td><?php //echo '<span class="label label-'.$cf_approve[$rs['dev_approve']]['color'].'">'.$cf_approve[$rs['dev_approve']]['name'].'</span>';?></td>-->
    <td><?php echo $rs['dev_id'];?></td>
    <td><?php echo $rs['cp_id'];?></td>
    <td class="text"><?php echo '<i class="fa fa-user fa-fw"></i> '.$rs['per_fnamet'].' '.$rs['per_lnamet'].'<br><i class="fa fa-calendar"></i> '.dateFormat_02($rs['dev_create']);?></td>
    <td><?php echo $rs['category_display'];?></td>
    <td class="text"><?php print $rs["dev_year"]; ?></td>
    <td><?php echo $rs['dp_name'];?></td>
    <td><?php echo $rs['dvt_name'].'&nbsp;&nbsp;'.$rs['dev_typeother'].' - '.$rs['dev_onus'];?></td>
    <!--<td><?php //echo number_format(mysql_num_rows($sql02));?></td>-->
	<td width=""    class="text"><?php echo dateformat_03($rs["dev_stdate"]).', '.$rs['dev_timebegin'];  ?></td>
    <td class="text"><?php echo dateformat_03($rs["dev_enddate"]).', '.$rs['dev_timeend']?></td>
    <td><?php echo Showtraininghour($rs['dev_training_hour']);?></td>
    <td class="text-center">
        <strong><a data-toggle="modal" href="personeljoin-inc.php?dev_id=<?php echo $rs['dev_id'];?>" data-target="#modalPersoneljoin"><?php echo number_format($rs02['c1']);?></a></strong>
    </td>
    <td><?php echo $cf_devnopay[$rs['dev_nopay']];?></td>
    <td><?php echo $rs['cancel_display'];?></td>
    <td align="center">
    	<div class="btn-group">
        	<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-cog"></i> <span class="caret"></span>
  </button>
  			<ul class="dropdown-menu dropdown-menu-right">
        		<!--<li><a href="../form/print-form01-pdf.php?getTrackid=<?php //echo $rs['dev_trackid'];?>" title="แสดงรายละเอียด" target="_blank"><i class="fa fa-print"></i> พิมพ์แบบฟอร์ม</a></li>-->
        		<li><a href="../form/editform_2.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แก้ไขโครงการ"><i class="fa fa-pencil"></i> แก้ไขแบบฟอร์ม</a></li>
        		<li><a href="2_removeform_action.php?getDevid=<?php echo $rs['dev_id'];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล <?php echo $rs['dev_onus'].' ('.$rs['dev_id'].')';?>');" class="text-danger"><i class="fa fa-trash"></i> ลบแบบฟอร์ม</a></li>
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
        <!--รายชื่อผู้เข้าร่วม-->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalPersoneljoin">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              ...
            </div>
          </div>
        </div>
        <!--รายชื่อผู้เข้าร่วม-->
  
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {

  $('#tbFrm01').DataTable({
    //responsive: true,
    columnDefs: [
      { orderable: false, targets: 12 }
    ],
    dom: 'Bfrtip',
    buttons: [
        {
          "extend": 'excel',
          "text": "Export To Excel"
        },
        'pdf',
        'print'
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
		  columns: [1,2,3,4,5,6,7,8,9,10] // optional, search by first column only
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