<?php
session_start();

include('../admin/compcode/include/config.php');
include('config-inc.php');
include('../admin/compcode/check_login.php');
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

	<ol class="breadcrumb font-20">
      <li><a href="../profile/profile.php"><i class="fa fa-arrow-left"></i> ประวัติการขออนุมัติแบบฟอร์มใบลาไปเพิ่มพูนความรู้และประสบการณ์</a></li>
    </ol>
    
    <div class="row">
    	<div class="col-sm-8">
            <form>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i> ค้นหาแบบฟอร์ม</span>
                      <input type="search" class="form-control" aria-describedby="basic-addon1" id="jetsSearch">
                    </div>
                </div>
            </form>
    	</div><!--col-->
        <div class="col-sm-4 text-right">
        	<a href="form.php" class="btn btn-default"><i class="fa fa-plus"></i> กรอกแบบฟอร์ม</a>
        </div>
    </div><!--row-->
    
    <div class="table-responesive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">Form No.</th>
    <th class="text">ประเภท</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ความเห็นต้นสังกัด</th>
    <th>ยกเลิก</th>
	<th class="text">Tools</th>
    </tr>
  </thead>
  <tfoot>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">Form No.</th>
    <th class="text">ประเภท</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ความเห็นต้นสังกัด</th>
    <th>ยกเลิก</th>
	<th class="text">Tools</th>
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
  <tr   bgcolor="<?php echo "$color"; ?>" class="text">
  	<td><?php echo ++$r;?></td>
    <td class="text" align="center"><?php echo $rs['dev_id'].'<br><i class="fa fa-clock-o"></i> '.dateFormat($rs['dev_orddate']);?></td>
    <td><?php echo $rs['la_name'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
    <td><?php echo dateFormat($rs['dev_stdate']);?></td>
	<td class="text" align="center"><?php echo dateFormat($rs['dev_enddate']);?></td>
    <td><?php echo $cf_devleave_status[$rs['dev_formstatus']]['name'].'<br><em>'.$rs['dev_formstatus_comment'].'</em>';?></td>
    <td class="text-center <?php echo $cf_yn_msg02[$rs['dev_cancel']]['color'];?>"><?php echo $cf_yn_msg02[$rs['dev_cancel']]['icon'].'&nbsp;'.$cf_yn_msg02[$rs['dev_cancel']]['label'];?></td>
    <td class="text">
    	<div class="btn-group">
          <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
        	<li><a href="print-form-pdf.php?dev_id=<?php echo $rs['dev_id'];?>" title="แสดงรายละเอียด" data-toggle="tooltip" data-placement="bottom" target="_blank"><i class="fa fa-print"></i> พิมพ์แบบฟอร์ม</a></li> 
        	<li><a href="form-edit.php?dev_id=<?php echo $rs['dev_id'];?>" title="แก้ไข" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i> แก้ไขแบบฟอร์ม</a></li>
        	<!--<li><a href="?getDevid=<?php //echo $rs['dev_id'];?>" title="ยกเลิก" data-toggle="tooltip" data-placement="bottom" class="text-danger"><i class="fa fa-ban"></i> ยกเลิกแบบฟอร์ม</a></li>-->
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

var jets = new Jets({
  searchTag: '#jetsSearch',
  contentTag: '#jetsContent',
  columns: [1,2,3,4,5,6,7,8] // optional, search by first column only
});
</script>
</body>
</html>