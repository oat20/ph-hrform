<?php
session_start();

include('../admin/compcode/include/config.php');
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

	<ol class="breadcrumb">
      <li><a href="profile.php"><i class="fa fa-arrow-left"></i> ประวัติการพัฒนาบุคลากร</a></li>
    </ol>
    
    <div class="row">
    	<div class="col-sm-12">
            <form>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i> ค้นหา</span>
                      <input type="search" class="form-control" aria-describedby="basic-addon1" id="jetsSearch">
                    </div>
                </div>
            </form>
    	</div><!--col-->
    </div><!--row-->
    
    <div class="table-responesive">
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%" class="table table-striped table-bordered">
	<thead>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">Form No.</th>
    <th class="text">ลักษณะงาน</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <!--<th>ผู้ขออนุมัติ</th>-->
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ยกเลิก</th>
    <th></th>
    </tr>
  </thead>
  <tfoot>
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th class="text">Form No.</th>
    <th class="text">ลักษณะงาน</th>
    <th class="text">ปีงบประมาณ</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <!--<th>ผู้ขออนุมัติ</th>-->
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text">วันที่เริ่ม</th>
    <th class="text">วันที่สิ้นสุด</th>
    <th>ยกเลิก</th>
    <th></th>
    </tr>
  </tfoot>
  <tbody id="jetsContent">
 <?php
	$sql="SELECT t1.dev_id,
			t1.dev_onus, 
		t2.dvt_name,
		t1.dev_year,
		t1.dev_cancel, 
		t1.dev_stdate, 
		t1.dev_enddate 
		FROM $db_eform.develop as t1 
		inner join $db_eform.develop_type as t2 on(t1.dev_type=t2.dvt_id) 
		left join $db_eform.develop_course_personel as t3 on(t1.dev_id=t3.dev_id) 
		where (t1.dev_perid='$_SESSION[ses_per_id]' or t3.per_id='$_SESSION[ses_per_id]')
		and t1.dev_maintype='$_GET[dev_maintype]'
		GROUP by t1.dev_id,
			t1.dev_onus, 
		t2.dvt_name,
		t1.dev_year,
		t1.dev_cancel, 
		t1.dev_stdate, 
		t1.dev_enddate 
		order by t1.dev_stdate desc, 
		t1.dev_enddate desc";
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
			$sql02=mysql_query("SELECT *
			FROM  $db_eform.develop_course_personel 
			WHERE dev_id =  '$rs[dev_id]'");
			?>
  <tr   bgcolor="<?php echo "$color"; ?>" class="text">
  	<td><?php echo ++$r;?></td>
    <td class="text" align="center"><?php echo $rs['dev_id'];?></td>
    <td><?php echo $rs['dvt_name'];?></td>
    <td align="center" class="text"><?php print $rs["dev_year"]; ?></td>
    <td class="text"><?php echo $rs['dev_onus'];?></td>
    <!--<td><?php //echo $rs['per_fnamet'].' '.$rs['per_lnamet'];?></td>-->
    <td><?php echo number_format(mysql_num_rows($sql02));?></td>
	<td class="text" align="center"><?php echo dateformat_03($rs['dev_stdate']);?></td>
    <td><?php echo dateformat_03($rs['dev_enddate']);?></td>
    <td class="<?php echo $cf_cancel_msg[$rs['dev_cancel']]['color'];?>"><?php echo $cf_cancel_msg[$rs['dev_cancel']]['icon'].' '.$cf_cancel_msg[$rs['dev_cancel']]['name'];?></td>
    <td class="text">
    	<a href="../form/formdetail.php?getDevid=<?php echo $rs['dev_id'];?>" class="btn btn-default btn-sm">รายละเอียด <i class="glyphicon glyphicon-chevron-right"></i></a>
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