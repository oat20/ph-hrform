<?php
session_start();
include('../../admin/compcode/include/config.php');
include('../../admin/compcode/check_login.php');
include('../../admin/compcode/include/connect_db.php');
include('../../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../../lib/css-inc.php');?>
</head>

<body>
<?php include('../../inc/navbar02-inc.php');?>
<div class="container-fluid">
    
	<div class="row">
    	
        <div class="col-lg-2">
        	<strong><i class="fa fa-filter"></i> Filter</strong>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="filterForm">
                <div class="form-group">
                    <label class="control-label font-14">ระหว่างวันที่</label>
                    <input type="text" class="form-control input-sm" name="keyDevstdate" id="keyDevstdate" value="<?php echo $_POST['keyDevstdate'];?>">
                </div>
                <div class="form-group">
                    <label class="control-label font-14">ถึงวันที่</label>
                    <input type="text" class="form-control input-sm" name="keyDevenddate" id="keyDevenddate" value="<?php echo $_POST['keyDevenddate'];?>">
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
            </form><hr>
        </div><!--col-->
        
        <div class="col-lg-10">
        
        	<div class="panel panel-info">
            	<div class="panel-heading">
                	<h3 class="panel-title">
                    	<a href="<?php print $livesite;?>report/index.php"><i class="fa fa-arrow-left fa-fw"></i> รายงานปฏิบัติงานบริการวิชาการจำแนกรายบุคคล</a>
                    </h3>
                </div>
                
                <div class="panel-body">                    
                    <?php
					if(empty($_POST['keyDevstdate']) and empty($_POST['keyDevenddate'])){
						$dev_stdate=date('Y').'-01-01'; $dev_enddate=date('Y-m-d');
					}else{
						$dev_stdate=$_POST['keyDevstdate']; $dev_enddate=$_POST['keyDevenddate'];
					}				
					$sql=mysql_query("select t1.per_id, t6.dm_id, t6.dm_title, t1.per_pname, t1.per_fnamet, t1.per_lnamet, t4.job_name, t5.dp_name, t7.gr_title, t8.pert_name, count(t3.dev_id) as countDevid 
										from $db_eform.personel_muerp as t1
										inner join $db_eform.develop_course_personel as t2 on(t1.per_id=t2.per_id)
										inner join $db_eform.develop as t3 on(t2.dev_id=t3.dev_id)
										inner join $db_eform.job as t4 on(t1.job_id=t4.job_id)
										inner join $db_eform.tb_orgnew as t5 on(t1.per_dept=t5.dp_id)
										inner join $db_eform.develop_main_type as t6 on(t3.dev_maintype=t6.dm_id)
										inner join $db_eform.personel_group as t7 on(t1.per_group=t7.gr_id)
										inner join $db_eform.personel_type as t8 on(t1.per_type=t8.pert_id)
										where (t3.dev_stdate between '$dev_stdate' and '$dev_enddate'
										or t3.dev_enddate between '$dev_stdate' and '$dev_enddate')
										and t3.dev_cancel='no'
										and t3.dev_remove = 'no'
										and t3.dev_maintype='2'
										GROUP by t1.per_id, t6.dm_id, t6.dm_title, t1.per_fnamet, t1.per_lnamet, t4.job_name, t5.dp_name, t7.gr_title, t8.pert_name
										order by convert(t5.dp_name using tis620) asc, convert(t1.per_fnamet using tis620) asc, convert(t1.per_lnamet using tis620) asc");	
				$numRow=mysql_num_rows($sql);
				?>
                    <div class="clearfix">
                    	<div class="pull-left">
                        	ข้อมูลช่วงวันที่ <?php echo '<strong>'.dateThai($dev_stdate).' - '.dateThai($dev_enddate).'</strong>';?> พบบุคลากร <strong class="text-danger"><?php echo number_format($numRow);?></strong> ท่าน
                        </div>
                    	<div class="pull-right text-right">
                        	<a href="groupBypersonel-xls.php?dev_stdate=<?php echo $dev_stdate;?>&dev_enddate=<?php echo $dev_enddate;?>&dm_id=<?php echo $_POST['dm_id'];?>" target="_blank" class="btn btn-warning btn-wide btn-sm"><i class="glyphicon glyphicon-export"></i> Export Excel</a>
                        </div>
                    </div>
                    </div><!--body-->
                    
                    <div class="table-responsive">
                    	<table class="table table-bordered table-striped">
                        	<thead>
                            	<tr class="regBlack_14">
                                	<th>#</th>
                                    <th>บุคลากร</th>
                                    <th>ตำแหน่งาน</th>
                                    <th>ส่วนงาน</th>
                                    <th>จำนวนครั้ง</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
								$sumCountdevid=0;							
								while($ob=mysql_fetch_assoc($sql)){									
									echo '<tr>								
												<td>'.++$r.'</td>
												<td>'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</td>
												<td>'.$ob['job_name'].'</td>
												<td>'.$ob['dp_name'].'</td>
												<td class="text-center"><strong>'.$ob['countDevid'].'</strong></td>
												<td>
													<a href="groupBypersonel02.php?per_id='.$ob['per_id'].'&keyDevstdate='.$dev_stdate.'&keyDevenddate='.$dev_enddate.'&dm_id='.$ob['dm_id'].'" data-toggle="tooltip" data-placement="bottom" title="รายละเอียด" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-info"></i> รายละเอียด</a>
												</td>
											</tr>';
									$sumCountdevid+=$ob['countDevid']; //รวมจำนวนครั้ง
								}
								?>
                            </tbody>
                            <tfoot>
                            	<tr class="regBlack_14">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>รวม</th>
                                    <th class="text-center"><?php echo number_format($sumCountdevid);?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                </div><!--table-->
            </div><!--panel-->
        
        </div><!--col-->
    
    </div><!--row-->
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
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
</script>
<script>
$(document).ready(function() {
	
	//$('select[name="dm_id"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	
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
			   /*per_id:{
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