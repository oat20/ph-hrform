<?php
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">

	<ol class="breadcrumb">
      <li><a href="../profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i></a></li>
      <li class="active">รายงาน</li>
    </ol>
    
    <div class="row">
        
        <div class="col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">รายงานปฏิบัติงานพัฒนาบุคลากร</h3>
							</div>
							<div class="list-group">
                            	<!--<a href="" class="list-group-item"><i class="fa fa-download fa-fw"></i> Export ข้อมูลดิบ</a>-->
								<a href="groupBypersonel.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item active"><i class="fa fa-users fa-fw"></i> แสดงรายบุคคล</a>
								<a href="groupByobjective.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามวัตถุประสงค์</a>
                                <a href="groupByactivity.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทกิจกรรม</a>
								<a href="groupBydivision.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามส่วนงาน</a>							
								<a href="groupBygroup.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามกลุ่มบุคลากร</a>
								<a href="groupBytype.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทบุคลากร</a>
                                <a href="groupByjob.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามตำแหน่งงาน</a>
								<!--<a href="groupByjobacademic.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามตำแหน่งวิชาการ</a>-->
								<!--<a href="groupBylocation.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทสถานที่จัด</a> -->
								<a href="groupBystrategic.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามยุทธศาสตร์มหาวิยาลัยฯ</a>
								<a href="groupBystrategic02.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามยุทธศาสตร์คณะฯ</a>
								<a href="groupBybudget.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทงบประมาณ</a>
								<!--<a href="groupBylocal.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามภายในประเทศ หรือต่างประเทศ</a>-->
                                <a href="groupBydegree.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามระดับการศึกษาของบุคลากร</a>
							</div>
						</div><!--panel-->
					</div><!--col-->
                    
                    <!--บริการวิชาการ-->
                    <div class="col-sm-4">
                    	<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">รายงานปฏิบัติงานบริการวิชาการ</h3>
							</div>
							<div class="list-group">
                            	<!--<a href="" class="list-group-item active"><i class="fa fa-tags fa-fw"></i> <strong>รายงานภาพรวม</strong></a>-->
								<a href="<?php echo $livesite;?>academicservice/report/groupBypersonel.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item active"><i class="fa fa-users fa-fw"></i> แสดงรายบุคคล</a>
                                <a href="<?php echo $livesite;?>academicservice/report/groupByobjective.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามวัตถุประสงค์</a>
								<a href="<?php echo $livesite;?>academicservice/report/groupBydivision.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามส่วนงาน</a>							
								<a href="<?php echo $livesite;?>academicservice/report/groupBygroup.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามกลุ่มบุคลากร</a>
								<a href="<?php echo $livesite;?>academicservice/report/groupBytype.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทบุคลากร</a>
                                <a href="<?php echo $livesite;?>academicservice/report/groupByjob.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามตำแหน่งงาน</a>
								<!--<a href="groupByjobacademic.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามตำแหน่งวิชาการ</a>-->
								<!--<a href="groupBylocation.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทสถานที่จัด</a> -->
								
								<a href="<?php echo $livesite;?>academicservice/report/groupBystrategic.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามยุทธศาสตร์มหาวิยาลัยฯ</a>
								<a href="<?php echo $livesite;?>academicservice/report/groupBystrategic02.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามยุทธศาสตร์คณะฯ</a>
								<a href="<?php echo $livesite;?>academicservice/report/groupBybudget.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามประเภทงบประมาณ</a>
								<!--<a href="groupBylocal.php?dev_maintype='.$rMaintype['dm_id'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามภายในประเทศ หรือต่างประเทศ</a>-->
                                <a href="<?php echo $livesite;?>academicservice/report/groupBydegree.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> จำแนกตามระดับการศึกษาของบุคลากร</a>
							</div><!--list-group-->
						</div><!--panel-->
                    </div><!--col-->
                    
                    <!--การเงิน-->
                    <div class="col-sm-4">
                    	<div class="panel panel-success">
                        	<div class="panel-heading">
                            	<h3 class="panel-title">รายงานด้านการเงิน</h3>
                            </div>
                            <div class="list-group">
                            	<a href="<?php echo $livesite;?>finance/summaryWithdivision.php?dev_year='<?php echo budgetyear_02(date('Y-m-d'));?>" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> สรุปค่าใช้จ่ายตามส่วนงาน</a>
                      		<a href="<?php echo $livesite;?>finance/summaryBudget.php?dev_year=<?php echo budgetyear_02(date('Y-m-d'));?>" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> สรุปค่าใช้จ่ายภาพรวม</a>
                            </div>
                        </div>
                    </div><!--col-->
                    <!--การเงิน-->
                
    </div><!--row-->
    
</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>