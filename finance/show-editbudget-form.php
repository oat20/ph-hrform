<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html lang="en">
<?php include('../lib/css-inc.php');?>
<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<ol class="breadcrumb font-20">
      <li><a href="show-editbudget-form01.php"><i class="fa fa-arrow-left"></i> บันทึกค่าใช้จ่าย / งบประมาณได้รับในแต่ละโครงการ</a></li>
      <li><?php echo $_GET['keyDpname'];?></li>
    </ol>
	
    <div class="row">
    	    
    	<div class="col-sm-12">
        
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">แบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลากร / บริการวิชาการ</h3>
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
<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th>Status</th>
    <th class="text">Form No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th>วัตถุประสงค์</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <th class="text">วัน</th>
    <th>ส่วนงาน</th>
	<th class="text"></th>
    <th>จากแหล่งเงิน</th>
    <th class="text">แบ่งเป็นค่าใช้จ่าย</th>
    <th class="text">หมายเหตุ</th>
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text"></th>
  </tr>
  </thead>
  <tfoot>
        <tr class="text">
        	<tr bgcolor="#E0E3CE" class="text">
	<th>#</th>
    <th>Status</th>
    <th class="text">Form No.</th>
    <th class="text">ปีงบประมาณ</th>
    <th>วัตถุประสงค์</th>
    <th class="text">หลักสูตร/โครงการ</th>
    <th class="text">วัน</th>
    <th>ส่วนงาน</th>
	<th class="text"></th>
    <th>จากแหล่งเงิน</th>
    <th class="text">แบ่งเป็นค่าใช้จ่าย</th>
    <th class="text">หมายเหตุ</th>
    <th>จำนวนผู้เข้าร่วม</th>
	<th class="text"></th>
          </tr>
  </tfoot>
  <tbody id="jetForm01">
 <?php
	 $sql="select * from $db_eform.develop
				inner join $db_eform.tb_orgnew on (develop.dp_id=tb_orgnew.dp_id)
				inner join $db_eform.develop_main_type as t3 on(develop.dev_maintype=t3.dm_id)
				inner join $db_eform.develop_type as t4 on(develop.dev_type=t4.dvt_id)
				where develop.dev_remove='no'
				and develop.dp_id='$_GET[keyDpid]'
				and develop.dev_cancel='no'
				and develop.dev_nopay='0'
				and develop.dev_approve='approve'
				order by develop.dev_year desc,
				develop.dev_stdate desc,
				develop.dev_enddate desc";
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
			$qPersonel=mysql_query("select count(per_id) as c1 from $db_eform.develop_course_personel where dev_id='$rs[dev_id]'");
			$rPersonel=mysql_fetch_assoc($qPersonel);
?>
  <tr   bgcolor="<? echo "$color"; ?>">
  	<td><?php echo $num;?></td>
    <td><?php echo '<span class="label label-'.$cf_approve[$rs['dev_approve']]['color'].'">'.$cf_approve[$rs['dev_approve']]['name'].'</span>';?></td>
    <td class="text"><?php echo $rs['dev_id'];?></td>
    <td class="text"><?php print $rs["dev_year"]; ?></td>
    <td><?php echo $rs['dm_title'].' &raquo; '.$rs['dvt_name'];?></td>
    <td class="text"><?php echo $rs['dev_onus'];?>
        </td>
        <td><?php echo dateThai($rs['dev_stdate']).' - '.dateThai($rs['dev_enddate']);?></td>
	<td width=""    class="text"><?php echo $rs['dp_name'];?></td>
    <td class="text"><?php echo $cf_devnopay[$rs['dev_nopay']];?></td>
    <td>
    	<table class="table regBlack_12">
        	<thead>
            	<th></th>
                <th>หลักการ</th>
                <th>อนุมัติ</th>
                <th>จ่ายจริง</th>
            </thead>
            <tbody>
            	<?php
				$qBudget=mysql_query("select * from $db_eform.develop_form_budget
								inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
								where develop_form_budget.dev_id='$rs[dev_id]'
								order by budtype.bt_id asc");
				while($rBudget=mysql_fetch_assoc($qBudget)){
					echo '<tr>
						<td>'.$rBudget['bt_name'].'</td>
						<td>'.number_format($rBudget['dev_pay01']).'</td>
						<td>'.number_format($rBudget['dev_pay02']).'</td>
						<td>'.number_format($rBudget['dev_pay03']).'</td>
					</tr>';
				}
				?>
            </tbody>
        </table>
    </td>
    <td>
    	<table class="table regBlack_12">
        	<thead>
            	<th></th>
                <th>หลักการ</th>
                <th>อนุมัติ</th>
                <th>จ่ายจริง</th>
            </thead>
            <tbody>
            	<?php
				$qCost=mysql_query("select * from $db_eform.develop_form_cost
							inner join $db_eform.develop_cost_type on (develop_form_cost.ct_id=develop_cost_type.ct_id)
							where develop_form_cost.dev_id='$rs[dev_id]'");
				while($rCost=mysql_fetch_assoc($qCost)){
					echo '<tr>
						<td>'.$rCost['ct_title'].'</td>
						<td>'.number_format($rCost['dev_pay01']).'</td>
						<td>'.number_format($rCost['dev_pay02']).'</td>
						<td>'.number_format($rCost['dev_pay03']).'</td>
					</tr>';
				}
				?>
            </tbody>
        </table>
    </td>
    <td><?php echo $rs['dev_bill'];?></td>
    <td><?php echo number_format($rPersonel['c1']);?></td>
    <td>
        <a href="editbudget-form.php?getDevid=<?php echo $rs['dev_id'];?>" title="แก้ไขโครงการ" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> บันทึกงบประมาณ</a>
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
	/*$('#keyDevstdate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#keyDevenddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});*/
		
		//jets search
		var jets = new Jets({
		  searchTag: '#jetsSearchform01',
		  contentTag: '#jetForm01',
		  columns: [1,2,3,4,5,6,7,8,9,10,11,12] // optional, search by first column only
		});
		/*var jets = new Jets({
		  searchTag: '#jetsSearchform02',
		  contentTag: '#jetForm02',
		  columns: [0,1,2,3,4,5,6,7,8] // optional, search by first column only
		});*/
});
</script>
</body>
</html>