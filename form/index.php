<?php
/* set the cache expire to 30 minutes */
session_cache_expire(30);
$cache_expire = session_cache_expire();
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/include/connect_db.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../lib/css-inc.php');?>

</head>

<body>
<div class="container">

	<?php
	include('logo-inc.php');
	include('navbar-inc.php');
	?>
    
    <!--maincontent-->
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">แบบฟอร์ม</h3>
        </div>
        <div class="panel-body">
        	<div class="row">
            	<?php
				$sql_01 = mysql_query("select * from phper2.develop_main_type where dm_use = 'yes' order by dm_id asc");
				while($ob_01 = mysql_fetch_assoc($sql_01)){
					print '<div class="col-sm-4">
						<div class="blog-content">
							<a href="'.$livesite.'form/form_1?dm_id='.$ob_01['dm_id'].'&dm_title='.$ob_01['dm_title'].'">
								<div class="row">
									<div class="col-xs-3"><i class="fa fa-pencil fa-3x"></i></div>
									<div class="col-xs-9 text-right"><strong>แบบฟอร์มขออนุมัติปฏิบัติงาน'.$ob_01['dm_title'].'</strong></div>
								</div>
							</a>
						</div><!--blog-content-->
					</div><!--col-->';
				}
				?>
                
                <div class="col-sm-4">
                	<div class="blog-content">
                    	<a href="form_03.php">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-pencil fa-3x"></i></div>
                                <div class="col-xs-9 text-right"><strong>แบบฟอร์มขออนุมัติลา (ต่างประเทศ)</strong></div>
                            </div>
                        </a>
                    </div><!--blog-content-->
                </div><!--col-->
                
                <div class="col-sm-4">
                	<div class="alert alert-info">
                        <a href="" class="alert-link">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-search fa-3x"></i></div>
                                <div class="col-xs-9 text-right"><strong>ตรวจสอบสถานะแบบฟอร์ม</strong></div>
                            </div>
                        </a>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--body-->
    </div>
    <!--maincontent-->
    
    <!--summary-->
    <?php
	if($_SESSION['ses_per_id'] != ''){
	?>
    <div class="panel panel-info">
    	<div class="panel-heading">
        	<h3 class="panel-title">สรุปงบประมาณ ปีงบประมาณ...</h3>
        </div>
        <div class="panel-body">
        </div>
        <div class="panel-footer text-right">
        	<a href="">Viewmore <i class="fa fa-angle-double-right"></i></a>
        </div>
    </div>
    <?php
	}
	?>
    <!--summary-->


</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>