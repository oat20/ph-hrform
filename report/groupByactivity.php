<?php
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">
	<ol class="breadcrumb">
    	<li><a href="<?php print $livesite;?>report/index.php"><i class="fa fa-arrow-left fa-fw"></i></a></li>
        <li><a href="<?php print $livesite;?>report/index.php">รายงาน</a></li>
      <li>จำแนกตามประเภทกิจกรรม</li>
    </ol>
    
	<div class="row">
    	<div class="col-sm-3">
        	<strong><i class="fa fa-filter"></i> Filter</strong>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="filterForm">
                    <div class="form-group">
                        <label class="control-label regBlack_14">ระหว่างวันที่</label>
                        <input type="text" class="form-control input-sm" name="keyDevstdate" id="keyDevstdate" value="<?php echo $_POST['keyDevstdate'];?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label regBlack_14">ถึงวันที่</label>
                        <input type="text" class="form-control input-sm" name="keyDevenddate" id="keyDevenddate" value="<?php echo $_POST['keyDevenddate'];?>">
                    </div>
                    <!--<div class="form-group">
                        <label class="control-label font-14">ตามวัตถุประสงค์</label>
                        <select name="dm_id" class="form-control select select-primary select-sm mrs mbm" data-toggle="select" required>
                            <option value="">&raquo;</option>
                            <?php
                            /*$sql=mysql_query("select * from $db_eform.develop_main_type where dm_use='yes' order by convert(dm_title using tis620) asc");
                            while($ob=mysql_fetch_assoc($sql)){
                                if($ob['dm_id']==$_POST['dm_id']){
                                    echo '<option value="'.$ob['dm_id'].'" selected>&raquo; '.$ob['dm_title'].'</option>';
                                }else{
                                    echo '<option value="'.$ob['dm_id'].'">&raquo; '.$ob['dm_title'].'</option>';
                                }
                            }*/
                            ?>
                        </select>
                    </div>-->
                    <!--<div class="form-group">
                        <label class="control-label">ชื่อบุคลากร</label>
                        <select name="per_id" class="form-control select select-primary select-sm" data-toggle="select">
                        	<option value="">ทั้งหมด</option>
                        	<?php
							/*$sql=mysql_query("select personel.per_id,
									personel.per_pname,
									personel.per_fnamet,
									personel.per_lnamet
									from phper2.personel
									inner join phper2.tb_orgnew on (personel.per_dept=tb_orgnew.dp_id)
									where personel.per_flag='1'
									order by convert(personel.per_fnamet using tis620) asc,
									convert(personel.per_lnamet using tis620) asc");
							while($ob=mysql_fetch_assoc($sql)){
								echo '<option value="'.$ob['per_id'].'">'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</option>';
							}*/
							?>
                        </select>
                    </div>-->
                    <input name="dev_maintype" type="hidden" value="<?php echo $_GET['dev_maintype'];?>">
                    <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
                </form><hr>
        </div><!--col-->
        
        <div class="col-sm-9">
        	
            <div class="row">
            	<?php
				$sql01=mysqli_query($condb, "select * from $db_eform.develop_main_type where dm_use='yes' and dm_id='1' order by dm_id");
				while($ob01=mysqli_fetch_assoc($sql01)){
				?>
            	<div class="col-lg-12">
                	<div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $ob01['dm_title'];?></h3>
                        </div>
                        <div class="panel-body">
                        	<?php
							if(empty($_POST['keyDevstdate']) and empty($_POST['keyDevenddate'])){
								$keyDevstdate=date('Y').'-01-01'; $keyDevenddate=date('Y-m-d');
							}else{
								$keyDevstdate=$_POST['keyDevstdate']; $keyDevenddate=$_POST['keyDevenddate'];
							}
							echo 'ข้อมูลช่วงวันที่ <strong>'.dateThai($keyDevstdate).' - '.dateThai($keyDevenddate).'</strong>';
							?>
                        </div>
                        	<div class="table-responsive">
                            	<table class="table table-striped table-bordered regBlack_14">
                                	<thead>
                                    	<tr>
                                        	<th>กิจกรรม</th>
                                            <th>จำนวนโครงการ / หลักสูตร</th>
                                            <th><i class="fa fa-file-excel-o"></i> Download Excel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
										$sumCountdevid=0;
										$sql02=mysqli_query($condb, "select * from $db_eform.activity where act_use='yes' order by convert(activity using tis620) asc");
										while($ob02=mysqli_fetch_assoc($sql02)){
											$sql03=mysqli_query($condb, "SELECT count(develop.dev_id) as countDevid
															FROM $db_eform.develop
															WHERE (develop.dev_stdate between '$keyDevstdate' and '$keyDevenddate'
															or develop.dev_enddate between '$keyDevstdate' and '$keyDevenddate')
															AND develop.dev_maintype='1'
															and develop.act_id='$ob02[act_id]'
															and develop.dev_cancel='no'
															and develop.dev_remove='no'");
											$ob03=mysqli_fetch_assoc($sql03);
											
											echo '<tr>
												<td>'.$ob02['activity'].'</td>
												<td class="text-center"><strong>'.number_format($ob03['countDevid']).'</strong></td>
												<td class="text-center"><a href="groupByactivity-xls.php?act_id='.$ob02['act_id'].'&dev_stdate='.$keyDevstdate.'&dev_enddate='.$keyDevenddate.'&dm_id='.$ob01['dm_id'].'" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-info"></i> รายละเอียด</a></a></td>
											</tr>';
											$sumCountdevid+=$ob03['countDevid'];
										}
										?>
                                    </tbody>
                                    <tfoot>
                                    	<tr>
                                        	<th>รวม</th>
                                            <th class="text-center"><?php echo number_format($sumCountdevid);?></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!--table-->
                    </div><!--panel-->
                </div><!--col-->
                <?php
				}
				?>
            </div><!--row-->
        	
        </div><!--col-->
    </div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function() {
	
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
	
	/*$('select[name="dp_id"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});*/
	
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