<?php
session_start();

include('../admin/compcode/include/config.php');
//include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<?php include('../lib/css-inc.php');?>
<SCRIPT language='javascript' type='text/javascript'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<ol class="breadcrumb font-18">
      <li><a href="profile.php"><i class="fa fa-arrow-left"></i> ประวัติการของอนุมัติ</a></li>
    </ol>
	
    <div class="row">
    	<div class="col-sm-2">
        	<!--filter-->
        	<?php include('../form/filterform_inc.php');?>
            <!--filter-->
        </div><!--col-->
        
    	<div class="col-sm-10">
        
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">แบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลากร</h3>
        </div>
    	<div class="panel-body">
        	<div class="table-responesive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
    <th class="text">Form No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
	<th class="text">Tools</th>
    </tr>
  </thead>
  <tbody>
 <?php
 if(empty($_POST['action'])){
	 $sql="select * from $db_eform.develop
				where dev_perid='$_SESSION[ses_per_id]'
				and dev_maintype='1'
				and dev_remove='no'
				order by dev_year desc,
				dev_stdate desc";
 }else if(isset($_POST['action']) and $_POST['action']=='filter'){
	 $sql="select * from $db_eform.develop
				where dev_perid='$_SESSION[ses_per_id]'
				and dev_maintype='1'
				and dev_remove='no'
				and (dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
				or dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
				and (dev_onus like '%$_POST[keyDevonus]%' or dev_id='$_POST[keyDevonus]')
				order by dev_year desc,
				dev_stdate desc";
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
  <tr   bgcolor="<?php echo "$color"; ?>">
    <td class="text" align="center"><?php echo $rs['dev_id'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
	<td class="text" align="center"><?php echo dateformat_03($rs['dev_stdate']);?></td>
    <td><?php echo dateformat_03($rs['dev_enddate']);?></td>
    <td class="text">
        <a href="../form/print-form01-pdf.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แสดงรายละเอียด" data-toggle="tooltip" data-placement="bottom" target="_blank"><i class="fa fa-print"></i></a> 
        <a href="../form/editform_1.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แก้ไข" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i></a>
        <a href="../form/remove-form1-action.php?getDevid=<?php echo $rs['dev_id'];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล <?php echo $rs['dev_onus'];?>');" data-toggle="tooltip" data-placement="bottom" class="text-danger"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
					  		  
  <?
}
?>
	</tbody>
</table>
			</div>
		</div><!--body-->
	</div><!--panel-->
    
        <!--บริการวิชาการ-->
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">แบบฟอร์มขออนุมัติปฏิบัติงานบริการวิชาการ</h3>
                </div>
                <div class="panel-body">
                	<div class="table-responsive">
                    	<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped">
	<thead>
<tr bgcolor="#E0E3CE">
    <th class="text">Form No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
	<th class="text">Tools</th>
    </tr>
  </thead>
  <tbody>
 <?php
  if(empty($_POST['action'])){
	 $sql="select * from $db_eform.develop
				where dev_perid='$_SESSION[ses_per_id]'
				and dev_maintype='2'
				and dev_remove='no'
				order by dev_year desc,
				dev_stdate desc";
  }else if(isset($_POST['action']) and $_POST['action']=='filter'){
	 $sql="select * from $db_eform.develop
				where dev_perid='$_SESSION[ses_per_id]'
				and dev_maintype='2'
				and dev_remove='no'
				and (dev_stdate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]'
				or dev_enddate between '$_POST[keyDevstdate]' and '$_POST[keyDevenddate]')
				and (dev_onus like '%$_POST[keyDevonus]%' or dev_id='$_POST[keyDevonus]')
				order by dev_year desc,
				dev_stdate desc";
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
  <tr   bgcolor="<?php echo "$color"; ?>">
    <td class="text" align="center"><?php echo $rs['dev_id'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
	<td class="text" align="center"><?php echo dateformat_03($rs['dev_stdate']);?></td>
    <td><?php echo dateformat_03($rs['dev_enddate']);?></td>
    <td class="text">
        <a href="../form/print-form01-pdf.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แสดงรายละเอียด" data-toggle="tooltip" data-placement="bottom" target="_blank"><i class="fa fa-print"></i></a> 
        <a href="../form/editform_1.php?getTrackid=<?php echo $rs['dev_trackid'];?>" title="แก้ไข" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i></a>
        <a href="../form/remove-form1-action.php?getDevid=<?php echo $rs['dev_id'];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล <?php echo $rs['dev_onus'];?>');" data-toggle="tooltip" data-placement="bottom" class="text-danger"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
					  		  
  <?
}
?>
	</tbody>
</table>

                    </div><!--table-->
                </div><!--body-->
            </div><!--panel-->
        <!--บริการวิชาการ-->
        
        <!--ลาต่างประเทศ-->
        	<!--<div class="panel panel-success">
            	<div class="panel-heading">
                	<h3 class="panel-title">แบบฟอร์มขออนุมัติลา (ต่างประเทศ)</h3>
                </div>
                <div class="panel-body">
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